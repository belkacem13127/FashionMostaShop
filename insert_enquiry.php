<?php

if(!isset($_SESSION['admin_email'])){

	echo "<script>window.open('login.php','_self')</script>";

}else {
?>

<div class="row" ></div> 

<div class="row"> 

<div class="col-lg-12"> 

<div class="panel panel-default"> 

<div class="panel-heading"> 

	<h3 style="font-family: palantino; font-size: 22px; color: #098830;" class="panel-title">
	<i class="fa fa-money fa-fw"></i>&emsp;Ajouter une Question </h3>

</div> 

<div class="panel-body"> 

	<form style="color: brown;" class="form-horizontal" action="" method="post" > 

<div class="form-group"> 

	<label class="col-md-3 control-label"> Titre </label>

<div class="col-md-6">

	<input type="text" name="enquiry_title" class="form-control">

	</div>
</div> 

<div class="form-group"> 

	<label class="col-md-3 control-label">  </label>

<div class="col-md-6">

	<input type="submit" name="submit" class="btn btn-primary form-control" value="Ajouter une Question">

						</div>
					</div> 
				</form>
			</div>
		</div>
	</div>
</div>

	<img style="position: absolute; top: 300px; left: 670px; border-radius: 20px;" 
	src="other_images/Question.PNG" alt="Question">

<?php

if(isset($_POST['submit'])){

	$enquiry_title = $_POST['enquiry_title'];

	$insert_enquiry =  "INSERT into enquiry_types (enquiry_title) values ('$enquiry_title')";

	$run_enquiry = mysqli_query($con,$insert_enquiry);

if($run_enquiry){

	echo "<script> alert('Nouvelle Question ajouté !') </script>";

	echo "<script>window.open('index.php?view_enquiry','_self')</script>";
}
}
?>

<?php 
} 
?>
