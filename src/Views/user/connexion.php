<section class="connexion">
    <h2>Connexion</h2>

    <form action="connexion" id="connexion" method="POST">
        <label for="emailConnexion">Email :</label>
        <input type="email" name="emailConnexion" id="emailConnexion" value="plazdzasasssaop@gmail.com">
        <label for="motDePasseConnexion">Mot de passe :</label>
        <input type="password" name="motDePasseConnexion" id="motDePasseConnexion" value="azdazdazd">
        <input type="submit" class="bouton" value="Connexion">
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
