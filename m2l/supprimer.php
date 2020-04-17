<?php
//lien avec la BDD
include "functions/dbfunction.php";
$dbh = db_connect(); //on appelle la fonction de connexion à la BDD

//requête sql de suppression

    $sql = "DELETE FROM faq WHERE id_faq=:id_faq";
    
    try {
        $sth = $dbh->prepare($sql);
        $sth->execute(array(
        ':id_faq' => $_GET["id"]
        ));

        } catch (PDOException $ex) {
        die("Erreur lors de la requête SQL : ".$ex->getMessage());
        }  
              
        header('Location: list.php');?>