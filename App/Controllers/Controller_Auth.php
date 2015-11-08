<?php
namespace App\Controllers;
use App\Classes\Controller_Base;
use App\Models\Model_User;

Class Controller_Auth  Extends  Controller_Base {

    public $layouts = "first_layouts";

    public function index() {

    }

    public function registration () {
        $this->template->view('registration');
    }

    public function login() {
        $this->template->view('login');
    }

    public function logout() {
        $this->template->view('logout');
    }

    public function save_user() {
        $model = new Model_User();
        if (empty($_POST['name'])) {
            $errors[] = 'Вы не ввели имя!';
        }
        if (empty($_POST['surname'])) {
            $errors[] = 'Вы не ввели фамилию!';
        }
        if (empty($_POST['email'])) {
            $errors[] = 'Вы не ввели email!';
        }
        if (empty($_POST['password'])) {
            $errors[] = 'Вы не ввели пароль!';
        }
        if (!empty($_POST['name']) and (strlen($_POST['name'])<2 or strlen($_POST['name'])>32)) {
            $errors[] = 'Имя должно содержать от 2 до 32 символов!';
        }
        if (!empty($_POST['surname']) and (strlen($_POST['surname'])<2 or strlen($_POST['surname'])>32)) {
            $errors[] = 'Фамилия должна содержать от 2 до 32 символов!';
        }
        if (!empty($_POST['email']) and (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL))) {
            $errors[] = 'Введите валидный email!';
        }
        if (!empty($_POST['email']) and (!$model->unique_email($_POST['email']))) {
            $errors[] = 'Введенный email уже зарегетрирован!';
        }
        if (!empty($_POST['password']) and strlen($_POST['password'])<6) {
            $errors[] = 'Пароль должен содержать не менее 6 символов!';
        }
        if (!empty($_POST['dob']) and (!preg_match( "|^[0-9]{2}/[0-9]{2}/[0-9]{4}$|i", $_POST['dob']))) {
            $errors[] = 'Введите корректную дату рождения!';
        }

        if (!empty($errors)){
            $this->template->vars('errors', $errors);
            $this->template->view('registration');
        }

        if (empty($errors)) {
            $data = [
                'name' => $_POST['name'],
                'surname' => $_POST['surname'],
                'email' => $_POST['email'],
                'password' => password_hash($_POST['password'], PASSWORD_DEFAULT),
                'gender' => $_POST['gender'],
                'dob' => date('Y-m-d', strtotime($_POST['dob']))
            ];
            $model->save($data);
            $model->redirect('/auth/login');
        }
    }

    public function enter(){
        $model = new Model_User();
        if (empty($_POST['email'])) {
            $errors[] = 'Вы не ввели email!';
        }
        if (empty($_POST['password'])) {
            $errors[] = 'Вы не ввели пароль!';
        }
        if (!empty($_POST['email']) and (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL))) {
            $errors[] = 'Введите валидный email!';
        }
        if (!empty($_POST['password']) and strlen($_POST['password'])<6) {
            $errors[] = 'Пароль должен содержать не менее 6 символов!';
        }

        if (!empty($errors)){
            $this->template->vars('errors', $errors);
            $this->template->view('login');
        }

        if (empty($errors)) {
            $data = [
                'email' => $_POST['email'],
                'password' => $_POST['password']
            ];
            $user = $model->user_enter($data);
            if ($user){
                $model->redirect('/weather');
            }
            else {
                $errors[] = 'Неверный email или пароль';
                $this->template->vars('errors', $errors);
                $this->template->view('login');
            }
        }

    }

}