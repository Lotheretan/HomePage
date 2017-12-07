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
    
    /**
     * @var UbiquityMyAdminData
     */
    private $adminData;
    
    /**
     * @var UbiquityMyAdminViewer
     */
    private $adminViewer;
    
    /**
     * @var UbiquityMyAdminFiles
     */
    private $adminFiles;
    
    private $globalMessage;
	
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
        //$table->addEditDeleteButtons(true,["ajaxTransition"=>"random"]);
        //$table->addEditButton();
        //$table->addDeleteButton();
        $table->setUrls(["","LienWebController/EditFav/","LienWebController/DeleteFav/"]);
        $table->setTargetSelector(["edit"=>"#divConfirm","delete"=>"#table-messages"]);
        $table->addEditDeleteButtons(true,["ajaxTransition"=>"random"]);
        //$table->setTargetSelector("#divConfirm");
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
            //echo $lien->getLibelle()." modifié";
            $message=$this->showSimpleMessage($lien->getLibelle()." modifié","","help circle");
        }
        echo $message;
    }
    
    /*public function DeleteFav($id)
    {
        $lien=DAO::getOne("models\Lienweb", $id);
        if(DAO::remove($lien))
        {
            echo $lien->getLibelle()." supprimé";
        }
    }*/
    
    private function getModelInstance($ids){
        $table="Lienweb";
        $model=$this->getModelsNS()."\\".ucfirst($table);
        $ids=\explode("_", $ids);
        return DAO::getOne($model,$ids);
    }
    
    public function DeleteFav($id){
        $instance=$this->getModelInstance($id);
        if(method_exists($instance, "__toString"))
            $instanceString=$instance."";
            else
                $instanceString=get_class($instance);
                if(sizeof($_POST)>0){
                    if(DAO::remove($instance)){
                        $message=$this->showSimpleMessage("Suppression de `".$instanceString."`", "info","info",4000);
                        $this->jquery->exec("$('tr[data-ajax={$id}]').remove();",true);
                    }else{
                        $message=$this->showSimpleMessage("Impossible de supprimer `".$instanceString."`", "warning","warning");
                    }
                }else{
                    $message=$this->showConfMessage("Confirmez la suppression de `".$instanceString."`?", "", "LienWebController/DeleteFav/{$id}", "#table-messages", $id);
                }
                echo $message;
                echo $this->jquery->compile($this->view);
    }
    
    private function showSimpleMessage($content,$type,$icon="info",$timeout=NULL,$staticName=null){
        $semantic=$this->jquery->semantic();
        if(!isset($staticName))
            $staticName="msg-".rand(0,50);
            $message=$semantic->htmlMessage($staticName,$content,$type);
            $message->setIcon($icon." circle");
            $message->setDismissable();
            if(isset($timeout))
                $message->setTimeout(3000);
                return $message;
    }
    
    private function showConfMessage($content,$type,$url,$responseElement,$data,$attributes=NULL){
        $messageDlg=$this->showSimpleMessage($content, $type,"help circle");
        $btOkay=new HtmlButton("bt-okay","Confirmer","positive");
        $btOkay->addIcon("check circle");
        $btOkay->postOnClick($url,"{data:'".$data."'}",$responseElement,$attributes);
        $btCancel=new HtmlButton("bt-cancel","Annuler","negative");
        $btCancel->addIcon("remove circle outline");
        $btCancel->onClick($messageDlg->jsHide());
        
        $messageDlg->addContent([$btOkay,$btCancel]);
        return $messageDlg;
    }
    
    protected function getModelsNS(){
        return Startup::getConfig()["mvcNS"]["models"];
    }
    
    protected function getUbiquityMyAdminData(){
        return new UbiquityMyAdminData();
    }
    
    protected function getUbiquityMyAdminViewer(){
        return new UbiquityMyAdminViewer($this);
    }
    
    protected function getUbiquityMyAdminFiles(){
        return new UbiquityMyAdminFiles();
    }
    
    private function getSingleton($value,$method){
        if(!isset($value)){
            $value=$this->$method();
        }
        return $value;
    }
    
    /**
     * @return UbiquityMyAdminData
     */
    public function _getAdminData(){
        return $this->getSingleton($this->adminData, "getUbiquityMyAdminData");
    }
    
    /**
     * @return UbiquityMyAdminViewer
     */
    public function _getAdminViewer(){
        return $this->getSingleton($this->adminViewer, "getUbiquityMyAdminViewer");
    }
    
    /**
     * @return UbiquityMyAdminFiles
     */
    public function _getAdminFiles(){
        return $this->getSingleton($this->adminFiles, "getUbiquityMyAdminFiles");
    }
    
    protected function getTableNames(){
        return $this->_getAdminData()->getTableNames();
    }
    
    protected function getFieldNames($model){
        return $this->_getAdminData()->getFieldNames($model);
    }
}