<?php

namespace App\Controllers;

use App\Models\Category;
use App\Check\Check;

class CategoryController extends Controller
{
    public $category;

    public function __construct()
    {
        $this->category = new Category();
        $this->check = new Check();
    }

    public function addForm()
    {
        $this->render('categories.add');
    }

    public function add()
    {
        if (isset($_POST['btnAddCategory'])) {
            $data = [
                'name' => $_POST['name'],
                'description' => $_POST['description']
            ];
            $checkEmpty = $this->check->checkEmptyValues($data);
            $errors = [];
            if ($checkEmpty) {
                $errors = $checkEmpty;
            }
            if (count($errors) > 0) {
                $_SESSION['data'] = $data;
                redirect('errors', $errors, 'addCategory');
                die();
            } else {
                $this->category->addCategory($data);
//                redirectTo('addCategory', '?msg=success');
                redirect('success', 'success', 'addCategory');
                unset($_SESSION['data']);
            }
        }
        $this->render('categories.add');
    }

    public function list()
    {

        $category = $this->category->getCategories();
        $this->render('categories.list', compact('category'));
    }

    public function edit($id)
    {
        $category = $this->category->getCategories($id);
        $this->render('categories.edit', compact('category'));
    }

    public function update($id)
    {
        if (isset($_POST['btnUpdateCategory'])) {
            extract($_POST);
            $data = [
                'name' => $name,
                'description' => $description,
                'id' => $id
            ];
            $checkEmpty = $this->check->checkEmptyValues($data);
            if (!$checkEmpty) {
                $this->category->updateCategory($data);
                redirect('update-success', 'update-success', 'listCategory');
                unset($_SESSION['data']);
            } else {
                $error = [];
                if (!empty($checkEmpty)) {
                    foreach ($checkEmpty as $key) {
                        $error[] = $key;
                    }
                }
                $_SESSION['data'] = $data;
                redirect('errors', $error, 'editCategory/' . $id);
            }
        }
    }

    public function delete($id)
    {
        $this->category->deleteCategory($id);
    }
}