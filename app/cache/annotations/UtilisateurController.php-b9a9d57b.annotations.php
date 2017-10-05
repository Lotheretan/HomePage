<?php

return array(
  '#namespace' => 'controllers',
  '#uses' => array (
  'DAO' => 'micro\\orm\\DAO',
  'Utilisateur' => 'models\\Utilisateur',
  'JsUtils' => 'Ajax\\JsUtils',
  'RequestUtils' => 'micro\\utils\\RequestUtils',
),
  '#traitMethodOverrides' => array (
  'controllers\\UtilisateurController' => 
  array (
  ),
),
  'controllers\\UtilisateurController' => array(
    array('#name' => 'property', '#type' => 'mindplay\\annotations\\standard\\PropertyAnnotation', 'type' => 'JsUtils', 'name' => 'jquery')
  ),
  'controllers\\UtilisateurController::index' => array(
    array('#name' => 'route', '#type' => 'micro\\annotations\\router\\RouteAnnotation', "/Utilisateur")
  ),
  'controllers\\UtilisateurController::all' => array(
    array('#name' => 'route', '#type' => 'micro\\annotations\\router\\RouteAnnotation', "/all","cache"=>true,"duration"=>15)
  ),
  'controllers\\UtilisateurController::addUser' => array(
    array('#name' => 'route', '#type' => 'micro\\annotations\\router\\RouteAnnotation', "addUser/")
  ),
);

