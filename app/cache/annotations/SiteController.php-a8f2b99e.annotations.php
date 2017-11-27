<?php

return array(
  '#namespace' => 'controllers',
  '#uses' => array (
  'DAO' => 'micro\\orm\\DAO',
  'RequestUtils' => 'micro\\utils\\RequestUtils',
  'Site' => 'models\\Site',
  'Auth' => 'libraries\\Auth',
),
  '#traitMethodOverrides' => array (
  'controllers\\SiteController' => 
  array (
  ),
),
  'controllers\\SiteController' => array(
    array('#name' => 'property', '#type' => 'mindplay\\annotations\\standard\\PropertyAnnotation', 'type' => 'JsUtils', 'name' => 'jquery')
  ),
);

