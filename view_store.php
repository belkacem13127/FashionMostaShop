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

	<h3 style="font-family: palantino; font-size: 22px; color: #098830;" class="panel-title">
	<i class="fa fa-money fa-fw"></i>&emsp;Afficher les Boutiques </h3>

</div> 

<div class="panel-body"> 

<?php

	$get_store = "SELECT * from store";

	$run_store = mysqli_query($con,$get_store);

while($row_store = mysqli_fetch_array($run_store)){
	$store_id = $row_store['store_id'];

	$store_title = $row_store['store_title'];
	$store_image = $row_store['store_image'];
	$store_desc = substr($row_store['store_desc'],0,400);
	$store_button = $row_store['store_button'];
	$store_url = $row_store['store_url'];
?>

<div class="col-lg-4 col-md-4"> 

<div class="panel panel-primary">

<div class="panel-heading"> 

	<h3 class="panel-title" align="center">

<?php echo $store_title; ?>

	</h3>
</div> 

<div class="panel-body"> 

	<img src="store_images/<?php echo $store_image; ?>" class="img-responsive">

<br>

<p><?php echo $store_desc; ?></p>

</div> 

<div class="panel-footer"> 

	<a href="index.php?delete_store=<?php echo $store_id; ?>" class="pull-left">
	<i class="fa fa-trash-o"></i> Supprimer </a>

	<a href="index.php?edit_store=<?php echo $store_id; ?>" class="pull-right">
	<i class="fa fa-pencil"></i> Editer </a>

<div class="clearfix"> </div>

		</div>
	</div>
</div>

<?php 
} 
?>

			</div>
		</div>
	</div>
</div>

<?php 
} 
?>
