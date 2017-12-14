<?php

namespace controllers;

use Ajax\semantic\html\collections\form\HtmlFormInput;
use libraries\Auth;
use micro\orm\DAO;
use Ajax\semantic\html\base\constants\Size;
use Ajax\service\JArray;

/**
 * Controller Main
 * 
 * @property JsUtils $jquery
 *
 */
class Main extends ControllerBase 
{
	public function index() 
	{
		$semantic = $this->jquery->semantic ();
		$semantic->htmlHeader ( "header", 1, "Projet HomePage" );
		$this->getButtons ();
		$this->jquery->compile ( $this->view );
		$this->loadView ( "index.html" );
	}
	
public function getButtons() 
{
		$semantic = $this->jquery->semantic ();
		
		if (! isset ( $_SESSION ["user"] )) 
		{
			$btConnect = $semantic->htmlButton( "Connex","Connexion");
			$btConnect->getOnClick ( "Main/connexion/", "#divUsers" );
		} else 
		{
			if (Auth::getUser ()->getStatut () != "Utilisateur") {
			    $btMain=$semantic->htmlButton("btAccueil","Accueil");
			    $btMain->asLink("Main");
				$btAdmin = $semantic->htmlButton ( "BtAdmin", "Admin" );
				$btAdmin->asLink ( "Admin" );
				$btUser = $semantic->htmlButton ( "btMoteur", "Paramètres" );
				$btUser->getOnClick ( "MoteurController/index", "#divUsers" );
				$btUser = $semantic->htmlButton ( "btUser", "Utilisateurs" );
				$btUser->getOnClick ( "UtilisateurController/index", "#divUsers" );
				$btSites = $semantic->htmlButton ( "btSites", "Sites" );
				$btSites->getOnClick ( "SiteController/index", "#divUsers" );
				$this->favoris();
				$btDisconnect = $semantic->htmlButton( "Deconex", "Deconnexion");
				$btDisconnect->getOnClick ( "Main/disconnect/", "#divUsers" );
				$this->recherche();
				
			} elseif (Auth::getUser ()->getStatut () == "Utilisateur") 
			{
			    $btMain=$semantic->htmlButton("btAccueil","Accueil");
			    $btMain->asLink("Main");
			    $btUser = $semantic->htmlButton ( "btMoteur", "Paramètres" );
			    $btUser->getOnClick ( "MoteurController/index", "#divUsers" );
			    $btSites = $semantic->htmlButton ( "btSites", "Sites" );
			    $btSites->getOnClick ( "SiteController/index", "#divUsers" );
				$btDisconnect = $semantic->htmlButton( "Deconex", "Deconnexion");
				$btDisconnect->getOnClick ( "Main/disconnect/", "#divUsers" );
				$btFav = $semantic->htmlButtonGroups ( "BtFav", ["Favoris"] );
				$this->favoris();
				$this->recherche();
				
			}
		}
	}
	
	public function recherche() {
	    if (!isset($_SESSION["user"])) {
	        
	    } else {
	        $IdUser = $_SESSION["user"]->getId();
	        $user = DAO::getOne("models\Utilisateur", $IdUser,true);
	        $moteur = $user->getMoteur();
	        
	        $semantic = $this->jquery->semantic();
	        $frmSearch = $semantic->htmlForm("frmSearch");
	        $input=$frmSearch->addInput("q", "", "", "", "Rechercher...");
	        $input->addAction("Go");
	        $frmSearch->setProperty("action", $moteur->getCode());
	        $frmSearch->setProperty("method", "get");
	        $frmSearch->setProperty("target", "_blank");
	    }
	}
	
	
	public function Search($query)
	{
	    $moteur=DAO::getOne("models\Moteur", $_POST["moteurs"]);
	    //$code=JArray::modelArray($moteur,"getId","getCode");
	    $moteur->getCode();
	    echo $moteur;
	    
	}
	
	
	public function connexion() 
	{
		$semantic = $this->jquery->semantic ();
		$form = $semantic->htmlForm ( "frm_connect" );
		$form->addField ( new HtmlFormInput ( "Login", "Login" ) )->setWidth ( 3 );
		$form->addField ( new HtmlFormInput ( "Password", "Password", "password" ) )->setWidth ( 3 );
		$form->addSubmit ( "submitForm", "Connexion", "basic", "Main/connect", "#divUsers" );
		// $fields=$form->addFields();
		echo $form;
		echo $this->jquery->compile ( $this->view );
	}
	
	public function connect() 
	{
		$user = DAO::getOne ( "models\Utilisateur", "login='" . $_POST ['Login'] . "'" );
		if (isset ( $user )) 
		{
			if ($user->getPassword () === $_POST ["Password"])
			{
				$_SESSION ["user"] = $user;
				echo "Bienvenue utilisateur : " . $user->getLogin ();
				$this->jquery->get ( "Main/index", "body" );
				echo $this->jquery->compile ( $this->view );
			} else 
			{
			    echo "Mauvais mot de passe ! ";
			}
		} else 
		{
		    echo "L'utilisateur n'existe pas ! ";
		}
	}
	public function disconnect() 
	{
		// On détruit les variables de notre session
		session_unset ();
		// On détruit notre session
		
		session_destroy ();
		
		$this->jquery->get ( "Main/index", "body" );
		echo $this->jquery->compile ( $this->view );
	}
	
	public function favoris() 
	{
	    $semantic=$this->jquery->semantic();
	    $btFav=$semantic->htmlButton("BtFav","Favoris","yellow");
	    $btFav->addIcon("star");
	    $btFav->getOnClick ( "LienWebController/index", "#divUsers");
	}
}