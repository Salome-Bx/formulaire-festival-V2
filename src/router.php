<?php

use src\Controllers\HomeController;
use src\Controllers\ReservationController;
use src\Controllers\UserController;

// $ReservationController = new ReservationController;
$UserController = new UserController;
$HomeController = new HomeController;

$route = $_SERVER['REDIRECT_URL'];
$methode = $_SERVER['REQUEST_METHOD'];


switch ($route) {
  case HOME_URL:
    if (isset($_SESSION['connecté'])) {
      header('location: ' . HOME_URL . 'pageUser');
      die;
    } else {
      $HomeController->index();
    }
    break;

  case str_contains($route, "inscription"):
    if ($methode === "POST") {
      $data = $_POST;
      $UserController->registerUser($data);
    } else {
      header('location: ' . HOME_URL . 'inscriptionUser.php');
    }

    break;

  case HOME_URL . 'connexion':
    if (isset($_SESSION['connecté'])) {
      header('location: ' . HOME_URL . 'pageUser');
      die;
    } else {
      if ($methode === 'POST') {

        $UserController->authication($_POST['emailConnexion'], $_POST['motDePasseConnexion']);

      } else {
        $HomeController->connexion();
      }
    }
    break;

  case HOME_URL . 'deconnexion':
    $HomeController->quit();
    break;

  case HOME_URL . 'formulaireReservation':
    $HomeController->formulaireResa();
    break;

  case HOME_URL . "pageUser":
    // On a ici toutes les routes qu'on a à partir de pageUser
    switch ($route) {
      case str_contains($route, "reservation"):
        // On a ici toutes les routes qu'on peut faire
        switch ($route) {
          case str_contains($route, "new"):
            if ($methode === "POST") {
              $data = $_POST;
              $ReservationController->save($data);
            } else {
              $ReservationController->new();
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
            $ReservationController->index($IdUser);
            break;
        }

        break;

      default:
        $UserController->index();
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

    break;
  default:
    $HomeController->page404();
    break;
}
