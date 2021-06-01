<?php

return array(
  '#namespace' => 'models',
  '#uses' => array (
),
  '#traitMethodOverrides' => array (
  'models\\Group' => 
  array (
  ),
),
  'models\\Group' => array(
    array('#name' => 'table', '#type' => 'Ubiquity\\annotations\\items\\TableAnnotation', "name"=>"group")
  ),
  'models\\Group::$id' => array(
    array('#name' => 'id', '#type' => 'Ubiquity\\annotations\\items\\IdAnnotation', ),
    array('#name' => 'column', '#type' => 'Ubiquity\\annotations\\items\\ColumnAnnotation', "name"=>"id","dbType"=>"int(11)"),
    array('#name' => 'validator', '#type' => 'Ubiquity\\annotations\\items\\ValidatorAnnotation', "type"=>"id","constraints"=>["autoinc"=>true])
  ),
  'models\\Group::$name' => array(
    array('#name' => 'column', '#type' => 'Ubiquity\\annotations\\items\\ColumnAnnotation', "name"=>"name","nullable"=>true,"dbType"=>"varchar(42)"),
    array('#name' => 'validator', '#type' => 'Ubiquity\\annotations\\items\\ValidatorAnnotation', "type"=>"length","constraints"=>["max"=>42])
  ),
  'models\\Group::$description' => array(
    array('#name' => 'column', '#type' => 'Ubiquity\\annotations\\items\\ColumnAnnotation', "name"=>"description","nullable"=>true,"dbType"=>"text")
  ),
  'models\\Group::$keyCode' => array(
    array('#name' => 'column', '#type' => 'Ubiquity\\annotations\\items\\ColumnAnnotation', "name"=>"keyCode","dbType"=>"varchar(255)"),
    array('#name' => 'validator', '#type' => 'Ubiquity\\annotations\\items\\ValidatorAnnotation', "type"=>"length","constraints"=>["max"=>255,"notNull"=>true])
  ),
  'models\\Group::$exams' => array(
    array('#name' => 'oneToMany', '#type' => 'Ubiquity\\annotations\\items\\OneToManyAnnotation', "mappedBy"=>"group","className"=>"models\\Exam")
  ),
  'models\\Group::$usergroups' => array(
    array('#name' => 'oneToMany', '#type' => 'Ubiquity\\annotations\\items\\OneToManyAnnotation', "mappedBy"=>"group","className"=>"models\\Usergroup")
  ),
  'models\\Group::$user' => array(
    array('#name' => 'manyToOne', '#type' => 'Ubiquity\\annotations\\items\\ManyToOneAnnotation', ),
    array('#name' => 'joinColumn', '#type' => 'Ubiquity\\annotations\\items\\JoinColumnAnnotation', "className"=>"models\\User","name"=>"idUser")
  ),
);

