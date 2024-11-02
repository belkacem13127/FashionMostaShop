<?php

if(!isset($_SESSION['admin_email'])){

	echo "<script>window.open('login.php','_self')</script>";

}else {
?>

<script src="//cdn.tinymce.com/4/tinymce.min.js"></script>
<script>tinymce.init({ selector:'textarea' });</script>

<div class="row" ></div> 

<div class="row"> 

<div class="col-lg-12"> 

<div class="panel panel-default"> 

<div class="panel-heading"> 

	<h3 style="font-family: palantino; font-size: 22px; color: #098830;" class="panel-title">
	<i class="fa fa-money fa-fw"></i>&emsp;Ajouter une Boutique </h3>

</div> 

<div class="panel-body"> 

	<form style="color: brown;" class="form-horizontal" action="" method="post" enctype="multipart/form-data">

<div class="form-group"> 

	<label class="col-md-3 control-label"> Titre </label>

<div class="col-md-6">

	<input type="text" name="store_title" class="form-control">

	</div>
</div> 

<div class="form-group"> 

	<label class="col-md-3 control-label"> Photo </label>

<div class="col-md-6">

	<input type="file" name="store_image" class="form-control">

	</div>
</div> 

<div class="form-group"> 

	<label class="col-md-3 control-label"> Description </label>

<div class="col-md-6">

	<textarea name="store_desc" class="form-control" rows="10" cols="19"></textarea>

	</div>
</div> 

<div class="form-group"> 

	<label class="col-md-3 control-label"> Référence </label>

<div class="col-md-6">

	<input type="text" name="store_button" class="form-control">

	</div>
</div> 

<div class="form-group"> 

	<label class="col-md-3 control-label"> Boutique Url : </label>

<div class="col-md-6">

	<input type="url" name="store_url" class="form-control">

	</div>
</div> 

<div class="form-group"> 

	<label class="col-md-3 control-label"> </label>

<div class="col-md-6">

	<input type="submit" name="submit" value="Insert store" class="btn btn-primary form-control">

						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>

<?php

if(isset($_POST['submit'])){
	$store_title = $_POST['store_title'];

	$store_desc = $_POST['store_desc'];
	$store_button = $_POST['store_button'];
	$store_url = $_POST['store_url'];
	$store_image = $_FILES['store_image']['name'];
	$tmp_image = $_FILES['store_image']['tmp_name'];
	$sel_store = "select * from store";
	$run_store = mysqli_query($con,$sel_store);
	$count = mysqli_num_rows($run_store);

if($count == 3){

	echo "<script>alert('Vous avez déjà ajouté 3 Boutiques !')</script>";

}else {

	move_uploaded_file($tmp_image,"store_images/$store_image");

	$insert_store = "INSERT into store (store_title,store_image,store_desc,store_button,store_url) 
	values ('$store_title','$store_image','$store_desc','$store_button','$store_url')";

	$run_store = mysqli_query($con,$insert_store);

if($run_store){

	echo "<script>alert('Nouvelle Boutique ajouté !')</script>";

	echo "<script>window.open('index.php?view_store','_self')</script>";
}
}
}
?>

<?php 
} 
?>
