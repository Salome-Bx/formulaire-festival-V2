<form action="<?= $action == "inscription" ? "/inscription/new" : "/dashboard/monprofil/edit" ?>" id="inscriptionUser" method="POST" class="flex flex-col m-auto w-1/2">
    <div id="coordonnees" class="blocFormulaire flex flex-col m-auto w-1/2">

        <?= $action == "nouveau" ? "<h2 class='text-center font-bold'>Mon profil :</h2>" : "<h2 class='text-center font-bold'>Mettre à jour mon profil :</h2>" ?>

        <label for="nom">Nom :</label>
        <input type="text" name="nom" id="nom" value="Dupont" class="mb-1">
        <label for=" prenom">Prénom :</label>
        <input type="text" name="prenom" id="prenom" value="Pierre" class="mb-1">
        <label for="email">Email :</label>
        <input type="email" name="email" id="email" value="email@gmail.com" class="mb-1">
        <label for="telephone">Téléphone :</label>
        <input type=" text" name="telephone" id="telephone" value="0612345678" class="mb-1">
        <label for="adressePostale">Adresse Postale :</label>
        <input type="text" name="adressePostale" id="adressePostale" value="4 rue Victor Hugo 38000 Grenoble" class="mb-1">
        <label for="password">Mot de passe :</label>
        <input type="password" name="password" id="password" value="azdazdazd" class="mb-1">
        <label for="passwordBis">Confirmer votre mot de passe :</label>
        <input type="password" name="passwordBis" id="passwordBis" value="azdazdazd" class="mb-1">

        <input type="submit" class="bouton m-2 bg-sky-900 text-white rounded" value="s'inscrire">
    </div>
</form>