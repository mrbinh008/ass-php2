<?php

use Phroute\Phroute\RouteCollector;

$url = !isset($_GET['url']) ? "/" : $_GET['url'];

$router = new RouteCollector();

// filter check đăng nhập
$router->filter('login', function(){
    if(!isset($_SESSION['auth']) || empty($_SESSION['auth'])){
//        redirect('errors','Bạn chưa đăng nhập', '');
        header('Location: ' . BASE_URL );
        die;
    }
});

// bắt đầu định nghĩa ra các đường dẫn
$router->get('/', [App\Controllers\AuthController::class, 'loginForm']);
$router->post('auth', [App\Controllers\AuthController::class, 'auth']);
$router->get('logout', [App\Controllers\AuthController::class, 'logout']);
//home
$router->get('home', [App\Controllers\HomeController::class, 'home']);
//user
$router->get('addUser', [App\Controllers\UserController::class, 'addForm']);
$router->post('saveAddUser', [App\Controllers\UserController::class, 'add']);
$router->get('editUser/{id}', [App\Controllers\UserController::class, 'edit']);
$router->post('updateUser/{id}', [App\Controllers\UserController::class, 'update']);
$router->get('listUser', [App\Controllers\UserController::class, 'list']);
$router->delete('deleteUser/{id}', [App\Controllers\UserController::class, 'delete']);
//product
$router->get('addProduct', [App\Controllers\ProductController::class, 'addForm']);
$router->post('saveAddProduct', [App\Controllers\ProductController::class, 'add']);
$router->get('editProduct/{id}', [App\Controllers\ProductController::class, 'edit']);
$router->post('updateProduct/{id}', [App\Controllers\ProductController::class, 'update']);
$router->get('listProduct', [App\Controllers\ProductController::class, 'list']);
$router->delete('deleteProduct/{id}', [App\Controllers\ProductController::class, 'delete']);
//category
$router->get('addCategory', [App\Controllers\CategoryController::class, 'addForm']);
$router->post('saveAddCategory', [App\Controllers\CategoryController::class, 'add']);
$router->get('editCategory/{id}', [App\Controllers\CategoryController::class, 'edit']);
$router->post('updateCategory/{id}', [App\Controllers\CategoryController::class, 'update']);
$router->get('listCategory', [App\Controllers\CategoryController::class, 'list']);
$router->delete('deleteCategory/{id}', [App\Controllers\CategoryController::class, 'delete']);


# NB. You can cache the return value from $router->getData() so you don't have to create the routes each request - massive speed gains
$dispatcher = new Phroute\Phroute\Dispatcher($router->getData());
//
$response = $dispatcher->dispatch($_SERVER['REQUEST_METHOD'], $url);

// Print out the value returned from the dispatched function
echo $response;


?>