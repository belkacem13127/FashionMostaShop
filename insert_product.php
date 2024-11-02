<?php

if(!isset($_SESSION['admin_email'])){

	echo "<script>window.open('login.php','_self')</script>";

}else {
?>

<!DOCTYPE html>

	<html>

	<head>

	<title> Ajouter un Article </title>
	<script src="//cdn.tinymce.com/4/tinymce.min.js"></script>
  	<script>tinymce.init({ selector:'#product_desc,#product_features' });</script>

</head>

	<body>

<div class="row"></div>

<div class="row"> 

<div class="col-lg-12"> 

<div class="panel panel-default"> 

<div class="panel-heading"> 

	<h3 style="font-family: palantino; font-size: 22px; color: #098830;" class="panel-title">
	<i class="fa fa-money fa-fw"></i>&emsp;Ajouter un Article </h3>

</div> 

<div class="panel-body"> 

	<form style="color: brown;" class="form-horizontal" method="post" enctype="multipart/form-data"> 

<div class="form-group" > 

	<label class="col-md-3 control-label" > Article </label>

<div class="col-md-6" >

	<input type="text" name="product_title" class="form-control" required >

	</div>
</div> 

<div class="form-group" > 

	<label class="col-md-3 control-label" > Article Url </label>

<div class="col-md-6" >

	<input type="text" name="product_url" class="form-control" required >

<br>

	</div>
</div>

<div class="form-group" > 

	<label class="col-md-3 control-label" > Fournisseur </label>

<div class="col-md-6" >

	<select class="form-control" name="manufacturer">

	<option> Sélectionner un Fournisseur </option>

<?php

	$get_manufacturer = "SELECT * from manufacturers";

	$run_manufacturer = mysqli_query($con,$get_manufacturer);

while($row_manufacturer= mysqli_fetch_array($run_manufacturer)){
	$manufacturer_id = $row_manufacturer['manufacturer_id'];

	$manufacturer_title = $row_manufacturer['manufacturer_title'];

	echo "<option value='$manufacturer_id'> $manufacturer_title</option> ";
}
?>

		</select>
	</div>
</div>

<div class="form-group" > 

	<label class="col-md-3 control-label" > Catégorie d'Articles </label>

<div class="col-md-6" >

	<select name="product_cat" class="form-control" >

	<option> Sélectionner une Catégorie d'Articles </option>

<?php

	$get_p_cats = "SELECT * from product_categories";

	$run_p_cats = mysqli_query($con,$get_p_cats);

while ($row_p_cats=mysqli_fetch_array($run_p_cats)) {
	$p_cat_id = $row_p_cats['p_cat_id'];

	$p_cat_title = $row_p_cats['p_cat_title'];

	echo "<option value='$p_cat_id' >$p_cat_title</option>";
}
?>

		</select>
	</div>
</div>

<div class="form-group" > 

	<label class="col-md-3 control-label" > Catégorie </label>

<div class="col-md-6" >

	<select name="cat" class="form-control" >

	<option> Sélectionner une Catégorie </option>

<?php

	$get_cat = "SELECT * from categories ";

	$run_cat = mysqli_query($con,$get_cat);

while ($row_cat=mysqli_fetch_array($run_cat)) {
	$cat_id = $row_cat['cat_id'];

	$cat_title = $row_cat['cat_title'];

	echo "<option value='$cat_id'>$cat_title</option> ";
}
?>

		</select>
	</div>
</div> 

<div class="form-group" > 

	<label class="col-md-3 control-label" > Photo 1 </label>

<div class="col-md-6" >

	<input type="file" name="product_img1" class="form-control" required >

	</div>
</div> >

<div class="form-group" > 

	<label class="col-md-3 control-label" > Photo 2 </label>

<div class="col-md-6" >

	<input type="file" name="product_img2" class="form-control" required >

	</div>
</div> 

<div class="form-group" > 

	<label class="col-md-3 control-label" > Photo 3 </label>

<div class="col-md-6" >

	<input type="file" name="product_img3" class="form-control" required >

	</div>
</div>

<div class="form-group" > 

	<label class="col-md-3 control-label" > Prix </label>

<div class="col-md-6" >

	<input type="text" name="product_price" class="form-control" required >

	</div>
</div> 

<div class="form-group" > 

	<label class="col-md-3 control-label" > Prix </label>

<div class="col-md-6" >

	<input type="text" name="psp_price" class="form-control" required >

	</div>
</div>

<div class="form-group" > 

	<label class="col-md-3 control-label" > Référence </label>

<div class="col-md-6" >

	<input type="text" name="product_keywords" class="form-control" required >

	</div>
</div> 

<div class="form-group" > 

	<label class="col-md-3 control-label" > Tableau </label>

<div class="col-md-6" >

	<ul class="nav nav-tabs"> 

		<li class="active"><a data-toggle="tab" href="#description"> Description </a></li>

		<li><a data-toggle="tab" href="#features"> Caractéristiques </a></li>

		<li><a data-toggle="tab" href="#video"> Son & Vidéo </a></li>

</ul> 

<div class="tab-content"> 

<div id="description" class="tab-pane fade in active"> 

<br>

	<textarea name="product_desc" class="form-control" rows="15" id="product_desc"></textarea>

</div> 

<div id="features" class="tab-pane fade in"> 

<br>

	<textarea name="product_features" class="form-control" rows="15" id="product_features"></textarea>

</div> 

<div id="video" class="tab-pane fade in"> 

<br>

	<textarea name="product_video" class="form-control" rows="15"></textarea>

			</div>
		</div>
	</div>
</div>

<div class="form-group" >

	<label class="col-md-3 control-label" > Marque </label>

<div class="col-md-6" >

	<input type="text" name="product_label" class="form-control" required >

	</div>
</div> 

<div class="form-group" > 

	<label class="col-md-3 control-label" ></label>

<div class="col-md-6" >

	<input type="submit" name="submit" value="Ajouter un Article" class="btn btn-primary form-control" >

								</div>
							</div> 
						</form>
					</div>
				</div>
			</div>
		</div>  
	</body>
</html>

<?php

if(isset($_POST['submit'])){
	$product_title = $_POST['product_title'];
	
	$product_cat = $_POST['product_cat'];
	$cat = $_POST['cat'];
	$manufacturer_id = $_POST['manufacturer'];
	$product_price = $_POST['product_price'];
	$product_desc = $_POST['product_desc'];
	$product_keywords = $_POST['product_keywords'];

	$psp_price = $_POST['psp_price'];

	$product_label = $_POST['product_label'];

	$product_url = $_POST['product_url'];

	$product_features = $_POST['product_features'];

	$product_video = $_POST['product_video'];

	$status = "product";

	$product_img1 = $_FILES['product_img1']['name'];
	$product_img2 = $_FILES['product_img2']['name'];
	$product_img3 = $_FILES['product_img3']['name'];

	$temp_name1 = $_FILES['product_img1']['tmp_name'];
	$temp_name2 = $_FILES['product_img2']['tmp_name'];
	$temp_name3 = $_FILES['product_img3']['tmp_name'];

	move_uploaded_file($temp_name1,"product_images/$product_img1");
	move_uploaded_file($temp_name2,"product_images/$product_img2");
	move_uploaded_file($temp_name3,"product_images/$product_img3");

	$insert_product = "INSERT into products (p_cat_id,cat_id,manufacturer_id,date,product_title,product_url,
	product_img1,product_img2,product_img3,product_price,product_psp_price,product_desc,product_features,
	product_video,product_keywords,product_label,status) values ('$product_cat','$cat','$manufacturer_id',
	NOW(),'$product_title','$product_url','$product_img1','$product_img2','$product_img3','$product_price',
	'$psp_price','$product_desc','$product_features','$product_video','$product_keywords','$product_label',
	'$status')";

	$run_product = mysqli_query($con,$insert_product);
$limite = 9;
if($run_product){

	echo "<script>alert('Article ajouté')</script>";

	echo "<script>window.open('index.php?view_products','_self')</script>";
}
}
?>

<?php 
} 
?>
