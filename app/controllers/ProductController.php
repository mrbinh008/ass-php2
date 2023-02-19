<?php

namespace App\Controllers;

//use App\controllers\BaseController;
use App\Models\Product;

//use App\Controller\Controller;
use App\Check\Check;

class ProductController extends BaseController
{
    public function __construct()
    {
        $this->model = new Product();
        $this->check = new Check();
    }

    public function addForm()
    {
        $this->render('products.add');
    }

    public function add()
    {
        if (isset($_POST['btnAddProduct'])) {
            extract($_POST);
            $data = [
                'name' => $name,
                'price' => $price,
                'description' => $description
            ];
            $checkEmpty = $this->check->checkEmptyValues($data);
            $checkNumber = $this->check->checkNumber($price);
            $errors = [];
            if (!empty($checkEmpty)) {
                $errors = $checkEmpty;
            } elseif (!$checkNumber) {
                $errors[] = 'giá phải là số > 0';
            }
            if (count($errors) > 0) {
                $_SESSION['data'] = $data;
               redirect('errors', $errors, 'addProduct');
               die();
            } else {
                $this->model->addProduct($data);
                redirect('success', 'success', 'addProduct');
            }
        }
    }

    public function list()
    {
        $product = $this->model->getProducts();
        $this->render('products.list', compact('product'));
    }

    public function edit($id)
    {
        $product = $this->model->getProducts($id);
        $this->render('products.edit', compact('product'));
    }

    public function update($id)
    {
        if (isset($_POST['btnUpdateProduct'])) {
            extract($_POST);
            $data = [
                'id' => $id,
                'name' => $name,
                'price' => $price,
                'description' => $description
            ];
            $checkEmpty = $this->check->checkEmptyValues($data);
            $checkNumber = $this->check->checkNumber($price);
            $error = [];
            if (!empty($checkEmpty)) {
                $error[] = $checkEmpty;
            } elseif (!$checkNumber) {
                $error[] = 'priceNB';
            }
            if (count($error) > 0) {
                $_SESSION['data'] = $data;
                redirect('errors', $error, 'editProduct');
                die();
            } else {
                $result = $this->model->updateProduct($data);
                if ($result) {
                    redirect('update-success', 'update-success', 'listProduct');
                }
            }
        }
    }
    public function delete($id)
    {
        $this->model->deleteProduct($id);
    }
}
