<?php

namespace src\Controllers;

use Reservation;
use src\Services\Reponse;
use src\Repository\ReservationRepository;

class ReservationController
{

    private $ReservationRepository;
    use Reponse;

    public function __construct()
    {
        $this->ReservationRepository = new ReservationRepository;
    }

    public function index($Id_User)
    {
        $Reservation = $this->ReservationRepository->getAllReservation();
        $this->render("Dashboard", ['section' => 'Reservation', 'action' => '']);
    }

    public function details($id)
    {
        $Reservation = $this->ReservationRepository->getThisReservationById($id);
        $this->render('Dashboard', ['section' => 'Reservation', 'action' => 'details']);
    }

    public function edit($id)
    {
        $Reservation = $this->ReservationRepository->getThisReservationById($id);
        $this->render('Dashboard', ['section' => 'Reservation', 'action' => 'edit']);
    }
    public function show($id)
    {
        $Reservation = $this->ReservationRepository->getThisReservationById($id);
        $this->render('Dashboard', ['section' => 'Reservation', 'action' => 'show']);
    }

    public function new()
    {
        $Reservation = $this->ReservationRepository->getNewReservation($id);
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
        $Reservation = new Reservation($data);
        if (isset($data[$Reservation]) && !empty($data[$Reservation])) {
            $Reservation->setIdCategories($data[]);
        } else {
            $Reservation->setIdCategories([]);
        }

        if (
            !empty($Reservation->???()) &&
            !empty($Reservation->???()) &&
            !empty($Reservation->???()) &&
            !empty($Reservation->???()) &&
            !empty($Reservation->???()) &&
            !empty($Reservation->???()) &&
            !empty($Reservation->???())
        ) {

            if ($id !== null) {
                $Reservation->setId($id);
                $this->ReservationRepository->???($Reservation);
            }
            
            header('location: /dashboard/Reservation/details/' . $Reservation->getId());
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
        $this->ReservationRepository->deleteThisReservation($id);
        $Reservation = $this->ReservationRepository->getAllReservation();
        $this->render("Dashboard", ['section' => 'Reservation', 'Reservation' => $Reservation]);
    }
}
