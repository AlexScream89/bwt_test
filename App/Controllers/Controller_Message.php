<?php
namespace App\Controllers;
use App\Classes\Controller_Base;
use App\Models\Model_Message;

Class Controller_Message  Extends Controller_Base
{
    public $layouts = "first_layouts";

    public function index() {
        $model = new Model_Message();
        $messages = $model ->get_messages();
        $this->template->vars('messages',$messages);
        $this->template->view('index');
    }
}