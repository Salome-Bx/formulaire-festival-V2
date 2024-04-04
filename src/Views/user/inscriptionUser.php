<form action="<?= $action == "inscription" ? "/inscription/new" : "/dashboard/monprofil/edit" ?>" id="inscriptionUser" method="POST" class="flex flex-col m-auto w-1/2">
    <div id="coordonnees" class="blocFormulaire flex flex-col m-auto w-1/2">

        <?php $action == "inscription" ? "<h2>S'inscrire :</h2>" : "<h2>Mettre à jour mon profil :</h2>" ?> <label for="nom">Nom :</label>
        <input type="text" name="nom" id="nom" class="mb-1" value="<?= isset($User) ? $User->getLastName() : "" ?>">
        <label for=" prenom">Prénom :</label>
        <input type="text" name="prenom" id="prenom" class="mb-1" value="<?= isset($User) ? $User->getFirstName() : "" ?>">
        <label for="email">Email :</label>
        <input type="email" name="email" id="email" class="mb-1" value="<?= isset($User) ? $User->getMail() : "" ?>">
        <label for="telephone">Téléphone :</label>
        <input type=" text" name="telephone" id="telephone" class="mb-1" value="<?= isset($User) ? $User->getTelephone() : "" ?>">
        <label for="adressePostale">Adresse Postale :</label>
        <input type="text" name="adressePostale" id="adressePostale" class="mb-1" value="<?= isset($User) ? $User->getAddress() : "" ?>">
        <label for="password">Mot de passe :</label>
        <input type="password" name="password" id="password" class="mb-1" value="<?= isset($User) ? $User->getPassword() : "" ?>">
        <label for="passwordBis">Confirmer votre mot de passe :</label>
        <input type="password" name="passwordBis" id="passwordBis" class="mb-1" value="<?= isset($User) ? $User->getPassword() : "" ?>">

        <input type="submit" class="bouton m-2 bg-sky-900 text-white rounded" value="<?= isset($User) ? "modifier" : "s'inscrire" ?>">

    </div>
</form>