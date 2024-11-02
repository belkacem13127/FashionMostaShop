<?php

if(!isset($_SESSION['admin_email'])){

	echo "<script>window.open('login.php','_self')</script>";

}else {
?>

<div class="row"> </div> 

<div class="row"> 

<div class="col-lg-12"> 

<div class="panel panel-default"> 

<div class="panel-heading" > 

	<h3 style="font-family: palantino; font-size: 22px; color: #098830;" class="panel-title" > 
	<i class="fa fa-money fa-fw" ></i>&emsp;Ajouter une Catégorie d'Articles </h3> 

</div> 

<div class="panel-body" > 

	<form style="color: brown;" class="form-horizontal" action="" method="post" enctype="multipart/form-data" >

<div class="form-group" > 

	<label class="col-md-3 control-label"> Catégorie d'Articles </label>

<div class="col-md-6" >

	<input type="text" name="p_cat_title" class="form-control" >

	</div>
</div> 

<div class="form-group" > 

	<label class="col-md-3 control-label"> Afficher ? </label>

<div class="col-md-6" >

	<input type="radio" name="p_cat_top" value="yes" >

	<label> OUI </label>

	<input type="radio" name="p_cat_top" value="no" >

	<label> NON </label>

	</div>
</div> 

<div class="form-group" > 

	<label class="col-md-3 control-label"> Photo </label>

<div class="col-md-6" >

	<input type="file" name="p_cat_image" class="form-control" >

	</div>
</div> 

<div class="form-group" > 

	<label class="col-md-3 control-label" ></label>

<div class="col-md-6" >

	<input type="submit" name="submit" value="Ajouter la Catégorie d'Articles" class="btn btn-primary form-control" >

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
	$p_cat_title = $_POST['p_cat_title'];

	$p_cat_top = $_POST['p_cat_top'];
	$p_cat_image = $_FILES['p_cat_image']['name'];
	$temp_name = $_FILES['p_cat_image']['tmp_name'];

	move_uploaded_file($temp_name,"other_images/$p_cat_image");

	$insert_p_cat = "INSERT into product_categories (p_cat_title,p_cat_top,p_cat_image) 
	values ('$p_cat_title','$p_cat_top','$p_cat_image')";

	$run_p_cat = mysqli_query($con,$insert_p_cat);

if($run_p_cat){

	echo "<script>alert('Catégorie d'Articles ajouté !)</script>";

	echo "<script>window.open('index.php?view_p_cats','_self')</script>";
}
}
?>

<?php 
} 
?>
