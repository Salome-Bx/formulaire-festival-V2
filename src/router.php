<?php

use src\Controllers\HomeController;
use src\Controllers\ReservationController;
use src\Controllers\UserController;

$ReservationController = new ReservationController;
$UserController = new UserController;
$HomeController = new HomeController;

$route = $_SERVER['REDIRECT_URL'];
$methode = $_SERVER['REQUEST_METHOD'];


switch ($route) {
  case str_contains($route, "connexion"):
    if ($methode === 'POST') {
      $UserController->authentication($_POST['emailConnexion'], $_POST['motDePasseConnexion']);
    } else {
      $HomeController->connexion();
    }
    break;
  case str_contains($route, "inscription"):
    switch ($route) {
      case str_contains($route, "new"):
        if ($methode === "POST") {
          $data = $_POST;
          $UserController->registerUser($data);
          $HomeController->connexion();
        } else {
          echo "une erreur est survenue lors de lors de l'inscription";
        }
        break;

      default:
        $HomeController->inscription();
        break;
    }
    break;

  case HOME_URL . 'deconnexion':
    $HomeController->quit();
    break;


  case str_contains($route, "dashboard"):
    // On a ici toutes les routes qu'on a à partir de dashboard
    $User = unserialize($_SESSION['user']);
    switch ($route) {

      case str_contains($route, "monprofil"):

        switch ($route) {
          case str_contains($route, "edit"):
            if ($methode === "POST") {
              $data = $_POST;
              $UserController->updateThisUser($data, $User->getIdUser());
            } else {
              $UserController->monProfil();
            }
            break;

          default:
            $UserController->index($User);
            break;
        }
        break;

      case str_contains($route, "reservation"):
        // On a ici toutes les routes qu'on peut faire
        switch ($route) {
          case str_contains($route, "new"):

            if ($methode === "POST") {
              $data = $_POST;
              $ReservationController->save($data, $User->getIdUser());
              $ReservationController->index($User);
            } else {
              $ReservationController->new($User);
            }
            break;

          case str_contains($route, 'details'):
            $IdUser = explode('/', $route);
            $IdUser = end($IdUser);
            $ReservationController->show($IdUser);
            break;

          case str_contains($route, "edit"):
            $IdUser = explode('/', $route);
            $IdUser = end($IdUser);
            $ReservationController->edit($IdUser);
            break;

          case str_contains($route, "delete"):
            $IdUser = explode('/', $route);
            $IdUser = end($IdUser);
            $ReservationController->delete($IdUser);
            break;

          default:
            // par défaut on voit la liste des films.
            $ReservationController->index($User->getIdUser());
            break;
        }
        break;

      default:
        $UserController->index($User);
        break;
    }

    switch ($route) {
      case str_contains($route, "edit"):
        $IdUser = explode('/', $route);
        $IdUser = end($IdUser);
        // $UserController->edit($IdUser);
        break;

      case str_contains($route, "delete"):
        $IdUser = explode('/', $route);
        $IdUser = end($IdUser);
        // $UserController->delete($IdUser);
        break;

      case str_contains($route, 'deconnexion'):
        $HomeController->quit();
        break;
      default:

        break;
    }



    break;
  default:
    $HomeController->page404();
    break;
}
