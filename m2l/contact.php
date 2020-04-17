<?php
        include ('server.php'); /* Inclue la page server.php */
        include ('menu.php'); /* Inclue la page menu.php */ 
?>

<!DOCTYPE html>
<html>
    <head>
            <title>M2L</title>
            <meta charset="utf-8"/>
            
    </head>
    <body>
        <br /><br /><br /><br />
            <!-- Affichage d'une image ainsi que l'appel du speudo -->
            <p>&nbsp;<img src="icones/IconeInvite.png"width="40" height="40"/>&nbsp;Bienvenue, <?php echo $username; ?></p>
            <!-- Appel de la variable de la page serveur.php -->           
            <?php echo $redirectionIndex;?>

        <center>
            <h1>Contact</h1>
            <br /> 
            <h4>• Merci d'avoir regarder ce site •</h4>
            <br /> 
                <div id="m2l">
                    <h5> Retrouver nous sur </h5>
                    <h5> Linkedin : <a href="https://fr.linkedin.com/in/marjorie-maris-34255a172">Marjorie</a> / <a href="https://www.linkedin.com/in/luc-poytes-b74379173/">Luc</a></h5> <!-- Lien pour Linkedin -->
                    <br />
                    <img src="img/meme.jpg"width="900" height="550"/> <!-- Affichage image -->
                </div>
        </center>
    </body>
</html>