<?php
 // Connexion à la bdd 
$db_server   = "127.0.0.1";
 $db_username= "root";
  $db_pwd  = "";
   $db_name = "bdd-ihebchargui";
    $cnx = new PDO("mysql: host=$db_server; dbname=$db_name", $db_username, $db_pwd); 
 

// Vérifier si le formulaire a été envoyé
 if(isset($_POST['save'])) {   
   // Récupérer le nom de l'étudiant   on a utiliser post car la methode est post 
    $nom =$_POST['nom'];   
       // Récupérer l'email de l'étudiant   
       $email =$_POST['email'] ;
       // Récupérer phone 
       $phone =$_POST['phone'] ;
       // Récupérer la date   
       $date_res =$_POST['date_res'] ;
       // Récupérer le temps   
       $time =$_POST['time'] ;
       // Récupérer le nbres des personnes   
       $nb_personne =$_POST['nb_personne'] ;
         // Processus de sauvegarde dans la bdd en DEUX étapes :    
        // 1 . Préparer la requête SQL 
         $sql_insert = "INSERT INTO reservation(nom,email,phone,date_res,time,nb_personne) VALUES('$nom','$email','$phone','$date_res','$time','$nb_personne')";  
                // 2. Exécuter la requête SQL  
                   $cnx->exec($sql_insert); } 
?>
<!DOCTYPE html>
 <html>
  <head> 
    <meta charset="utf-8">
   <title>reservation</title> 
  <link rel="stylesheet" href="plugins/bootstrap/bootstrap.min.css">
  <link rel="stylesheet" href="plugins/themify/css/themify-icons.css">
  <link rel="stylesheet" href="plugins/icofont/icofont.min.css">
  <link rel="stylesheet" href="plugins/fontawesome/css/all.css">
  <link rel="stylesheet" href="plugins/aos/aos.css">
  <link rel="stylesheet" href="plugins/magnific-popup/magnific-popup.css">
  <link rel="stylesheet" href="plugins/video-popup/modal-video.min.css">
  <link rel="stylesheet" href="plugins/swiper/swiper.min.css">
  <link rel="stylesheet" href="plugins/date-picker/datepicker.min.css">
  <link rel="stylesheet" href="plugins/clock-picker/clockpicker.min.css">
  <link rel="stylesheet" href="plugins/bootstrap-touchpin/jquery.bootstrap-touchspin.min.css">
  <link rel="stylesheet" href="plugins/devices.min.css">
  <link rel="stylesheet" href="css/flaticon.css">
  <link href="css/style.css" rel="stylesheet">
  <link rel="shortcut icon" href="images/favicon.png" type="image/x-icon">
  <link rel="icon" href="images/favicon.png" type="image/x-icon">
</head>
 <body> 
 <div class="preloader">
  <img src="images/preloader.gif" alt="preloader" class="img-fluid">
  </div>
<header class="navigation ">
  <nav class="navbar navbar-expand-lg main-nav py-lg-3 position-absolute w-100" id="main-nav">
    <div class="container">
      <a class="navbar-brand" href="index.html">
        <img src="images/logo.png" alt="" class="img-fluid">
      </a>

      <button class="navbar-toggler collapsed" type="button" data-toggle="collapse" data-target="#navigation"
        aria-controls="navigation" aria-expanded="false" aria-label="Toggle navigation">
        <span class="fa fa-bars"></span>
      </button>

      <div class="collapse navbar-collapse" id="navigation">
        <ul class="navbar-nav ml-auto">
          <li class="nav-item active">
            <a class="nav-link" href="index.html">Home</a>
          </li>
          <li class="nav-item"><a class="nav-link" href="about.html">About</a></li>
          <li class="nav-item"><a class="nav-link" href="menu.html">Recipes</a></li>
          <li class="nav-item"><a class="nav-link" href="gallery.html">Gallery</a></li>
          <span class="login">
            <a  href="reservations.php" data-hj-masked="" class="nav-link" data-analytics-location="nav" data-analytics="top-nav-login">Log In</a>
          </span> 
        </ul>
      </div>
    </div>
  </nav>
</header>
<section class="section-header" style="background-image: url(images/about/bg_3.jpg)" data-stellar-background-ratio="0.5">
   <div class="container">
        <div class="row d-flex">
  <div class="col-md-12 ftco-animate makereservation p-4 px-md-5 pb-md-5">
      <div class="heading-section ftco-animate mb-5 text-center">
        <h2 class="text-capitalize mb-4 font-lg text-white">BOOK A TABLE</h2>
        <p class="text-capitalize mb-4 font-lg text-white">We offer you the best reservation services</p>
      </div>
    
    

 
          
          
        

 
   <form action="" method="post"> 

    <h class="text-white">Nom  : <input  type="text" name="nom" placeholder="Your Name" required="required"> <br> 
    phone : <input type="text" name="phone" step="any" placeholder="Enter your phone number" required="required"><br>
    Email : <input type="email" name="email" placeholder="Enter your email" required="required"> <br> 
    date : <input  type="date" name="date_res" placeholder="Select date for booking" required="required"> <br>  
    time : <input  type="time" name="time" placeholder="Select time for booking" required="required"> <br> 
    person : <input type="number" name="nb_personne" placeholder="How many guests" required="required"> <br> <br>
      <input type="submit" value="MAKE YOUR BOOKING" name="save" class="btn btn-primary py-3 px-5">  
      
    </form>   
     </div>
  </div>
