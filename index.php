<?php

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
$app->get('/', PagesController::class . ':home');
$app->get('/lsts', PagesController::class . ':getUsers');
$app->post('/', PagesController::class . ':postUser');

//API
//get all users
$app->get('/api/users', function (Request $request, Response $reponse) {
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
});
//get a single user
$app->get('/api/users/{id}', function (Request $request, Response $reponse, array $args) {
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
});
//Lancer l'application
$app->run();