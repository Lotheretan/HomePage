<?php

return array(
  '#namespace' => 'controllers',
  '#uses' => array (
  'Auth' => 'libraries\\Auth',
  'DAO' => 'micro\\orm\\DAO',
  'RequestUtils' => 'micro\\utils\\RequestUtils',
  'Lienweb' => 'models\\Lienweb',
),
  '#traitMethodOverrides' => array (
  'controllers\\LienWebController' => 
  array (
  ),
),
);

