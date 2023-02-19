<?php

namespace App\Controllers;
abstract class Controller extends BaseController
{
    abstract function addForm();

    abstract function add();

    abstract function list();

    abstract function edit($id);

    abstract function update($id);

    abstract function delete($id);
}
