<?php

namespace App\Controllers;

use App\Check\Check;
use App\Models\User;

class UserController extends BaseController
{
    public function __construct()
    {
        $this->model = new User();
        $this->check = new Check();
    }

    public function addForm()
    {
        $this->render('user.add');
    }

    public function add()
    {
        if (isset($_POST['btnAdd'])) {
            extract($_POST);
            $data = [
                'username' => $username,
                'password' => $password,
                'fullname' => $fullname,
                'role' => $role
            ];
            $checkEmpty = $this->check->checkEmptyValues($data);
            $error = [];
            if (!empty($checkEmpty)) {
                $error = $checkEmpty;
            }

            if (count($error) > 0) {
                $_SESSION['data'] = $data;
                redirect('errors', $error, 'addUser');
            } else {
                $user = $this->model->addUser($data);
                if ($user) {
                    redirect('success', 'success', 'addUser');
                } else {
                    $error[] = 'Add user failed';
                    redirect('errors', $error, 'addUser');
                }
            }
        }
    }

    public function list()
    {
        $user = $this->model->getUser();
        $this->render('user.list', compact('user'));
    }

    public function edit($id)
    {
        $user = $this->model->getUser($id);
        $this->render('user.edit', compact('user'));
    }
    public function update($id){
        if (isset($_POST['btnUpdate'])) {
            $username = $_POST['username'];
            $password = $_POST['password'];
            $fullname = $_POST['fullname'];
            $role = $_POST['role'];
            $data = [
                'username' => $username,
                'password' => $password,
                'fullname' => $fullname,
                'role' => $role,
                'id' => $id
            ];
            $checkEmpty = $this->check->checkEmptyValues($data);
            $error = [];
            if (!empty($checkEmpty)) {
                $error = $checkEmpty;
            }
            if (count($error) > 0) {
                $_SESSION['error'] = $error;
                redirect('errors', $error, 'userEdit/'.$id);
            } else {
                $user = $this->model->updateUser($data);
                if ($user) {
                    redirect('update-success', 'update-success', 'userList');
                } else {
                    $error[] = 'Update user failed';
                    redirect('errors', $error, 'userEdit/'.$id);
                }
            }
        }
    }

    public function delete($id){
         $this->model->deleteUser($id);
    }

}