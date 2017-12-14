<?php
namespace controllers;
 /**
 * Controller MoteurController
 **/
class MoteurController extends ControllerBase{

	public function index()
	{
	    $this->loadView("Moteur/index.html");
	}

}