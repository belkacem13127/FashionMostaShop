<?php

if(!isset($_SESSION['admin_email'])){

	echo "<script>window.open('login.php','_self')</script>";

}else {
?>

<div class="row" ></div> 

<div class="row" > 

<div class="col-lg-12" > 

<div class="panel panel-default" > 

<div class="panel-heading" > 

	<h3 style="font-family: palantino; font-size: 22px; color: #098830;" class="panel-title" > 
	<i class="fa fa-money fa-fw" ></i>&emsp;Afficher les Utilisateurs </h3> 

</div> 

<div class="panel-body" > 

<div class="table-responsive" > 

	<table class="table table-bordered table-hover table-striped" >

	<thead style="color: brown;"> 

	<tr>

		<th>Utilisateur</th>
		<th>E-mail</th>
		<th>Photo</th>
		<th>Wilaya</th>
		<th>Fonction</th>
		<th>Supprimer</th>

	</tr>
</thead> 

	<tbody> 

<?php

	$get_admin = "SELECT * from admins";

	$run_admin = mysqli_query($con,$get_admin);

while($row_admin = mysqli_fetch_array($run_admin)){
	$admin_id = $row_admin['admin_id'];

	$admin_name = $row_admin['admin_name'];
	$admin_email = $row_admin['admin_email'];
	$admin_image = $row_admin['admin_image'];
	$admin_country = $row_admin['admin_country'];
	$admin_job = $row_admin['admin_job'];
?>

	<tr>

		<td><?php echo $admin_name; ?></td>
		<td><?php echo $admin_email; ?></td>
		<td><img src="admin_images/<?php echo $admin_image; ?>" width="100" height="100" ></td>
		<td><?php echo $admin_country; ?></td>
		<td><?php echo $admin_job; ?></td>

		<td>

	<a href="index.php?user_delete=<?php echo $admin_id; ?>" >
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
