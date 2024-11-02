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
	<i class="fa fa-money fa-fw"> </i>&emsp;Afficher les Paiements </h3> 

</div> 

<div class="panel-body"> 

<div class="table-responsive"> 

	<table class="table table-hover table-bordered table-striped"> 

	<thead style="color: brown;"> 

	<tr>

		<th> N° </th>
		<th> Facture </th>
		<th> Montant Payé </th>
		<th> Mode de Paiement </th>
		<th> Référence </th>
		<th> Code </th>
		<th> Date </th>
		<th> Action </th>

	</tr>
</thead> 

<tbody> 

	<?php

	$i = 0;

	$get_payments = "SELECT * from payments";

	$run_payments = mysqli_query($con,$get_payments);

while($row_payments = mysqli_fetch_array($run_payments)){
	$payment_id = $row_payments['payment_id'];

	$invoice_no = $row_payments['invoice_no'];
	$amount = $row_payments['amount'];
	$payment_mode = $row_payments['payment_mode'];
	$ref_no = $row_payments['ref_no'];
	$code = $row_payments['code'];
	$payment_date = $row_payments['payment_date'];

	$i++;
?>

	<tr>

		<td><?php echo $i; ?></td>
		<td bgcolor="yellow" ><?php echo $invoice_no; ?></td>
		<td> DA <?php echo $amount; ?></td>
		<td><?php echo $payment_mode; ?></td>
		<td><?php echo $ref_no; ?></td>
		<td><?php echo $code; ?></td>
		<td><?php echo $payment_date; ?></td>

		<td>

	<a href="index.php?payment_delete=<?php echo $payment_id; ?>" >
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
