<?php
return array("#tableName"=>"tag","#primaryKeys"=>["id"=>"id"],"#manyToOne"=>["user"],"#fieldNames"=>["id"=>"id","name"=>"name","color"=>"color","user"=>"idUser","questions"=>"questions"],"#memberNames"=>["id"=>"id","name"=>"name","color"=>"color","idUser"=>"user","questions"=>"questions"],"#fieldTypes"=>["id"=>"int(11)","name"=>"varchar(42)","color"=>"varchar(42)","user"=>"mixed","questions"=>"mixed"],"#nullable"=>["id","name","color"],"#notSerializable"=>["user","questions"],"#transformers"=>[],"#accessors"=>["id"=>"setId","name"=>"setName","color"=>"setColor","idUser"=>"setUser","questions"=>"setQuestions"],"#manyToMany"=>["questions"=>["targetEntity"=>"models\\Question","inversedBy"=>"tags"]],"#joinTable"=>["questions"=>["name"=>"questiontag"]],"#joinColumn"=>["user"=>["className"=>"models\\User","name"=>"idUser"]],"#invertedJoinColumn"=>["idUser"=>["member"=>"user","className"=>"models\\User"]]);
