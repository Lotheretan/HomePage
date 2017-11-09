<?php
namespace controllers;
use Ajax\JsUtils;
use micro\orm\DAO;
use Ajax\semantic\html\collections\form\HtmlFormInput;
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
		$bts=$semantic->htmlButtonGroups("Buttons",["Connexion","Deconnexion"]);
		$bts->setPropertyValues("data-ajax", ["Main/connecxion/","Main/deconnecxion/"]);
		$bts->getOnClick("","#divUsers",["attr"=>"data-ajax"]);
		$this->jquery->compile($this->view);
		$this->loadView("index.html");
	}
	public function connecxion(){
		$semantic=$this->jquery->semantic();
		$form=$semantic->htmlForm("frm1");
		$form->addField(new HtmlFormInput("Login","Login"))->setWidth(3);
		$form->addField(new HtmlFormInput("Password","Password","password"))->setWidth(3);
		$form->addSubmit("submitForm", "Connexion","basic","Main/connect","#divUsers");
		//$fields=$form->addFields();
		echo $form;
		echo $this->jquery->compile($this->view);
	}
	public function connect(){
		$login=$_POST["Login"];
		if($_SESSION["userLog"]=DAO::getOne("models\Utilisateur","login")
				/*&& $_SESSION["userPass"]=DAO::getOne("models\Utilisateur",$_POST["Password"])*/){
		echo "ça marche";
		//$this->index();
		}else{
			echo "ça morche po";
		}
	}
	public function deconnecxion(){
		if(array_key_exists("autoConnect", $_COOKIE)){
			unset($_COOKIE['autoConnect']);
			setcookie("autoConnect", "", time()-3600,"/");
		}
		$_SESSION = array();
		$_SESSION['KCFINDER'] = array(
				'disabled' => true
		);
		
	}

}