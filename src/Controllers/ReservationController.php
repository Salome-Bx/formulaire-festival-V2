<?php

namespace src\Controllers;

use src\Models\Reservation;
use src\Repositories\ReservationRepository;
use src\Services\Reponse;

class ReservationController
{
    private $Reservation;
    private $ReservationRepository;

    use Reponse;



    public function index($User)
    {
        $ReservationRepository = new ReservationRepository;
        $Reservation = $ReservationRepository->getAllReservationFromDB($User->getIdUser());
        $this->render("dashboard", ['section' => 'Reservation', 'action' => 'new', 'allresa' => $Reservation, 'User' => $User]);
    }

    public function details($id)
    {
        $Reservation = $this->ReservationRepository->getReservationFromDB($id);
        $this->render('dashboard', ['section' => 'Reservation', 'action' => 'details']);
    }

    public function edit($id)
    {
        $Reservation = $this->ReservationRepository->editThisReservationInDB($id);
        $this->render('dashboard', ['section' => 'Reservation', 'action' => 'edit']);
    }
    public function show($Id_User)
    {
        $_SESSION['Reservation'] = $this->ReservationRepository->getAllReservationFromDB($Id_User);
        $Reservation = $_SESSION['Reservation'];
        $this->render('dashboard', ['Reservation' => $Reservation]);
    }


    public function save($data, $Id_User)
    {
        // $this->render('Dashboard', ['section' => 'Reservation', 'action' => 'new']);

        foreach ($data as $key => $value) {
            // On enlève les catégories du formatage, car c'est un tableau
            if (!is_array($value)) {
                $data[$key] = htmlspecialchars($value);
            }
        }

        $data = [
            'Number_Reservation' => $data['nombrePlaces'],
            'Quantity_Sledge' => $data['NombreLugesEte'],
            'Quantity_Headphone' => $data['nombreCasquesEnfants'],
            'Children' => $data['enfants'],
            'Price_Reduced' => $data['tarifReduit'] ?? false,
            'Id_Date' => $data['choixJour'],
            'Van' => [$data['vanNuit1'] ?? null, $data['vanNuit2'] ?? null, $data['vanNuit3'] ?? null, $data['van3Nuits'] ?? null],
            'tente' => [$data['tenteNuit1'] ?? null, $data['tenteNuit2'] ?? null, $data['tenteNuit3'] ?? null, $data['tente3Nuits'] ?? null]

            //! plus tard remplacer le 1 par $_SESSION['User_ID']
        ];
        $resa = new Reservation($data);
        $ReservationRepository = new ReservationRepository();
        $ReservationRepository->putReservationInDB($resa, $Id_User);
    }

    public function delete($id)
    {
        $this->ReservationRepository->deleteReservationInDB($id);
        $Reservation = $this->ReservationRepository->getReservationFromDB($id);
        $this->render("Dashboard", ['section' => 'Reservation', 'Reservation' => $Reservation]);
    }
    public function new($User)
    {
        $this->render("dashboard", ['section' => 'reservation', 'action' => 'new', 'User' => $User]);
    }
}
