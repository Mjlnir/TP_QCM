<?php

namespace Ubiquity\cache\parser;

use Ubiquity\orm\parser\Reflexion;
use Ubiquity\utils\base\UString;
use Ubiquity\cache\ClassUtils;
use Ubiquity\annotations\AnnotationsEngineInterface;

/**
 * Scans a controller to detect routes defined by annotations or attributes.
 * Ubiquity\cache\parser$ControllerParser
 * This class is part of Ubiquity
 *
 * @author jcheron <myaddressmail@gmail.com>
 * @version 1.0.9
 *
 */
class ControllerParser {
	use ControllerParserPathTrait;
	private string $controllerClass;
	private $mainRouteClass;
	private array $routesMethods = [ ];
	private bool $rest = false;
	private static array $excludeds = [ '__construct','isValid','initialize','finalize','onInvalidControl','loadView','forward','redirectToRoute' ];

	/**
	 *
	 * @var AnnotationsEngineInterface
	 */
	private $annotsEngine;

	public function __construct(AnnotationsEngineInterface $annotsEngine) {
		$this->annotsEngine = $annotsEngine;
	}

	public function parse($controllerClass) {
		$automated = false;
		$inherited = false;
		$this->controllerClass = $controllerClass;
		$restAnnotsClass = [ ];
		$reflect = new \ReflectionClass ( $controllerClass );
		if (! $reflect->isAbstract () && $reflect->isSubclassOf ( \Ubiquity\controllers\Controller::class )) {
			try {
				$annotsClass = Reflexion::getAnnotationClass ( $controllerClass, 'route' );
				$restAnnotsClass = Reflexion::getAnnotationClass ( $controllerClass, 'rest' );
			} catch ( \Exception $e ) {
				// When controllerClass generates an exception
			}
			$this->rest = \count ( $restAnnotsClass ) > 0;
			if (isset ( $annotsClass ) && \count ( $annotsClass ) > 0) {
				$this->mainRouteClass = $annotsClass [0];
				$inherited = $this->mainRouteClass->inherited;
				$automated = $this->mainRouteClass->automated;
			}
			$methods = Reflexion::getMethods ( $controllerClass, \ReflectionMethod::IS_PUBLIC );
			$this->parseMethods ( $methods, $controllerClass, $inherited, $automated );
		}
	}

	private function parseMethods($methods, $controllerClass, $inherited, $automated) {
		foreach ( $methods as $method ) {
			if ($method->getDeclaringClass ()->getName () === $controllerClass || $inherited) {
				try {
					$annots = Reflexion::getAnnotationsMethod ( $controllerClass, $method->name, [ 'route','get','post','patch','put','delete','options' ] );
					if (\count ( $annots ) > 0) {
						foreach ( $annots as $annot ) {
							$this->parseAnnot ( $annot, $method );
						}
						$this->routesMethods [$method->name] = [ 'annotations' => $annots,'method' => $method ];
					} else {
						if ($automated) {
							if ($method->class !== 'Ubiquity\\controllers\\Controller' && \array_search ( $method->name, self::$excludeds ) === false && ! UString::startswith ( $method->name, '_' ))
								$this->routesMethods [$method->name] = [ 'annotations' => $this->generateRouteAnnotationFromMethod ( $method ),'method' => $method ];
						}
					}
				} catch ( \Exception $e ) {
					// When controllerClass generates an exception
				}
			}
		}
	}

	private function parseAnnot(&$annot, $method) {
		if (UString::isNull ( $annot->path )) {
			$newAnnot = $this->generateRouteAnnotationFromMethod ( $method );
			$annot->path = $newAnnot [0]->path;
		} else {
			$annot->path = $this->parseMethodPath ( $method, $annot->path );
		}
	}

	private function generateRouteAnnotationFromMethod(\ReflectionMethod $method): array {
		return [ $this->annotsEngine->getAnnotation ( null, 'route', [ 'path' => self::getPathFromMethod ( $method ) ] ) ];
	}

