<?php
namespace App\Controllers;
use App\Classes\Controller_Base;

Class Controller_Index Extends Controller_Base {

	public $layouts = "first_layouts";

	public function index() {
		$this->template->view('index');
	}
	
}