<?php include('server.php') /* Lien pour inclure le page server.php */?>
<?php include('menu.php') /* Lien pour inclure le page menu.php */ ?>
<?php
  
    if(isset($_POST['login'])) { 
        if(!empty($_POST['username'])) {
            if(!empty($_POST['email'])) {
                $username = htmlentities($_POST['username']);
                $req = $dbh->prepare('SELECT username, email, id_user
                                      FROM users
                                      WHERE username = :username');
                $req -> execute(array(
                    'username' => $username));
                $resultat = $req->fetch();
                
                }
            } else { $error = 'Saisissez votre email'; }
        } else { $error = 'Saisissez votre speudo'; }
    
?>

<!DOCTYPE html>
<html>
	<head>
        <meta charset="UTF-8">
		<link rel="stylesheet" type="text/css" href="CSS/StyleFormulaire.css">
	</head>
<body>
    <br /><br /><br />
    <div class="header">
        <h2>Nouveau Mot de Passe</h2>
    </div>

    <!-- Formulaire de Modification MDP -->   
    <form method="post" action="NewMDP.php">

        <!-- Formulaire partie Pseudo --> 
        <div class="input-group">
            <label for="username">Pseudo</label>
            <input type="text" name="username"  placeholder="Pseudo" required/>
        </div>

        <!-- Formulaire partie Mail --> 
        <div class="input-group">
            <label for="email">Adresse Mail</label>
            <input type="email" name="email" placeholder="Email" required/>
        </div>

        <!-- Formulaire partie MDP --> 
        <div class="input-group">
            <label for="mdp">Mot de passe</label>
            <input type="password" name="mdp" placeholder="Mot de passe" required/>
        </div>

        <!-- Formulaire partie MDP --> 
        <div class="input-group">
            <label for="mdp">Mot de passe</label>
            <input type="password" name="mdp" placeholder="Mot de passe" required/>
        </div>

        <!-- Formulaire partie Bouton --> 
        <div class="input-group">
            <button type="submit" class="btn" name="login" placeholder="login">Test de Connexion</button>&nbsp; 
            <button type="reset" class="btn" value="Reset">Reset</button>
        </div>

        <!-- Redirection si pas membre --> 
        <p>Vous n'êtes pas encore membre ? <a href="register.php">Inscription ici</a></p>
        <p>Vous vous souvenez de votre mot de passe ? <a href="login.php">Cliquez ici</a></p>
    </form>
</body>
</html>