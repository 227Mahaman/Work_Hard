<?php
namespace App\Controllers;

use Psr\Http\Message\RequestInterface;
use Psr\Http\Message\ResponseInterface;

class APIController extends Controller {

    public function addUser(RequestInterface $request, ResponseInterface $response, $param = []){
        $sql = "INSERT INTO users (first_name, last_name, phone, email, address, city, state) VALUES (?,?,?,?,?,?,?)";
        $first_name = $request->getParam('first_name');
        $last_name = $request->getParam('last_name');
        $phone = $request->getParam('phone');
        $email = $request->getParam('email');
        $address = $request->getParam('address');
        $city = $request->getParam('city');
        $state = $request->getParam('state');
        $this->getPDO()->prepare($sql, [$first_name, $last_name, $phone, $email, $address, $city, $state]);
        echo '{"notice": {"text": "User '. $first_name .' has been just added now"}}';
    }

    public function getAllUsers(RequestInterface $request, ResponseInterface $response){
        $result = $this->getPDO()->query('SELECT * FROM users', true);
        echo json_encode($result);
    }

    public function getUser(RequestInterface $request, ResponseInterface $response, $args = []){
        $id = $request->getAttribute('id');
        $result = $this->getPDO()->query("SELECT * FROM users where id = $id", true);
        echo json_encode($result);
    }

    public function updateUser(RequestInterface $request, ResponseInterface $response){
        $id = $request->getAttribute('id');
        $first_name = $request->getParam('first_name');
        $last_name = $request->getParam('last_name');
        $phone = $request->getParam('phone');
        $email = $request->getParam('email');
        $address = $request->getParam('address');
        $city = $request->getParam('city');
        $state = $request->getParam('state');
        $sql = "UPDATE  users SET first_name =?, last_name=?, phone=?, email=?, address=?, city=?, state=? WHERE id=?";
        $this->getPDO()->prepare($sql, [$first_name, $last_name, $phone, $email, $address, $city, $state, $id]);
        echo '{"notice": {"text": "User '. $first_name .' has been just updated now"}}';
    }

    public function deleteUser(RequestInterface $request, ResponseInterface $response){
        $id = $request->getAttribute('id');
        $this->getPDO()->prepare("DELETE from users where id='$id'");
        echo '{"notice": {"text": "User with '. $id .' has been just deleted now"}}';
    }
}