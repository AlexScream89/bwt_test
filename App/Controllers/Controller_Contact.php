<?php
namespace App\Controllers;
use App\Classes\Controller_Base;
use App\Models\Model_Message;

Class Controller_Contact  Extends Controller_Base
{
    public $layouts = "first_layouts";

    public function index()
    {
        $this->template->view('index');
    }

    public function save() {
        $model = new Model_Message();
        $secret = '6LemgRATAAAAALr4NfdQTMIA8WeWaN-fof0NzI7z';
        $recaptcha = new \ReCaptcha\ReCaptcha($secret);
        $resp = $recaptcha->verify($_POST['g-recaptcha-response'], $_SERVER['REMOTE_ADDR']);
        if (!$resp->isSuccess()) {
            $errors[] = 'Вы неправильно ввели капчу!';
        }
        if (empty($_POST['name'])) {
            $errors[] = 'Вы не ввели имя!';
        }
        if (empty($_POST['email'])) {
            $errors[] = 'Вы не ввели email!';
        }
        if (empty($_POST['message'])) {
            $errors[] = 'Вы не ввели сообщение!';
        }
        if (!empty($_POST['name']) and (strlen($_POST['name'])<2 or strlen($_POST['name'])>32)) {
            $errors[] = 'Имя должно содержать от 2 до 32 символов!';
        }
        if (!empty($_POST['email']) and (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL))) {
            $errors[] = 'Введите валидный email!';
        }

        if (!empty($errors)){
            $this->template->vars('errors', $errors);
            $this->template->view('index');
        }

        if (empty($errors)) {
            $data = [
                'name' =>  $_POST['name'],
                'email' => $_POST['email'],
                'message' => $_POST['message']
            ];
            $model->save($data);
            $model->redirect('/message');
        }

    }
}