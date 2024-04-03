<?php

namespace src\Controllers;

use src\Models\Reservation;
use src\Repositories\ReservationRepository;
use src\Services\Reponse;

class ReservationController
{
    private Reservation $Resa;
    private ReservationRepository $ReservationRepository;
    use Reponse;

    public function __construct()
    {
        $this->Resa = new Reservation();
        $this->ReservationRepository = new ReservationRepository();
    }

    public function index($Id_User)
    {
        $Reservation = $this->ReservationRepository->getAllReservationFromDB();
        $this->render("Dashboard", ['section' => 'Reservation', 'action' => '']);
    }

    public function details($id)
    {
        $Reservation = $this->ReservationRepository->getReservationFromDB($id);
        $this->render('Dashboard', ['section' => 'Reservation', 'action' => 'details']);
    }

    public function edit($id)
    {
        $Reservation = $this->ReservationRepository->edtiReservationInDB($id);
        $this->render('Dashboard', ['section' => 'Reservation', 'action' => 'edit']);
    }
    public function show($id)
    {
        $Reservation = $this->ReservationRepository->getReservationFromDB($id);
        $this->render('Dashboard', ['section' => 'Reservation', 'action' => 'show']);
    }

    public function new()
    {
        $this->ReservationRepository->putReservationInDB();
        $this->render('Dashboard', ['section' => 'Reservation', 'action' => 'new']);

        foreach ($data as $key => $value) {
            // On enlève les catégories du formatage, car c'est un tableau
            if (!is_array($value)) {
                $data[$key] = htmlspecialchars($value);
            }
        }
        $data = [
            'Number_Reservation' => $data['nombrePlaces'],
            'Quantity_Sledge' => $data['nombreLugesEte'],
            'Quantity_Headphone' => $data['nombreCasquesEnfants'],
            'Children' => $data['enfantsOui'],
            'Id_User' => 1
            //! plus tard remplacer le 1 par $_SESSION['User_ID']
        ];
        $user = new User($data);
        if (isset($user) && !empty($user)) {
            $this->UserRepo->saveUser($user);
        }
    }
    public function save($data, $id = null)
    {
        var_dump($data);
        foreach ($data as $key => $value) {
            // On enlève les catégories du formatage, car c'est un tableau
            if (!is_array($value)) {
                $data[$key] = htmlspecialchars($value);
            }
        }

        $Reservation = $this->Resa;
        $this->ReservationRepository->putReservationInDB($data);
        header('location: /dashboard/Reservation/details/' . $Reservation->getIdUser());
        die;
    }

    public function delete($id)
    {
        $this->ReservationRepository->deleteReservationInDB($id);
        $Reservation = $this->ReservationRepository->getReservationFromDB($id);
        $this->render("Dashboard", ['section' => 'Reservation', 'Reservation' => $Reservation]);
    }
}
