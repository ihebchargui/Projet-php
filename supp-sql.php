<?php
 // Récupérer l'id à supprimer
  $id = $_GET['id'];
 
// Connexion à la bdd 
  include"conexion.php";
 
// Supprimer l'enregistrement
 $cnx->exec("DELETE  FROM reservation where id=$id"); 
 
// Redirection à la page principale 
 header("Location:dashboard.php"); 
 ?>