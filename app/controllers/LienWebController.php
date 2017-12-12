<?php
namespace controllers;
use Ajax\semantic\html\elements\HtmlButton;
use libraries\Auth;
use micro\controllers\Startup;
use micro\controllers\admin\UbiquityMyAdminData;
use micro\controllers\admin\UbiquityMyAdminFiles;
use micro\controllers\admin\UbiquityMyAdminViewer;
use micro\orm\DAO;
use micro\utils\RequestUtils;
use models\Lienweb;

 /**
 * Controller LienWebController
 **/
class LienWebController extends ControllerBase
{
	
    public function index()
    {
        $semantic=$this->jquery->semantic();
        $bts=$semantic->htmlButtonGroups("buttons",["Liste des favoris","Ajouter un favoris..."]);
        $bts->setPropertyValues("data-ajax", ["LienWebController/all/","LienWebController/addFav/"]);
        $bts->getOnClick("","#divConfirm",["attr"=>"data-ajax"]);
        $this->jquery->compile($this->view);
        $this->loadView("Lienweb/index.html");
    }
    
    public function all()
    {
        
        if (Auth::getUser ()->getStatut () != "Utilisateur")
        {
            $lien=DAO::getAll("models\Lienweb");
            $semantic=$this->jquery->semantic();
            $table=$semantic->dataTable("favoris", "models\Lienweb", $lien);
            $table->setIdentifierFunction(function($i,$o){return $o->getId();});
            $table->setFields(["libelle","url","ordre","Utilisateur"]);
            $table->setCaptions(["Nom", "URL","ordre","Utilisateur"]);
            
        } elseif (Auth::getUser ()->getStatut () == "Utilisateur")
        {
            $userId=Auth::getUser()->getId();
            $lien=DAO::getAll("models\Lienweb","idUtilisateur='".$userId."'");
            $semantic=$this->jquery->semantic();
            $table=$semantic->dataTable("favoris", "models\Lienweb", $lien);
            $table->setIdentifierFunction(function($i,$o){return $o->getId();});
            $table->setFields(["libelle","url","ordre"]);
            $table->setCaptions(["Nom", "URL","ordre"]);
        }
        $table->setUrls(["","LienWebController/EditFav/","LienWebController/DeleteFav/"]);
        $table->setTargetSelector(["edit"=>"#divConfirm","delete"=>"#table-messages"]);
        $table->addEditDeleteButtons(true,["ajaxTransition"=>"random"]);
        echo $table->compile($this->jquery);
        echo $this->jquery->compile();
        
    }
    
    public function addFav()
    {
        $semantic=$this->jquery->semantic();
        $lien=new Lienweb();
        $form=$semantic->dataForm("utilisateur", $lien);
        $form->setFields(["libelle","url","submit","clear"]);
        $form->setCaptions(["Nom","URL","Valider","Reset"]);
        $form->FieldAsSubmit("submit","green","LienWebController/newFav/","#divConfirm");
        $form->fieldAsReset("clear");
        echo $form->compile($this->jquery);
        echo $this->jquery->compile();
        
    }
    
    public function newFav()
    {
        $userId=Auth::getUser()->getId();
        $lien=new Lienweb();
        RequestUtils::setValuesToObject($lien,$_POST);
        $user=DAO::getOne("models\Utilisateur", $userId);
        $lien->setUtilisateur($user);
        if(DAO::insert($lien))
        {
            $message=$this->showSimpleMessage($lien->getLibelle()." ajouté.","","help circle");
        }
        else 
        {
            $message=$this->showSimpleMessage("Une erreur est survenu","","error circle");
        }      
        echo $message;
    }
    
    
    public function EditFav($id)
    {
        $semantic=$this->jquery->semantic();
        $lien=DAO::getOne("models\Lienweb", $id);
        $form=$semantic->dataForm("lienweb", $lien);
        $form->setFields(["libelle","url","ordre","submit"]);
        $form->setCaptions(["Nom","url","ordre","Update"]);
        $form->fieldAsSubmit("submit","green","LienWebController/UpdateFav/".$id,"#divConfirm");
        echo $form->compile($this->jquery);
        echo $this->jquery->compile();
    }
    
    
    public function UpdateFav($id)
    {
        $lien=DAO::getOne("models\Lienweb", $id);
        RequestUtils::setValuesToObject($lien,$_POST);
        if(DAO::update($lien))
        {
          $message=$this->showSimpleMessage($lien->getLibelle()." modifié","info","info");
        }
        echo $message;
        echo $this->jquery->compile($this->view);
    }
    
    public function DeleteFav($id){
        $table="LienWeb";
        $controller = "LienWebController";
        $this->delete($id,$table,$controller,"DeleteFav","#table-messages");
        
    }
    
}