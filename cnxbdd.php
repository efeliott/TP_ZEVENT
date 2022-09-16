<!DOCTYPE html>
<html lang="fr">
<head>
    <link rel="stylesheet" href="style.css">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Récupération des données de BDD ZEVENT</title>
</head>
<body>
    <?php

        $user = 'root';
        $pass = '';

        try
        {
            //connexion a la BDD avec un objet PDO
            $db = new PDO ('mysql:host=localhost;dbname=z_bdd', $user, $pass);
            
            $requete = "SELECT * FROM participant";
            $result = $db->query($requete);

            //vérifie si la récupération des données a réussi
            if(!$requete)
            {
                echo "La récupération des données a échoué";
            }
            else
            {
                $nbr_participant = $result->rowCount();
            }
        }
        //affiche l'erreur en cas de problème a la connexion
        catch (PDOException $e)
        {
            print "Erreur:" . $e->getMessage() . "<br/>";
            die;
        }

    ?>
    
    <h3>Tout les participants</h3>
    <h4>Il y a <?=$nbr_participant?> participant(s)</h4>

    <!-- organise les données de la BDD en tableau -->
    <table border="1">
        <tr>
            <th>Id participant</th>
            <th>Nom participant</th>
            <th>Prénom participant</th>
        </tr>
        <?php
            //va récupérer chaque donnée pour les mettre dans le tableau
            while($ligne = $result->fetch(PDO::FETCH_NUM))
            {
                echo "<tr>";
                foreach ($ligne as $valeur)
                {
                    echo "<td>$valeur</td>";
                }
                echo "</tr>";
            }
        ?>
    </table>
    <?php
    //libère la connexion au serveur
        $result->closeCursor();
    ?>
</body>
</html>
