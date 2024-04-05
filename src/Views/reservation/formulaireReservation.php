<?php

use src\Repositories\ReservationRepository;

$reservationRepository = new ReservationRepository();
$event = $reservationRepository->getEventFromDB();
?>

<form action="<?php HOME_URL ?>/dashboard/reservation/new" id="reservation" method="POST" class="blocFormulaire flex flex-col m-auto w-1/2">
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
            <input type="radio" name="pass1jour" id="pass1jour">
            <label for="pass1jour"><?= $event[0]["Name"] ?> : <?= $event[0]["Price"] ?>€</label>
        </div>
        <div id="tarifreduit" class="tarifHidden tarifreduit">
            <input type="radio" name="choixJour" id="pass1jourreduit">
            <label for="pass1jourreduit"><?= $event[0]["Name"] ?> : <?= $event[0]["Reduced_Price"] ?>€</label> <br>
            <input type="radio" name="choixJour" id="pass2joursreduit">
            <label for="pass2joursreduit"><?= $event[3]["Name"] ?> : <?= $event[3]["Reduced_Price"] ?>€</label> <br>
            <input type="radio" name="choixJour" id="pass3joursreduit">
            <label for="pass3joursreduit"><?= $event[5]["Name"] ?> : <?= $event[5]["Reduced_Price"] ?>€</label>
        </div>

        <!-- Si case cochée, afficher le choix du jour -->
        <section id="pass1jourDate" class="tarifHidden">
            <input type="radio" name="choixJour" id="choixJour1" value="<?= $event[0]["Id_Date"] ?>">
            <label for="choixJour1"><?= $event[0]["Name"] ?> du <?= $event[0]["Date_Start"] ?></label>
            <input type="radio" name="choixJour" id="choixJour2" value="<?= $event[1]["Id_Date"] ?>">
            <label for="choixJour2"><?= $event[1]["Name"] ?> du <?= $event[1]["Date_Start"] ?></label>
            <input type="radio" name="choixJour" id="choixJour3" value="<?= $event[2]["Id_Date"] ?>">
            <label for="choixJour3"><?= $event[2]["Name"] ?> du <?= $event[2]["Date_Start"] ?></label>
        </section>

        <div class="divPass2Jours">
            <input type="radio" name="pass2jours" id="pass2jours">
            <label for="pass2jours"><?= $event[4]["Name"] ?> : <?= $event[4]["Price"] ?>€</label>
        </div>

        <!-- Si case cochée, afficher le choix des jours -->
        <section id="pass2joursDate" class="tarifHidden">
            <input type="radio" name="choixJour" id="choixJour12" value="<?= $event[3]["Id_Date"] ?>">
            <label for="choixJour12"><?= $event[3]["Name"] ?> du <?= $event[3]["Date_Start"] ?> au <?= $event[3]["Date_End"] ?></label>
            <input type="radio" name="choixJour" id="choixJour23" value="<?= $event[4]["Id_Date"] ?>">
            <label for="choixJour23"><?= $event[4]["Name"] ?> du <?= $event[4]["Date_Start"] ?> au <?= $event[4]["Date_End"] ?></label>
        </section>

        <div class="divPass3Jours">
            <input type="radio" name="choixJour" id="pass3jours" value="<?= $event[5]["Id_Date"] ?>">
            <label for="pass3jours"><?= $event[5]["Name"] ?> : <?= $event[5]["Price"] ?>€</label>
        </div>


        <!-- tarifs réduits : à n'afficher que si tarif réduit est sélectionné -->



        <!-- FACULTATIF : ajouter un pass groupe (5 adultes : 150€ / jour) uniquement pass 1 jour -->

        <div class="messageErreurReservation"></div>


        <h2>Options</h2>
        <h3>Réserver un emplacement de tente : </h3>
        <div class="choixnuit">
            <input type="checkbox" id="tenteNuit1" name="tenteNuit1" value="5">
            <label for="tenteNuit1">Pour la nuit du 01/07 (5€)</label>
        </div>
        <div class="choixnuit">
            <input type="checkbox" id="tenteNuit2" name="tenteNuit2" value="6">
            <label for="tenteNuit2">Pour la nuit du 02/07 (5€)</label>
        </div>
        <div class="choixnuit">
            <input type="checkbox" id="tenteNuit3" name="tenteNuit3" value="7">
            <label for="tenteNuit3">Pour la nuit du 03/07 (5€)</label>
        </div>
        <div class="choixnuit">
            <input type="checkbox" id="tente3Nuits" name="tente3Nuits" value="8">
            <label for="tente3Nuits">Pour les 3 nuits (12€)</label>
        </div>

        <h3>Réserver un emplacement de camion aménagé : </h3>
        <div class="choixnuit">
            <input type="checkbox" id="vanNuit1" name="vanNuit1" value="1">
            <label for="vanNuit1">Pour la nuit du 01/07 (5€)</label>
        </div>
        <div class="choixnuit">
            <input type="checkbox" id="vanNuit2" name="vanNuit2" value="2">
            <label for="vanNuit2">Pour la nuit du 02/07 (5€)</label>
        </div>
        <div class="choixnuit">
            <input type="checkbox" id="vanNuit3" name="vanNuit3" value="3">
            <label for="vanNuit3">Pour la nuit du 03/07 (5€)</label>
        </div>
        <div class="choixnuit">
            <input type="checkbox" id="van3Nuits" name="van3Nuits" value="4">
            <label for="van3Nuits">Pour les 3 nuits (12€)</label>
        </div>

        <h3>Venez-vous avec des enfants ?</h3>
        <div class="divenfants">
            <input type="radio" name="enfants" id="enfantsOui"><label for="enfantsOui">Oui</label>
        </div>
        <div class="divenfants">
            <input type="radio" name="enfants" id="enfantsNon" checked="checked"><label for="enfantsNon">Non</label>
        </div>



        <!-- Si oui, afficher : -->
        <section class="casqueEnfant tarifHidden">
            <h4>Voulez-vous louer un casque antibruit pour enfants* (2€ / casque) ?</h4>
            <label for="nombreCasquesEnfants">Nombre de casques souhaités :</label>
            <input type="number" name="nombreCasquesEnfants" id="nombreCasquesEnfants" min="0" value="0">
            <p>*Dans la limite des stocks disponibles.</p>
            <div class="messageErreurCasques"></div>
        </section>

        <h3>Profitez de descentes en luge d'été à tarifs avantageux !</h3>

        <div class="divluge">
            <label for="NombreLugesEte">Nombre de descentes en luge d'été (5€/descentes) :</label>
            <input type="number" name="NombreLugesEte" id="NombreLugesEte" min="0" value="0">
            <div class="messageErreurLuge"></div>
        </div>
        <br>
        <button type="submit">Je valide ma réservation</button>
    </div>

</form>