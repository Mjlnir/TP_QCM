<?php
return array("#tableName"=>"useranswer","#primaryKeys"=>["idUser"=>"idUser","idExam"=>"idExam","idQuestion"=>"idQuestion"],"#manyToOne"=>["exam","question","user"],"#fieldNames"=>["idUser"=>"idUser","idExam"=>"idExam","idQuestion"=>"idQuestion","value"=>"value","exam"=>"idExam","question"=>"idQuestion","user"=>"idUser"],"#memberNames"=>["idUser"=>"user","idExam"=>"exam","idQuestion"=>"question","value"=>"value"],"#fieldTypes"=>["idUser"=>"int(11)","idExam"=>"int(11)","idQuestion"=>"int(11)","value"=>"text","exam"=>"mixed","question"=>"mixed","user"=>"mixed"],"#nullable"=>["idUser","idExam","idQuestion"],"#notSerializable"=>["exam","question","user"],"#transformers"=>[],"#accessors"=>["idUser"=>"setIdUser","idExam"=>"setIdExam","idQuestion"=>"setIdQuestion","value"=>"setValue"],"#joinColumn"=>["exam"=>["className"=>"models\\Exam","name"=>"idExam"],"question"=>["className"=>"models\\Question","name"=>"idQuestion"],"user"=>["className"=>"models\\User","name"=>"idUser"]],"#invertedJoinColumn"=>["idExam"=>["member"=>"exam","className"=>"models\\Exam"],"idQuestion"=>["member"=>"question","className"=>"models\\Question"],"idUser"=>["member"=>"user","className"=>"models\\User"]]);
