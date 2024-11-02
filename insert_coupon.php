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
	<i class="fa fa-money fa-fw"> </i>&emsp;Ajouter un Coupon </h3> 

</div> 

<div class="panel-body"> 

	<form style="color: brown;" class="form-horizontal" method="post" action=""> 

<div class="form-group" > 

	<label class="col-md-3 control-label"> Titre </label>

<div class="col-md-6">

	<input type="text" name="coupon_title" class="form-control">

	</div>
</div> 

<div class="form-group" > 

	<label class="col-md-3 control-label"> Prix </label>

<div class="col-md-6">

	<input type="text" name="coupon_price" class="form-control">

	</div>
</div> 

<div class="form-group" > 

	<label class="col-md-3 control-label"> Code </label>

<div class="col-md-6">

	<input type="text" name="coupon_code" class="form-control">

	</div>
</div> 

<div class="form-group" > 

	<label class="col-md-3 control-label"> Limite </label>

<div class="col-md-6">

	<input type="number" name="coupon_limit" value="1" class="form-control">

	</div>
</div> 

<div class="form-group" > 

	<label class="col-md-3 control-label"> Sélectionner un Coupon pour un Article ou un Lot </label>

<div class="col-md-6">

	<select name="product_id" class="form-control">

	<option> Sélectionner un Coupon Article </option>

<?php

	$get_p = "SELECT * from products where status='product'";

	$run_p = mysqli_query($con,$get_p);

while($row_p = mysqli_fetch_array($run_p)){

	$p_id = $row_p['product_id'];
	$p_title = $row_p['product_title'];

	echo "<option value='$p_id'> $p_title </option> ";
}
?>

	<option></option>

	<option> Sélectionner un Coupon Lot </option>

	<option></option>

<?php

	$get_p = "SELECT * from products where status='bundle'";

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

<div class="form-group" > 

	<label class="col-md-3 control-label"> </label>

<div class="col-md-6">

	<input type="submit" name="submit" class=" btn btn-primary form-control" value="Ajouter un Coupon">

						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>

	<img style="position: absolute; top: 450px; left: 700px; border-radius: 20px;" 
	src="other_images/Coupon.PNG" alt="coupon">

<?php

if(isset($_POST['submit'])){
	$coupon_title = $_POST['coupon_title'];

	$coupon_price = $_POST['coupon_price'];
	$coupon_code = $_POST['coupon_code'];
	$coupon_limit = $_POST['coupon_limit'];
	$product_id = $_POST['product_id'];
	$coupon_used = 0;

	$get_coupons = "SELECT * from coupons where product_id='$product_id' or coupon_code='$coupon_code'";

	$run_coupons = mysqli_query($con,$get_coupons);
	$check_coupons = mysqli_num_rows($run_coupons);

if($check_coupons == 1){

	echo "<script>alert('Coupon déjà ajouté, choisir un autre Coupon !')</script>";

}else {

	$insert_coupon = "INSERT into coupons (
	product_id,coupon_title,coupon_price,coupon_code,coupon_limit,coupon_used) 
	values ('$product_id','$coupon_title','$coupon_price','$coupon_code','$coupon_limit','$coupon_used')";

	$run_coupon = mysqli_query($con,$insert_coupon);

if($run_coupon){

	echo "<script>alert('Nouveau Coupon ajouté !')</script>";

	echo "<script>window.open('index.php?view_coupons','_self')</script>";
}
}
}
?>

<?php 
} 
?>
