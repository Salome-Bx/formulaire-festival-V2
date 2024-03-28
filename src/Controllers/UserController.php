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

    public function registerUser($data, $id = null)
    {
        foreach ($data as $key => $value) {
            // On enlève les catégories du formatage, car c'est un tableau
            if (!is_array($value)) {
                $data[$key] = htmlspecialchars($value);
            }
        }

        //!verification des password email etc... puis creation du nouvel utilisateur 
        $data = [
            'LastName' => $data['nom'],
            'FirstName' => $data['prenom'],
            'Password' => $data['password'],
            'Address' => $data['adressePostale'],
            'Telephone' => $data['telephone'],
            'UserRole' => 0,
            'Mail' => $data['email']
        ];
        var_dump($data);
        $user = new User($data);


        if (isset($user) && !empty($user)) {
            $this->UserRepo->saveUser($user);
        }
    }
}
