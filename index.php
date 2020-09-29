<?php

use App\Database\db;
use Slim\App;
use Slim\Views\PhpRenderer;

require 'vendor/autoload.php';

$app = new App([
    'settings' => [
        'displayErrorDetails' => true
    ]
]);

//$app->get('/', PagesController::class . ':home');
$app->get('/', function ($request, $response, $args) {//View Home
    $renderer = new PhpRenderer('app/views/pages/');
    return $renderer->render($response, "home.php", $args);
});
$app->post('/', function ($request, $response, $args) {//View Home add Users
    $first_name = $request->getParam('first_name');
    $last_name = $request->getParam('last_name');
    $phone = $request->getParam('phone');
    $email = $request->getParam('email');
    $address = $request->getParam('address');
    $city = $request->getParam('city');
    $state = $request->getParam('state');
    try {
        //get db object
        $db = new db();
        //conncect
        $pdo = $db->connect();


        $sql = "INSERT INTO users (first_name, last_name, phone,email,address,city,state) VALUES (?,?,?,?,?,?,?)";


        $pdo->prepare($sql)->execute([$first_name, $last_name, $phone, $email, $address, $city, $state]);

        echo '{"notice": {"text": "User '. $first_name .' has been just added now"}}';
        $pdo = null;
    } catch (\PDOException $e) {
        echo '{"error": {"text": ' . $e->getMessage() . '}}';
    }
    //$renderer = new PhpRenderer('app/views/pages/');
    //return $renderer->render($response, "home.php", $args);
});
$app->get('/lstUsers', function ($request, $response, $args) {
    $renderer = new PhpRenderer('app/views/pages/');
    
    return $renderer->render($response, "lstUsers.php", $args);
});

$app->run();