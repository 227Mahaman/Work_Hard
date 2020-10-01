<?php
namespace App\Controllers;

use Psr\Http\Message\RequestInterface;
use Psr\Http\Message\ResponseInterface;

class LoginController extends Controller {

    public function login(RequestInterface $request, ResponseInterface $response, $args = []){
        $this->render($request, $response, '/login.php');
    }

    public function authentification(RequestInterface $request, ResponseInterface $response, $args = []){
        $email = $request->getParam('email');
        $city = $request->getParam('city');
        var_dump($email);
        var_dump($city);
        //die();
        $user = $this->getPDO()->query("SELECT * FROM users where email=$email");
        var_dump($user['city']);
        die();
        if($user){
            if($city == $user->city){
                $_SESSION['Connect'] = $user['first_name'];
                return $this->render($request, $response, '/home.php', ['connected' => $_SESSION['Connect']]);
            } else {
                $_SESSION['Connect'] = "Erreur mot de pass!";
                return $this->render($request, $response, '/login.php', ['Notconnected' => $_SESSION['Connect']]);
            }
            
        } else {
            $_SESSION['Connect'] = "Veuillez réessayer !";
            return $this->render($request, $response, '/login.php', ['Notconnected' => $_SESSION['Connect']]);
        }
    }
}