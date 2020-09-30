<?php
namespace App\Controllers;

use Psr\Http\Message\RequestInterface;
use Psr\Http\Message\ResponseInterface;
use App\Database\db;
use PDO;

class PagesController extends Controller {


    public function getPDO()
    {
        return new db();
    }

    /**
     * Function View Home
     */
    public function home(RequestInterface $request, ResponseInterface $response, $args = []){
        //$req = $this->getPDO()->prepare('SELECT * FROM users where id = 1');
        $result = $this->getPDO()->prepare('SELECT * FROM users');
        //var_dump($result);
        $this->render($request, $response, '/home.php', ['resultat' => $result]);
    }

    public function getUsers(RequestInterface $request, ResponseInterface $response, $args = []){
        $result = $this->getPDO()->prepare('SELECT * FROM users');
        return $this->render($request, $response, '/lstUsers.php', ['resultat' => $result]);
    }

    public function getUser(RequestInterface $request, ResponseInterface $response, $args = []){
        $result = $this->getPDO()->prepare('SELECT * FROM users where id= ?');
        return $this->render($request, $response, '/lstUsers.php', ['resultat' => $result]);
    }

    public function postUser(RequestInterface $request, ResponseInterface $response, $param){
        // $errors = [];
        // $first_name = $request->getParam('first_name');
        // $last_name = $request->getParam('last_name');
        // $phone = $request->getParam('phone');
        // $email = $request->getParam('email');
        // $address = $request->getParam('address');
        // $city = $request->getParam('city');
        // $state = $request->getParam('state');
        // try {
        //     //get db object
        //     $db = new db();
        //     //conncect
        //     $pdo = $db->connect();


        //     $sql = "INSERT INTO users (first_name, last_name, phone,email,address,city,state) VALUES (?,?,?,?,?,?,?)";


        //     $pdo->prepare($sql)->execute([$first_name, $last_name, $phone, $email, $address, $city, $state]);

        //     echo '{"notice": {"text": "User '. $first_name .' has been just added now"}}';
        //     $pdo = null;
        // } catch (\PDOException $e) {
        //     echo '{"error": {"text": ' . $e->getMessage() . '}}';
        // }
    }

    public function postContact(RequestInterface $request, ResponseInterface $response){
        
        //return $this->redirect($response, 'contact');
    }
}