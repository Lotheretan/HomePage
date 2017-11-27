<?php

namespace controllers;

use Ajax\semantic\html\collections\form\HtmlFormInput;
use Ajax\service\JArray;
use libraries\Auth;
use micro\orm\DAO;

/**
 * Controller Main
 * 
 * @property JsUtils $jquery
 *
 */
class Main extends ControllerBase {
	public function index() {
		$semantic = $this->jquery->semantic ();
		$semantic->htmlHeader ( "header", 1, "Accueil du site" );
		$this->getButtons ();
		$this->jquery->compile ( $this->view );
		$this->loadView ( "index.html" );
	}
public function getButtons() {
		$semantic = $this->jquery->semantic ();
		
		if (! isset ( $_SESSION ["user"] )) {
			$btConnect = $semantic->htmlButton( "Connex","Connexion");
			$btConnect->getOnClick ( "Main/connexion/", "#divUsers" );
		} else {
			if (Auth::getUser ()->getStatut () != "Utilisateur") {
				$btAdmin = $semantic->htmlButton ( "BtAdmin", "Admin" );
				$btAdmin->asLink ( "Admin" );
				$btUser = $semantic->htmlButton ( "btUser", "Utilisateurs" );
				$btUser->asLink ( "UtilisateurController" );
				$btSites = $semantic->htmlButton ( "btSites", "Sites" );
				$btSites->asLink ( "SiteController" );
				$this->favoris();
				$btDisconnect = $semantic->htmlButton( "Deconex", "Deconnexion");
				$btDisconnect->getOnClick ( "Main/disconnect/", "#divUsers" );
			} elseif (Auth::getUser ()->getStatut () == "Utilisateur") {
				$btPara = $semantic->htmlButton("Para","Paramètres");
				$btPara->asLink("SiteController");
				$btDisconnect = $semantic->htmlButton( "Deconex", "Deconnexion");
				$btDisconnect->getOnClick ( "Main/disconnect/", "#divUsers" );
				$this->favoris();
				
			}
		}
	}
	public function connexion() {
		$semantic = $this->jquery->semantic ();
		$form = $semantic->htmlForm ( "frm_connect" );
		$form->addField ( new HtmlFormInput ( "Login", "Login" ) )->setWidth ( 3 );
		$form->addField ( new HtmlFormInput ( "Password", "Password", "password" ) )->setWidth ( 3 );
		$form->addSubmit ( "submitForm", "Connexion", "basic", "Main/connect", "#divUsers" );
		// $fields=$form->addFields();
		echo $form;
		echo $this->jquery->compile ( $this->view );
	}
	public function connect() {
		$user = DAO::getOne ( "models\Utilisateur", "login='" . $_POST ['Login'] . "'" );
		if (isset ( $user )) 
		{
			if ($user->getPassword () === $_POST ["Password"])
			{
				$_SESSION ["user"] = $user;
				echo "Bienvenue utilisateur : " . $user->getLogin ();
				$this->jquery->get ( "Main/index", "body" );
				echo $this->jquery->compile ( $this->view );
			} else {echo "Mauvais mot de passe ! ";}
		} else {echo "L'utilisateur n'existe pas ! ";}
	}
	public function disconnect() {
		// On détruit les variables de notre session
		session_unset ();
		// On détruit notre session
		
		session_destroy ();
		
		$this->jquery->get ( "Main/index", "body" );
		echo $this->jquery->compile ( $this->view );
	}
	
	public function favoris() 
	{
	    /*$favList = DAO::getOne( "models\Lienweb", "idUtilisateur='".Auth::getUser()->getId()."'" );
	    $semantic = $this->jquery->semantic ();
	    $modal=$semantic->htmlModal("modalFav","Liste de vos favoris");
	    $de=$semantic->dataTable("favoris", "models\Lienweb", $favList);
	    //$de=$semantic->dataElement("de3-2",$favList);
	    $de->fieldAsDropDown("idSite",JArray::modelArray(DAO::getAll("models\Lienweb"),"getId","getLibelle"));
	    $de->setFields(["libelle","url","ordre","idSite","idUtilisateur"]);
	    $de->setCaptions(["libelle","url ordre","idSite","idUtilisateur"]);
	    $de->fieldAsHeader(0,3,"libelle");
	    $modal=$de->asModal();
	    //$modal=$dd->asModal();
	    $modal->setActions(["Okay","Close"]);
	    echo $modal;
	    $btModalFav=$semantic->htmlButton("btModalFav","Favoris","yellow","$('#modalFav').modal('show');");
	    $btModalFav->addIcon("star");
	    echo $modal->compile($this->jquery);*/
	    $semantic=$this->jquery->semantic();
	    $modal=$semantic->htmlModal("modalFav","Favoris");
	    $btFav = $semantic->htmlButtonGroups ( "BtFav", ["Favoris"] );
	    $btFav->getOnClick ( "LienWebController/index", "#modalFav" );
	    $modal->setActions(["Okay","Cancel"]);
	    $btModalFav=$semantic->htmlButton("btModalFav","Favoris","yellow","$('#modalFav').modal('show');");
	    $btModalFav->addIcon("star");
	    echo $modal->compile($this->jquery);
	    
	    
	    //$this->jquery->exec("$('#modalFav').modal('show');",true);
	    
	     $this->jquery->compile($this->view);
	}
}