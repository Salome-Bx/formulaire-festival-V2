<form action="<?= $action == "inscription" ? "/inscription/new" : "/dashboard/monprofil/edit" ?>" id="inscriptionUser" method="POST">
    <div id="coordonnees" class="blocFormulaire">

        <?php $action == "inscription" ? "<h2>S'inscrire :</h2>" : "<h2>Mettre à jour mon profil :</h2>" ?>

        <label for="nom">Nom :</label>
        <input type="text" name="nom" id="nom" value="<?= isset($User) ? $User->getLastName() : "" ?>">
        <label for=" prenom">Prénom :</label>
        <input type="text" name="prenom" id="prenom" value="<?= isset($User) ? $User->getFirstName() : "" ?>">
        <label for="email">Email :</label>
        <input type="email" name="email" id="email" value="<?= isset($User) ? $User->getMail() : "" ?>">
        <label for="telephone">Téléphone :</label>
        <input type=" text" name="telephone" id="telephone" value="<?= isset($User) ? $User->getTelephone() : "" ?>">
        <label for="adressePostale">Adresse Postale :</label>
        <input type="text" name="adressePostale" id="adressePostale" value="<?= isset($User) ? $User->getAddress() : "" ?>">
        <label for="password">Mot de passe :</label>
        <input type="password" name="password" id="password" value="<?= isset($User) ? $User->getPassword() : "" ?>">
        <label for="passwordBis">Confirmer votre mot de passe :</label>
        <input type="password" name="passwordBis" id="passwordBis" value="<?= isset($User) ? $User->getPassword() : "" ?>">

        <input type="submit" class="bouton" value="<?= isset($User) ? "modifier" : "s'inscrire" ?>">

    </div>
</form>