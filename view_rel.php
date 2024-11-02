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
	<i class="fa fa-money fa-fw"></i>&emsp;Afficher les Relations </h3>

</div> 

<div class="panel-body"> 

<div class="table-responsive"> 

	<table class="table table-bordered table-hover table-striped"> 

	<thead style="color: brown;"> 

	<tr>

		<th> N° </th>

		<th> Titre </th>

		<th> Article </th>

		<th> Lot </th>

		<th> Supprimer </th>

		<th> Editer </th>

	</tr>
</thead> 

	<tbody> 

<?php

	$i = 0;

	$get_rel = "SELECT * from bundle_product_relation";

	$run_rel = mysqli_query($con,$get_rel);

while($row_rel = mysqli_fetch_array($run_rel)){
	$rel_id = $row_rel['rel_id'];

	$rel_title = $row_rel['rel_title'];
	$bundle_id = $row_rel['bundle_id'];
	$product_id = $row_rel['product_id'];

	$get_p = "SELECT * from products where product_id='$product_id'";

	$run_p = mysqli_query($con,$get_p);
	$row_p = mysqli_fetch_array($run_p);

	$p_title = $row_p['product_title'];

	$get_b = "SELECT * from products where product_id='$bundle_id'";

	$run_b = mysqli_query($con,$get_b);
	$row_b = mysqli_fetch_array($run_b);

	$b_title = $row_b['product_title'];

	$i++;
?>

	<tr>

		<td> <?php echo $i; ?> </td>
		<td> <?php echo $rel_title; ?> </td>
		<td> <?php echo $p_title; ?> </td>
		<td> <?php echo $b_title; ?> </td>

		<td>

	<a href="index.php?delete_rel=<?php echo $rel_id; ?>">
	<i class="fa fa-trash-o"></i> Supprimer </a>

</td>

		<td>

	<a href="index.php?edit_rel=<?php echo $rel_id; ?>">
	<i class="fa fa-pencil"></i> Editer </a>

	</td>
</tr>

<?php 
} 
?>

						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
</div>

<?php 
} 
?>
