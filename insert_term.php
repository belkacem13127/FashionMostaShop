<?php

if(!isset($_SESSION['admin_email'])){

	echo "<script>window.open('login.php','_self')</script>";

}else {
?>

<script src="//cdn.tinymce.com/4/tinymce.min.js"></script>
<script>tinymce.init({ selector:'textarea' });</script>

<div class="row"></div> 

<div class="row"> 

<div class="col-lg-12"> 

<div class="panel panel-default"> 

<div class="panel-heading"> 

	<h3 style="font-family: palantino; font-size: 22px; color: #098830;" class="panel-title"> 
	<i class="fa fa-money fa-fw"></i>&emsp;Ajouter une Condition </h3> 

</div> 

<div class="panel-body"> 

	<form style="color: brown;" class="form-horizontal" action="" method="post"> 

<div class="form-group"> 

	<label class="col-md-3 control-label"> Titre </label>

<div class="col-md-6"> 

	<input type="text" name="term_title" class="form-control" >

	</div> 
</div> 

<div class="form-group"> 

	<label class="col-md-3 control-label"> Description </label>

<div class="col-md-6"> 

	<textarea name="term_desc" class="form-control" rows="6" cols="19" ></textarea>

	</div> 
</div> 

<div class="form-group"> 

	<label class="col-md-3 control-label"> Lien </label>

<div class="col-md-6"> 

	<input type="text" name="term_link" class="form-control" >

	</div> 
</div> 

<div class="form-group"> 

	<label class="col-md-3 control-label"> </label>

<div class="col-md-6"> 

	<input type="submit" name="submit" value="Ajouter une Condition" class="btn btn-primary form-control" >

						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>

	<img style="position: absolute; top: 450px; left: 670px; border-radius: 20px;" 
	src="other_images/Condition.PNG" alt="conditions">

<?php

if(isset($_POST['submit'])){
	$term_title = $_POST['term_title'];

	$term_desc = $_POST['term_desc'];
	$term_link = $_POST['term_link'];

	$insert_term = "INSERT into terms (term_title,term_link,term_desc) 
	values ('$term_title','$term_link','$term_desc')";

$run_term = mysqli_query($con,$insert_term);

if($run_term){

	echo "<script>alert('Nouvelle Condition ajouté !')</script>";

	echo "<script>window.open('index.php?view_terms','_self')</script>";
}
}
?>

<?php 
} 
?>
