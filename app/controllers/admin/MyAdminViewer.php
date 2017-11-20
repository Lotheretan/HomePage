<?php

namespace controllers\admin;

use micro\controllers\admin\UbiquityMyAdminViewer;

class MyAdminViewer extends UbiquityMyAdminViewer {
	public function getMainMenuElements(){
		$result=parent::getMainMenuElements();
		$result["Main"]=["Accueil","home","Lien vers l'accueil"];
		return $result;
	}
}