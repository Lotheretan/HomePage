<?php

return array(
  '#namespace' => 'controllers',
  '#uses' => array (
  'DAO' => 'micro\\orm\\DAO',
  'Utilisateur' => 'models\\Utilisateur',
),
  '#traitMethodOverrides' => array (
  'controllers\\UtilisateurController' => 
  array (
  ),
),
  'controllers\\UtilisateurController::all' => array(
    array('#name' => 'route', '#type' => 'micro\\annotations\\router\\RouteAnnotation', "/all/.*?","cache"=>true,"duration"=>15)
  ),
);

