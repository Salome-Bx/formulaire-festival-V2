<?php

namespace src\Controllers;

use src\Models\User;
use src\Repositories\ReservationRepository;
use src\Repositories\Reservation;
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
        $this->ReservationRepo = new ReservationRepository();
    }

    public function registerUser($data, $id = null)
    {
        foreach ($data as $key => $value) {
            // On enlève les catégories du formatage, car c'est un tableau
            if (!is_array($value)) {
                $data[$key] = htmlspecialchars($value);
            }
        }
        $user = new User($data);


        if (isset($data['Id_User']) && !empty($data['Id_User'])) {
            $this->UserRepo->saveUser($user['Id_User']);
        }
    }
}
