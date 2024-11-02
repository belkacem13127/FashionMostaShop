<?php

if(!isset($_SESSION['admin_email'])){

	echo "<script>window.open('login.php','_self')</script>";

}else {
?>

<?php

if(isset($_GET['edit_enquiry'])){
	$edit_id = $_GET['edit_enquiry'];

	$get_enquiry_type = "SELECT * from enquiry_types where enquiry_id='$edit_id'";

	$run_enquiry_type = mysqli_query($con,$get_enquiry_type);
	$row_enquiry_type = mysqli_fetch_array($run_enquiry_type);

	$enquiry_id = $row_enquiry_type['enquiry_id'];
	$enquiry_title = $row_enquiry_type['enquiry_title'];
}
?>

<div class="row" > </div> 

<div class="row"> 

<div class="col-lg-12"> 

<div class="panel panel-default"> 

<div class="panel-heading"> 

	<h3 style="font-family: palantino; font-size: 22px; color: #098830;" class="panel-title">
	<i class="fa fa-money fa-fw"></i>&emsp;Editer la Question </h3>

</div> 

<div class="panel-body"> 

	<form style="color: brown;" class="form-horizontal" action="" method="post" > 

<div class="form-group"> 

	<label class="col-md-3 control-label"> Titre </label>

<div class="col-md-6">

	<input type="text" name="enquiry_title" class="form-control" value="<?php echo $enquiry_title; ?>">

	</div>
</div> 

<div class="form-group"> 

	<label class="col-md-3 control-label">  </label>

<div class="col-md-6">

	<input type="submit" name="update" class="btn btn-primary form-control" value="Mise à Jour de la Question">

						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>

<?php

if(isset($_POST['update'])){

	$enquiry_title = $_POST['enquiry_title'];
	
	$update_enquiry = "UPDATE enquiry_types set enquiry_title='$enquiry_title' where enquiry_id='$enquiry_id'";

$run_enquiry = mysqli_query($con,$update_enquiry);

if($run_enquiry){

	echo "<script>alert('Mise à Jour réussie !')</script>";

	echo "<script>window.open('index.php?view_enquiry','_self')</script>";
}
}
?>

<?php 
} 
?>
