<?php

  session_start();

include("includes/db.php");
include("includes/header.php");
include("functions/functions.php");
include("includes/main.php");
?>
  
  <main style="height: 200px; background-image: url('images/bgcolor.PNG')">
   
<div>
      
<div class="nero__heading">
        
  <span style="font-family: palantino; position: absolute; top: 290px; left: 550px; color: white">
  Boutique</span>

  <img style="position: absolute; top: 230px; left: 1000px; width: 220px; border-radius: 20px;" 
  src="images/Boutique.PNG" alt="boutique">
      
</div>
  
  <p class="nero__text"></p>
    
  </div>
</main>

<div id="content" > 

<div class="container-fluid" >

<div class="col-md-12" >

<div class="services row">

<?php

  $get_store = "SELECT * from store";

  $run_store = mysqli_query($con,$get_store);

while($row_store = mysqli_fetch_array($run_store)){
  $store_id = $row_store['store_id'];

  $store_title = $row_store['store_title'];
  $store_image = $row_store['store_image'];
  $store_desc = $row_store['store_desc'];
  $store_button = $row_store['store_button'];
  $store_url = $row_store['store_url'];
?>

<div class="col-md-4 col-sm-6 box"> 

  <img src="admin_area/store_images/<?php echo $store_image; ?>" class="img-responsive">

  <h2 align="center"> <?php echo $store_title; ?> </h2>

<p> <?php echo $store_desc; ?> </p>

  <center>

  <a href="<?php echo $store_url; ?>" class="btn btn-primary"><?php echo $store_button; ?> </a>

</center>

  </div> 

<?php 
} 
?>

      </div> 
    </div> 
  </div> 
</div> 

<script src="js/jquery.min.js"> </script>
<script src="js/bootstrap.min.js"></script>

  </body>
</html>
