<?php

namespace src\Controllers;


use src\Services\Reponse;

class ReservationController
{

    private $ReservationRepository;
    use Reponse;

    public function __construct()
    {
        $this->ReservationRepository = new ReservationRepository;
    }

    public function index()
    {
        $Reservation = $this->ReservationRepository->getAllReservation();
        $this->render("Dashboard", ['section' => 'Reservation', 'new' => $Reservation]);
    }

    public function show($id)
    {
        $Reservation = $this->ReservationRepository->getThisReservationById($id);
        $this->render('Dashboard', ['section' => 'Reservation', 'action' => 'details']);
    }

    public function edit($id)
    {
        $Reservation = $this->ReservationRepository->getThisReservationById($id);
        $this->render('Dashboard', ['section' => 'Reservation', 'action' => 'edit']);
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
        if (isset($data[]) && !empty($data[])) {
            $Reservation->setIdCategories($data[]);
        } else {
            $Reservation->setIdCategories([]);
        }

        if (
            !empty($Reservation->getNom()) &&
            !empty($Reservation->getUrlAffiche()) &&
            !empty($Reservation->getLienTrailer()) &&
            !empty($Reservation->getResume()) &&
            !empty($Reservation->getDuree()) &&
            !empty($Reservation->getDateSortie()) &&
            !empty($Reservation->getIdClassification())
        ) {

            if ($id !== null) {
                $film->setId($id);
                $this->ReservationRepository->updateThisFilm($film);

                $this->ReservationRepository->removeFilmToCategories($film);
                $this->ReservationRepository->addFilmToCategories($film);
            } else {
                $film = $this->ReservationRepository->CreateThisFilm($film);
                $this->ReservationRepository->addFilmToCategories($film);
            }
            header('location: /dashboard/films/details/' . $film->getId());
            die;
        } else {
            $categories = $this->CategoryRepo->getAllCategories();
            $classifications = $this->ClassificationRepo->getAllClassifications();
            if ($id !== null) {
                $this->render('Dashboard', ['section' => 'films', 'action' => 'edit', 'film' => $film, 'categories' => $categories, 'classifications' => $classifications, 'error' => 'Tous les champs sont requis.']);
                die;
            } else {
                $this->render('Dashboard', ['section' => 'films', 'action' => 'new', 'film' => $film, 'categories' => $categories, 'classifications' => $classifications, 'error' => 'Tous les champs sont requis.']);
                die;
            }
        }
    }

    public function delete($id)
    {
        $this->ReservationRepository->deleteThisFilm($id);
        $films = $this->ReservationRepository->getAllFilms();
        $this->render("Dashboard", ['section' => 'films', 'films' => $films]);
    }
}
