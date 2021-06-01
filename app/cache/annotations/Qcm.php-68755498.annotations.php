<?php

return array(
  '#namespace' => 'models',
  '#uses' => array (
),
  '#traitMethodOverrides' => array (
  'models\\Qcm' => 
  array (
  ),
),
  'models\\Qcm' => array(
    array('#name' => 'table', '#type' => 'Ubiquity\\annotations\\items\\TableAnnotation', "name"=>"qcm")
  ),
  'models\\Qcm::$id' => array(
    array('#name' => 'id', '#type' => 'Ubiquity\\annotations\\items\\IdAnnotation', ),
    array('#name' => 'column', '#type' => 'Ubiquity\\annotations\\items\\ColumnAnnotation', "name"=>"id","dbType"=>"int(11)"),
    array('#name' => 'validator', '#type' => 'Ubiquity\\annotations\\items\\ValidatorAnnotation', "type"=>"id","constraints"=>["autoinc"=>true])
  ),
  'models\\Qcm::$name' => array(
    array('#name' => 'column', '#type' => 'Ubiquity\\annotations\\items\\ColumnAnnotation', "name"=>"name","nullable"=>true,"dbType"=>"varchar(42)"),
    array('#name' => 'validator', '#type' => 'Ubiquity\\annotations\\items\\ValidatorAnnotation', "type"=>"length","constraints"=>["max"=>42])
  ),
  'models\\Qcm::$description' => array(
    array('#name' => 'column', '#type' => 'Ubiquity\\annotations\\items\\ColumnAnnotation', "name"=>"description","nullable"=>true,"dbType"=>"varchar(42)"),
    array('#name' => 'validator', '#type' => 'Ubiquity\\annotations\\items\\ValidatorAnnotation', "type"=>"length","constraints"=>["max"=>42])
  ),
  'models\\Qcm::$cdate' => array(
    array('#name' => 'column', '#type' => 'Ubiquity\\annotations\\items\\ColumnAnnotation', "name"=>"cdate","nullable"=>true,"dbType"=>"datetime"),
    array('#name' => 'validator', '#type' => 'Ubiquity\\annotations\\items\\ValidatorAnnotation', "type"=>"type","constraints"=>["ref"=>"dateTime"]),
    array('#name' => 'transformer', '#type' => 'Ubiquity\\annotations\\items\\TransformerAnnotation', "name"=>"datetime")
  ),
  'models\\Qcm::$exams' => array(
    array('#name' => 'oneToMany', '#type' => 'Ubiquity\\annotations\\items\\OneToManyAnnotation', "mappedBy"=>"qcm","className"=>"models\\Exam")
  ),
  'models\\Qcm::$user' => array(
    array('#name' => 'manyToOne', '#type' => 'Ubiquity\\annotations\\items\\ManyToOneAnnotation', ),
    array('#name' => 'joinColumn', '#type' => 'Ubiquity\\annotations\\items\\JoinColumnAnnotation', "className"=>"models\\User","name"=>"idUser")
  ),
  'models\\Qcm::$questions' => array(
    array('#name' => 'manyToMany', '#type' => 'Ubiquity\\annotations\\items\\ManyToManyAnnotation', "targetEntity"=>"models\\Question","inversedBy"=>"qcms"),
    array('#name' => 'joinTable', '#type' => 'Ubiquity\\annotations\\items\\JoinTableAnnotation', "name"=>"qcmquestion")
  ),
);

