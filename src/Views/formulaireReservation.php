<?php

use src\Repositories\ReservationRepository;

require_once __DIR__ . "/includes/header.php";


$reservationRepository = new ReservationRepository;

$reservationRepository->$this->getEventFromDB();
var_dump($reservationRepository);

?>

<form action="formulaireReservation" id="reservation" method="POST">
    <div id="reservation" class="blocFormulaire">
        <h2>Réservation</h2>
        <h3>Nombre de réservation(s) :</h3>
        <input type="number" name="nombrePlaces" id="NombrePlaces" min="1" required>
        <h3>Réservation(s) en tarif réduit</h3>
        <div>
            <input type="checkbox" name="tarifReduit" id="tarifreduitRadio">
            <label for="tarifReduit">Ma réservation sera en tarif réduit</label>
        </div>

        <h3>Choisissez votre formule :</h3>
        <div class="divPass1Jour">
            <input type="checkbox" name="pass1jour" id="pass1jour">
            <label for="pass1jour">Pass 1 jour : 40€</label>
        </div>

        <!-- Si case cochée, afficher le choix du jour -->
        <section id="pass1jourDate" class="tarifHidden">
            <input type="checkbox" name="choixJour1" id="choixJour1">
            <label for="choixJour1">Pass pour la journée du 01/07</label>
            <input type="checkbox" name="choixJour2" id="choixJour2">
            <label for="choixJour2">Pass pour la journée du 02/07</label>
            <input type="checkbox" name="choixJour3" id="choixJour3">
            <label for="choixJour3">Pass pour la journée du 03/07</label>
        </section>

        <div class="divPass2Jours">
            <input type="checkbox" name="pass2jours" id="pass2jours">
            <label for="pass2jours">Pass 2 jours : 70€</label>
        </div>

        <!-- Si case cochée, afficher le choix des jours -->
        <section id="pass2joursDate" class="tarifHidden">
            <input type="checkbox" name="choixJour12" id="choixJour12">
            <label for="choixJour12">Pass pour deux journées du 01/07 au 02/07</label>
            <input type="checkbox" name="choixJour23" id="choixJour23">
            <label for="choixJour23">Pass pour deux journées du 02/07 au 03/07</label>
        </section>

        <div class="divPass3Jours">
            <input type="checkbox" name="pass3jours" id="pass3jours">
            <label for="pass3jours">Pass 3 jours : 100€</label>
        </div>


        <!-- tarifs réduits : à n'afficher que si tarif réduit est sélectionné -->
        <div id="tarifreduit" class="tarifHidden">
            <input type="checkbox" name="pass1jourreduit" id="pass1jourreduit">
            <label for="pass1jourreduit">Pass 1 jour : 25€</label> <br>
            <input type="checkbox" name="pass2joursreduit" id="pass2joursreduit">
            <label for="pass2joursreduit">Pass 2 jours : 50€</label> <br>
            <input type="checkbox" name="pass3joursreduit" id="pass3joursreduit">
            <label for="pass3joursreduit">Pass 3 jours : 65€</label>
        </div>


        <!-- FACULTATIF : ajouter un pass groupe (5 adultes : 150€ / jour) uniquement pass 1 jour -->

        <p class="bouton" onclick="suivant(blocReservation, blocOptions)">Suivant</p>
        <div class="messageErreurReservation"></div>

    </div>
    <div id="options" class="blocFormulaire options">

        <h2>Options</h2>
        <h3>Réserver un emplacement de tente : </h3>
        <div class="choixnuit">
            <input type="checkbox" id="tenteNuit1" name="tenteNuit1">
            <label for="tenteNuit1">Pour la nuit du 01/07 (5€)</label>
        </div>
        <div class="choixnuit">
            <input type="checkbox" id="tenteNuit2" name="tenteNuit2">
            <label for="tenteNuit2">Pour la nuit du 02/07 (5€)</label>
        </div>
        <div class="choixnuit">
            <input type="checkbox" id="tenteNuit3" name="tenteNuit3">
            <label for="tenteNuit3">Pour la nuit du 03/07 (5€)</label>
        </div>
        <div class="choixnuit">
            <input type="checkbox" id="tente3Nuits" name="tente3Nuits">
            <label for="tente3Nuits">Pour les 3 nuits (12€)</label>
        </div>

        <h3>Réserver un emplacement de camion aménagé : </h3>
        <div class="choixnuit">
            <input type="checkbox" id="vanNuit1" name="vanNuit1">
            <label for="vanNuit1">Pour la nuit du 01/07 (5€)</label>
        </div>
        <div class="choixnuit">
            <input type="checkbox" id="vanNuit2" name="vanNuit2">
            <label for="vanNuit2">Pour la nuit du 02/07 (5€)</label>
        </div>
        <div class="choixnuit">
            <input type="checkbox" id="vanNuit3" name="vanNuit3">
            <label for="vanNuit3">Pour la nuit du 03/07 (5€)</label>
        </div>
        <div class="choixnuit">
            <input type="checkbox" id="van3Nuits" name="van3Nuits">
            <label for="van3Nuits">Pour les 3 nuits (12€)</label>
        </div>

        <h3>Venez-vous avec des enfants ?</h3>
        <div class="divenfants">
            <input type="checkbox" name="enfantsOui"><label for="enfantsOui">Oui</label>
        </div>
        <div class="divenfants">
            <input type="checkbox" name="enfantsNon"><label for="enfantsNon">Non</label>
        </div>


        <!-- Si oui, afficher : -->
        <section class="casqueEnfant ">
            <h4>Voulez-vous louer un casque antibruit pour enfants* (2€ / casque) ?</h4>
            <label for="nombreCasquesEnfants">Nombre de casques souhaités :</label>
            <input type="number" name="nombreCasquesEnfants" id="nombreCasquesEnfants" min="0">
            <p>*Dans la limite des stocks disponibles.</p>
            <div class="messageErreurCasques"></div>
        </section>

        <h3>Profitez de descentes en luge d'été à tarifs avantageux !</h3>

        <div class="divluge">
            <label for="NombreLugesEte">Nombre de descentes en luge d'été (5€/descentes) :</label>
            <input type="number" name="NombreLugesEte" id="NombreLugesEte" min="0">
            <div class="messageErreurLuge"></div>
        </div>

        <p class="bouton boutonOptions" onclick="suivant2(blocOptions, blocCoordonnees)">Suivant</p>
        <p class="bouton" onclick="precedent(blocOptions, blocReservation)">Précédent</p>

        <button type="submit">Je valide ma réservation</button>
    </div>
    <!-- <script src="<?php HOME_URL ?>assets/script.js"></script> -->
    <!-- <script src="<?php HOME_URL ?>assets/traitement.js"></script> -->

</form>


<?php require_once __DIR__ . "/includes/footer.php";
?>