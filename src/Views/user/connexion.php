<section class="connexion" class="">
    <h2 class="text-center font-bold">Connexion</h2>

    <form action="connexion" id="connexion" method="POST" class="flex flex-col m-auto w-1/2">
        <label for="emailConnexion">Email :</label>
        <input type="email" name="emailConnexion" id="emailConnexion" value="">
        <label for="motDePasseConnexion">Mot de passe :</label>
        <input type="password" name="motDePasseConnexion" id="motDePasseConnexion" value="">
        <input type="submit" class="bouton m-2 bg-sky-900 text-white rounded" value="Connexion">
        <?php
        if (!empty($_GET['erreur'])) {
            if ($_GET['erreur'] == 4) { ?>
                <div class="messageechec">
                    Merci de remplir tous les champs.
                </div>
            <?php } else if ($_GET['erreur'] == 6) { ?>
                <div class="messageechec">
                    Le mail ou le mot de passe est incorrect.
                </div>

            <?php
            } else if ($_GET['erreur'] == 7) { ?>
                <div class="messageechec">
                    Le mail incorrect.
                </div>
            <?php

            } else if ($_GET['erreur'] == 8) { ?>
                <div class="messageechec">
                    MDP incorrect.
                </div>
        <?php
            }
        } ?>

    </form>

</section>