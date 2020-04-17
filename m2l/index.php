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
        <br /><br /><br /><br /><br />
          <!-- Affichage d'une image ainsi que l'appel du speudo -->
          <p>&nbsp;<img src="icones/IconeInvite.png"width="40" height="40"/>&nbsp;Bienvenue, <?php echo $username; ?></p>
          <!-- Appel de la variable de la page serveur.php -->           
          <?php echo $redirectionIndex;?>
          
        <center>
            <h1>Accueil FAQ</h1>
            <br />
            <h2>Bienvenur sur la FAQ</h2>
            <br />
            <p>Pour vous inscrire  ,<a href="register.php"> cliquez ici<img src="icones/IconeConnexion.png"width="35" height="35"/></a></p> <!-- Lien vers la page d'insciption soit register.php -->
            <p>Pour vous connecter  ,<a href="login.php"> cliquez ici <img src="icones/IconeInscription.png"width="35" height="35"/></a></p> <!-- Lien vers la page de connection soit login.php -->
            <br />
            <div id="m2l">
            <h4>• En savoir plus sur le fonctionnement de la FAQ •</h4>
                <br /> 
                <img src="img/FAQ1.PNG"width="800" height="400"/>
                <br /> <br /><br /> 
            </div>
        </center>
    </body>
</html>