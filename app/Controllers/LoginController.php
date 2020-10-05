<?php
namespace App\Controllers;

use Psr\Http\Message\RequestInterface;
use Psr\Http\Message\ResponseInterface;

class LoginController extends Controller {

    /**
     * Fonction Login
     * @param Interface requestInterface
     * @param Interface responseInterface
     * @return la vue login de connexion
     */
    public function login(RequestInterface $request, ResponseInterface $response, $args = []){
        $this->render($request, $response, '/login.php');
    }

    /**
     * Fonction Authentification
     * @param Interface requestInterface
     * @param Interface responseInterface
     * @return la vue home s'il existe
     */
    public function authentification(RequestInterface $request, ResponseInterface $response, $args = []){
        $email = $request->getParam('email');
        $city = $request->getParam('city');
        $user = $this->getPDO()->prepare("SELECT * FROM users where email=?", [$email]);
        if($user){
            //var_dump($user);
            //var_dump($user['0']['city']);
            if($user['0']['city'] == $city){
                $_SESSION['auth'] = $user['0']['id'];
                $this->render($request, $response, '/home.php', ['auth' => $_SESSION['auth']]);
             } else {
                $_SESSION['Connect'] = "Veuillez réessayer !";
                return $this->render($request, $response, '/login.php', ['Notconnected' => $_SESSION['Connect']]);
            }
        } else {
            $_SESSION['Connect'] = "Veuillez réessayer !";
            return $this->render($request, $response, '/login.php', ['Notconnected' => $_SESSION['Connect']]);
        }
    }

    public function seDeconnecter(RequestInterface $request, ResponseInterface $response){
        $this->getPDO()->deconnexion();
        return $this->render($request, $response, '/login.php');
    }
}