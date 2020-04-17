
<?php
        include ('server.php'); /* Inclue la page server.php */
        include ('menu.php'); /* Inclue la page menu.php */ 
?>

<!DOCTYPE html>
<html>
    <head>
            <meta charset="utf-8"/>
            <title>M2L</title>
    </head>
    <body>
        <br /><br /><br /><br />

                <!-- Affichage d'une image ainsi que l'appel du speudo -->
                <p>&nbsp;<img src="icones/IconeInvite.png"width="40" height="40"/>&nbsp;Bienvenue, <?php echo $username; ?></p> 
                 <!-- Appel de la variable de la page serveur.php -->
                <?php echo $redirectionIndex;?>

        <center>
            <h1>Accueil Foot</h1>
            <br /> 
            <p>Pour tout questionnement ,<a href="index.php">  cliquez ici</a></p>   <!-- Lien vers la page index.php -->
            <h3></h3>
            <br /> 
                <div id="m2l">
                    <h4>• En savoir plus sur la Ligue de Foot •</h4>
                    <br /> 
                    <img src="img/Foot1.jpg"width="900" height="550"/>
                    <br /> <br /> <br /> 
                </div>
        </center>
    </body>
</html>