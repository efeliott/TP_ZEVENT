<!DOCTYPE html>
<!--
    FERTILLE Eliott le 12/09/2022
    Derniere Modification le 12/09/2022
    Index pour l'acces bdd du TP ZEVENT
-->
<html lang="fr">
<head>
    <link rel="stylesheet" href="style.css">
    <meta charset="UTF-8">
    <title>Accueil</title>
</head>
<body>
    <a href=".//cnxbdd.php">Afficher tout les participants</a><br>

    <h1>Ajouter un participant</h1>
    <form action=".//insert.php" method="post">
        <p>
            <label for="nom">Nom</label>

            <input id="nom_participant" type="text" name="firstName">
        </p>

        <p>
            <label for="prenom">Prenom</label>

            <input id="prenom_participant" type="text" name="lastName">
        </p>
        <input type="submit">
    </form>

</body>
</html>