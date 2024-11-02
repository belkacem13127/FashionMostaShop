<?php

if(!isset($_SESSION['admin_email'])){

	echo "<script>window.open('login.php','_self')</script>";

}else {
?>

<div class="row"> </div>

<div class="row"> 

<div class="col-lg-12"> 

<div class="panel panel-default"> 

<div class="panel-heading"> 

	<h3 style="font-family: palantino; font-size: 22px; color: #098830;" class="panel-title"> <i class="fa fa-money fa-fw"> </i>&emsp;Ajouter un Fournisseur </h3> 

</div> 

<div class="panel-body"> 

	<form style="color: brown;" class="form-horizontal" action="" method="post" enctype="multipart/form-data"> 

<div class="form-group"> 

	<label class="col-md-3 control-label"> Fournisseur </label>

<div class="col-md-6">

	<input type="text" name="manufacturer_name" class="form-control" >

	</div>
</div> 

<div class="form-group"> 

	<label class="col-md-3 control-label"> Afficher ? </label>

<div class="col-md-6">

	<input type="radio" name="manufacturer_top" value="yes" >

	<label> OUI </label>

	<input type="radio" name="manufacturer_top" value="no" >

	<label> NON </label>

</div>
</div> 

<div class="form-group"> 

	<label class="col-md-3 control-label"> Photo </label>

<div class="col-md-6">

	<input type="file" name="manufacturer_image" class="form-control" >

	</div>
</div> 

<div class="form-group"> 

	<label class="col-md-3 control-label"> </label>

<div class="col-md-6">

	<input type="submit" name="submit" class="form-control btn btn-primary" value="Ajouter le Fournisseur" >

						</div>
					</div> 
				</form> 
			</div> 
		</div> 
	</div>
</div>

	<img style="position: absolute; top: 350px; left: 630px; border-radius: 20px;" 
	src="other_images/Fournisseur.PNG" alt="fournisseur">

<?php

if(isset($_POST['submit'])){

	$manufacturer_name = $_POST['manufacturer_name'];
	$manufacturer_top = $_POST['manufacturer_top'];
	$manufacturer_image = $_FILES['manufacturer_image']['name'];
	$tmp_name = $_FILES['manufacturer_image']['tmp_name'];

	move_uploaded_file($tmp_name,"other_images/$manufacturer_image");

	$insert_manufacturer = "INSERT into manufacturers (manufacturer_title,manufacturer_top,manufacturer_image) 
	values ('$manufacturer_name','$manufacturer_top','$manufacturer_image')";

	$run_manufacturer = mysqli_query($con,$insert_manufacturer);

if($run_manufacturer){

	echo "<script>alert('Fournisseur ajouté !')</script>";

	echo "<script>window.open('index.php?view_manufacturers','_self')</script>";
}
}
?>

<?php 
} 
?>
