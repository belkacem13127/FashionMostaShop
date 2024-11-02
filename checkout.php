<?php

  session_start();

include("includes/db.php");
include("includes/header.php");
include("functions/functions.php");
include("includes/main.php");
?>

  <main style="height: 200px; background-image: url('images/bgcolor.PNG')">
    
<div class="">
      
<div class="nero__heading">
        
  <span style="font-family: palantino; position: absolute; top: 290px; left: 500px; color: white">
  Connexion</span>

  <img style="position: absolute; top: 240px; left: 1000px; width: 200px;" src="images/connexion.PNG" 
  alt="connexion">

</div>
      
  <p class="nero__text">
      
    </p>
  </div>
</main>

<div id="content" > 

<div class="container" > 

<div class="col-md-12" > 

<?php

if(!isset($_SESSION['customer_email'])){

  include("customer/customer_login.php");

}else {

 
}
?>

    </div> 
  </div> 
</div>

  <img style="position: absolute; top: 400px; left: 500px; width: 250px;" src="images/Achats.PNG" alt="achats"> 

  <p style="font-family: pacifico; color: green; font-size: 40px; position: absolute; top: 500px; left: 320px;">FAITES</p>

  <a href="shop.php"> <p style="font-family: pacifico; color: white; font-size: 40px; position: absolute; 
  top: 500px; left: 600px;">VOS</p></a>

  <p style="font-family: pacifico; color: red; font-size: 40px; position: absolute; top: 500px; left: 760px;">ACHATS</p>

<script src="js/jquery.min.js"> </script>
<script src="js/bootstrap.min.js"></script>

  </body>
</html>
