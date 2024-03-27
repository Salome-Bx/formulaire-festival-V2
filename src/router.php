<?php

use src\Controllers\ReservationController;

$ReservationController = new ReservationController;
$UserController = new UserController;


$route = $_SERVER['REDIRECT_URL'];
$methode = $_SERVER['REQUEST_METHOD'];

switch ($route) {
  case HOME_URL:
    if (isset($_SESSION['connecté'])) {
      header('location: '.HOME_URL.'dashboard');
      die;
    } else {
      $HomeController->index();
    }
    break;

  case HOME_URL.'connexion':
    if (isset($_SESSION['connecté'])) {
      header('location: /dashboard');
      die;
    } else {
      if ($methode === 'POST') {
        $HomeController->auth($_POST['password']);
      } else {
        $HomeController->index();
      }
    }
    break;

  case HOME_URL.'deconnexion':
    $HomeController->quit();
    break;

  case str_contains($route, "dashboard"):
    if (isset($_SESSION["connecté"])) {
      // On a ici toutes les routes qu'on a à partir du dashboard

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
              $idResa = explode('/', $route);
              $idResa = end($idResa);
              $ReservationController->show($idResa);
              break;

            case str_contains($route, "edit"):
              $idResa = explode('/', $route);
              $idResa = end($idResa);
              $ReservationController->edit($idResa);
              break;

            case str_contains($route, "delete"):
              $idResa = explode('/', $route);
              $idResa = end($idResa);
              $ReservationController->delete($idResa);
              break;

            default:
              // par défaut on voit la liste des films.
              $ReservationController->index();
              break;
          }

          break;

        default:
          // par défaut une fois connecté, on voit la liste des films.
          $ReservationController->index();
          break;
      }
    } else {
      header("location: ".HOME_URL);
      die;
    }
    break;

  default:
    $HomeController->page404();
    break;
}
