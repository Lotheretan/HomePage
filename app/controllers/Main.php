<?php

namespace controllers;

use Ajax\semantic\html\collections\form\HtmlFormInput;
use libraries\Auth;
use micro\orm\DAO;
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
				$btUser = $semantic->htmlButton ( "btUser", "Utilisateurs" );
				$btUser->getOnClick ( "UtilisateurController/index", "#divUsers" );
				$btSites = $semantic->htmlButton ( "btSites", "Sites" );
				//$btSites->asLink ( "SiteController" );
				$btSites->getOnClick ( "SiteController/index", "#divUsers" );
				$this->favoris();
				$btDisconnect = $semantic->htmlButton( "Deconex", "Deconnexion");
				$btDisconnect->getOnClick ( "Main/disconnect/", "#divUsers" );
				//$this->body();
				
			} elseif (Auth::getUser ()->getStatut () == "Utilisateur") 
			{
			    $btMain=$semantic->htmlButton("btAccueil","Accueil");
			    $btMain->asLink("Main");
				$btPara = $semantic->htmlButton("Para","Paramètres");
				$btPara->asLink("SiteController");
				$btDisconnect = $semantic->htmlButton( "Deconex", "Deconnexion");
				$btDisconnect->getOnClick ( "Main/disconnect/", "#divUsers" );
				$btFav = $semantic->htmlButtonGroups ( "BtFav", ["Favoris"] );
				$this->favoris();
				//$this->body();
				
			}
		}
	}
	
	
	public function body()
	{
	    if (! isset ( $_SESSION ["user"] ))
	    {
	       
	    } else
	    {
	        $semantic=$this->jquery->semantic();
	        //$moteurs=DAO::getAll("models\Moteur");
	        //$form=$semantic->dataForm("moteur", $moteurs);
	        //$form->setFields(["moteur","search"]);
	        //$form->fieldAsDropDown("moteurs",JArray::modelArray($moteurs,"getId","getNom"));
	        //$moteur=DAO::getOne("models\Moteur", $form);
	        $search=$semantic->htmlSearch("search2","Search...","search");
	        $search->setUrl($this->url->get("/json/standardSearch/{query}"));
	        //$form->FieldAsSubmit("Search","green","UtilisateurController/newUser/","#divUsers");
	        echo $search->compile($this->jquery);
	        //echo $form->compile($this->jquery);
	        echo $this->jquery->compile();
	    }
	    
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