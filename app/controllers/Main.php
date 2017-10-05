<?php
namespace controllers;
 /**
 * Controller Main
 **/
class Main extends ControllerBase{

	public function index(){
		$semantic=$this->jquery->semantic();

		$semantic->htmlHeader("header",1,"Accueil du site");
		$bt=$semantic->htmlButton("btLogin","Se connecter");
		$bt2=$semantic->htmlButton("btUser","Liste User");
		$bt->onClick("$('#test').html('It works with Semantic-UI too !');");
		//$bt2->onClick();
		
		$this->jquery->compile($this->view);
		$this->loadView("index.html");}

}