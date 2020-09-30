<?php

use App\Controllers\PagesController;
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
//Lancer l'application
$app->run();