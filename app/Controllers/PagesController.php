<?php
namespace App\Controllers;

use Psr\Http\Message\RequestInterface;
use Psr\Http\Message\ResponseInterface;

class PagesController extends Controller {

    /**
     * Fonction Vue Home
     * @param Interface RequestInterface
     * @param Interface ResponseInterface
     * @return layout vue home (accueil)
     */
    public function home(RequestInterface $request, ResponseInterface $response, $args = []){
        $this->render($request, $response, '/home.php');
    }

    /**
     * Fonction getUsers Vue Liste des Users
     * @param Interface RequestInterface
     * @param Interface ResponseInterface
     * @return layout lstsUsers avec la liste des users
     */
    public function getUsers(RequestInterface $request, ResponseInterface $response, $args = []){
        $result = $this->getPDO()->query('SELECT * FROM users');
        return $this->render($request, $response, '/lstUsers.php', ['resultat' => $result]);
    }

    /**
     * Fonction getUser Vue Liste info User
     * @param Interface RequestInterface
     * @param Interface RequestInterface
     * @return layout lstUsers avec les information du user
     */
    public function getUser(RequestInterface $request, ResponseInterface $response, $args = []){
        $id = $request->getAttribute('id');
        $result = $this->getPDO()->query("SELECT * FROM users where id = $id");
        return $this->render($request, $response, '/lstUsers.php', ['resultat' => $result]);
    }

    /**
     * Fonction Ajout User
     * @param Interface requestInterface
     * @param Interface responseInterface
     * @return l'execution de la requete et redirige à la vue home
     */
    public function postUser(RequestInterface $request, ResponseInterface $response, $param = []){
        $sql = "INSERT INTO users (first_name, last_name, phone, email, address, city, state) VALUES (?,?,?,?,?,?,?)";
        $first_name = $request->getParam('first_name');
        $last_name = $request->getParam('last_name');
        $phone = $request->getParam('phone');
        $email = $request->getParam('email');
        $address = $request->getParam('address');
        $city = $request->getParam('city');
        $state = $request->getParam('state');
        $result = $this->getPDO()->prepare($sql, [$first_name, $last_name, $phone, $email, $address, $city, $state]);
        if($result){
            return $this->render($request, $response, '/home.php', ['Oui' => 'Oui']);
        } else {
            return $this->render($request, $response, '/home.php', ['Non' => 'Non']);
        }
    }

    /**
     * Fonction UpdateUser
     * @param Interface requestInterface
     * @param Interface responseInterface
     * @return la vue home avec les informations de l'user à update
     */
    public function updateUser(RequestInterface $request, ResponseInterface $response){
        $id = $request->getAttribute('id');
        $result = $this->getPDO()->query("SELECT * FROM users where id = $id");
        var_dump($result);
        return $this->render($request, $response, '/home.php', ['id' => $id,
        'first_name' => $result['0']['first_name'],
        'last_name' => $result['0']['last_name'],
        'phone' => $result['0']['phone'],
        'email' => $result['0']['email'],
        'address' => $result['0']['address'],
        'city' => $result['0']['city'],
        'state' => $result['0']['state']
        ]);
    }

    /**
     * Fonction PostUpdateUser
     * @param Interface requestInterface
     * @param Interface responseInterface
     * @return la vue liste user une fois les modifications effectuées
     */
    public function postUpdateUser(RequestInterface $request, ResponseInterface $response){
        $id = $request->getAttribute('id');
        $first_name = $request->getParam('first_name');
        $last_name = $request->getParam('last_name');
        $phone = $request->getParam('phone');
        $email = $request->getParam('email');
        $address = $request->getParam('address');
        $city = $request->getParam('city');
        $state = $request->getParam('state');
        $sql = "UPDATE  users SET first_name =?, last_name=?, phone=?, email=?, address=?, city=?, state=? WHERE id=?";
        $update = $this->getPDO()->prepare($sql, [$first_name, $last_name, $phone, $email, $address, $city, $state, $id]);
        $user = $this->getPDO()->query("SELECT * FROM users WHERE id = $id");
        if($update){
            return $this->render($request, $response, '/lstUsers.php', ['Oui' => 'Oui', 'resultat' => $user]);
        } else {
            return $this->render($request, $response, '/home.php', ['Non' => 'Non', 'id' => $id,
            'first_name' => $first_name,
            'last_name' => $last_name ,
            'phone' => $phone,
            'email' =>$email ,
            'address' => $address ,
            'city' => $city ,
            'state' => $state 
            ]);
        }
    }

    public function postContact(RequestInterface $request, ResponseInterface $response){
        
        //return $this->redirect($response, 'contact');
    }
}