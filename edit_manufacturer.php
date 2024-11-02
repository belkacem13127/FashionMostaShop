<?php

if(!isset($_SESSION['admin_email'])){

	echo "<script>window.open('login.php','_self')</script>";

}else {
?>

<?php

if(isset($_GET['edit_manufacturer'])){
	$edit_manufacturer = $_GET['edit_manufacturer'];

	$get_manufacturer = "SELECT * from manufacturers where manufacturer_id='$edit_manufacturer'";

	$run_manufacturer = mysqli_query($con,$get_manufacturer);
	$row_manufacturer = mysqli_fetch_array($run_manufacturer);

	$m_id = $row_manufacturer['manufacturer_id'];
	$m_title = $row_manufacturer['manufacturer_title'];
	$m_top = $row_manufacturer['manufacturer_top'];
	$m_image = $row_manufacturer['manufacturer_image'];
	$new_m_image = $row_manufacturer['manufacturer_image'];
}
?>

<div class="row"></div> 

</div> 

<div class="row"> 

<div class="col-lg-12"> 

<div class="panel panel-default"> 

<div class="panel-heading"> 

	<h3 style="font-family: palantino; font-size: 22px; color: #098830;" class="panel-title"> 
	<i class="fa fa-money fa-fw"> </i>&emsp;Editer le Fournisseur </h3> 

</div> 

<div class="panel-body"> 

	<form style="color: brown;" class="form-horizontal" action="" method="post" enctype="multipart/form-data"> 

<div class="form-group"> 

	<label class="col-md-3 control-label"> Nom </label>

<div class="col-md-6">

	<input type="text" name="manufacturer_name" class="form-control" value="<?php echo $m_title; ?>">

	</div>
</div> 

<div class="form-group"> 

	<label class="col-md-3 control-label"> Afficher le Fournisseur ? </label>

<div class="col-md-6">

	<input type="radio" name="manufacturer_top" value="yes" 

<?php if($m_top == 'no'){}else{ echo "checked='checked'"; } ?> >

	<label> OUI </label>

	<input type="radio" name="manufacturer_top" value="no" 

<?php if($m_top == 'no'){ echo "checked='checked'"; }else{} ?> >

	<label> NON </label>

	</div>
</div> 

<div class="form-group"> 

	<label class="col-md-3 control-label"> Photo </label>

<div class="col-md-6">

	<input type="file" name="manufacturer_image" class="form-control" >

<br>

	<img src="other_images/<?php echo $m_image; ?>" width="100" height="100">

	</div>
</div>

<div class="form-group"> 

	<label class="col-md-3 control-label"> </label>

<div class="col-md-6">

	<input type="submit" name="update" class="form-control btn btn-primary" value="Mise à Jour du Fournisseur" >

						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>>

<?php

if(isset($_POST['update'])){
	$manufacturer_name = $_POST['manufacturer_name'];

	$manufacturer_top = $_POST['manufacturer_top'];
	$manufacturer_image = $_FILES['manufacturer_image']['name'];
	$tmp_name = $_FILES['manufacturer_image']['tmp_name'];

	move_uploaded_file($tmp_name,"other_images/$manufacturer_image");

if(empty($manufacturer_image)){
	$manufacturer_image = $new_m_image;
}

	$update_manufacturer = "UPDATE manufacturers set manufacturer_title='$manufacturer_name',
	manufacturer_top='$manufacturer_top',manufacturer_image='$manufacturer_image' 
	where manufacturer_id='$m_id'";

	$run_manufacturer = mysqli_query($con,$update_manufacturer);

if($run_manufacturer){

	echo "<script>alert('Mise à Jour réussie !')</script>";

	echo "<script>window.open('index.php?view_manufacturers','_self')</script>";
}
}
?>

<?php 
} 
?>
