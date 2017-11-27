<?php
namespace controllers;
 use libraries\Auth;
 use micro\orm\DAO;
use micro\utils\RequestUtils;
use models\Lienweb;

 /**
 * Controller LienWebController
 **/
class LienWebController extends ControllerBase{

	
    public function index()
    {
        $semantic=$this->jquery->semantic();
        //$bt0=$semantic->htmlButton("btAccueil","Accueil");
        //$bt0->asLink("Main");
        $bts=$semantic->htmlButtonGroups("buttons",["Liste des favoris","Ajouter un favoris..."]);
        $bts->setPropertyValues("data-ajax", ["LienWebController/all/","LienWebController/addFav/"]);
        $bts->getOnClick("","#modalFav",["attr"=>"data-ajax"]);
        $this->jquery->compile($this->view);
        $this->loadView("Lienweb/index.html");
    }
    
    public function all()
    {
        $userId=Auth::getUser()->getId();
        $lien=DAO::getAll("models\Lienweb","idUtilisateur='".$userId."'");
        $semantic=$this->jquery->semantic();
        $table=$semantic->dataTable("favoris", "models\Lienweb", $lien);
        $table->setIdentifierFunction(function($i,$o){return $o->getId();});
        $table->setFields(["libelle","url","ordre"]);
        $table->setCaptions(["Nom", "URL","ordre"]);
        $table->addEditButton();
        $table->addDeleteButton();
        $table->setUrls(["","LienWebController/EditFav/","LienWebController/DeleteFav/"]);
        $table->setTargetSelector("#modalFav");
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
        $form->FieldAsSubmit("submit","green","LienWebController/newFav/","#modalFav");
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
            echo $lien->getLibelle()." ajouté";
        }
        else 
        {
            echo "Une erreur est survenu";
        }        
    }
    
    
    public function EditFav($id)
    {
        $semantic=$this->jquery->semantic();
        $lien=DAO::getOne("models\Lienweb", $id);
        $form=$semantic->dataForm("lienweb", $lien);
        $form->setFields(["libelle","url","ordre","submit"]);
        $form->setCaptions(["Nom","url","ordre","Update"]);
        $form->fieldAsSubmit("submit","green","LienWebController/UpdateFav/".$id,"#modalFav");
        echo $form->compile($this->jquery);
        echo $this->jquery->compile();
    }
    
    
    public function UpdateFav($id)
    {
        $lien=DAO::getOne("models\Lienweb", $id);
        RequestUtils::setValuesToObject($lien,$_POST);
        if(DAO::update($lien))
        {
            echo $lien->getLibelle()." modifié";
        }
        
    }
    
    public function DeleteFav($id)
    {
        $lien=DAO::getOne("models\Lienweb", $id);
        if(DAO::remove($lien))
        {
            echo $lien->getLibelle()." supprimé";
        }
    }
}