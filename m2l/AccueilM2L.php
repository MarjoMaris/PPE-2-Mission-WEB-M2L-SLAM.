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
                <?php echo $redirectionIndex; ?> 
    <center>
        <h1>Accueil Principal</h1>
        <br /> 
            <div id="m2l">
                <h2>• En savoir plus sur la Maison Des Ligues •</h2>
                <br /> 
                <img src="img/m2l_1.jpg"width="120" height="120"/> <!-- Affichage des images -->
                <img src="img/m2l_2.jpg"width="120" height="120"/> 
                <img src="img/m2l_3.jpg"width="120" height="120"/>
                <img src="img/m2l_4.jpg"width="120" height="120"/>
                <img src="img/m2l_5.jpg"width="120" height="120"/>
                <br /> <br /> <br /> 
                <!-- Affichage du textes -->
                <p>Une maison au service du sport En décidant en 2000 de l'acquisition et la 
                    réhabilitation de la Maison Régionale des Sports de Lorraine à Tomblaine, 
                    la région Lorraine a voulu répondre à des besoins de structuration du mouvement 
                    sportif lorrain,<br> qui représente aujourd'hui 6 500 clubs, plus de 525 000 licenciés et près de 50 000 bénévoles.</p>
                <p>Véritable lieu de vie, cette Maison propose aux Ligues et Comités, des locaux 
                    fonctionnels situés à l'est de Nancy, permettant ainsi aux dirigeants, aux bénévoles 
                    et aux salariés d'échanger, de partager, de se <br>former et de se regrouper dans des conditions
                    optimales.Ce sont ici plus de 3 550 clubs lorrains, toutes disciplines confondues, qui bénéficient 
                    de cet outil. Un tel établissement est à la fois un facteur fort de cohésion et de qualité du sport régional.</p>
                <p>Il a pour vocation d'héberger les structures sportives régionales, de leur fournir des services administratifs, 
                    comptables et juridiques. Entièrement financée par la région Lorraine, la Maison Régionale des Sports de Lorraine 
                    est gérée en partenariat<br> par la région Lorraine et le Comité Régional Olympique et Sportif de Lorraine (CROSL) qui 
                    est l'initiateur d'une politique sportive régionale unitaire.</p>
            </div>
        </center>
    </body>
</html>