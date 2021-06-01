<?php

return array(
  '#namespace' => 'models',
  '#uses' => array (
),
  '#traitMethodOverrides' => array (
  'models\\Exam' => 
  array (
  ),
),
  'models\\Exam' => array(
    array('#name' => 'table', '#type' => 'Ubiquity\\annotations\\items\\TableAnnotation', "name"=>"exam")
  ),
  'models\\Exam::$id' => array(
    array('#name' => 'id', '#type' => 'Ubiquity\\annotations\\items\\IdAnnotation', ),
    array('#name' => 'column', '#type' => 'Ubiquity\\annotations\\items\\ColumnAnnotation', "name"=>"id","dbType"=>"int(11)"),
    array('#name' => 'validator', '#type' => 'Ubiquity\\annotations\\items\\ValidatorAnnotation', "type"=>"id","constraints"=>["autoinc"=>true])
  ),
  'models\\Exam::$dated' => array(
    array('#name' => 'column', '#type' => 'Ubiquity\\annotations\\items\\ColumnAnnotation', "name"=>"dated","nullable"=>true,"dbType"=>"datetime"),
    array('#name' => 'validator', '#type' => 'Ubiquity\\annotations\\items\\ValidatorAnnotation', "type"=>"type","constraints"=>["ref"=>"dateTime"]),
    array('#name' => 'transformer', '#type' => 'Ubiquity\\annotations\\items\\TransformerAnnotation', "name"=>"datetime")
  ),
  'models\\Exam::$datef' => array(
    array('#name' => 'column', '#type' => 'Ubiquity\\annotations\\items\\ColumnAnnotation', "name"=>"datef","nullable"=>true,"dbType"=>"datetime"),
    array('#name' => 'validator', '#type' => 'Ubiquity\\annotations\\items\\ValidatorAnnotation', "type"=>"type","constraints"=>["ref"=>"dateTime"]),
    array('#name' => 'transformer', '#type' => 'Ubiquity\\annotations\\items\\TransformerAnnotation', "name"=>"datetime")
  ),
  'models\\Exam::$status' => array(
    array('#name' => 'column', '#type' => 'Ubiquity\\annotations\\items\\ColumnAnnotation', "name"=>"status","nullable"=>true,"dbType"=>"varchar(42)"),
    array('#name' => 'validator', '#type' => 'Ubiquity\\annotations\\items\\ValidatorAnnotation', "type"=>"length","constraints"=>["max"=>42])
  ),
  'models\\Exam::$options' => array(
    array('#name' => 'column', '#type' => 'Ubiquity\\annotations\\items\\ColumnAnnotation', "name"=>"options","dbType"=>"text"),
    array('#name' => 'validator', '#type' => 'Ubiquity\\annotations\\items\\ValidatorAnnotation', "type"=>"notNull")
  ),
  'models\\Exam::$messages' => array(
    array('#name' => 'oneToMany', '#type' => 'Ubiquity\\annotations\\items\\OneToManyAnnotation', "mappedBy"=>"exam","className"=>"models\\Message")
  ),
  'models\\Exam::$useranswers' => array(
    array('#name' => 'oneToMany', '#type' => 'Ubiquity\\annotations\\items\\OneToManyAnnotation', "mappedBy"=>"exam","className"=>"models\\Useranswer")
  ),
  'models\\Exam::$group' => array(
    array('#name' => 'manyToOne', '#type' => 'Ubiquity\\annotations\\items\\ManyToOneAnnotation', ),
    array('#name' => 'joinColumn', '#type' => 'Ubiquity\\annotations\\items\\JoinColumnAnnotation', "className"=>"models\\Group","name"=>"idGroup")
  ),
  'models\\Exam::$qcm' => array(
    array('#name' => 'manyToOne', '#type' => 'Ubiquity\\annotations\\items\\ManyToOneAnnotation', ),
    array('#name' => 'joinColumn', '#type' => 'Ubiquity\\annotations\\items\\JoinColumnAnnotation', "className"=>"models\\Qcm","name"=>"idQcm")
  ),
);

