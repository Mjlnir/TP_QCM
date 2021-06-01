<?php
return array("id"=>[["type"=>"id","constraints"=>["autoinc"=>true]]],"name"=>[["type"=>"length","constraints"=>["max"=>42]]],"description"=>[["type"=>"length","constraints"=>["max"=>42]]],"cdate"=>[["type"=>"type","constraints"=>["ref"=>"dateTime"]]]);
