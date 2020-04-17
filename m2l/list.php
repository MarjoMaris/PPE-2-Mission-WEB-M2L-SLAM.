<?php
        include ('server.php'); /* Inclue la page server.php */
        include ('menu.php'); /* Inclue la page menu.php */ 
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>FAQ de la ligue de football</title>
        <link rel="stylesheet" type="text/css" href="CSS/styleFAQ.css">
    </head>
    <body>
            <br /><br /><br /><br />
            <!-- Affichage d'une image ainsi que l'appel du speudo -->
            <p>&nbsp;<img src="icones/IconeInvite.png"width="40" height="40"/>&nbsp;Bienvenue, <?php echo $username; ?></p>
            <!-- Appel de la variable de la page serveur.php -->           
            <?php echo $redirectionIndex;?>

            <br /><br />
            <center> 
                <h1><u>Liste des questions de la FAQ</u></h1>
                <br />
            </center>
    </body>
</html>

<center> 
    <?php

        $i=0;

        include "functions/dbfunction.php"; // Lien pour inclure la base de donnée

        $dbh = db_connect(); // Connexion à la BDD

        $sql = "SELECT U.username, F.* 
                FROM users AS U, faq AS F 
                WHERE F.id_user = U.id_user"; //Commande sql pour afficher les données rentré dans la base de donnée
        try {
            $sth = $dbh->prepare($sql); // Vérifie la syntaxe SQL
            $sth->execute(); // Remplace les étiquettes par des valeurs et exécute la requete
            $rows = $sth->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $ex) {
        die("Erreur lors de la requête SQL : " . $ex->getMessage());
        }

        //Création du tableau
        // Si $row n'est pas > à 0 alors afficage du tableau 
        if (count($rows)>0) {
            echo "<table>"; 
                echo "<tr><th>Nr</th>
                        <th>Auteur</th>
                        <th>Question</th>
                        <th>Réponse</th>";

                        //Condition pour les Admins et SuperAdmin -> Pour les droits supplémentaires
                        if($id_usertype == 3 || $id_usertype == 2) {
                            echo '<th>Actions</th>';
                        }
                        "</tr>";

                foreach ($rows as $row) {
                    echo "<tr>"; 
                        echo "<td>".$row["id_faq"]. "</td>"; 
                        echo "<td>".$row["username"]. "</td>";
                        echo "<td>".$row["question"]. "</td>";
                        echo "<td>".$row["reponse"]. "</td>";
                                
                        if ($id_usertype == 3 || $id_usertype == 2) {
                            echo '<td>
                                    <a href="modifier.php?id='.$row["id_faq"].'"><img src="icones/pencil.png" width=22px height=22px title="Modifier">
                                    <a href="supprimer.php?id='.$row["id_faq"].'"><img src="icones/delete.png" width=22px height=22px title="Supprimer"></br></td></a>
                                    </td>';
                        } else {
                            echo '';
                        }   
                    echo "</tr>";
                    
                }

            echo "</table>";
            echo"<br />";
            // Calcul le nombre de valeur rentrée soit le nombre de question
            echo "<p>Il y a ".$sth->rowcount()." valeur(s) entrée(s)</p>"; 
            echo '<td><a href="addquestion.php"><img src="icones/addQuestion.png" width=22px height=22px title="Ajouter"> Ajouter une question</a></br></td>';
            echo "<br>";

        } 
        else {
            echo "<p>Rien à afficher</p>";
        }

    ?>
    <p>Pour poser d'autres questions  ,<a href="addquestion.php"> cliquez ici</a></p>
</center>
