<?php 
$username =$_POST['username'];
$password =$_POST['password'];
// Connexion à la bdd
 $db_server   = "127.0.0.1";
 $db_username= "root";
  $db_pwd  = "";
   $db_name = "bdd-ihebchargui";
    $cnx = new PDO("mysql: host=$db_server; dbname=$db_name", $db_username, $db_pwd); 
 
// Vérifier que les codes d’accès sont corrects
 $res = $cnx->query("SELECT * FROM admin WHERE username='$username' AND password='$password'");
 $user = $res->fetch(); 
 
if ($user){ // Les codes sont corrects  
  // Ouvrir une session    
  session_start();
   // Créer une variable de session appelée 'id_etudiant' initialisée    
  // à l'identifiant de l'étudiant connecté 
      $_SESSION['id_user'] = $user['id'];      
  // Redirection vers le tableau de bord "dashboard.php"     
  header("Location:dashboard.php"); 
   }
    else{
 // Les codes sont faux   
  echo "Erreur de connexion ! Veuillez vérifier vos code d'accès";
   } 
 ?>