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
        
  <span style="font-family: palantino; position: absolute; top: 290px; left: 400px; color: white">
  Nous&emsp;Connaître</span> 

  <img style="position: absolute; top: 230px; left: 1030px; width: 200px;" src="images/Historique.PNG" 
  alt="history">
      
</div>
      
  <p class="nero__text"></p>
    
  </div>
</main>

<div id="content" > 

<div class="container" > 

<div class="col-md-12" > 

<div class="box" > 

<?php

  $get_about_us = "SELECT * from about_us";

  $run_about_us = mysqli_query($con,$get_about_us);
  $row_about_us = mysqli_fetch_array($run_about_us);

  $about_heading = $row_about_us['about_heading'];
  $about_short_desc = $row_about_us['about_short_desc'];
  $about_desc = $row_about_us['about_desc'];
?>

  <h3 style="font-family: verdana; text-align: center;"> <?php echo $about_heading; ?> </h3>

  <p class="lead"> <?php echo $about_short_desc; ?> </p>

  <p> <?php echo $about_desc; ?> </p>

        </div>
      </div>
    </div> 
  </div> 

<script src="js/jquery.min.js"> </script>
<script src="js/bootstrap.min.js"></script>

  </body>
</html>
