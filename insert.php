<?php

    //connexion à la base de données
    $user = 'root';
    $pass = '';

    try
    {
        $objetPDO = new PDO ('mysql:host=localhost;dbname=z_bdd', $user, $pass);
        
        //préparation de la requête d'insert
        $pdoStat = $objetPDO->prepare('INSERT INTO participant (nom_participant, prenom_participant) VALUES (:nom_participant, :prenom_participant)');

        //liaison de chaque marqueur à une valeur
        $pdoStat->bindValue(':nom_participant', $_POST['firstName'], PDO::PARAM_STR);
        $pdoStat->bindValue(':prenom_participant', $_POST['lastName'], PDO::PARAM_STR);

        //exécution de la requête préparée
        $insertIsOk = $pdoStat->execute();

        if($insertIsOk)
        {
            $message = 'Le participant a été ajouté';
        }
        else
        {
            $message = 'Echec de l insertion';
        }
    }
    catch (PDOException $e)
    {
        print "Erreur:" . $e->getMessage() . "<br/>";
        die;
    }

?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <link rel="stylesheet" href="style.css">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <!-- affiche le message de reussite ou echec -->
    <h1>Insertion des contacts</h1>
    <p><?php echo $message ?></p>
</body>
</html>