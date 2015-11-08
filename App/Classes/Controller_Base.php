<?php
namespace App\Classes;

Abstract Class Controller_Base {

	protected $template;
	protected $layouts;
	
	public $vars = array();


	public function __construct() {
		$this->template = new Template($this->layouts, get_class($this));
	}

	abstract function index();
	
}
