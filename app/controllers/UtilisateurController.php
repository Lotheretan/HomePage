<?php
namespace controllers;
 use micro\orm\DAO;
use models\Utilisateur;
use micro\utils\RequestUtils;
use Ajax\service\JArray;


 /**
 * Controller UtilisateurController
 * @property JsUtils $jquery
 **/
class UtilisateurController extends ControllerBase
{


    public function index()
    {
        $semantic=$this->jquery->semantic();
        $bts=$semantic->htmlButtonGroups("buttons",["Liste des utilisateurs","Ajouter un utilisateur..."]);
        $bts->setPropertyValues("data-ajax", ["UtilisateurController/all/","UtilisateurController/addUser/"]);
        $bts->getOnClick("","#divConfirm",["attr"=>"data-ajax"]);
        $this->jquery->compile($this->view);
        $this->loadView("Utilisateur/index.html");
    }
	
	public function all()
	{
		$user=DAO::getAll("models\Utilisateur");
		$semantic=$this->jquery->semantic();
		$table=$semantic->dataTable("utilisateur", "models\Utilisateur", $user);
		$table->setIdentifierFunction(function($i,$o){return $o->getId();});
		$table->setFields(["id","login","couleur","fondEcran","statut","site","moteurs"]);
		$table->setCaptions(["Identifiant", "Login","Couleur","Fond d'écran","Statut","Site","Moteur de recherche"]);
		$table->addEditButton();
		$table->addDeleteButton();
		$table->setUrls(["","UtilisateurController/EditUser/","UtilisateurController/DeleteUser/"]);
		$table->setTargetSelector("#divConfirm");
		echo $table->compile($this->jquery);
		echo $this->jquery->compile();
	
	}
	
	public function addUser()
	{
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
		$form->FieldAsSubmit("submit","green","UtilisateurController/newUser/","#divConfirm");
		$form->fieldAsReset("clear");
		echo $form->compile($this->jquery);
		echo $this->jquery->compile();
	
	}

	public function newUser()
	{
	    $user=new Utilisateur();
	    RequestUtils::setValuesToObject($user,$_POST);
	    $site=DAO::getOne("models\Site", $_POST["site"]);
	    $statut=DAO::getOne("models\Statut", $_POST["statut"]);
	    $user->setSite($site);
	    $user->setStatut($statut);
	    if(DAO::insert($user))
	    {
	        echo $user->getLogin()." ajouté";
	    }
	    
	}
	

	public function EditUser($id)
	{
	    $semantic=$this->jquery->semantic();
	    $user=DAO::getOne("models\Utilisateur", $id);
	    $user->idSite=$user->getSite()->getId();
	    $user->idStatut=$user->getStatut()->getId();
	    $form=$semantic->dataForm("utilisateur", $user);
	    $form->setFields(["login","password\n","fondEcran","couleur\n","idSite","idStatut\n","submit"]);
	    $form->setCaptions(["Login","Mot de Passe","Fond d'écran","Couleur","Site","Statut","Update"]);
	    $form->fieldAsDropDown("idSite",JArray::modelArray(DAO::getAll("models\Site"),"getId","getNom"));
	    $form->fieldAsDropDown("idStatut\n",JArray::modelArray(DAO::getAll("models\Statut"),"getId","getLibelle"));
	    $form->fieldAsSubmit("submit","green","UtilisateurController/UpdateUser/".$id,"#table-messages");
	    echo $form->compile($this->jquery);
	    echo $this->jquery->compile();
	}
	

	public function UpdateUser($id)
	{
	    $user=DAO::getOne("models\Utilisateur", $id);
	    $site=DAO::getOne("models\Site", $_POST["idSite"]);
	    $statut=DAO::getOne("models\Statut", $_POST["idStatut"]);
	    $user->setSite($site);
	    $user->setStatut($statut);
	    RequestUtils::setValuesToObject($user,$_POST);
	    if(DAO::update($user))
	    {
	        $message=$this->showSimpleMessage($user->getLogin()." modifié","info","info");
	    }
	    else
	    {
	        $message=$this->showSimpleMessage("Impossible de modifier `".$user->getLibelle()."`", "warning","warning");
	    }
	    echo $message;
	    echo $this->jquery->compile($this->view);
	    
	}
	
	public function DeleteUser($id){
	    $table="Utilisateur";
	    $controller = "UtilisateurController";
	    $this->delete($id,$table,$controller,"DeleteUser","#table-messages");
	    
	}
}