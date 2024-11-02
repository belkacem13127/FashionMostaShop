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
        
  <span style="font-family: palantino; position: absolute; top: 290px; left: 550px; color: white">
  Inscription</span>

  <img style="position: absolute; top: 200px; left: 1000px; width: 200px;" src="images/Inscription.PNG" 
  alt="inscription">
      
</div>
      
  <p class="nero__text">
      
    </p>
  </div>
</main>

<div id="content" > 

<div class="container" > 

<div class="col-md-12" > 

<div class="box" > 

<div class="box-header" > 

  <center> 

  <h2 style="font-family: palatino; color: blue"> Création d'un nouveau Compte </h2>

  </center> 
</div> 

  <form style="color: brown;" action="customer_register.php" method="post" enctype="multipart/form-data" > 

<div class="form-group" > 

  <label>Nom</label>

  <input type="text" class="form-control" name="c_name" required>

</div> 

  <div class="form-group"> 

  <label>E-mail</label>

  <input type="text" class="form-control" name="c_email" required>

</div> 

<div class="form-group"> 

  <label>Mot de Passe</label>

<div class="input-group"> 

  <span class="input-group-addon"> 
  <i class="fa fa-check tick1"> </i>
  <i class="fa fa-times cross1"> </i>

</span> 

  <input type="password" class="form-control" id="pass" name="c_pass" required>

  <span class="input-group-addon"> 

<div id="meter_wrapper"> 

  <span id="pass_type"> </span>

<div id="meter"> </div>

      </div> 
    </span> 
  </div>
</div>

<div class="form-group"> 

  <label>Confirmer le Mot de passe</label>

<div class="input-group"> 

  <span class="input-group-addon"> 
  <i class="fa fa-check tick2"> </i>
  <i class="fa fa-times cross2"> </i>

</span> 

  <input type="password" class="form-control confirm" id="con_pass" required>

  </div> 
</div> 

<div class="form-group"> 

  <label>Wilaya</label>

  <input type="text" class="form-control" name="c_country" required>

</div> 

  <div class="form-group"> 

  <label>Ville</label>

  <input type="text" class="form-control" name="c_city" required>

</div> 

<div class="form-group"> 

  <label>Mobile</label>

  <input type="text" class="form-control" name="c_contact" required>

</div> 

<div class="form-group"> 

  <label>Adresse</label>

  <input type="text" class="form-control" name="c_address" required>

</div> 

<div class="form-group"> 

  <label>Photo</label>

  <input type="file" class="form-control" name="c_image" required>

</div> 

<div class="form-group"> 

  <center></center>

</div> 

<div class="text-center"> 

  <button style="display: inline-block;
    background-color: #628968;
    border-radius: 10px;
    border: 4px double #CCCCCC;
    color: #FFFFFF;
    text-align: center;
    font-size: 18px;
    padding: 2px;
    width: 150px;
    cursor: pointer;
    margin: 2px;" type="submit" name="register" class="btn">
    <i class="fa fa-user-md"></i>&emsp;Inscription

            </button>
          </div> 
        </form> 
      </div> 
    </div> 
  </div> 
</div> 

<script src="js/jquery.min.js"> </script>
<script src="js/bootstrap.min.js"></script>

<script>

$(document).ready(function(){

$('.tick1').hide();
$('.cross1').hide();

$('.tick2').hide();
$('.cross2').hide();

$('.confirm').focusout(function(){

var password = $('#pass').val();

var confirmPassword = $('#con_pass').val();

if(password == confirmPassword){

$('.tick1').show();
$('.cross1').hide();

$('.tick2').show();
$('.cross2').hide();

}else {

$('.tick1').hide();
$('.cross1').show();

$('.tick2').hide();
$('.cross2').show();
}
});
});

</script>

<script>

$(document).ready(function(){

$("#pass").keyup(function(){

check_pass();

});

});

