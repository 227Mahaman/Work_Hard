<?php

use App\Controllers\PagesController;
use App\Database\db;
use Slim\App;

require '../vendor/autoload.php';

$app = new App([
    'settings' => [
        'displayErrorDetails' => true
    ]
]);

require('../app/container.php');

$container = $app->getContainer();
// Render PHP template in route
$app->get('/', PagesController::class . ':home');//View Accueil
$app->get('/lsts', PagesController::class . ':getUsers');//View Listing User
$app->post('/', PagesController::class . ':postUser');//View Accueil AddUser

/*$app->get('/', function ($request, $response, $args = []) { Other type of routing
    $renderer = $this->view;
    $req = new db();
    $result = $req->prepare('SELECT * FROM users');
    //var_dump($result);
    return $renderer->render($response, "/home.php", ['resultat' => $result]);
});*/

//Lancer l'application
$app->run();