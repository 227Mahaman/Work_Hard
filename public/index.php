<?php

use App\Controllers\LoginController;
use App\Controllers\PagesController;
use App\Database\db;
use Slim\App;

require '../vendor/autoload.php';

session_start();

$app = new App([
    'settings' => [
        'displayErrorDetails' => true
    ]
]);

require('../app/container.php');

$container = $app->getContainer();
// Render PHP template in route
$app->get('/', PagesController::class . ':home');//View Accueil
$app->get('/lsts', PagesController::class . ':getUsers');//View Listing Users
$app->get('/lsts/{id}', PagesController::class . ':getUser');//View getUser
$app->post('/', PagesController::class . ':postUser');//View Accueil AddUser
$app->get('/update/user/{id}', PagesController::class . ':updateUser');//View Accueil UpdateUser
$app->post('/update/user/{id}', PagesController::class . ':postUpdateUser');//View Accueil PostUpdateUser
$app->get('/users/delete/{id}', PagesController::class . ':deleteUser');//Delete User
$app->get('/login', LoginController::class . ':login');//View login
$app->post('/login', LoginController::class . ':authentification');//View login Authentication

/*$app->get('/', function ($request, $response, $args = []) { Other type of routing
    $renderer = $this->view;
    $req = new db();
    $result = $req->prepare('SELECT * FROM users');
    //var_dump($result);
    return $renderer->render($response, "/home.php", ['resultat' => $result]);
});*/
//Lancer l'application
$app->run();