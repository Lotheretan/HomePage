<?php
namespace controllers;
use Ajax\JsUtils;
 /**
 * Controller Main
 *@property JsUtils $jquery
 **/
class Main extends ControllerBase{

	public function index(){
		$semantic=$this->jquery->semantic();
		$semantic->htmlHeader("header",1,"Accueil du site");
		$bt=$semantic->htmlButton("bt","Utilisateur");
		$bt->asLink("UtilisateurController");
		$bt2=$semantic->htmlButton("bt2","Sites");
		$bt2->asLink("SiteController");
		
		$this->jquery->compile($this->view);
		$this->loadView("index.html");}

}