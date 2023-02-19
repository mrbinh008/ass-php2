<?php
namespace App\Controllers;
class ErrorController extends BaseController
{
    public function error404()
    {
        $this->render('error.error-404');
    }
}