<?php
namespace controllers;
use micro\controllers\admin\UbiquityMyAdminBaseController;
use controllers\admin\MyAdminViewer;

class Admin extends UbiquityMyAdminBaseController{
	protected function getUbiquityMyAdminViewer(){
		return new MyAdminViewer($this);
	}
}
