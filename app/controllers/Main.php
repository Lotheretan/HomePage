<?php
namespace controllers;
use Ajax\JsUtils;
use micro\orm\DAO;
use Ajax\semantic\html\collections\form\HtmlFormInput;
use libraries;
use libraries\Auth;
 /**
 * Controller Main
 *@property JsUtils $jquery
 **/
class Main extends ControllerBase{

	public function index()
	{
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
			$btConnect=$semantic->htmlButtonGroups("Buttons",["Connexion"]);
			$btConnect->getOnClick("Main/connexion/","#divUsers");
		}
		else
		{
		    if(Auth::getUser()->getStatut()!="Utilisateur")
		    {
		    	$btAdmin=$semantic->htmlButton("BtAdmin","Admin");
		    	$btAdmin->asLink("Admin");
    			$btUser=$semantic->htmlButton("btUser","Utilisateurs");
    			$btUser->asLink("UtilisateurController");
    			$btSites=$semantic->htmlButton("btSites","Sites");
    			$btSites->asLink("SiteController");
    			$btDisconnect=$semantic->htmlButtonGroups("Buttons",["Deconnexion"]);
    			$btDisconnect->getOnClick("Main/disconnect/","#divUsers");
		    }
		    elseif (Auth::getUser()->getStatut()=="Utilisateur")
		    {
		        $btDisconnect=$semantic->htmlButtonGroups("Buttons",["Deconnexion"]);
		        $btDisconnect->getOnClick("Main/disconnect/","#divUsers");
		    }
		    
		}
	}
	
	public function connexion(){
		$semantic=$this->jquery->semantic();
		$form=$semantic->htmlForm("frm_connect");
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
	    }else {Auth::getInfoUser();}
	    
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