<?php
 // Ouvrir une session 
 session_start();
 
// Vérifier que l'étudiant connecté a saisi ses codes correctement
 if( !isset($_SESSION['id_user']) )  // Accès non authentifié ! 
 { 
 // Afficher un message d'erreur   
   echo "Veuillez vous connecter !";     
   // Arrêter l'exécution de ce script    
    exit();
     } 
 
$id_user = $_SESSION['id_user'];
 // Connexion à la bdd
  include"conexion.php";
 

  
  ?> 
  <!DOCTYPE html> 
  <html>
   <head>
        <meta charset="utf-8" />    
         <title>Espace Admin - Dashboard</title>
   </head>
    <body>    
     <h1>Espace Admin - Dashboard</h1>  
        les reservation  : <?php     
      
       $res_reservation = $cnx->query("SELECT * from reservation");    
       $les_reservation = $res_reservation->fetchAll(); // Ceci est un tableau de tableaux associatifs     
       // Calculer le nombre d'étudiants    
        $nbr_reservation = count($les_reservation);       
          if($nbr_reservation==0){        
           // Afficher un message si la liste est vide        
            echo "<b>Aucune reservation pour le moment !</b>";   
              }  
            else 
             { 
             //echo "<b> Reservation placed successfully !</b>";

              // Afficher la liste des reservation sous forme de liste ordonnée      
              echo "Il y $nbr_reservation reservations ";        
                  echo "<ol>";   
                  foreach ($les_reservation as $item) {
                  echo "<li>" . $item['nom'] . " : " . $item['email'] .": " . $item['phone']   .": " . $item['date_res']   .": " . $item['time'].": " . $item['nb_personne']   ;
                    
                  }   
                      echo "</ol>";
                        }
                        ?>  
                        <a href='logout.php'>                Déconexion       </a>  
         <hr/>     
          
    </body>
  </html> 
 