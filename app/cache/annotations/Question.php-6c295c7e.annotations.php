<?php

return array(
  '#namespace' => 'models',
  '#uses' => array (
),
  '#traitMethodOverrides' => array (
  'models\\Question' => 
  array (
  ),
),
  'models\\Question' => array(
    array('#name' => 'table', '#type' => 'Ubiquity\\annotations\\items\\TableAnnotation', "name"=>"question")
  ),
  'models\\Question::$id' => array(
    array('#name' => 'id', '#type' => 'Ubiquity\\annotations\\items\\IdAnnotation', ),
    array('#name' => 'column', '#type' => 'Ubiquity\\annotations\\items\\ColumnAnnotation', "name"=>"id","dbType"=>"int(11)"),
    array('#name' => 'validator', '#type' => 'Ubiquity\\annotations\\items\\ValidatorAnnotation', "type"=>"id","constraints"=>["autoinc"=>true])
  ),
  'models\\Question::$caption' => array(
    array('#name' => 'column', '#type' => 'Ubiquity\\annotations\\items\\ColumnAnnotation', "name"=>"caption","nullable"=>true,"dbType"=>"varchar(255)"),
    array('#name' => 'validator', '#type' => 'Ubiquity\\annotations\\items\\ValidatorAnnotation', "type"=>"length","constraints"=>["max"=>255])
  ),
  'models\\Question::$ckcontent' => array(
    array('#name' => 'column', '#type' => 'Ubiquity\\annotations\\items\\ColumnAnnotation', "name"=>"ckcontent","nullable"=>true,"dbType"=>"text")
  ),
  'models\\Question::$points' => array(
    array('#name' => 'column', '#type' => 'Ubiquity\\annotations\\items\\ColumnAnnotation', "name"=>"points","nullable"=>true,"dbType"=>"int(11)")
  ),
  'models\\Question::$idTypeq' => array(
    array('#name' => 'column', '#type' => 'Ubiquity\\annotations\\items\\ColumnAnnotation', "name"=>"idTypeq","nullable"=>true,"dbType"=>"int(11)")
  ),
  'models\\Question::$answers' => array(
    array('#name' => 'oneToMany', '#type' => 'Ubiquity\\annotations\\items\\OneToManyAnnotation', "mappedBy"=>"question","className"=>"models\\Answer")
  ),
  'models\\Question::$useranswers' => array(
    array('#name' => 'oneToMany', '#type' => 'Ubiquity\\annotations\\items\\OneToManyAnnotation', "mappedBy"=>"question","className"=>"models\\Useranswer")
  ),
  'models\\Question::$user' => array(
    array('#name' => 'manyToOne', '#type' => 'Ubiquity\\annotations\\items\\ManyToOneAnnotation', ),
    array('#name' => 'joinColumn', '#type' => 'Ubiquity\\annotations\\items\\JoinColumnAnnotation', "className"=>"models\\User","name"=>"idUser")
  ),
  'models\\Question::$qcms' => array(
    array('#name' => 'manyToMany', '#type' => 'Ubiquity\\annotations\\items\\ManyToManyAnnotation', "targetEntity"=>"models\\Qcm","inversedBy"=>"questions"),
    array('#name' => 'joinTable', '#type' => 'Ubiquity\\annotations\\items\\JoinTableAnnotation', "name"=>"qcmquestion")
  ),
  'models\\Question::$tags' => array(
    array('#name' => 'manyToMany', '#type' => 'Ubiquity\\annotations\\items\\ManyToManyAnnotation', "targetEntity"=>"models\\Tag","inversedBy"=>"questions"),
    array('#name' => 'joinTable', '#type' => 'Ubiquity\\annotations\\items\\JoinTableAnnotation', "name"=>"questiontag")
  ),
);

