<?php
namespace controllers;
 use micro\orm\DAO;
use Ajax\JsUtils;

 /**
 * Controller SiteController
 * @property JsUtils $jquery
 **/
class SiteController extends ControllerBase{

	public function index(){
		$semantic=$this->jquery->semantic();
		$semantic->htmlHeader("header",1,"Liste des sites");
		$this->jquery->compile($this->view);
		$this->loadView("site/index.html");
		$site=DAO::getAll("models\Site");
		$semantic=$this->jquery->semantic();
		$table=$semantic->dataTable("site", "models\Site", $site);
		$table->setFields(["id","nom","latitude","longitude"]);
		$table->setCaptions(["Identifiant", "Nom","Latitude","Longitude"]);
		$table->addEditButton();
		$table->addDeleteButton();
		$table->setUrls(["","SiteController/UpdateSite","SiteController/DeleteSite"]);
		$table->setTargetSelector("#site");
		echo $table->compile($this->jquery);
		echo $this->jquery->compile();
	}
	public function UpdateSite(){
		$semantic=$this->jquery->semantic();
		$this->jquery->compile($this->view);
		$this->loadView("site/Update.html");
	}
	public function DeleteSite(){
		
	}

}