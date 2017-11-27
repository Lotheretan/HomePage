<?php

return array(
  '#namespace' => 'controllers',
  '#uses' => array (
  'DAO' => 'micro\\orm\\DAO',
  'Utilisateur' => 'models\\Utilisateur',
  'RequestUtils' => 'micro\\utils\\RequestUtils',
  'JArray' => 'Ajax\\service\\JArray',
),
  '#traitMethodOverrides' => array (
  'controllers\\UtilisateurController' => 
  array (
  ),
),
  'controllers\\UtilisateurController' => array(
    array('#name' => 'property', '#type' => 'mindplay\\annotations\\standard\\PropertyAnnotation', 'type' => 'JsUtils', 'name' => 'jquery')
  ),
);

