<?php
namespace controllers;
 use micro\orm\DAO;
use models\Utilisateur;
use Ajax\JsUtils;
use micro\utils\RequestUtils;
use Ajax\service\JArray;


 /**
 * Controller UtilisateurController
 * @property JsUtils $jquery
 **/
class UtilisateurController extends ControllerBase{

    /**
     * @route("/Utilisateur")
     */
    public function index(){
        $semantic=$this->jquery->semantic();
        $bt0=$semantic->htmlButton("btAccueil","Accueil");
        $bt0->asLink("Main");
        $bts=$semantic->htmlButtonGroups("buttons",["Liste des utilisateurs","Ajouter un utilisateur..."]);
        $bts->setPropertyValues("data-ajax", ["all/","addUser/"]);
        $bts->getOnClick("","#divUsers",["attr"=>"data-ajax"]);
        $this->jquery->compile($this->view);
        $this->loadView("Utilisateur/index.html");   
    }
	
	/**
	* @route("/all","cache"=>true,"duration"=>15)
	 */
	public function all(){
		$user=DAO::getAll("models\Utilisateur");
		$semantic=$this->jquery->semantic();
		$table=$semantic->dataTable("utilisateur", "models\Utilisateur", $user);
		$table->setFields(["id","login","couleur","fondEcran","statut","site"]);
		$table->setCaptions(["Identifiant", "Login","Couleur","Fond d'écran","Statut","Site"]);
		$table->addEditDeleteButtons();
		$table->setUrls("","UtilisateurController/editUser","UtilisateurController/DeleteUser");
		$table->setTargetSelector("#divUsers");
		echo $table->compile($this->jquery);
		echo $this->jquery->compile();
	
	}
	
	/**
	 * @route("addUser/")
	 */
	public function addUser(){
		$semantic=$this->jquery->semantic();
		$user=new Utilisateur();
		$sites=DAO::getAll("models\Site");
		$statuts=DAO::getAll("models\Statut");
		$form=$semantic->dataForm("utilisateur", $user);
		$form->setFields(["login","password\n","fondEcran","couleur\n","site","statut\n","submit","clear"]);
		$form->fieldAsInput(1,["inputType"=>"password"]);
		$form->setCaptions(["Login","Mot de Passe","Fond d'écran","Couleur","Site","Status","Valider","Reset"]);
		$form->fieldAsDropDown("site",JArray::modelArray($sites,"getId","getNom"));
		$form->fieldAsDropDown("statut\n",JArray::modelArray($statuts,"getId","getLibelle"));
		$form->FieldAsSubmit("submit","green","newUser/","#divUsers");
		$form->fieldAsReset("clear");
		echo $form->compile($this->jquery);
		echo $this->jquery->compile();
	
	}
	/**
	 * @route("newUser/.*?")
	 */
	public function newUser(){
	    $user=new Utilisateur();
	    RequestUtils::setValuesToObject($user,$_POST);
	    $site=DAO::getOne("models\Site", $_POST["site"]);
	    $statut=DAO::getOne("models\Statut", $_POST["statut"]);
	    $user->setSite($site);
	    $user->setStatut($statut);
	    if(DAO::insert($user)){
	        echo $user->getLogin()." ajouté";
	    }
	    
	}
	
	public function editUser($id){
	    $semantic=$this->jquery->semantic();
	    $this->jquery->compile($this->view);
	    $user=DAO::getOne("models\Utilisateur", $id);
	    $form=$semantic->dataForm("utilisateur", $user);
	    $form->setFields(["login","password\n","fondEcran","couleur\n","site","statut\n","submit"]);
	    $form->setCaptions(["Login","Mot de Passe","Fond d'écran","Couleur","Site","Status","Update"]);
	    $form->FieldAsSubmit("submit","green","UpdateUser/".$id,"#user");
	    echo $form->compile($this->jquery);
	    echo $this->jquery->compile();
	}
	
	/**
	 * @route("UpdateUser/.*?")
	 */
	public function UpdateUser($id){
	    $user=DAO::getOne("models\Utilisateur", $id);
	    $site=DAO::getOne("models\Site", $_POST["site"]);
	    $statut=DAO::getOne("models\Statut", $_POST["statut"]);
	    $user->setSite($site);
	    $user->setStatut($statut);
	    RequestUtils::setValuesToObject($user,$_POST);
	    if(DAO::update($user)){
	        echo $user->getLogin()." modifié";
	    }
	    
	}
	
	public function DeleteUser($id){
	    $user=DAO::getOne("models\Utilisateur", $id);
	    if(DAO::remove($user)){
	        echo $user->getLogin()." supprimé";
	    }
	}
}