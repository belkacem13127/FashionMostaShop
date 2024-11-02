<?php

  session_start();

include("includes/db.php");
include("includes/header.php");
include("functions/functions.php");
include("includes/main.php");
?>

  <main style="height: 400px; width: 700px; border: 4px solid yellow;  background-repeat: no-repeat;
  background-size: cover; background-image: url('images/banner.PNG')"></main>     

  <img style="position:  absolute; top: 290px; left: 830px; border: 4px solid #c95d5c; border-radius: 20px;" 
  src="images/bgcolor1.PNG" alt="logo">

<div class="nero__heading">
      
  <a style="display: inline-block;
    background-color: #628968;
    border-radius: 10px;
    border: 4px double #CCCCCC;
    color: #FFFFFF;
    text-align: center;
    font-size: 18px;
    padding: 2px;
    width: 240px;
    cursor: pointer;
    margin: 2px;
    position: absolute;
    top: 220px;
    left: 910px;" href="shop.php" class="btn1">Afficher tous les Articles</a>
    
</div>
  
<div class="wrapper">
            
  <h1 style="display: inline-block;
    background-color: #628968;
    border-radius: 10px;
    border: 4px double #CCCCCC;
    color: #FFFFFF;
    text-align: center;
    font-size: 18px;
    padding: 2px;
    width: 200px;
    margin: 2px;">Nouvelle Collection<h1>
            
</div>

<div id="content" class="container"> 

<div class="row"> 

<?php getPro(4); ?>

  </div> 
</div> 
    
<?php

include("includes/footer.php");
?>  
  
  </body>
</html>
