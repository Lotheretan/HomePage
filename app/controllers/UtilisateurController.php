<?php
namespace controllers;
 use micro\orm\DAO;
use models\Utilisateur;
use Ajax\JsUtils;
use micro\utils\RequestUtils;

 /**
 * Controller UtilisateurController
 * * @property JsUtils $jquery
 **/
class UtilisateurController extends ControllerBase{

    /**
     * @route("/Utilisateur")
     */
    public function index(){
        $semantic=$this->jquery->semantic();
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
		$table->setFields(["id","login","statut","site"]);
		$table->setCaptions(["Identifiant", "Login","Statut","Site"]);
		$table->addButtonInToolbar("Ajouter un utilisateur");
		$table->addEditDeleteButtons();
		echo $table->compile($this->jquery);
		echo $this->jquery->compile();
	
	}
	/*public function addUser(){
		$semantic=$this->jquery->semantic();
		$user=new Utilisateur();
		$form=$semantic->dataForm("frmUser", $user);
		$form->setFields("login","password\n","firstname","lastname\n","email","id");
		$form->fieldAsInput(1,["inputType"=>"password"]);
		$form->fieldAsHidden("id");
		$form->setCaptions("Login","Mot de passe","Prénom","Nom","Email","Validez");
		$form->addSubmit("btsubmit", "Validez","green","newUser/","#divUsers");
		echo $form->compile($this->jquery);
		echo $this->jquery->compile();
	
	}*/

}