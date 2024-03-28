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

    public function register($data, $id = null)
    {
        foreach ($data as $key => $value) {
            // On enlève les catégories du formatage, car c'est un tableau
            if (!is_array($value)) {
                $data[$key] = htmlspecialchars($value);
            }
        }
        $user = new User($data);
        if (isset($data['id_categories']) && !empty($data['id_categories'])) {
            $user > setIdCategories($data['id_categories']);
        }

        if (
            !empty($user->getNom()) &&
            !empty($user->getUrlAffiche()) &&
            !empty($user->getLienTrailer()) &&
            !empty($user->getResume()) &&
            !empty($user->getDuree()) &&
            !empty($user->getDateSortie()) &&
            !empty($user->getIdClassification())
        ) {

            if ($id !== null) {
                $film->setId($id);
                $this->FilmRepo->updateThisFilm($film);

                $this->FilmRepo->removeFilmToCategories($film);
                $this->FilmRepo->addFilmToCategories($film);
            } else {
                $film = $this->FilmRepo->CreateThisFilm($film);
                $this->FilmRepo->addFilmToCategories($film);
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
}
