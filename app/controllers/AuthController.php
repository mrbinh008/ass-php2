<?php

namespace App\Controllers;

use App\Check\Check;
use App\Models\Auth;

class AuthController extends BaseController
{
    public function __construct()
    {
        $this->model = new Auth();
        $this->check = new Check();
    }

    public function loginForm()
    {
        $this->render('auth.login');
    }

    public function auth()
    {
        if (isset($_POST['btnLogin'])) {
            $username = $_POST['username'];
            $password = $_POST['password'];
            $data = [
                'username' => $username,
                'password' => $password
            ];
            $checkEmpty = $this->check->checkEmptyValues($data);
            $error = [];
            if (!empty($checkEmpty)) {
                $error = $checkEmpty;
            }
            if (count($error) > 0) {
                redirect('errors',$error,'');
            } else {
                $user = $this->model->login($username, $password);
                if ($user) {
                    $_SESSION['auth'] = $user;
                    redirect('success','success','home');
                } else {
                    redirect('errors',$error,'');
                }
            }
        }
    }

    public function logout()
    {
        unset($_SESSION['auth']);
        redirect('success','success','');
    }
}
