<?php
namespace controllers;
 use micro\orm\DAO;
use models\Utilisateur;
use Ajax\JsUtils;
use Ajax\semantic\html\collections\form\HtmlFormDropdown;
use micro\utils\RequestUtils;

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
		$table->addEditDeleteButtons();
		echo $table->compile($this->jquery);
		echo $this->jquery->compile();
	
	}
	
	/**
	 * @route("addUser/")
	 */
	public function addUser(){
		$semantic=$this->jquery->semantic();
		$user=new Utilisateur();
		$form=$semantic->dataForm("utilisateur", $user);
		$form->setFields(["login","password\n","fondEcran","couleur\n","site","statut","submit"]);
		$form->fieldAsInput(1,["inputType"=>"password"]);
		$form->setCaptions(["Login","Mot de Passe","Fond d'écran","Couleur","Site","Status","Valider"]);
		//$form->addItem(new HtmlFormDropdown("ddSite",array("Ifs","Caen"),"Site"));
		$form->fieldAsDropDown("site",["1"=>"Ifs","2"=>"Caen"]);
		$form->FieldAsSubmit("submit","green","newUser/","#divUsers");
		echo $form->compile($this->jquery);
		echo $this->jquery->compile();
	
	}
	/**
	 * @route("newUser/.*?")
	 */
	public function newUser(){
	    $user=new Utilisateur();
	    RequestUtils::setValuesToObject($user,$_POST);
	    if(DAO::insert($user)){
	        echo $user->getLogin()." ajouté";
	    }
	    
	}
}