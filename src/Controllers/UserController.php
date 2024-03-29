<?php

namespace src\Controllers;

use src\Models\User;
use src\Repositories\UserRepository;
use src\Services\Reponse;

class UserController
{
    private $UserRepo;
    private $ReservationRepo;


    use Reponse;



    public function __construct()
    {
        // Instanciez les 3 propriétés avec les repositories concernés.
        $this->UserRepo = new UserRepository();
        // $this->ReservationRepo = new ReservationRepository();
    }

    public function index()
    {
        $User = unserialize($_SESSION['user']);

        $this->render('pageUser', ['User' => $User]);
    }

    public function registerUser($data, $id = null)
    {
        foreach ($data as $key => $value) {
            // On enlève les catégories du formatage, car c'est un tableau
            if (!is_array($value)) {
                $data[$key] = htmlspecialchars($value);
            }
        }
        if ($data['password'] === $data['passwordBis']) {
            $data = [
                'LastName' => $data['nom'],
                'FirstName' => $data['prenom'],
                'Password' => $data['password'],
                'Address' => $data['adressePostale'],
                'Telephone' => $data['telephone'],
                'UserRole' => 0,
                'Mail' => $data['email']
            ];
            $user = new User($data);
            if (isset($user) && !empty($user)) {
                $this->UserRepo->saveUser($user);
            }
        } else {
            var_dump('Erreur : les mots de passe ne sont pas identique.');
        }
    }

    //! il faut faire une fonction pour récuperer l'utilisateur
    public function authication($email, $password)
    {

        $User = $this->UserRepo->getThisUser($email, $password);
        if ($password === $password) {
            $_SESSION['connecté'] = TRUE;
            $_SESSION['user'] = serialize($User);
            header('location: ' . HOME_URL . 'pageUser');
            die();
        } else {
            header('location: ' . HOME_URL . '?erreur=connexion');
        }
        // $this->render("pageUser", ['section' => '', 'user' => $User]);
        die;
    }

    //! fontion pour delete un utilisateur 
    public function deleteUser($id)
    {
        $User = $this->UserRepo->deleteThisUser($id);
        // $this->render("", ['' => '', '' => $User]);
        header('location: ' . HOME_URL . 'connexion');
    }

    //! fonction pour modifier un utilisateur
    public function editThisUser($id)
    {
        $User = $this->UserRepo->updateThisUser($id);
        // $this->render("", ['' => '', '' => $User]);
        header('location: ' . HOME_URL . 'editUser');
    }
}