	private static function generateRouteName(string $controllerName,string $action): string {
		$ctrl=\str_ireplace('controller','',ClassUtils::getClassSimpleName ( $controllerName ));
		return \lcfirst($ctrl) . '.' . $action;
	}

	public function asArray(): array {
		$result = [ ];
		$prefix = '';
		$httpMethods = false;
		if ($this->mainRouteClass) {
			if (isset ( $this->mainRouteClass->path ))
				$prefix = $this->mainRouteClass->path;
			if (isset ( $this->mainRouteClass->methods )) {
				$httpMethods = $this->mainRouteClass->methods;
				if ($httpMethods !== null) {
					if (\is_string ( $httpMethods ))
						$httpMethods = [ $httpMethods ];
				}
			}
		}
		foreach ( $this->routesMethods as $method => $arrayAnnotsMethod ) {
			$routeAnnotations = $arrayAnnotsMethod ['annotations'];

			foreach ( $routeAnnotations as $routeAnnotation ) {
				$params = [ 'path' => $routeAnnotation->path,'methods' => $routeAnnotation->methods,'name' => $routeAnnotation->name,'cache' => $routeAnnotation->cache,'duration' => $routeAnnotation->duration,'requirements' => $routeAnnotation->requirements,'priority' => $routeAnnotation->priority ];
				self::parseRouteArray ( $result, $this->controllerClass, $params, $arrayAnnotsMethod ['method'], $method, $prefix, $httpMethods );
			}
		}
		return $result;
	}

	public static function parseRouteArray(&$result, $controllerClass, $routeArray, \ReflectionMethod $method, $methodName, $prefix = '', $httpMethods = NULL) {
		if (! isset ( $routeArray ['path'] )) {
			$routeArray ['path'] = self::getPathFromMethod ( $method );
		}
		$pathParameters = self::addParamsPath ( $routeArray ['path'], $method, $routeArray ['requirements'] );
		$name = $routeArray ['name'];
		if (! isset ( $name )) {
			$name = self::generateRouteName($controllerClass,$methodName);
		}
		$cache = $routeArray ['cache'];
		$duration = $routeArray ['duration'];
		$path = $pathParameters ['path'];
		$parameters = $pathParameters ['parameters'];
		$priority = $routeArray ['priority'];
		$callback = $routeArray ['callback'] ?? null;
		$path = self::cleanpath ( $prefix, $path );
		if (isset ( $routeArray ['methods'] ) && \is_array ( $routeArray ['methods'] )) {
			self::createRouteMethod ( $result, $controllerClass, $path, $routeArray ['methods'], $methodName, $parameters, $name, $cache, $duration, $priority, $callback );
		} elseif (\is_array ( $httpMethods )) {
			self::createRouteMethod ( $result, $controllerClass, $path, $httpMethods, $methodName, $parameters, $name, $cache, $duration, $priority, $callback );
		} else {
			$v = [ 'controller' => $controllerClass,'action' => $methodName,'parameters' => $parameters,'name' => $name,'cache' => $cache,'duration' => $duration,'priority' => $priority ];
			if (isset ( $callback )) {
				$v ['callback'] = $callback;
			}
			$result [$path] = $v;
		}
	}

	private static function createRouteMethod(&$result, $controllerClass, $path, $httpMethods, $method, $parameters, $name, $cache, $duration, $priority, $callback = null) {
		foreach ( $httpMethods as $httpMethod ) {
			$v = [ 'controller' => $controllerClass,'action' => $method,'parameters' => $parameters,'name' => $name,'cache' => $cache,'duration' => $duration,'priority' => $priority ];
			if (isset ( $callback )) {
				$v ['callback'] = $callback;
			}
			$result [$path] [$httpMethod] = $v;
		}
	}

	public function isRest(): bool {
		return $this->rest;
	}
}