</div>   
 </section>
 
  <?php     
      // Récupérer les reservation depuis la BdD :  
         
         
       // 1. Préparer et lancer la requête en m temps  
       $res_reservation = $cnx->query("SELECT * from reservation");  
       //ou bien  $sql_select="SELECT * from reservation";
       // Extraire (fetch) toutes les lignes (enregistrement, rows)   
       $les_reservation = $res_reservation->fetchAll(); // Ceci est un tableau de tableaux associatifs     
       // Calculer le nombre d'étudiants    
        $nbr_reservation = count($les_reservation);       
          if($nbr_reservation==0){        
           // Afficher un message si la liste est vide        
            echo "<b>Aucune reservation pour le moment !</b>";   
              }  
            else 
             { 
             echo "<b> Reservation placed successfully !</b>";

              // Afficher la liste des reservation sous forme de liste ordonnée      
              //echo "Il y $nbr_reservation reservations ";        
                  //echo "<ol>";   
                  //foreach ($les_reservation as $item) {
                 // echo "<li>" . $item['nom'] . " : " . $item['email'] .": " . $item['phone']   .": " . $item['date_res']   .": " . $item['time'].": " . $item['nb_personne']   ;
                    
                  }   
                      //echo "</ol>";
                        //}
                        ?> 










<footer class="section footer">
      <div class="container">
          <div class="row justify-content-center">
              <div class="col-lg-4 col-md-3 mb-5 mb-lg-0">
                  <div class="widget">
                      <h4 class="mb-3">About</h4>
                      <p>We are Omi Yammi Restaurant follow on:</p>
  
                      <ul class="list-inline footer-socials mt-4">
                          <li class="list-inline-item"><a href="https://www.facebook.com"><i
                                      class="ti-facebook mr-2"></i></a></li>
                          <li class="list-inline-item"><a href="https://twitter.com"><i class="ti-twitter mr-2 "></i></a>
                          </li>
                          <li class="list-inline-item"><a href="https://instagram.com"><i class="ti-instagram mr-2 "></i></a>
                          </li>
                      </ul>
                  </div>
              </div>
  
              <div class="col-lg-4 ml-auto col-md-5 mb-5 mb-lg-0">
                  <div class="widget">
                      <h4 class="mb-3">Contact Info</h4>
  
                      <ul class="list-unstyled mb-0 footer-contact">
                          <li><i class="ti-mobile"></i>+21624319***</li>
                          <li><i class="ti-email"></i>omiyammi@support.com</li>
                          <li><i class="ti-map"></i>Sahloul Sousse 10027-0000</li>
                      </ul>
                  </div>
              </div>
              <div class="col-md-6 col-lg-3">
                  <div class="widget">
                      <h4 class="mb-3">Opening Hours</h4>
                      <ul class="list-unstyled open-hours">
                        <li class="d-flex"><span>Monday</span> &nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                          <span>9:00 - 00:00</span></li>

                        <li class="d-flex"><span>Tuesday</span> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                          <span>9:00 - 00:00</span></li>

                        <li class="d-flex"><span>Wednesday</span> &nbsp;&nbsp;
                          <span>9:00 - 00:00</span></li>

                        <li class="d-flex"><span>Thursday</span> &nbsp;&nbsp; &nbsp;&nbsp;&nbsp;
                          <span>9:00 - 00:00</span></li>

                        <li class="d-flex"><span>Friday</span>&nbsp; &nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;
                          <span>9:00 - 02:00</span></li>

                        <li class="d-flex"><span>Saturday</span>&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;
                          <span>9:00 - 02:00</span></li>

                        <li class="d-flex"><span>Sunday</span> &nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;
                          <span> 10:00 - 23:00</span></li>
                      </ul>
                     
                  </div>
              </div>
          </div>
  
          <div class="row justify-content-center mt-5">
              <div class="col-lg-6 text-center">
                  <h4 class="text-white-50 mb-3">Get latest food recipe at your inbox</h4>
                  <form action="#" class="footer-newsletter">
                      <div class="form-group">
                          <button class="button"><span class="ti-email"></span></button>
                          <input type="email" class="form-control" placeholder="Enter Email">
                      </div>
                  </form>
              </div>
          </div>
      </div>
  </footer>
  
  
  
  <script src="plugins/jQuery/jquery.min.js"></script>

  <script src="plugins/bootstrap/bootstrap.min.js"></script>
  <script src="plugins/aos/aos.js"></script>
  <script src="plugins/shuffle/shuffle.min.js"></script>
  <script src="plugins/magnific-popup/jquery.magnific-popup.min.js"></script>
  <script src="plugins/date-picker/datepicker.min.js"></script>
  <script src="plugins/clock-picker/clockpicker.min.js"></script>
  <script src="plugins/video-popup/jquery-modal-video.min.js"></script>
  <script src="plugins/swiper/swiper.min.js"></script>
  <script src="plugins/instafeed/instafeed.min.js"></script>
  <script src="plugins/bootstrap-touchpin/jquery.bootstrap-touchspin.min.js"></script>
  
  
 
  <script src="js/script.js"></script>















                         </body>
                       </html> 