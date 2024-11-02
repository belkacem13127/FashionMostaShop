<?php

if(!isset($_SESSION['admin_email'])){

	echo "<script>window.open('login.php','_self')</script>";

}else {
?>

<div class="row"></div>

<div class="row">

<div class="col-lg-12">

<div class="panel panel-default">

<div class="panel-heading">

	<h3 style="font-family: palantino; font-size: 22px; color: #098830;" class="panel-title"><i class="fa fa-money fa-fw"> </i>&emsp;Afficher les Catégories d'Articles </h3>

</div>

<div class="panel-body">

<div class="table-responsive">

	<table class="table table-bordered table-hover table-striped">

	<thead style="color: brown;"> 

	<tr>

		<th> N° </th>
		<th> Catégorie d'Articles </th>
		<th> Supprimer </th>
		<th> Editer </th>

	</tr>
</thead> 

	<tbody> 

<?php

	$i=0;

	$get_p_cats = "SELECT * from product_categories";

	$run_p_cats = mysqli_query($con,$get_p_cats);

while($row_p_cats = mysqli_fetch_array($run_p_cats)){
	$p_cat_id = $row_p_cats['p_cat_id'];

	$p_cat_title = $row_p_cats['p_cat_title'];

	$i++;
?>

	<tr>

		<td> <?php echo $i; ?> </td>
		<td> <?php echo $p_cat_title; ?> </td>

		<td> 

	<a href="index.php?delete_p_cat=<?php echo $p_cat_id; ?>">
	<i class="fa fa-trash-o"></i> Supprimer </a></td>

		<td> 

	<a href="index.php?edit_p_cat=<?php echo $p_cat_id; ?>">
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
