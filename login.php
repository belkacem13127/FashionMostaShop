<?php

	session_start();

include("includes/db.php");
?>

<!DOCTYPE HTML>
	
	<html>

	<head>

	<title> Connexion Administrateur </title>
	<link rel="stylesheet" href="css/bootstrap.min.css" >
	<link rel="stylesheet" href="css/login.css" >

</head>

	<body>

	<img style="position: absolute; top: 80px; left: 120px; border-radius: 20px;" 
	src="other_images/Ban.PNG" alt="bannière">

	<img style="position: absolute; top: 80px; left: 960px; border-radius: 20px;" 
	src="other_images/Bannière.PNG" alt="bannière">

	<a href="../index.php"> <img style="position: absolute; top: 500px; left: 620px;" 
	src="other_images/Back.PNG" alt="retour"></a>

	<p style="position: absolute; top: 450px; left: 600px; font-family: pacifico; font-size: 20px; 
	color: white;"> Retour à l'Accueil </p>

<div class="container" > 

	<form class="form-login" action="" method="post" > 

	<h2 class="form-login-heading"> Administrateur </h2>

	<input type="text" class="form-control" name="admin_email" placeholder="E-mail" required >

	<input type="password" class="form-control" name="admin_pass" placeholder="Mot de Passe" required >

	<button class="btn btn-lg btn-primary btn-block" type="submit" name="admin_login" > Connexion </button>

			</form> 
		</div>
	</body>
</html>

<?php

if(isset($_POST['admin_login'])){

	$admin_email = mysqli_real_escape_string($con,$_POST['admin_email']);
	$admin_pass = mysqli_real_escape_string($con,$_POST['admin_pass']);

	$get_admin = "SELECT * from admins where admin_email='$admin_email' AND admin_pass='$admin_pass'";

	$run_admin = mysqli_query($con,$get_admin);

$count = mysqli_num_rows($run_admin);

if($count==1){
	$_SESSION['admin_email']=$admin_email;

	echo "<script>alert('Vous êtes connecté au Panneau d'Administration)</script>";

	echo "<script>window.open('index.php?dashboard','_self')</script>";

}else {

	echo "<script>alert('Identifiant ou Mot de passe invalide !')</script>";
}
}
?>
