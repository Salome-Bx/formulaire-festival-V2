<?php

use src\Models\Database;
use src\Repository\UserRepository;
use src\Repository\ReservationRepository;


if (!isset($_SESSION['connectéUser'])) {
    header('location: connexion.php');
    die;
}


include __DIR__ . '/includes/header.php'; ?>

<!------------------- HEADER ------------------->

<?php include_once './includes/headerConnected.php';  ?>

<!------------------- BODY ------------------->

<section>
    <?php
    // instanciation de la classe Database
    $DBR = new Database();
    $resaRepo = new ReservationRepository();
    $reservations = $resaRepo->getAllReservations();

    foreach ($reservations as $reservation) {
        $IdUser = $reservation->getIdUser();
        // instanciation de la classe User
        $DBU = new Database();
        $userRepo = new UserRepository();
        $utilisateur = $userRepo->getThisUtilisateurById($IdUser); ?>

        <div class="reservation <?= $reservation->getId() ?>">
            <div class="displaynomnum">
                <p class="fontsize"><b><?= $utilisateur->getPrenom() ?> <?= $utilisateur->getNom() ?></b></p>
                <p>Numéro de réservation : <?= $reservation->getId() ?></p>
            </div>


            <p>Nombre de réservation : <em><?= $reservation->getNbrReservation() ?></em></p>
            <p>Jour(s) choisi(s) :<em><?php if ($reservation->getTypeRerservation() == '1Journee0107') {
                                            echo ' le 01/07';
                                        } else if ($reservation->getTypeRerservation() == '1Journee0207') {
                                            echo ' le 02/07';
                                        } else if ($reservation->getTypeRerservation() == '1Journee0307') {
                                            echo ' le 03/07';
                                        } else if ($reservation->getTypeRerservation() == '2Journees01070207') {
                                            echo ' le 01/07 et le 02/07';
                                        } else if ($reservation->getTypeRerservation() == '2Journees02070307') {
                                            echo ' le 02/07 et le 03/07';
                                        } else if ($reservation->getTypeRerservation() == '3Journees') {
                                            echo ' les trois jours.';
                                        } else if ($reservation->getTypeRerservation() == '1JourneeReduit') {
                                            echo ' un jour en tarif réduit';
                                        } else if ($reservation->getTypeRerservation() == '2JourneesReduit') {
                                            echo ' deux jours en tarif réduit';
                                        } else if ($reservation->getTypeRerservation() == '3JourneesReduit') {
                                            echo ' trois jours en tarif réduit';
                                        } ?></em></p>
            <p>Nuit(s) : <em><?php
                                $tableauNuitAdmin = str_split($reservation->getNuit());
                                foreach ($tableauNuitAdmin as $indiceTableauNuit) {
                                    if ($indiceTableauNuit == 'a') {
                                        echo ' la nuit en tente du 01/07 <br>';
                                    } else if ($indiceTableauNuit == 'b') {
                                        echo ' la nuit en tente du 02/07 <br>';
                                    } else if ($indiceTableauNuit == 'c') {
                                        echo ' la nuit en tente du 03/07 <br>';
                                    } else if ($indiceTableauNuit == 'd') {
                                        echo ' les trois nuits en tente <br>';
                                    } else if ($indiceTableauNuit == 'e') {
                                        echo ' la nuit en van du 01/07 <br>';
                                    } else if ($indiceTableauNuit == 'f') {
                                        echo ' la nuit en van du 02/07 <br>';
                                    } else if ($indiceTableauNuit == 'g') {
                                        echo ' la nuit en van du 03/07 <br>';
                                    } else if ($indiceTableauNuit == 'h') {
                                        echo ' les trois nuits en van <br>';
                                    };
                                } ?></em></p>


            <?php if ($reservation->getNbrEnfant() == true) {
            ?>
                <div class="displayflex">
                    <p>Enfant : <em>Oui</em></p>
                    <p class="casques">Casque(s) antibruit(s) : <em><?= $reservation->getNbrCasqueEnfant() ?></em></p>
                </div>
            <?php } else {
            ?>
                <div>
                    <p>Enfant : <em>Non</em></p>
                </div>
            <?php }
            ?>
            <p>Descente(s) luge : <em><?= $reservation->getNbrDescenteLuge() ?></em></p>
            <p>Coordonnées : </p>
            <div class="displaycoordonnee">
                <p>Email : <em><?= $utilisateur->getMail() ?></em></p>
                <p>Téléphone : <em><?= $utilisateur->getTel() ?></em></p>
                <p>Adresse : <em><?= $utilisateur->getAdresse() ?></em></p>
            </div>
            <p class="prixPaye fontsize"> Total :
                <?= $reservation->calculerPrix() ?> €
            </p>


        </div>
    <?php }

    include __DIR__ . '/includes/footer.php'; ?>

    ?>
</section>