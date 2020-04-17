<?php
  session_start();
  //Connextion à la base de donnée
  try {
      $dbh = new PDO('mysql:host=localhost;dbname=m2l', 'root', '', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
    } catch (Exception $e) {
        die('Erreur : ' . $e->getMessage());
    }

    // Vérification de la validité des informations
    $error = '';

  // INSCRIPTION UTILISATEUR
    if (isset($_SESSION['username'])) 
    {
        $username = $_SESSION['username'];
        $id_user = $_SESSION['id_user'];
        $id_usertype = $_SESSION['id_usertype'];
        $redirectionIndex = "<p>&nbsp;&nbsp;Vous êtes connecté</p>";
        
        //Création d'un formulaire pour les questions
        $AffichageAddQuestion =
        '<form method="post">
            <label for="question">Question</label><br/>
            <textarea name="question"></textarea>
            <button type="submit" name="AddQuestion" rows="4" cols="100">Enregistrer</button>
        </form>';
     } 

     else 
     {
        $username = 'invité';
        $redirectionIndex = '<p> &nbsp;&nbsp; Pour continuer, vous devez vous connecter ou vous inscrire</p>';
        $AffichageAddQuestion = '<p>Erreur</p>';
     }
  ?>