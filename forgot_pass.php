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
        
  <span style="font-family: palantino; position: absolute; top: 290px; left: 150px; color: white">
  Mot&emsp;de&emsp;Passe&emsp;oublié&emsp;?</span>

  <img style="width: 200px; position: absolute; top: 210px; left: 1000px;" src="images/oubli.PNG" 
  alt="MDP oublié">
      
</div>
      
  <p class="nero__text"></p>
    
  </div>
</main>

<div id="content" > 

<div class="container" > 

<div class="col-md-12"></div>

<div class="col-md-12" > 

<div class="box"> 

<div class="box-header"> 

  <center>

  <h4 style="color: blue;"> Entrer votre E-mail ci-dessou , je vous renvoyerais , votre Mot de passe. </h4>

</center>

</div> 

<div align="center"> 

  <form action="" method="post"> 

  <input type="text" class="form-control" name="c_email" placeholder="Entrer votre E-mail">

<br>

  <input style="display: inline-block;
    background-color: #38878f;
    border-radius: 10px;
    border: 4px double #CCCCCC;
    color: #FFFFFF;
    text-align: center;
    font-size: 18px;
    padding: 2px;
    width: 100px;
    cursor: pointer;
    margin: 2px;" type="submit" name="forgot_pass" class="btn" value="Envoyer">

          </form>
        </div>
      </div>
    </div>
  </div> 
</div> 

<script src="js/jquery.min.js"> </script>
<script src="js/bootstrap.min.js"></script>

  </body>
</html>

<?php

if(isset($_POST['forgot_pass'])){
  $c_email = $_POST['c_email'];

  $sel_c = "SELECT * from customers where customer_email='$c_email'";

  $run_c = mysqli_query($con,$sel_c);
  $count_c = mysqli_num_rows($run_c);
  $row_c = mysqli_fetch_array($run_c);

  $c_name = $row_c['customer_name'];
  $c_pass = $row_c['customer_pass'];

if($count_c == 0){

  echo "<script> alert('Désolé, je ne retouve pas votre Eèmail !') </script>";

exit();

}else {

  $message = "
    <h1 align='center'> Votre Mot de passe vous a été renvoyé ! </h1>
    <h2 align='center'> Cher(e) $c_name </h2>
    <h3 align='center'> Vote Mot de Passe est le suivant : : <span> <b>$c_pass</b> </span> </h3>
    <h3 align='center'><a href='localhost/ecom_store/checkout.php'>Connectez-vous ici...</a></h3> ";

  $from = "sad.fashionmostashop@gmail.com";

  $subject = "Votre Mot de passe";

  $headers = "De : $from\r\n";

  $headers .= "Content-type: text/html\r\n";

  mail($c_email,$subject,$message,$headers);

  echo "<script> alert('Vérifiez votre Boîte Mail') </script>";

  echo "<script>window.open('checkout.php','_self')</script>";
}
}
?>
