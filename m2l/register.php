<?php include ('server.php');

	if(isset($_SESSION['username']))
	{
		header('Location: index.php');
	}

	//Validé les informations inscrites
	if(isset($_POST['register']))
	{
		if(!empty($_POST['username'])) 
		{
			if(!empty($_POST['mdp'])) 
			{
				if(!empty($_POST['email'])) 
				{
					if(!empty($_POST['ligue']))
					{
							$username = htmlentities($_POST['username']); // htmlentites = Convertit tous les caractère éligible en entités Html
							$email = htmlentities($_POST['email']);
							$ligue = htmlentities($_POST['ligue']);
							$usertype = '1';
											 
							// Criptage du mot de passe
							$pass_criptage = password_hash($_POST['mdp'], PASSWORD_DEFAULT);

							// Insertion dans la base de donnée
							$req = $dbh->prepare('INSERT INTO users(username, mdp, email, id_usertype, id_ligue) 
												VALUES(:username, :mdp, :email, :usertype, :id_ligue)');
							$req->execute(array(
								'username' => $username,
								'mdp' => $pass_criptage,
								'email' => $email,
								'usertype' => $usertype,
								'id_ligue' => $ligue));

								header('Location: index.php'); //Redirection
	
							$req->closeCursor();

					 } else { $error = 'Saisissez une ligue'; } /* Erreur pour $_POST['ligue'] */ 
				 } else { $error = 'Saisissez une adresse mail'; } /* Erreur pour $_POST['email'] */ 
			 } else { $error = 'Saisissez un mot de passe'; }  /* Erreur pour $_POST['mdp'] */ 
		 } else { $error = 'Saisissez un pseudo'; }  /* Erreur pour $_POST['username'] */ 
	 }
?>
<?php include ('menu.php'); ?>

<!DOCTYPE html>
<html>
<head>
  <title>Inscription</title>
  <link rel="stylesheet" type="text/css" href="CSS/StyleFormulaire.css">
</head>
<body>
	<br /><br /><br />
  <div class="header">
  	<h2>Inscription a la FAQ</h2>
  </div>
	
  <!-- Formulaire pour l'inscription --> 
  <form method="post">
		<!-- Formulaire partie Pseudo : ajout du Speudo --> 
		<div class="input-group">
		<label for='username'>Pseudo</label>
		<input type="text" name="username"  placeholder="Username" required/>
		</div>

		<!-- Formulaire partie Email : ajout de l'email --> 
		<div class="input-group">
		<label for='email'>Email</label>
		<input type="email" name="email" placeholder="Adresse mail" required/> 
		</div>

		<!-- Formulaire partie MDP : ajout du MDP--> 
		<div class="input-group">
		<label>Mot de passe</label>
		<input type="password" name="mdp" placeholder="Mot de passe" required/>
		</div>

		<!-- Formulaire partie Ligue : Choix de la ligue --> 
		<div class="input-group">
			<label for="ligue"></label>
				<select name="ligue">
					<option value="1">Ligue de football</option>
					<option value="2">Ligue de basket</option>
					<option value="3">Ligue de volley</option>
					<option value="4">Ligue de handball</option>
				</select>
		</div>
		<!-- Formulaire partie Enregistrement --> 
		<div class="input-group">
		<button type="submit" class="btn" name="register">Enregistrer</button>
		</div>

	 	<!-- Lien pour se connecter, si déjà inscrit -->
		<p> Deja membre ? <a href="login.php">Connexion ici</a> </p>
  </form>
</body>
</html>