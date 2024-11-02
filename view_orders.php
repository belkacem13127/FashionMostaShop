<?php

if(!isset($_SESSION['admin_email'])){

	echo "<script>window.open('login.php','_self')</script>";

}else {
?>

<div class="row"></div>

</div> 

<div class="row"> 

<div class="col-lg-12"> 

<div class="panel panel-default"> 

<div class="panel-heading"> 

	<h3 style="font-family: palantino; font-size: 22px; color: #098830;" class="panel-title"> 
	<i class="fa fa-money fa-fw"></i>&emsp;Afficher les Commandes </h3> 

</div> 

<div class="panel-body"> 

<div class="table-responsive"> 

	<table class="table table-bordered table-hover table-striped">

	<thead style="color: brown;"> 

	<tr>

		<th> N° </th>
		<th> Client </th>
		<th> Facture </th>
		<th> Article </th>
		<th> Qté </th>
		<th> Taille </th>
		<th> Date </th>
		<th> Total </th>
		<th> Statut </th>
		<th> Action </th>

	</tr>
</thead>

	<tbody> 

<?php

	$i = 0;

	$get_orders = "SELECT * from pending_orders";

	$run_orders = mysqli_query($con,$get_orders);

while ($row_orders = mysqli_fetch_array($run_orders)) {
	$order_id = $row_orders['order_id'];

	$c_id = $row_orders['customer_id'];
	$invoice_no = $row_orders['invoice_no'];
	$product_id = $row_orders['product_id'];
	$qty = $row_orders['qty'];
	$size = $row_orders['size'];
	$order_status = $row_orders['order_status'];

	$get_products = "SELECT * from products where product_id='$product_id'";

	$run_products = mysqli_query($con,$get_products);
	$row_products = mysqli_fetch_array($run_products);

	$product_title = $row_products['product_title'];

	$i++;
?>

	<tr>

		<td><?php echo $i; ?></td>

		<td>

<?php 

	$get_customer = "SELECT * from customers where customer_id='$c_id'";

	$run_customer = mysqli_query($con,$get_customer);
	$row_customer = mysqli_fetch_array($run_customer);

	$customer_email = $row_customer['customer_email'];

	echo $customer_email;
?>
 
</td>

		<td bgcolor="orange" ><?php echo $invoice_no; ?></td>
		<td><?php echo $product_title; ?></td>
		<td><?php echo $qty; ?></td>
		<td><?php echo $size; ?></td>

		<td>

<?php

	$get_customer_order = "SELECT * from customer_orders where order_id='$order_id'";

	$run_customer_order = mysqli_query($con,$get_customer_order);
	$row_customer_order = mysqli_fetch_array($run_customer_order);

	$order_date = $row_customer_order['order_date'];
	$due_amount = $row_customer_order['due_amount'];

	echo $order_date;
?>

</td>

		<td> DA <?php echo $due_amount; ?></td>

		<td>

<?php

if($order_status=='pending'){

	echo $order_status='<div style="color:red;">En Attente</div>';

}else {

	echo $order_status='Complète';
}
?>
	
</td>

		<td>

	<a href="index.php?order_delete=<?php echo $order_id; ?>" >
	<i class="fa fa-trash-o" ></i> Supprimer </a>

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
