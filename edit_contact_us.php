<?php

if(!isset($_SESSION['admin_email'])){

	echo "<script>window.open('login.php','_self')</script>";

}else {
?>

<?php

	$get_conatct_us = "SELECT * from contact_us";

	$run_contact_us = mysqli_query($con,$get_conatct_us);
	$row_contact_us = mysqli_fetch_array($run_contact_us);

	$contact_email = $row_contact_us['contact_email'];
	$contact_heading = $row_contact_us['contact_heading'];
	$contact_desc = $row_contact_us['contact_desc'];
?>

<div class="row" > </div> 

<div class="row"> 

<div class="col-lg-12"> 

<div class="panel panel-default"> 

<div class="panel-heading"> 

	<h3 style="font-family: palantino; font-size: 22px; color: #098830;" class="panel-title">
	<i class="fa fa-money fa-fw"></i>&emsp;Editer le Contact </h3>

</div> 

<div class="panel-body"> 

	<form style="color: brown;" class="form-horizontal" action="" method="post"> 

<div class="form-group"> 

	<label class="col-md-3 control-label"> E-mail </label>

<div class="col-md-6">

	<input type="text" name="contact_email" class="form-control" value="<?php echo $contact_email; ?>">

	</div>
</div> 

<div class="form-group"> 

	<label class="col-md-3 control-label"> Titre </label>

<div class="col-md-6">

	<input type="text" name="contact_heading" class="form-control" value="<?php echo $contact_heading; ?>">

	</div>
</div> 

<div class="form-group"> 

	<label class="col-md-3 control-label"> Description </label>

<div class="col-md-6">

	<textarea name="contact_desc" class="form-control" rows="6" cols="19">

<?php echo $contact_desc; ?>

		</textarea>
	</div>
</div> 

<div class="form-group"> 

	<label class="col-md-3 control-label"> </label>

<div class="col-md-6">

	<input type="submit" name="submit" class="btn btn-primary form-control" value="Mise à Jour du Contact">

						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>

	<img style="position: absolute; top: 420px; left: 670px; border-radius: 20px;" 
	src="other_images/Contact.PNG" alt="ccontact">

<?php

if(isset($_POST['submit'])){
	$contact_email = $_POST['contact_email'];

	$contact_heading = $_POST['contact_heading'];
	$contact_desc = $_POST['contact_desc'];

	$update_contact_us = "UPDATE contact_us set contact_email='$contact_email',
	contact_heading='$contact_heading',contact_desc='$contact_desc'";

	$run_contact_us = mysqli_query($con,$update_contact_us);

if($run_contact_us){

	echo "<script>alert('Mise à Jour réussie !')</script>";

	echo "<script>window.open('index.php?dashboard','_self')</script>";
}
}
?>

<?php 
} 
?>
