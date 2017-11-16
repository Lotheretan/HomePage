<?php
namespace controllers;
use Ajax\JsUtils;
use micro\orm\DAO;
use Ajax\semantic\html\collections\form\HtmlFormInput;
use libraries;
 /**
 * Controller Main
 *@property JsUtils $jquery
 **/
class Main extends ControllerBase{

	public function index(){
		$semantic=$this->jquery->semantic();
		$semantic->htmlHeader("header",1,"Accueil du site");
		$this->getButtons();
		$this->jquery->compile($this->view);
		$this->loadView("index.html",array("divUsers"=>libraries\Auth::getInfoUser()));
	}
	
	public function getButtons(){
		$semantic=$this->jquery->semantic();
		
		if(!isset($_SESSION["user"]))
		{
			$bts=$semantic->htmlButtonGroups("Buttons",["Connexion"]);
			$bts->getOnClick("Main/connexion/","#divUsers");
		}
		else{
			$bt=$semantic->htmlButton("bt","Utilisateurs");
			$bt->asLink("UtilisateurController");
			$bt2=$semantic->htmlButton("bt2","Sites");
			$bt2->asLink("SiteController");
			$bt3=$semantic->htmlButtonGroups("Buttons",["Deconnexion"]);
			$bt3->getOnClick("Main/disconnect/","#divUsers");
		}
	}
	
	public function connexion(){
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
	    $user=DAO::getOne("models\Utilisateur","login='".$_POST['Login']."'");
	    if(isset($user)){
	        if($user->getPassword()===$_POST["Password"]){
	            $_SESSION["user"]=$user;
	            echo "Bienvenue utilisateur : ".$user->getLogin();
	            $this->jquery->get("Main/index","body");
	            echo $this->jquery->compile($this->view);
	           
		}else{
			echo "Mauvais identifiant et/ou mot de passe ! ";
		}
	    }else {getInfoUser();}
	    
	}
	
	public function disconnect(){
		// On détruit les variables de notre session
		session_unset();
		// On détruit notre session
		
		session_destroy ();
		
		$this->jquery->get("Main/index","body");
		echo $this->jquery->compile($this->view);
		
		

		
	}
	public function getInfoUser(){
		echo libraries\Auth::getInfoUser();
	}

}