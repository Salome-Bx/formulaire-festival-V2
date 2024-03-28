<?php
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulaire d'inscription</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Satisfy&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../../Public/assets/script.js">
    <link rel="stylesheet" href="../../Public/assets/responsive.css">
</head>

<body>
    <?php include __DIR__ . '/includes/header.php'; ?>
    <form action="./../Controllers/UserController.php" id="inscriptionUser" method="POST">
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
            <input type="text" name="nom" id="nom" placeholder="Dupont">
            <label for=" prenom">Prénom :</label>
            <input type="text" name="prenom" id="prenom" placeholder="Pierre">
            <label for=" email">Email :</label>
            <input type=" email" name="email" id="email" placeholder="email@gmail.com">
            <label for="telephone">Téléphone :</label>
            <input type=" text" name="telephone" id="telephone" placeholder="0612345678">
            <label for="adressePostale">Adresse Postale :</label>
            <input type="text" name="adressePostale" id="adressePostale" placeholder="4 rue Victor Hugo 38000 Grenoble">
            <label for="password">Mot de passe :</label>
            <input type="password" name="password" id="password" placeholder="Entrer un mot de passe avec 6 caractères minimum">
            <label for="passwordBis">Confirmer votre mot de passe :</label>
            <input type="password" name="passwordBis" id="passwordBis" placeholder="Entrer un mot de passe avec 6 caractères minimum">

            <input type="submit" name="soumission" class="bouton" value="Réserver">
            <p class="bouton" onclick="precedent(blocCoordonnees, blocOptions)">Précédent</p>

        </div>
    </form>
</body>

<!-- <script src="./script.js"></script>
<script src="./traitement.js"></script> -->

</html>