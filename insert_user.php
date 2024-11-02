<?php

if(!isset($_SESSION['admin_email'])){

	echo "<script>window.open('login.php','_self')</script>";

}else {
?>


<div class="row" > </div> 

<div class="row" > 

<div class="col-lg-12" > 

<div class="panel panel-default" > 

<div class="panel-heading" > 

	<h3 style="font-family: palantino; font-size: 22px; color: #098830;" class="panel-title" >
	<i class="fa fa-money fa-fw" ></i>&emsp;Ajouter un Utilisateur </h3>

</div> 

<div class="panel-body"> 

	<form style="color: brown;" class="form-horizontal" method="post" enctype="multipart/form-data"> 

<div class="form-group"> 

	<label class="col-md-3 control-label"> Uilisateur </label>

<div class="col-md-6"> 

	<input type="text" name="admin_name" class="form-control" required>

	</div> 
</div> 

<div class="form-group"> 

	<label class="col-md-3 control-label"> E-mail </label>

<div class="col-md-6"> 

	<input type="text" name="admin_email" class="form-control" required>

	</div> 
</div> 

<div class="form-group"> 

	<label class="col-md-3 control-label"> Mot de Passe </label>

<div class="col-md-6"> 

	<input type="password" name="admin_pass" class="form-control" required>

	</div> 
</div> 

<div class="form-group"> 

	<label class="col-md-3 control-label"> Wilaya </label>

<div class="col-md-6"> 

<input type="text" name="admin_country" class="form-control" required>

	</div> 
</div> 

<div class="form-group"> 

	<label class="col-md-3 control-label"> Fonction </label>

<div class="col-md-6"> 

	<input type="text" name="admin_job" class="form-control" required>

	</div> 
</div> 

<div class="form-group"> 

	<label class="col-md-3 control-label"> Mobile </label>

<div class="col-md-6"> 

	<input type="text" name="admin_contact" class="form-control" required>

	</div> 
</div> 

<div class="form-group"> 

	<label class="col-md-3 control-label"> Informations </label>

<div class="col-md-6"> 

	<textarea name="admin_about" class="form-control" rows="3"> </textarea>

	</div> 
</div> 

<div class="form-group"> 

	<label class="col-md-3 control-label"> Photo </label>

<div class="col-md-6"> 

	<input type="file" name="admin_image" class="form-control" required>

	</div> 
</div> 

<div class="form-group"> 

	<label class="col-md-3 control-label"></label>

<div class="col-md-6"> 

	<input type="submit" name="submit" value="Ajouter l'Utilisateur" class="btn btn-primary form-control">

						</div> 
					</div> 
				</form>
			</div>
		</div>
	</div>
</div> 

<?php

if(isset($_POST['submit'])){
	$admin_name = $_POST['admin_name'];

	$admin_email = $_POST['admin_email'];
	$admin_pass = $_POST['admin_pass'];
	$admin_country = $_POST['admin_country'];
	$admin_job = $_POST['admin_job'];
	$admin_contact = $_POST['admin_contact'];
	$admin_about = $_POST['admin_about'];
	$admin_image = $_FILES['admin_image']['name'];
	$temp_admin_image = $_FILES['admin_image']['tmp_name'];

	move_uploaded_file($temp_admin_image,"admin_images/$admin_image");

	$insert_admin = "INSERT into admins (
	admin_name,admin_email,admin_pass,admin_image,admin_contact,admin_country,admin_job,admin_about) 
	values ('$admin_name','$admin_email','$admin_pass','$admin_image','$admin_contact','$admin_country',
	'$admin_job','$admin_about')";

	$run_admin = mysqli_query($con,$insert_admin);

if($run_admin){

	echo "<script>alert('Utilisateur ajouté !')</script>";

	echo "<script>window.open('index.php?view_users','_self')</script>";
}
}
?>

<?php 
}  
?>
