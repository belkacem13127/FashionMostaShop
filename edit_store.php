<?php

if(!isset($_SESSION['admin_email'])){

	echo "<script>window.open('login.php','_self')</script>";

}else {
?>

<script src="//cdn.tinymce.com/4/tinymce.min.js"></script>
<script>tinymce.init({ selector:'textarea' });</script>
  
<?php

if(isset($_GET['edit_store'])){

	$edit_id = $_GET['edit_store'];

	$get_store = "SELECT * from store where store_id='$edit_id'";

	$run_store = mysqli_query($con,$get_store);
	$row_store = mysqli_fetch_array($run_store);

	$store_id = $row_store['store_id'];
	$store_title = $row_store['store_title'];
	$store_image = $row_store['store_image'];
	$store_desc = $row_store['store_desc'];
	$store_button = $row_store['store_button'];
	$store_url = $row_store['store_url'];
	$new_s_image = $row_store['store_image'];
}
?>  

<div class="row" ></div> 

<div class="row"> 

<div class="col-lg-12"> 

<div class="panel panel-default"> 

<div class="panel-heading"> 

	<h3 style="font-family: palantino; font-size: 22px; color: #098830;" class="panel-title">
	<i class="fa fa-money fa-fw"></i>&emsp;Editer la Boutique </h3>

</div>	

<div class="panel-body">	

	<form style="color: brown;" class="form-horizontal" action="" method="post" enctype="multipart/form-data">	

<div class="form-group">	

	<label class="col-md-3 control-label"> Titre </label>

<div class="col-md-6">

	<input type="text" name="store_title" class="form-control" value="<?php echo $store_title; ?>">

	</div>
</div> 

<div class="form-group"> 

	<label class="col-md-3 control-label"> Photo </label>

<div class="col-md-6">

	<input type="file" name="store_image" class="form-control">

<br>

	<img src="store_images/<?php echo $store_image; ?>" width="100" height="100" >

	</div>
</div> 

<div class="form-group"> 

	<label class="col-md-3 control-label"> Description </label>

<div class="col-md-6">

	<textarea name="store_desc" class="form-control" rows="10" cols="19">

<?php echo $store_desc; ?>

		</textarea>
	</div>
</div> 

<div class="form-group"> 

	<label class="col-md-3 control-label"> Plan </label>

<div class="col-md-6">

	<input type="text" name="store_button" class="form-control" value="<?php echo $store_button; ?>">

	</div>
</div> 

<div class="form-group"> 

	<label class="col-md-3 control-label"> Boutique Url </label>

<div class="col-md-6">

	<input type="url" name="store_url" class="form-control" value="<?php echo $store_url; ?>">

	</div>
</div> 

<div class="form-group"> 

	<label class="col-md-3 control-label"> </label>

<div class="col-md-6">

	<input type="submit" name="update" value="Mise à Jour de la Boutique" class="btn btn-primary form-control">

						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>

<?php

if(isset($_POST['update'])){
	$store_title = $_POST['store_title'];

	$store_desc = $_POST['store_desc'];
	$store_button = $_POST['store_button'];
	$store_url = $_POST['store_url'];
	$store_image = $_FILES['store_image']['name'];
	$tmp_image = $_FILES['store_image']['tmp_name'];

if(empty($store_image)){
	$store_image = $new_s_image;
}

	move_uploaded_file($tmp_image,"store_images/$store_image");

	$update_store = "UPDATE store set store_title='$store_title',store_image='$store_image',
	store_desc='$store_desc',store_button='$store_button',store_url='$store_url' where store_id='$store_id' ";

	$run_store = mysqli_query($con,$update_store);

if($run_store){

	echo "<script>alert('Mise à Jour réussie !')</script>";

	echo "<script>window.open('index.php?view_store','_self')</script>";
}
}
?>

<?php 
} 
?>
