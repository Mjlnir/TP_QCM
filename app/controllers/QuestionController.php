<?php
namespace controllers;
use Ubiquity\orm\DAO;
use models\Question;
use models\Answer;
use models\User;
 /**
 * Controller QuestionController
 **/
class QuestionController extends ControllerBase{
	public function index(){}
	public function detail($id){
		$question=DAO::getById(Question::class,$id,['answers']);
		echo "Question : ".$question->getCaption()."</br>";
		echo "Detail : ".$question->getCkcontent()."</br>";
		echo "Réponses : ";
		echo "<ul>";
		foreach($question->getAnswers() as $a){
			echo "<li>".$a->getCaption()."</li>";
		}
		echo "<ul>";
	}
	public function add(){
		$P=['caption'=>'Une question',
        'ckContent'=>'Le détail de la question',
        'points'=>1,
        'idtypeq'=>1,
        'idUser'=>1,
        'answers'=>
			[
				['caption'=>'Bonne réponse','score'=>1],
				['caption'=>'Mauvaise réponse 1','score'=>0],
				['caption'=>'Mauvaise réponse 2','score'=>0]
			]
		];
		$q = new Question();
		$q->setCaption($P["caption"]);
		$q->setCkcontent($P["ckContent"]);
		$q->setPoints($P["points"]);
		$q->setIdTypeq($P["idtypeq"]);
		$q->setUser(DAO::getById(User::class, $P["idUser"]));
		try{
			DAO::save($q);
		}
		catch(Exception $e){
			var_dump($e);
		}
		foreach($P["answers"] as $ans){
			$a = new Answer();
			$a->setCaption($ans["caption"]);
			$a->setScore($ans["score"]);
			$a->setQuestion($q);
			try{
				DAO::save($a);
			}
			catch(Exception $e){
				var_dump($e);
			}
		}
	}
}
