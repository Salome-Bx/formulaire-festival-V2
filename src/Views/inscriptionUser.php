<?php
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulaire d'inscription</title>
</head>

<body>
    <?php include __DIR__ . '/includes/header.php'; ?>
    <form action="inscription" id="inscriptionUser" method="POST">
        <div id="coordonnees" class="blocFormulaire">

            <h2>Coordonnées</h2>
            <div class="messageErreurChampsVides">
                <?php if (!empty($_GET['erreur'])) {
                    if ($_GET['erreur']) {
                        echo ("Formulaire incorrect");
                    }
                };  ?>
            </div>

            <label for="nom">Nom :</label>
            <input type="text" name="nom" id="nom" value="Dupont">
            <label for=" prenom">Prénom :</label>
            <input type="text" name="prenom" id="prenom" value="Pierre">
            <label for="email">Email :</label>
            <input type="email" name="email" id="email" value="plazdzaop@gmail.com">
            <label for="telephone">Téléphone :</label>
            <input type=" text" name="telephone" id="telephone" value="0612345678">
            <label for="adressePostale">Adresse Postale :</label>
            <input type="text" name="adressePostale" id="adressePostale" value="4 rue Victor Hugo 38000 Grenoble">
            <label for="password">Mot de passe :</label>
            <input type="password" name="password" id="password" value="azdazdazd">
            <label for="passwordBis">Confirmer votre mot de passe :</label>
            <input type="password" name="passwordBis" id="passwordBis" value="azdazdazd">

            <input type="submit" class="bouton" value="s'inscrire">
        </div>
    </form>
</body>

<!-- <script src="./script.js"></script>
<script src="./traitement.js"></script> -->

</html>