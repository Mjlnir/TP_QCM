<?php

return array(
  '#namespace' => 'models',
  '#uses' => array (
),
  '#traitMethodOverrides' => array (
  'models\\Message' => 
  array (
  ),
),
  'models\\Message' => array(
    array('#name' => 'table', '#type' => 'Ubiquity\\annotations\\items\\TableAnnotation', "name"=>"message")
  ),
  'models\\Message::$id' => array(
    array('#name' => 'id', '#type' => 'Ubiquity\\annotations\\items\\IdAnnotation', ),
    array('#name' => 'column', '#type' => 'Ubiquity\\annotations\\items\\ColumnAnnotation', "name"=>"id","dbType"=>"int(11)"),
    array('#name' => 'validator', '#type' => 'Ubiquity\\annotations\\items\\ValidatorAnnotation', "type"=>"id","constraints"=>["autoinc"=>true])
  ),
  'models\\Message::$idUser' => array(
    array('#name' => 'column', '#type' => 'Ubiquity\\annotations\\items\\ColumnAnnotation', "name"=>"idUser","dbType"=>"int(11)"),
    array('#name' => 'validator', '#type' => 'Ubiquity\\annotations\\items\\ValidatorAnnotation', "type"=>"notNull"),
    array('#name' => 'manyToOne', '#type' => 'Ubiquity\\annotations\\items\\ManyToOneAnnotation', ),
    array('#name' => 'joinColumn', '#type' => 'Ubiquity\\annotations\\items\\JoinColumnAnnotation', "className"=>"models\\User","name"=>"idUser")
  ),
  'models\\Message::$content' => array(
    array('#name' => 'column', '#type' => 'Ubiquity\\annotations\\items\\ColumnAnnotation', "name"=>"content","dbType"=>"text"),
    array('#name' => 'validator', '#type' => 'Ubiquity\\annotations\\items\\ValidatorAnnotation', "type"=>"notNull")
  ),
  'models\\Message::$seen' => array(
    array('#name' => 'column', '#type' => 'Ubiquity\\annotations\\items\\ColumnAnnotation', "name"=>"seen","nullable"=>true,"dbType"=>"int(1)")
  ),
  'models\\Message::$cdate' => array(
    array('#name' => 'column', '#type' => 'Ubiquity\\annotations\\items\\ColumnAnnotation', "name"=>"cdate","nullable"=>true,"dbType"=>"datetime"),
    array('#name' => 'validator', '#type' => 'Ubiquity\\annotations\\items\\ValidatorAnnotation', "type"=>"type","constraints"=>["ref"=>"dateTime"]),
    array('#name' => 'transformer', '#type' => 'Ubiquity\\annotations\\items\\TransformerAnnotation', "name"=>"datetime")
  ),
  'models\\Message::$exam' => array(
    array('#name' => 'manyToOne', '#type' => 'Ubiquity\\annotations\\items\\ManyToOneAnnotation', ),
    array('#name' => 'joinColumn', '#type' => 'Ubiquity\\annotations\\items\\JoinColumnAnnotation', "className"=>"models\\Exam","name"=>"idExam","nullable"=>true)
  ),
  'models\\Message::$user' => array(
    array('#name' => 'manyToOne', '#type' => 'Ubiquity\\annotations\\items\\ManyToOneAnnotation', ),
    array('#name' => 'joinColumn', '#type' => 'Ubiquity\\annotations\\items\\JoinColumnAnnotation', "className"=>"models\\User","name"=>"idTarget")
  ),
);

