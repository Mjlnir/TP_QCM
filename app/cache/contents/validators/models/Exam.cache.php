<?php
return array("id"=>[["type"=>"id","constraints"=>["autoinc"=>true]]],"dated"=>[["type"=>"type","constraints"=>["ref"=>"dateTime"]]],"datef"=>[["type"=>"type","constraints"=>["ref"=>"dateTime"]]],"status"=>[["type"=>"length","constraints"=>["max"=>42]]],"options"=>[["type"=>"notNull"]]);
