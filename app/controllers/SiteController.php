<?php
namespace controllers;
 use micro\orm\DAO;
use micro\utils\RequestUtils;
use models\Site;
use libraries\Auth;

 /**
 * Controller SiteController
 * @property JsUtils $jquery
 **/
class SiteController extends ControllerBase{

	public function index(){
		$semantic=$this->jquery->semantic();
		$semantic->htmlHeader("header",1,"Liste des sites");
		$this->getButtons();
		$this->jquery->compile($this->view);
		$this->loadView("site/index.html");
		echo "<div id='mainSite'>";
		//$this->all();
		echo "</div>";
	}
	public function getButtons() {
		$semantic = $this->jquery->semantic ();
		if (Auth::getUser ()->getStatut () != "Utilisateur") {
			$bt0=$semantic->htmlButton("btAccueil","Accueil");
			$bt0->asLink("Main");
			$bt=$semantic->htmlButton("Bt","Afficher liste");
			$bt->getOnClick("SiteController/all","#mainSite");
			$bt2=$semantic->htmlButton("Btadd","Ajouter site");
			$bt2->getOnClick("SiteController/addSite","#mainSite");
			//$this->all();
		} elseif (Auth::getUser ()->getStatut () == "Utilisateur") {
			$bt0=$semantic->htmlButton("btAccueil","Accueil");
			$bt0->asLink("Main");
			$this->all2();
			/*$btListe=$semantic->htmlButton("BtListe","Liste des sites");
			 $btListe->getOnClick("SiteController/all2/","#mainSite");*/
		}
	}
	public function all(){
		$semantic=$this->jquery->semantic();
		$site=DAO::getAll("models\Site");
		$table=$semantic->dataTable("site", "models\Site", $site);
		$table->setIdentifierFunction(function($i,$o){return $o->getId();});
		$table->setFields(["id","nom","latitude","longitude"]);
		$table->setCaptions(["Identifiant", "Nom","Latitude","Longitude"]);
		$table->addEditButton();
		$table->addDeleteButton();
		$table->setUrls(["","SiteController/editSite","SiteController/DeleteSite"]);
		$table->setTargetSelector("#mainSite");
		echo $table->compile($this->jquery);
		echo $this->jquery->compile();
	}
	public function all2(){
		$semantic=$this->jquery->semantic();
		$site=DAO::getAll("models\Site");
		$table=$semantic->dataTable("site", "models\Site", $site);
		$table->setIdentifierFunction(function($i,$o){return $o->getId();});
		$table->setFields(["id","nom","latitude","longitude"]);
		$table->setCaptions(["Identifiant", "Nom","Latitude","Longitude"]);
		$table->setTargetSelector("#mainSite");
	}
	public function addSite(){
		$semantic=$this->jquery->semantic();
		$this->jquery->compile($this->view);
		$site=new Site();
		$form=$semantic->dataForm("frm1site", $site);
		$form->setFields(["nom","latitude","longitude","ecart","fondEcran","couleur","ordre","option","submit"]);
		$form->setCaptions(["Nom","Latitude","Longitude","Ecart","Fond d'écran","Couleur","Ordre","Option","Valider"]);
		$form->FieldAsSubmit("submit","green","SiteController/AjoutSite","#mainSite");
		echo $form->compile($this->jquery);
		echo $this->jquery->compile();
	}
	public function editSite($id){
		$semantic=$this->jquery->semantic();
		$this->jquery->compile($this->view);
		$site=DAO::getOne("models\Site", $id);
		$form=$semantic->dataForm("frmSite", $site);
		$form->setFields(["nom","latitude","longitude","submit"]);
		$form->setCaptions(["Nom","Latitude","Longitude","Update"]);
		$form->FieldAsSubmit("submit","green","SiteController/UpdateSite/".$id,"#mainSite");
		echo $form->compile($this->jquery);
		echo $this->jquery->compile();
	}
	
	public function AjoutSite(){
		$site=new Site();
		RequestUtils::setValuesToObject($site,$_POST);
		if(DAO::insert($site)){
			echo $site->getNom()." ajouté";
		}
	}
	
	public function UpdateSite($id){
		$site=DAO::getOne("models\Site", $id);
		RequestUtils::setValuesToObject($site,$_POST);
		if(DAO::update($site)){
			echo $site->getNom()." modifié";
		}
		
	}
	
	public function DeleteSite($id){
		$site=DAO::getOne("models\Site", $id);
		if(DAO::remove($site)){
			echo $site->getNom()." supprimé";
		}
	}

}