<?php
return array("id"=>[["type"=>"id","constraints"=>["autoinc"=>true]]],"password"=>[["type"=>"length","constraints"=>["max"=>255]]],"firstname"=>[["type"=>"length","constraints"=>["max"=>42]]],"lastname"=>[["type"=>"length","constraints"=>["max"=>42]]],"email"=>[["type"=>"email"],["type"=>"length","constraints"=>["max"=>255]]],"avatar"=>[["type"=>"length","constraints"=>["max"=>255]]],"language"=>[["type"=>"length","constraints"=>["max"=>32,"notNull"=>true]]]);
