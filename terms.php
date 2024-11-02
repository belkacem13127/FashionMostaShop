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
        
  <span style="font-family: palantino; position: absolute; top: 290px; left: 450px; color: white">
  Les&emsp;Conditions</span>

  <img style="position: absolute; top: 220px; left: 1030px; width: 180px; border-radius: 20px;" 
  src="images/Contrat.PNG" alt="conditions">
      
</div>
      
  <p class="nero__text"></p>
    
  </div>
</main>

<div id="content"> 

<div class="container"> 

<div class="col-md-3"> 

<div class="box"> 

  <ul class="nav nav-pills nav-stacked"> 

<?php

  $get_terms = "SELECT * from terms LIMIT 0,1";

  $run_terms = mysqli_query($con,$get_terms);

while($row_terms = mysqli_fetch_array($run_terms)){
  $term_title = $row_terms['term_title'];

  $term_link = $row_terms['term_link'];
?>

    <li class="active">

  <a data-toggle="pill" href="#<?php echo $term_link; ?>">

<?php echo $term_title; ?>

  </a>
</li>

<?php 
} 
?>

<?php

  $count_terms = "SELECT * from terms";

  $run_count = mysqli_query($con,$count_terms);
  $count = mysqli_num_rows($run_count);

  $get_terms = "SELECT * from terms LIMIT 1,$count";

  $run_terms = mysqli_query($con,$get_terms);

while($row_terms = mysqli_fetch_array($run_terms)){
  $term_title = $row_terms['term_title'];

  $term_link = $row_terms['term_link'];
?>

    <li>

  <a data-toggle="pill" href="#<?php echo $term_link; ?>">

<?php echo $term_title; ?>

  </a>
</li>

<?php 
} 
?>

    </ul> 
  </div> 
</div> 

<div class="col-md-9"> 

<div class="box"> 

<div class="tab-content" > 

<?php

  $get_terms = "SELECT * from terms LIMIT 0,1";

  $run_terms = mysqli_query($con,$get_terms);

while($row_terms = mysqli_fetch_array($run_terms)){
  $term_title = $row_terms['term_title'];

  $term_desc = $row_terms['term_desc'];
  $term_link = $row_terms['term_link'];
?>

<div id="<?php echo $term_link; ?>" class="tab-pane fade in active" > 

  <h1> <?php echo $term_title; ?> </h1>

  <p> <?php echo $term_desc; ?> </p>

</div> 

<?php 
} 
?>

<?php

  $count_terms = "SELECT * from terms";

  $run_count = mysqli_query($con,$count_terms);
  $count = mysqli_num_rows($run_count);

  $get_terms = "SELECT * from terms LIMIT 1,$count";

  $run_terms = mysqli_query($con,$get_terms);

while($row_terms = mysqli_fetch_array($run_terms)){
  $term_title = $row_terms['term_title'];

  $term_desc = $row_terms['term_desc'];
  $term_link = $row_terms['term_link'];
?>

<div id="<?php echo $term_link; ?>" class="tab-pane fade in"> 

  <h1><?php echo $term_title; ?></h1>

<p><?php echo $term_desc; ?></p>

</div> 

<?php 
} 
?>

        </div>
      </div>
    </div>
  </div>
</div>

<script src="js/jquery.min.js"> </script>
<script src="js/bootstrap.min.js"></script>

  </body>
</html>
