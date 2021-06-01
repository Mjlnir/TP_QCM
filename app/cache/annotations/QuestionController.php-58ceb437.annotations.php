<?php

return array(
  '#namespace' => 'controllers',
  '#uses' => array (
  'DAO' => 'Ubiquity\\orm\\DAO',
  'Question' => 'models\\Question',
  'Answer' => 'models\\Answer',
),
  '#traitMethodOverrides' => array (
  'controllers\\QuestionController' => 
  array (
  ),
),
);

