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
	<i class="fa fa-money fa-fw"></i>&emsp;Afficher les Fournisseurs </h3>

</div> 

<div class="panel-body"> 

<div class="table-responsive"> 

	<table class="table table-bordered table-hover table-striped">

	<thead style="color: brown;"> 

	<tr>

		<th> N° </th>
		<th> Fournisseur </th>
		<th> Supprimer </th>
		<th> Editer </th>

	</tr>
</thead> 

<tbody> 

<?php

	$i = 0;

	$get_manufacturers = "SELECT * from manufacturers";

	$run_manufacturers = mysqli_query($con,$get_manufacturers);

while($row_manufacturers = mysqli_fetch_array($run_manufacturers)){
	$manufacturer_id = $row_manufacturers['manufacturer_id'];

	$manufacturer_title = $row_manufacturers['manufacturer_title'];

	$i++;
?>

	<tr>

		<td><?php echo $i; ?></td>
		<td><?php echo $manufacturer_title; ?></td>

		<td>
		<a href="index.php?delete_manufacturer=<?php echo $manufacturer_id; ?>">
		<i class="fa fa-trash-o"></i> Supprimer </a></td>

		<td>
		<a href="index.php?edit_manufacturer=<?php echo $manufacturer_id; ?>">
		<i class="fa fa-pencil"></i> Editer </a></td>

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
