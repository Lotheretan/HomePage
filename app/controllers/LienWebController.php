<?php
namespace controllers;
 use libraries\Auth;
 use micro\orm\DAO;

 /**
 * Controller LienWebController
 **/
class LienWebController extends ControllerBase{

	/*public function index()
	{
	    $favList = DAO::getOne( "models\Lienweb", "idUtilisateur='".Auth::getUser()->getId()."'" );
	    $semantic = $this->jquery->semantic ();
	    $dd=$semantic->htmlDropdown("dd3","Select friend")->asSelect("friend");
	    $dd->addItem(["image"=>"https://semantic-ui.com/images/avatar/small/jenny.jpg","item"=>"Jenny Hess"]);
	    $dd->addItem(["image"=>"https://semantic-ui.com/images/avatar/small/elliot.jpg","item"=>"Elliot Fu"]);
	    echo $dd;
	    $this->jquery->compile ( $this->view );
	    $this->loadView ( "index.html" );
	}*/
    
    public function index(){
        $semantic=$this->jquery->semantic();
        
        $frm=$semantic->defaultLogin("frm1");
        $frm->removeField("Connection");
        $frm->setCaption("forget", "Mot de passe oubli&eacute ?");
        $frm->setCaption("remember", "Se souvenir de moi.");
        $frm->setCaption("submit", "Connexion");
        $frm->setCaption("login", "Pseudo");
        $frm->setCaption("password", "Mot de passe");
        $frm->fieldAsSubmit("submit","green fluide","SiteController/connected","#frm1-submit");
        
        if(!isset($_SESSION['user'])){
            $btCo=$semantic->htmlButton("button-2","Se connecter","green","$('#modal-frm1').modal('show');");
            $btCo->addIcon("sign in");
        } else {
            $bt_deco=$semantic->htmlButton("button-3","Se d&eacute;connecter","red");
            $bt_deco->setProperty("data-ajax","button-3");
            $bt_deco->getOnClick("SiteController/disconnected","body",["attr"=>"data-ajax"]);
            
            $bts=$semantic->htmlButtonGroups("button-1",["Liste des favoris","Ajout d'un favoris","Fermer"]);
            $bts->setPropertyValues("data-ajax",["printLien/","ajoutfav/","close/"]);
            $bts->getOnClick("SiteController","#list-site",["attr"=>"data-ajax"]);
            
            
        }
        
        echo $frm->asModal();
        $this->jquery->exec("$('#modal-connect').modal('show');",true);
        
        echo $this->jquery->compile($this->view);
        $this->loadView("/index.html");
    }
    public function connected(){
        $semantic=$this->jquery->semantic();
        $user=DAO::getOne("models\Utilisateur","login='".$_POST['login']."'");
        
        if(isset($user)){
            if($user->getPassword()===$_POST['password']){
                $_SESSION["user"]=$user;
                $this->jquery->get("LienWebController/index", "body");
                
            } else {
                echo $semantic->htmlMessage("#btCo","Erreur, votre mot de passe ou login est incorrecte.","red");
            }
        } else {
            echo $semantic->htmlMessage("#btCo","Erreur, votre mot de passe ou login est incorrecte.","red");
        }
        echo $this->jquery->compile($this->view);
    }
    
    public function disconnected(){
        session_unset();
        session_destroy();
        $this->jquery->get("SiteController/index", "body");
        echo $this->jquery->compile($this->view);

}}