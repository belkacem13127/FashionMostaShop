<?php

if(!isset($_SESSION['admin_email'])){

	echo "<script>window.open('login.php','_self')</script>";

}else {
?>


<?php

if(isset($_GET['edit_rel'])){
	$edit_id = $_GET['edit_rel'];

	$edit_rel = "SELECT * from bundle_product_relation where rel_id='$edit_id'";

	$run_edit = mysqli_query($con,$edit_rel);
	$row_edit = mysqli_fetch_array($run_edit);

	$r_id = $row_edit['rel_id'];
	$r_title = $row_edit['rel_title'];
	$r_p = $row_edit['product_id'];
	$r_b = $row_edit['bundle_id'];

	$get_p = "SELECT * from products where product_id='$r_p'";

	$run_p = mysqli_query($con,$get_p);
	$row_p = mysqli_fetch_array($run_p);

	$p_id = $row_p['product_id'];
	$p_title = $row_p['product_title'];

	$get_b = "SELECT * from products where product_id='$r_b'";

	$run_b = mysqli_query($con,$get_b);
	$row_b = mysqli_fetch_array($run_b);

	$b_id = $row_b['product_id'];
	$b_title = $row_b['product_title'];
}
?>

<div class="row"> </div> 

<div class="row"> 

<div class="col-lg-12"> 

<div class="panel panel-default"> 

<div class="panel-heading"> 

	<h3 style="font-family: palantino; font-size: 22px; color: #098830;" class="panel-title"> 
	<i  class="fa fa-money fa-fw"></i>&emsp;Editer la Relation </h3> 

</div> 

<div class="panel-body"> 

	<form style="color: brown;" class="form-horizontal" action="" method="post"> 

<div class="form-group"> 

	<label class="col-md-3 control-label"> Titre  </label>

<div class="col-md-6">

	<input type="text" name="rel_title" class="form-control" value="<?php echo $r_title; ?>">

	</div>
</div> 

<div class="form-group"> 

	<label class="col-md-3 control-label"> Sélectionner l'Article </label>

<div class="col-md-6">

	<select name="product_id" class="form-control">

	<option value="<?php echo $p_id; ?>"> <?php echo $p_title; ?>  </option>

<?php

	$get_p = "SELECT * from products where status='product'";

	$run_p = mysqli_query($con,$get_p);

while($row_p = mysqli_fetch_array($run_p)){

	$p_id = $row_p['product_id'];
	$p_title = $row_p['product_title'];

	echo "<option value='$p_id'> $p_title </option> ";
}
?>

		</select>
	</div>
</div> 

<div class="form-group"> 

	<label class="col-md-3 control-label"> Sélectionner le Lot  </label>

<div class="col-md-6">

	<select name="bundle_id" class="form-control">

	<option value="<?php echo $b_id; ?>">  <?php echo $b_title; ?> </option>

<?php

	$get_p = "SELECT * from products where status='bundle'";

	$run_p = mysqli_query($con,$get_p);

while($row_p = mysqli_fetch_array($run_p)){

	$p_id = $row_p['product_id'];
	$p_title = $row_p['product_title'];

	echo "<option value='$p_id'> $p_title </option>";
}
?>

		</select>
	</div>
</div>	

<div class="form-group"> 

	<label class="col-md-3 control-label"> </label>

<div class="col-md-6">

	<input type="submit" name="update" class="btn btn-primary form-control" value="Mise à Jour de la Relation">

						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>

<?php

if(isset($_POST['update'])){
	$rel_title = $_POST['rel_title'];

	$product_id = $_POST['product_id'];
	$bundle_id = $_POST['bundle_id'];

	$update_rel = "UPDATE bundle_product_relation set rel_title='$rel_title',product_id='$product_id',
	bundle_id='$bundle_id' where rel_id='$r_id'";

	$run_rel = mysqli_query($con,$update_rel);

if($run_rel){

	echo "<script>alert('Mise à Jour réussie !')</script>";

	echo "<script> window.open('index.php?view_rel','_self') </script>";
}
}
?>

<?php 
} 
?>