function check_pass() {
var val=document.getElementById("pass").value;
var meter=document.getElementById("meter");
var no=0;
if(val!="")
{

if(val.length<=6)no=1;

if(val.length>6 && (val.match(/[a-z]/) || val.match(/\d+/) || val.match(/.[!,@,#,$,%,^,&,*,?,_,~,-,(,)]/)))no=2;

if(val.length>6 && ((val.match(/[a-z]/) && val.match(/\d+/)) || (val.match(/\d+/) && val.match(/.[!,@,#,$,%,^,&,*,?,_,~,-,(,)]/)) || (val.match(/[a-z]/) && val.match(/.[!,@,#,$,%,^,&,*,?,_,~,-,(,)]/))))no=3;

if(val.length>6 && val.match(/[a-z]/) && val.match(/\d+/) && val.match(/.[!,@,#,$,%,^,&,*,?,_,~,-,(,)]/))no=4;

if(no==1)
{
$("#meter").animate({width:'50px'},300);
meter.style.backgroundColor="red";
document.getElementById("pass_type").innerHTML="Very Weak";
}

if(no==2)
{
$("#meter").animate({width:'100px'},300);
meter.style.backgroundColor="#F5BCA9";
document.getElementById("pass_type").innerHTML="Weak";
}

if(no==3)
{
$("#meter").animate({width:'150px'},300);
meter.style.backgroundColor="#FF8000";
document.getElementById("pass_type").innerHTML="Good";
}

if(no==4)
{
$("#meter").animate({width:'200px'},300);
meter.style.backgroundColor="#00FF40";
document.getElementById("pass_type").innerHTML="Strong";
}

}else {
  
meter.style.backgroundColor="";
document.getElementById("pass_type").innerHTML="";
}
}

</script>

  </body>
</html>

<?php

if(isset($_POST['register'])){
  $remoteip = $_SERVER['REMOTE_ADDR'];

if($result['success'] == 0){
  $c_name = $_POST['c_name'];

  $c_email = $_POST['c_email'];
  $c_pass = $_POST['c_pass'];
  $c_country = $_POST['c_country'];
  $c_city = $_POST['c_city'];
  $c_contact = $_POST['c_contact'];
  $c_address = $_POST['c_address'];
  $c_image = $_FILES['c_image']['name'];
  $c_image_tmp = $_FILES['c_image']['tmp_name'];

  $c_ip = getRealUserIp();

  move_uploaded_file($c_image_tmp,"customer/customer_images/$c_image");

  $get_email = "SELECT * from customers where customer_email='$c_email'";
  $run_email = mysqli_query($con,$get_email);

  $check_email = mysqli_num_rows($run_email);

if($check_email == 1){

  echo "<script>alert('Cet E-mail est déjà utilisé !')</script>";

exit();

}
  $customer_confirm_code = mt_rand();
  $subject = "Message : E-mail  de Confirmation";

  $from = "admin@gmail.com";

  $message = "
    <h2>E-mail de Confirmation par Computerfever.com $c_name</h2>
    <a href='localhost/ecom_store/customer/my_account.php?$customer_confirm_code'>
    Cliquer ici pour confirmer l'E-mail</a> ";

  $headers = "De : $from \r\n";

  $headers .= "Contenu : text/html\r\n";

  mail($c_email,$subject,$message,$headers);

  $insert_customer = "INSERT into customers (customer_name,customer_email,customer_pass,customer_country,
  customer_city,customer_contact,customer_address,customer_image,customer_ip,customer_confirm_code) 
  values ('$c_name','$c_email','$c_pass','$c_country','$c_city','$c_contact','$c_address','$c_image',
  '$c_ip','$customer_confirm_code')";

  $run_customer = mysqli_query($con,$insert_customer);

  $sel_cart = "SELECT * from cart where ip_add='$c_ip'";

  $run_cart = mysqli_query($con,$sel_cart);
  $check_cart = mysqli_num_rows($run_cart);

if($check_cart>0){
  $_SESSION['customer_email']=$c_email;

  echo "<script>alert('Inscription réussie !')</script>";

  echo "<script>window.open('checkout.php','_self')</script>";

}else{

  $_SESSION['customer_email']=$c_email;

  echo "<script>alert('Inscription réussie !')</script>";

  echo "<script>window.open('index.php','_self')</script>";
}

}else {

  echo "<script>alert('Sélectionner le Captcha !')</script>";
}
}
?>
