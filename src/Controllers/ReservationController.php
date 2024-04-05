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
        $Reservation = $this->ReservationRepository->editThisReservationInDB($id);
        $this->render('Dashboard', ['section' => 'Reservation', 'action' => 'edit']);
    }
    public function show($Id_User)
    {
        var_dump($Id_User);
        $_SESSION['Reservation'] = $this->ReservationRepository->getAllReservationFromDB($Id_User);
        $Reservation = $_SESSION['Reservation'];
        $this->render('dashboard', ['Reservation' => $Reservation]);
    }

    public function new($data)
    {
    }

    public function save($data)
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
            'Id_User' => 1,
            'Price_Reduced' => $data['tarifReduit'] ?? false,
            'Id_Date' => $data['choixJour'],
            'Van' => [$data['vanNuit1'] ?? null, $data['vanNuit2'] ?? null, $data['vanNuit3'] ?? null, $data['van3Nuits'] ?? null],
            'tente' => [$data['tenteNuit1'] ?? null, $data['tenteNuit2'] ?? null, $data['tenteNuit3'] ?? null, $data['tente3Nuits'] ?? null]

            //! plus tard remplacer le 1 par $_SESSION['User_ID']
        ];
        $resa = new Reservation($data);
        $this->ReservationRepository->putReservationInDB($resa);
    }

    public function delete($id)
    {
        $this->ReservationRepository->deleteReservationInDB($id);
        $Reservation = $this->ReservationRepository->getReservationFromDB($id);
        $this->render("Dashboard", ['section' => 'Reservation', 'Reservation' => $Reservation]);
    }
}
