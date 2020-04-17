<?php 
        include ('server.php'); /* Inclue la page server.php */
        include ('menu.php'); /* Inclue la page menu.php */ 
?>
<?php 
    $id = $_GET["id"];
    include "functions/dbfunction.php"; // Lien pour inclure la base de donnée
    $dbh = db_connect(); //On appelle la fonction de connexion à la BDD
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>M2L - Modifier une question</title>
    </head>
    <body>
               <!-- Affichage d'une image ainsi que l'appel du speudo -->
               <p>&nbsp;<img src="icones/IconeInvite.png"width="40" height="40"/>&nbsp;Bienvenue, <?php echo $username; ?></p> 
                <!-- Appel de la variable de la page serveur.php -->
                <?php echo $redirectionIndex; ?> 
                
                <center>
                    <h1><u>M2L - Modifier une question</u></h1>
                </center>

                <center>
                <?php 

                    //On vérifie si les valeurs existe, sinon, "vide"
                    $question = (isset($_POST['question'])) ? $_POST['question'] : '';
                    $reponse = (isset($_POST['reponse'])) ? $_POST['reponse'] : '';
                    $id = $_GET["id"];

                    if(isset($_POST['submit'])) {
                        $id = $_GET["id"];

                        //Commande SQL
                        $sql = "UPDATE faq SET question= :question, reponse= :reponse, dat_reponse = NOW()
                                WHERE id_faq= :id_faq";
                        echo "$sql";

                        try {
                            $sth = $dbh->prepare($sql); // Vérifie la syntaxe SQL
                            $sth->execute(array( // Remplace les étiquettes par des valeurs et exécute la requete
                            ':question' => $question,
                            ':reponse' => $reponse,
                            ':id_faq' => $id,
                        ));
                        } catch (PDOException $ex) {
                            die("Erreur lors de la requête SQL : ".$ex->getMessage());
                        }

                        header('Location: list.php'); //Redirection automatique vers la page list.php

                    } else {
                                $dbh = db_connect(); //on appelle la fonction de connexion à la BDD
                                //Commande pour la base de donnée
                                $sql = "SELECT * FROM faq 
                                        WHERE id_faq=:id_faq";
                                try {
                                    $sth = $dbh->prepare($sql); // Vérifie la syntaxe SQL
                                    $sth->execute(array( // Remplace les étiquettes par des valeurs et exécute la requete
                                    ':id_faq' => $id
                                    ));
                                    $row = $sth->fetch(PDO::FETCH_ASSOC); }
                                    catch (PDOException $ex) {
                                        die ("Erreur lors de la requête SQL : ".$ex->getMessage());
                                    }
                            }

                ?>

                <br />
                <!-- Formulaire -->
                <form action ="modifier.php?id=<?php echo $id; ?>" method="post">
                    <p><strong>Question : </strong><input class="formulaire" type="text" name="question" value="<?php echo $row["question"] ?>"/></p>
                    <p><strong>Réponse : </strong><input class="formulaire" type="text" name="reponse" value="<?php echo $row["reponse"] ?>"/></p>
                    <p><input class="sub1" type="submit" name="submit" value="envoyer"> <input class="sub2" type="submit" value="réinitialiser"></p>
                </form>

                <?php echo '<p>Liste des <a href="list.php" class="blue"> questions</a></br></p>'; //Lien vers la page list.php ?>
            <center>
            </body>
</html>