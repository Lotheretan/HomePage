<?php
namespace controllers;
use micro\utils\RequestUtils;
use micro\orm\OrmUtils;
use micro\orm\parser\Reflexion;
use micro\controllers\Controller;
use micro\controllers\Startup;
use micro\controllers\admin\UbiquityMyAdminData;
use micro\controllers\admin\UbiquityMyAdminFiles;
use micro\controllers\admin\UbiquityMyAdminViewer;
use micro\orm\DAO;
use Ajax\service\JString;
use Ajax\semantic\html\elements\HtmlHeader;
use Ajax\semantic\html\elements\HtmlButton;

/**
 * ControllerBase
 **/
abstract class ControllerBase extends Controller{
    
    public function initialize(){
        if(!RequestUtils::isAjax()){
            $this->loadView("main/vHeader.html");
        }
    }
    
    public function finalize(){
        if(!RequestUtils::isAjax()){
            $this->loadView("main/vFooter.html");
        }
    }
    public  function getModelInstance($ids,$table){
        $model=$this->getModelsNS()."\\".ucfirst($table);
        $ids=\explode("_", $ids);
        return DAO::getOne($model,$ids);
    }
    
    public function delete($ids,$table,$controller,$url,$responseElement){
        $instance=$this->getModelInstance($ids,$table);
        if(method_exists($instance, "__toString"))
            $instanceString=$instance."";
            else
                $instanceString=get_class($instance);
                if(sizeof($_POST)>0){
                    if(DAO::remove($instance)){
                        $message=$this->showSimpleMessage("Suppression de `".$instanceString."` éffectué.", "info","info",4000);
                        $this->jquery->exec("$('tr[data-ajax={$ids}]').remove();",true);
                    }else{
                        $message=$this->showSimpleMessage("Impossible de supprimer `".$instanceString."`", "warning","warning");
                    }
                }else{
                    $message=$this->showConfMessage("Confirmez la suppression de `".$instanceString."`?", "", $controller."/{$url}/{$ids}","$responseElement", $ids);
                }
                echo $message;
                echo $this->jquery->compile($this->view);
    }
    
    protected function getFKMethods($model){
        $reflection=new \ReflectionClass($model);
        $publicMethods=$reflection->getMethods(\ReflectionMethod::IS_PUBLIC);
        $result=[];
        foreach ($publicMethods as $method){
            $methodName=$method->getName();
            if(JString::startswith($methodName, "get")){
                $attributeName=lcfirst(JString::replaceAtFirst($methodName, "get", ""));
                if(!property_exists($model, $attributeName))
                    $result[]=$methodName;
            }
        }
        return $result;
    }
    
    protected function showSimpleMessage($content,$type,$icon="info",$timeout=NULL,$staticName=null){
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
    
    protected function showConfMessage($content,$type,$url,$responseElement,$data,$attributes=NULL){
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
    
    public function showDetail($ids){
        $viewer=$this->_getAdminViewer();
        $hasElements=false;
        $instance=$this->getModelInstance($ids);
        $table=$_SESSION['table'];
        $model=$this->getModelsNS()."\\".ucfirst($table);
        $relations = OrmUtils::getFieldsInRelations($model);
        $semantic=$this->jquery->semantic();
        $grid=$semantic->htmlGrid("detail");
        if(sizeof($relations)>0){
            $wide=intval(16/sizeof($relations));
            if($wide<4)
                $wide=4;
                foreach ($relations as $member){
                    if(($annot=OrmUtils::getAnnotationInfoMember($model, "#oneToMany",$member))!==false){
                        $objectFK=DAO::getOneToMany($instance, $member);
                        $fkClass=$annot["className"];
                    }elseif(($annot=OrmUtils::getAnnotationInfoMember($model, "#manyToMany",$member))!==false){
                        $objectFK=DAO::getManyToMany($instance, $member);
                        $fkClass=$annot["targetEntity"];
                    }else{
                        $objectFK=Reflexion::getMemberValue($instance, $member);
                        if(isset($objectFK))
                            $fkClass=\get_class($objectFK);
                    }
                    $fkTable=OrmUtils::getTableName($fkClass);
                    $memberFK=$member;
                    
                    $header=new HtmlHeader("",4,$memberFK,"content");
                    if(is_array($objectFK) || $objectFK instanceof \Traversable){
                        $header=$viewer->getFkHeaderList($memberFK, $fkClass, $objectFK);
                        $element=$viewer->getFkList($memberFK, $fkClass, $objectFK);
                        foreach ($objectFK as $item){
                            if(method_exists($item, "__toString")){
                                $id=($this->getIdentifierFunction($fkClass))(0,$item);
                                $item=$element->addItem($item."");
                                $item->setProperty("data-ajax", $fkTable.".".$id);
                                $item->addClass("showTable");
                                $hasElements=true;
                                $this->_getAdminViewer()->displayFkElementList($item, $memberFK, $fkClass, $item);
                            }
                        }
                    }else{
                        if(method_exists($objectFK, "__toString")){
                            $header=$viewer->getFkHeaderElement($memberFK, $fkClass, $objectFK);
                            $id=($this->getIdentifierFunction($fkClass))(0,$objectFK);
                            $element=$viewer->getFkElement($memberFK, $fkClass, $objectFK);
                            $element->setProperty("data-ajax", $fkTable.".".$id)->addClass("showTable");
                        }
                    }
                    if(isset($element)){
                        $grid->addCol($wide)->setContent($header.$element);
                        $hasElements=true;
                    }
                }
                if($hasElements)
                    echo $grid;
                    $this->jquery->getOnClick(".showTable", $this->_getAdminFiles()->getAdminBaseRoute()."/showTableClick","#divTable",["attr"=>"data-ajax","ajaxTransition"=>"random"]);
                    echo $this->jquery->compile($this->view);
        }
    }
    
    Public function getModelsNS(){
        return Startup::getConfig()["mvcNS"]["models"];
    }
    
    public function getUbiquityMyAdminData(){
        return new UbiquityMyAdminData();
    }
    
    public function getUbiquityMyAdminViewer(){
        return new UbiquityMyAdminViewer($this);
    }
    
    public function getUbiquityMyAdminFiles(){
        return new UbiquityMyAdminFiles();
    }
    
    public function getSingleton($value,$method){
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
