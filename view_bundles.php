<?php

if(!isset($_SESSION['admin_email'])){

	echo "<script>window.open('login.php','_self')</script>";

}else {
?>

<div class="row"> </div> 

<div class="row" > 

<div class="col-lg-12" > 

<div class="panel panel-default" > 

<div class="panel-heading" > 

	<h3 style="font-family: palantino; font-size: 22px; color: #098830;" class="panel-title" > 
	<i class="fa fa-money fa-fw" ></i>&emsp;Afficher les Lots </h3> 

</div> 

<div class="panel-body" > 

<div class="table-responsive" > 

	<table class="table table-bordered table-hover table-striped" >

	<thead style="color: brown;">

	<tr>

		<th> N° </th>
		<th> Titre </th>
		<th >Photo </th>
		<th> Prix </th>
		<th> Solde </th>
		<th> Référence </th>
		<th> Date </th>
		<th> Supprimer </th>
		<th> Editer </th>
	</tr>
</thead>

	<tbody>

<?php

	$i = 0;

	$get_pro = "SELECT * from products where status='bundle'";

	$run_pro = mysqli_query($con,$get_pro);

while($row_pro=mysqli_fetch_array($run_pro)){
	$pro_id = $row_pro['product_id'];

	$pro_title = $row_pro['product_title'];
	$pro_image = $row_pro['product_img1'];
	$pro_price = $row_pro['product_price'];
	$pro_keywords = $row_pro['product_keywords'];
	$pro_date = $row_pro['date'];

	$i++;
?>

	<tr>

		<td><?php echo $i; ?></td>
		<td><?php echo $pro_title; ?></td>
		<td><img src="product_images/<?php echo $pro_image; ?>" width="100" height="100"></td>
		<td> DA <?php echo $pro_price; ?></td>

		<td>

<?php

	$get_sold = "SELECT * from pending_orders where product_id='$pro_id'";

	$run_sold = mysqli_query($con,$get_sold);
	$count = mysqli_num_rows($run_sold);

	echo $count;
?>
	
</td>

		<td> <?php echo $pro_keywords; ?> </td>	 
		<td><?php echo $pro_date; ?></td>

		<td>
	
	<a href="index.php?delete_bundle=<?php echo $pro_id; ?>">
	<i class="fa fa-trash-o"> </i> Supprimer </a>

</td>

		<td>

	<a href="index.php?edit_bundle=<?php echo $pro_id; ?>">
	<i class="fa fa-pencil"> </i> Editer </a>

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
