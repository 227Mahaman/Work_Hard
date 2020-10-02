<?php

use App\Controllers\APIController;
use App\Controllers\PagesController;
use App\Database\db;
use Slim\App;
use Slim\Http\Request;
use Slim\Http\Response;

require 'vendor/autoload.php';

$app = new App([
    'settings' => [
        'displayErrorDetails' => true
    ]
]);

require('app/container.php');

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

//API
//get all users
$app->get('/api/users', APIController::class . ':getAllUsers');//Listing Users
/*$app->get('/api/users', function (Request $request, Response $reponse) {
    $sql = "SELECT * FROM  users";
    
    try {

        $db = new db();
        $pdo = $db->connect();

        $stmt = $pdo->query($sql);
        $users = $stmt->fetchAll(PDO::FETCH_OBJ);

        $pdo = null;
        echo json_encode($users);
    } catch (\PDOException $e) {
        echo '{"msg": {"resp": ' . $e->getMessage() . '}}';
    }
});*/
//get a single user
$app->get('/api/users/{id}', APIController::class . ':getUser');//User
/*$app->get('/api/users/{id}', function (Request $request, Response $reponse, array $args) {
    $id = $request->getAttribute('id');

    $sql = "SELECT * FROM users where id = $id";

    try {
        $db = new db();
        $pdo = $db->connect();

        $stmt = $pdo->query($sql);
        $user = $stmt->fetchAll(PDO::FETCH_OBJ);

        $pdo = null;


        echo json_encode($user);
    } catch (\PDOException $e) {
        echo '{"msg": {"resp": ' . $e->getMessage() . '}}';
    }
});*/
$app->put('/api/users/update/{id}', APIController::class . ':updateUser');
$app->get('/api/users/delete/{id}', APIController::class . ':deleteUser');
//Lancer l'application
$app->run();