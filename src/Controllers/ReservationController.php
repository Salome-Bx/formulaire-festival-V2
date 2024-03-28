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
        $Reservation = $this->ReservationRepository->putReservationInDB();
        $this->render('Dashboard', ['section' => 'Reservation', 'action' => 'new']);
    }

    public function save($data, $id = null)
    {
        foreach ($data as $key => $value) {
            // On enlève les catégories du formatage, car c'est un tableau
            if (!is_array($value)) {
                $data[$key] = htmlspecialchars($value);
            }
        }

        $Reservation = $this->Resa;
        if (
            !empty($Reservation->getIdReservation()) &&
            !empty($Reservation->getNumberReservation()) &&
            !empty($Reservation->getChildren()) &&
            !empty($Reservation->getQuantityHeadphone()) &&
            !empty($Reservation->getQuantitySledge()) &&
            !empty($Reservation->getIdUser())
        ) {

            if ($id !== null) {
                $Reservation->setIdUser($id);
                $this->ReservationRepository->putReservationInDB($Reservation);
            }

            header('location: /dashboard/Reservation/details/' . $Reservation->getIdUser());
            die;
        } else {
            if ($id !== null) {
                $this->render('Dashboard', ['section' => 'Reservation', 'action' => '']);
                die;
            }
        }
    }

    public function delete($id)
    {
        $this->ReservationRepository->deleteReservationInDB($id);
        $Reservation = $this->ReservationRepository->getReservationFromDB($id);
        $this->render("Dashboard", ['section' => 'Reservation', 'Reservation' => $Reservation]);
    }
}
