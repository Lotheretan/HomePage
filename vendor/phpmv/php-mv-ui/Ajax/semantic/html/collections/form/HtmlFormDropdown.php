<?php

namespace Ajax\semantic\html\collections\form;

use Ajax\semantic\html\collections\form\HtmlFormField;
use Ajax\semantic\html\modules\HtmlDropdown;

class HtmlFormDropdown extends HtmlFormField {

	public function __construct($identifier,$items=array(), $label=NULL,$value="",$multiple=false,$associative=true) {
		parent::__construct("field-".$identifier, (new HtmlDropdown("dropdown-".$identifier,$value,$items,$associative))->asSelect($identifier,$multiple), $label);
		$this->_identifier=$identifier;
	}

	public function setItems($items){
		return $this->getField()->setItems($items);
	}
	public function addItem($item,$value=NULL,$image=NULL){
		return $this->getField()->addItem($item,$value,$image);
	}
	public static function multipleDropdown($identifier,$items=array(), $label=NULL,$value="",$associative=true){
		return new HtmlFormDropdown($identifier,$items,$label,$value,true,$associative);
	}

	public function getDataField(){
		return $this->getField()->getInput();
	}
	public function asSelect($name=NULL,$multiple=false,$selection=true){
		$this->getField()->asSelect($name,$multiple,$selection);
		return $this;
	}
}
