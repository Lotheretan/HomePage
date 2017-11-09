<?php

return array(
  '#namespace' => 'controllers',
  '#uses' => array (
  'JsUtils' => 'Ajax\\JsUtils',
  'DAO' => 'micro\\orm\\DAO',
  'HtmlFormInput' => 'Ajax\\semantic\\html\\collections\\form\\HtmlFormInput',
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

