<?php
        include ('server.php'); /* Inclue la page server.php */
        include ('menu.php'); /* Inclue la page menu.php */ 
?>


<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Document</title>
    </head>
    <body>
        <br /><br /><br /><br />
            <!-- Affichage d'une image ainsi que l'appel du speudo -->
            <p>&nbsp;<img src="icones/IconeInvite.png"width="40" height="40"/>&nbsp;Bienvenue, <?php echo $username; ?></p>
            <!-- Appel de la variable de la page serveur.php -->           
            <?php echo $redirectionIndex;?>

            <br /><br />  
            <center>
                <h1>Ajouter une question à la FAQ</h1>
                <h2>Veuillez saisir votre question</h2>
                <br />
                <img src="img/question.jpg"width="800" height="400"/>

                <!-- Formulaire pour ajouter une question -->
                <form action ="addquestion.php" method="post"> 
                    <br />
                    <p>Ajouter une question</p>     
                    <textarea name="question" rows="4" cols="120"></textarea>
                    <br/><br />
                    <p> <!-- Bouton --> 
                        <input type="submit" name="submit" value="envoyer">
                        <input type="submit" name="submit" value="réinitialiser">
                    </p> 
                </form>
            </center>
    </body>
</html>
<br />
<center>

    <?php 
        
        echo '<td>Veuillez <a href="list.php">cliquer ici</a> pour pouvoir accèder aux questions 
                  <br /> Pour ainsi voir les réponses';  // Lien vers le page list.php
        echo '<br /> <br />';

        include "functions/dbfunction.php"; // Lien pour inclure la base de donnée

        $dbh = db_connect(); // Connexion BDD
        $id_user2 = $_SESSION['id_user']; // Pends la valeur contenu dans id_user

        if(isset($_POST['submit'])) { //Si il y a une valeur dans le bouton 
            //Requete sql
            $sql = "INSERT INTO faq  (question, dat_question, id_user) VALUES (:question, NOW(), :id_user)"; 

            try {
                $sth = $dbh->prepare($sql); // Vérifie la syntaxe SQL
                $sth->execute(array( // Remplace les étiquettes par des valeurs et exécute la requete en créant un tableau "array"
                    ':question' => $_POST["question"],
                    ':id_user' => $id_user2
                ));
            } catch (PDOException $ex) {
            die("Erreur lors de la requête SQL : ".$ex->getMessage()); // Si erreur affichage Message Erreur
            }

        }
    ?>       
</center> 