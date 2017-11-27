<?php

return array(
  '#namespace' => 'controllers',
  '#uses' => array (
  'UbiquityMyAdminBaseController' => 'micro\\controllers\\admin\\UbiquityMyAdminBaseController',
  'MyAdminViewer' => 'controllers\\admin\\MyAdminViewer',
),
  '#traitMethodOverrides' => array (
  'controllers\\Admin' => 
  array (
  ),
),
);

