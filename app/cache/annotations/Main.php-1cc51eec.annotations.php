<?php

return array(
  '#namespace' => 'controllers',
  '#uses' => array (
  'HtmlFormInput' => 'Ajax\\semantic\\html\\collections\\form\\HtmlFormInput',
  'Auth' => 'libraries\\Auth',
  'DAO' => 'micro\\orm\\DAO',
),
  '#traitMethodOverrides' => array (
  'controllers\\Main' => 
  array (
  ),
),
  'controllers\\Main' => array(
    array('#name' => 'property', '#type' => 'mindplay\\annotations\\standard\\PropertyAnnotation', 'type' => 'JsUtils', 'name' => 'jquery')
  ),
);

