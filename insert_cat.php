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

	<h3 style="font-family: palantino; font-size: 22px; color: #098830;" class="panel-title"> 
	<i class="fa fa-money fa-fw"></i>&emsp;Ajouter une Catégorie </h3> 

</div> 

<div class="panel-body"> 

	<form style="color: brown;" class="form-horizontal" action="" method="post" enctype="multipart/form-data">

<div class="form-group">

	<label class="col-md-3 control-label"> Catégorie </label>

<div class="col-md-6">

	<input type="text" name="cat_title" class="form-control">

	</div>
</div>

<div class="form-group">

	<label class="col-md-3 control-label"> Afficher ?</label>

<div class="col-md-6">

	<input type="radio" name="cat_top" value="yes">

	<label> OUI </label>

	<input type="radio" name="cat_top" value="no">

	<label> NON </label>

	</div>
</div> 

<div class="form-group"> 

	<label class="col-md-3 control-label"> Photo </label>

<div class="col-md-6">

	<input type="file" name="cat_image" class="form-control">

	</div>
</div>	

<div class="form-group"> 

	<label class="col-md-3 control-label"></label>

<div class="col-md-6">

	<input type="submit" name="submit" value="Ajouter une Catégorie" class="btn btn-primary form-control">

						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>

	<img style="position: absolute; top: 330px; left: 600px; border-radius: 20px;" 
	src="other_images/CatArt.PNG" alt="catégorie d'articles">

<?php

if(isset($_POST['submit'])){

	$cat_title = $_POST['cat_title'];
	$cat_top = $_POST['cat_top'];
	$cat_image = $_FILES['cat_image']['name'];
	$temp_name = $_FILES['cat_image']['tmp_name'];

	move_uploaded_file($temp_name,"other_images/$cat_image");

	$insert_cat = "INSERT into categories (cat_title,cat_top,cat_image) 
	values ('$cat_title','$cat_top','$cat_image')";

	$run_cat = mysqli_query($con,$insert_cat);

if($run_cat){

	echo "<script> alert('Catégorie ajouté !')</script>";

	echo "<script> window.open('index.php?view_cats','_self') </script>";
}
}
?>

<?php 
} 
?>
