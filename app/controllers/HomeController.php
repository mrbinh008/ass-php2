<?php
namespace App\Controllers;
class HomeController extends BaseController
{
    public function home()
    {
        $this->render('home.home');
    }
}
