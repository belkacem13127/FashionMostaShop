<?php

if(!isset($_SESSION['admin_email'])){

	echo "<script>window.open('login.php','_self')</script>";

}else {
?>

<?php

if(isset($_GET['edit_cat'])){
	$edit_id = $_GET['edit_cat'];

	$edit_cat = "SELECT * from categories where cat_id='$edit_id'";

	$run_edit = mysqli_query($con,$edit_cat);
	$row_edit = mysqli_fetch_array($run_edit);

	$c_id = $row_edit['cat_id'];
	$c_title = $row_edit['cat_title'];
	$c_top = $row_edit['cat_top'];
	$c_image = $row_edit['cat_image'];
	$new_c_image = $row_edit['cat_image'];
}
?>

<div class="row"> </div> 

<div class="row"> 

<div class="col-lg-12"> 

<div class="panel panel-default"> 

<div class="panel-heading"> 

	<h3 style="font-family: palantino; font-size: 22px; color: #098830;" class="panel-title"> 
	<i class="fa fa-money fa-fw"></i>&emsp;Editer la Catégorie </h3> 

</div> 

<div class="panel-body"> 

	<form style="color: brown;" class="form-horizontal" action="" method="post" enctype="multipart/form-data">

<div class="form-group"> 

	<label class="col-md-3 control-label"> Titre </label>

<div class="col-md-6">

	<input type="text" name="cat_title" class="form-control" value="<?php echo $c_title; ?>">

	</div>
</div> 

<div class="form-group"> 

	<label class="col-md-3 control-label"> Afficher la Catéhgorie ? </label>

<div class="col-md-6">

	<input type="radio" name="cat_top" value="yes" 

<?php if($c_top == 'no'){}else{ echo "checked='checked'"; } ?>>

	<label> OUI </label>

	<input type="radio" name="cat_top" value="no" 

<?php if($c_top == 'no'){ echo "checked='checked'"; }else{} ?>>

	<label>NON</label>

	</div>
</div> 

<div class="form-group"> 

	<label class="col-md-3 control-label"> Photo </label>

<div class="col-md-6">

	<input type="file" name="cat_image" class="form-control">

<br>

	<img src="other_images/<?php echo $c_image; ?>" width="100" height="100" >

	</div>
</div>

<div class="form-group"> 

	<label class="col-md-3 control-label"></label>

<div class="col-md-6">

	<input type="submit" name="update" value="Mise à Jour de la Catégorie" class="btn btn-primary form-control">

						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>

<?php

if(isset($_POST['update'])){
	$cat_title = $_POST['cat_title'];

	$cat_top = $_POST['cat_top'];
	$cat_image = $_FILES['cat_image']['name'];
	$temp_name = $_FILES['cat_image']['tmp_name'];

	move_uploaded_file($temp_name,"other_images/$cat_image");

if(empty($cat_image)){
	$cat_image= $new_c_image;
}

	$update_cat = "UPDATE categories set cat_title='$cat_title',cat_top='$cat_top',cat_image='$cat_image' 
	where cat_id='$c_id'";

	$run_cat = mysqli_query($con,$update_cat);

if($run_cat){

	echo "<script>alert('Mise à Jour réussie !')</script>";

	echo "<script>window.open('index.php?view_cats','_self')</script>";
}
}
?>

<?php 
} 
?>
