<?php

  session_start();

include("includes/db.php");
include("includes/header.php");
include("functions/functions.php");
include("includes/main.php");
?>

  <main  style="height: 200px; background-image: url('images/bgcolor.PNG')">
    
<div class="">
      
<div class="nero__heading">
        
  <span style="font-family: palantino; position: absolute; top: 275px; left: 550px; color: white">
  Contact</span>

  <img style="position: absolute; top: 230px; left: 1000px; width: 200px;" src="images/Contact.PNG" 
  alt="contact">
      
    </div>
  </div>
</main>

<div class="col-md-12" > 

<div class="box" > 

<div class="box-header" > 

<center> 

<?php

  $get_contact_us = "SELECT * from contact_us";

  $run_conatct_us = mysqli_query($con,$get_contact_us);
  $row_conatct_us = mysqli_fetch_array($run_conatct_us);

  $contact_heading = $row_conatct_us['contact_heading'];
  $contact_desc = $row_conatct_us['contact_desc'];
  $contact_email = $row_conatct_us['contact_email'];
?>

  <h2> <?php echo $contact_heading; ?> </h2>

  <p class="text-muted"> <?php echo $contact_desc; ?> </p>

  </center> 
</div> 

  <form style="color: brown;" action="contact.php" method="post" > 

<div class="form-group" > 

  <label> Nom </label>

  <input type="text" class="form-control" name="name" required>

</div> 

<div class="form-group"> 

  <label> E-mail </label>

  <input type="text" class="form-control" name="email" required>

</div> 

<div class="form-group"> 

  <label> Sujet </label>

  <input type="text" class="form-control" name="subject" required>

</div> 

<div class="form-group"> 

  <label> Message </label>

  <textarea class="form-control" name="message"> </textarea>

</div> 

<div class="form-group"> 

  <label> Question </label>


  <select name="enquiry_type" class="form-control"> 

<option> Sélectionner la Question </option>

<?php

  $get_enquiry_types = "SELECT * from enquiry_types";

  $run_enquiry_types = mysqli_query($con,$get_enquiry_types);

while($row_enquiry_types = mysqli_fetch_array($run_enquiry_types)){
  $enquiry_title = $row_enquiry_types['enquiry_title'];

  echo "<option> $enquiry_title </option>";
}
?>

  </select> 
</div> 

<div class="text-center"> 

  <button type="submit" name="submit" class="btn btn-success">
  <i class="fa fa-user-md"></i> &emsp;<span style="font-size: 18px; color: black;">Envoyer le Message</span> </button>

  </div> 
</form>

<?php

if(isset($_POST['submit'])){
  $sender_name = $_POST['name'];

  $sender_email = $_POST['email'];
  $sender_subject = $_POST['subject'];
  $sender_message = $_POST['message'];
  $enquiry_type = $_POST['enquiry_type'];

  $new_message = "
    <h1> Ce message a été envoyé par $sender_name </h1>
    <p> <b> E-mail envoyeur : </b> <br> $sender_email </p>
    <p> <b> Sujet : </b> <br> $sender_subject </p>
    <p> <b> Question envoyé : </b> <br> $enquiry_type </p>
    <p> <b> Message envoyé : </b> <br> $sender_message </p> ";

  $headers = "De : $sender_email \r\n";
  $headers .= "Content-type: text/html\r\n";

  mail($contact_email,$sender_subject,$new_message,$headers);

  $email = $_POST['email'];
  $subject = "Bienvenue chez Fashion Mosta Shop";
  $msg = "Je vous contacterais bientôt, merci pour votre message.";

  $from = "fashionmostashop@gmail.com";

  mail($email,$subject,$msg,$from);

  echo "<h2 align='center'>Votre message a été envoyé avec succès !</h2>";
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
