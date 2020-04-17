<?php
        include ('server.php'); /* Inclue la page server.php */
        include ('menu.php'); /* Inclue la page menu.php */ 
?>

<?php
  
       if(isset($_SESSION['username'])) // Si i y a une valeur dans "username"
        {
             header('Location: addquestion.php');
        }

    if(isset($_POST['login'])) {
        if(!empty($_POST['username'])) {
            if(!empty($_POST['mdp'])) {
                $username = htmlentities($_POST['username']);
                //Vérification que les données rentrés sont dans la BDD
                $req = $dbh->prepare('SELECT username, mdp, id_usertype, id_user, id_ligue 
                                      FROM users
                                      WHERE username = :username');
                $req -> execute(array('username' => $username));
                $resultat = $req->fetch();

                $isPasswordCorrect = password_verify($_POST['mdp'], $resultat['mdp']);

                //Si $resultat pas = aux données rentrés alors...
                if (!$resultat) {
                    $error = 'Mauvais identifiant ou mot de passe !';
                } else { //Si le $resultat = aux données rentrés alors...
                    if ($isPasswordCorrect) { // $isPasswordCorrect = au mdp entré dans la base alors
                        $_SESSION['username'] = $resultat['username'];
                        $_SESSION['id_usertype'] = $resultat['id_usertype'];
                        $_SESSION['id_user'] = $resultat['id_user'];
                        $_SESSION['id_ligue'] = $resultat['id_ligue'];
						
						//Redirection
                        header('Location: addquestion.php');
                    } else {
                        $error = 'Mauvais identifiant ou mot de passe !';
                    }
                }
            } else { $error = 'Saisissez votre mot de passe'; }
        } else { $error = 'Saisissez votre adresse mail'; }
    }
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
        <h2>Connexion</h2>
    </div>

    <!-- Formulaire de Connexion -->   
    <form method="post" action="login.php">

        <!-- Formulaire partie Pseudo --> 
        <div class="input-group">
            <label for="username">Pseudo</label>
            <input type="text" name="username"  placeholder="Pseudo" required/>
        </div>

        <!-- Formulaire partie MDP --> 
        <div class="input-group">
            <label for="mdp">Mot de passe</label>
            <input type="password" name="mdp" placeholder="Mot de passe" required/>
        </div>

        <!-- Formulaire partie Mail --> 
        <div class="input-group">
            <button type="submit" class="btn" name="login" placeholder="login">Connexion</button>&nbsp; 
            <button type="reset" class="btn" value="Reset">Reset</button>
        </div>

        <!-- Redirection si pas membre --> 
        <p>Vous n'êtes pas encore membre ? <a href="register.php">Inscription ici</a></p>
        <p>Vous avez perdu votre mot de passe ? <a href="NewMDP.php">Cliquez ici</a></p>
    </form>
</body>
</html>