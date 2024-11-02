<?php

  session_start();

include("includes/db.php");
include("includes/header.php");
include("functions/functions.php");
include("includes/main.php");
?>

  <main style="height: 200px; background-image: url('images/bgcolor.PNG')">
   
<div class="">
      
<div class="nero__heading">
        
  <span style="font-family: palantino; position: absolute; top: 290px; left: 550px; color: white">
  Panier</span>

  <img style="position: absolute; top: 200px; left: 1000px; width: 200px;" src="images/Panier.PNG" 
  alt="panier">
      
</div>
      
  <p class="nero__text"></p>
    
  </div>
</main>

<div id="content" > 

<div class="container" > 

<div class="col-md-9" id="cart" > 

<div class="box" > 

  <form action="cart.php" method="post" enctype="multipart-form-data" > 

  <h1 style="color: green;"> Panier </h1>

<?php

  $ip_add = getRealUserIp();

  $select_cart = "SELECT * from cart where ip_add='$ip_add'";

  $run_cart = mysqli_query($con,$select_cart);
  $count = mysqli_num_rows($run_cart);
?>

  <p style="color: black; font-size: 16px; color: black;" class="text" > 
  Vous avez actuellement&emsp; <span style="color: red;"><?php echo $count; ?></span> 
  &emsp;Articles(s)&emsp;dans votre Panier.</p>

<div class="table-responsive" > 

  <table class="table" > 

  <thead style="color: brown;"> 

  <tr>

    <th colspan="2"> Article </th>
    <th> Quantité </th>
    <th> Prix </th>
    <th> Taille </th>
    <th colspan="1"> Supprimer</th>
    <th colspan="2"> Sous Total </th>

  </tr>
</thead> 

  <tbody> 

<?php

$total = 0;

while($row_cart = mysqli_fetch_array($run_cart)){
  $pro_id = $row_cart['p_id'];

  $pro_size = $row_cart['size'];
  $pro_qty = $row_cart['qty'];
  $only_price = $row_cart['p_price'];

  $get_products = "SELECT * from products where product_id='$pro_id'";

  $run_products = mysqli_query($con,$get_products);

while($row_products = mysqli_fetch_array($run_products)){
  $product_title = $row_products['product_title'];

  $product_img1 = $row_products['product_img1'];
  $sub_total = $only_price*$pro_qty;
  $_SESSION['pro_qty'] = $pro_qty;
  $total += $sub_total;
?>

  <tr>
    
    <td><img src="admin_area/product_images/<?php echo $product_img1; ?>" ></td>

    <td><a href="#" > <?php echo $product_title; ?> </a></td>

    <td>

  <input type="text" name="quantity" value="<?php echo $_SESSION['pro_qty']; ?>" 
  data-product_id="<?php echo $pro_id; ?>" class="quantity form-control">

</td>

    <td> DA <?php echo $only_price; ?> .00 </td>

    <td> <?php echo $pro_size; ?> </td>

    <td> <input type="checkbox" name="remove[]" value="<?php echo $pro_id; ?>"> </td>

    <td> DA <?php echo $sub_total; ?> .00 </td>

</tr>

<?php 
} 
} 
?>

</tbody>

  <tfoot>

  <tr>

    <th colspan="5"> Total </th>

    <th colspan="2">  DA <?php echo $total; ?>. 00 </th>

    </tr>
  </tfoot> 
</table> 

<div class="form-inline pull-right"> 

<div class="form-group"> 

  <label> Code du Coupon </label>

  <input type="text" name="code" class="form-control">

</div> 

  <input style="font-size: 18px; color: black;" class="btn btn-primary" type="submit" name="apply_coupon" 
  value="Appliquer" >

  </div> 
</div> 

<div class="box-footer"> 

<div class="pull-left"> 

  <a style="font-size: 18px; color: black;" href="index.php" class="btn btn-warning">
  <i class="fa fa-chevron-left"></i>&emsp;Continuer vos Achats </a>

</div>

<div class="pull-right"> 

  <button style="font-size: 18px; color: black;" class="btn btn-info" type="submit" name="update" 
  value="Update Cart">
  <i class="fa fa-refresh"></i>&emsp;Mise à Jour du panier </button>

  <a style="font-size: 18px; color: black;" href="checkout.php" class="btn btn-success"> 
  Procéder au Paiement&emsp; <i class="fa fa-chevron-right"></i> </a>

    </div> 
  </div> 
  </form> 
</div> 

<?php

if(isset($_POST['apply_coupon'])){

  $code = $_POST['code'];

if($code == ""){

}else {

  $get_coupons = "SELECT * from coupons where coupon_code='$code'";

  $run_coupons = mysqli_query($con,$get_coupons);
  $check_coupons = mysqli_num_rows($run_coupons);

if($check_coupons == 1){
  $row_coupons = mysqli_fetch_array($run_coupons);

  $coupon_pro = $row_coupons['product_id'];
  $coupon_price = $row_coupons['coupon_price'];
  $coupon_limit = $row_coupons['coupon_limit'];
  $coupon_used = $row_coupons['coupon_used'];

if($coupon_limit == $coupon_used){

  echo "<script>alert('La Date de votre Coupon a expiré !')</script>";

}else {

  $get_cart = "SELECT * from cart where p_id='$coupon_pro' AND ip_add='$ip_add'";

  $run_cart = mysqli_query($con,$get_cart);
  $check_cart = mysqli_num_rows($run_cart);

if($check_cart == 1){

  $add_used = "UPDATE coupons set coupon_used=coupon_used+1 where coupon_code='$code'";

  $run_used = mysqli_query($con,$add_used);

  $update_cart = "UPDATE cart set p_price='$coupon_price' where p_id='$coupon_pro' AND ip_add='$ip_add'";

  $run_update = mysqli_query($con,$update_cart);

  echo "<script>alert('Votre Coupon a été appliqué !')</script>";

  echo "<script>window.open('cart.php','_self')</script>";

}else {

  echo "<script>alert('Article introuvable dans votre Panier !')</script>";
}
}

}else {

  echo "<script> alert('Votre Coupon n'est plus valide !) </script>";
}
}
}
?>

<?php

  function update_cart(){

global $con;

if(isset($_POST['update'])){
foreach($_POST['remove'] as $remove_id){

  $delete_product = "DELETE from cart where p_id='$remove_id'";

  $run_delete = mysqli_query($con,$delete_product);

if($run_delete){

  echo "<script>window.open('cart.php','_self')</script>";
}
}
}
}

  echo @$up_cart = update_cart();
?>

<div id="row same-height-row"> 

<div class="col-md-3 col-sm-6"> 

<div class="box same-height headline"> 

  <h3 class="text-center"> <span style="color: green;">Vous allez</span><br><br><br>aimer<br><br><br>
    <span style="color: red;">ces Articles ! </span> </h3>

  </div> 
</div> 

<?php

  $get_products = "SELECT * from products order by rand() LIMIT 0,3";

  $run_products = mysqli_query($con,$get_products);

while($row_products=mysqli_fetch_array($run_products)){
  $pro_id = $row_products['product_id'];

  $pro_title = $row_products['product_title'];
  $pro_price = $row_products['product_price'];
  $pro_img1 = $row_products['product_img1'];
  $pro_label = $row_products['product_label'];
  $manufacturer_id = $row_products['manufacturer_id'];

  $get_manufacturer = "SELECT * from manufacturers where manufacturer_id='$manufacturer_id'";

  $run_manufacturer = mysqli_query($db,$get_manufacturer);
  $row_manufacturer = mysqli_fetch_array($run_manufacturer);

  $manufacturer_name = $row_manufacturer['manufacturer_title'];
  $pro_psp_price = $row_products['product_psp_price'];
  $pro_url = $row_products['product_url'];

if($pro_label == "Sale" or $pro_label == "Gift"){
  $product_price = "<del>  DA $pro_price </del>";

  $product_psp_price = "| DA $pro_psp_price";

}
else{

  $product_psp_price = "";
  $product_price = " DA $pro_price";
}

if($pro_label == ""){


}else {

  $product_label = "

    <a class='label sale' href='#' style='color:black;'>
    <div class='thelabel'>$pro_label</div>
    <div class='label-background'> </div></a> ";
}

  echo "
    <div class='col-md-3 col-sm-6 center-responsive' >
    <div class='product' >
    <a href='$pro_url' > <img src='admin_area/product_images/$pro_img1' class='img-responsive' > </a>
    <div class='text' >
    <center><p class='btn btn-warning'> $manufacturer_name </p></center>
    <hr>
    <h3><a href='$pro_url' >$pro_title</a></h3>
    <p class='price' > $product_price $product_psp_price </p>
    <p class='buttons' >
    <a href='$pro_url' class='btn btn-primary' >Afficher les détails</a>
    <a href='$pro_url' class='btn btn-danger'> 
    <i class='fa fa-shopping-cart'></i> Ajouter au Panier </a></p></div>
    $product_label </div></div> ";
}
?>

  </div> 
</div> 

<div class="col-md-3"> 

<div class="box" id="order-summary"> 

<div class="box-header"> 

  <h3 style="color: blue;"> Récapitulatif </h3>

</div> 

<div class="table-responsive"> 

  <table class="table"> 

  <tbody> 

  <tr>

    <td style="color: blue;"> Sous Total </td>
    <th> DA <?php echo $total; ?> .00 </th>

</tr>

  <tr>

    <td style="color: blue;"> Livraison </td>
    <th> DA 0.00</th>

</tr>

  <tr>

    <td style="color: blue;"> TVA </td>
    <th> DA 0.00</th>

</tr>

  <tr class="total">

    <td style="color: blue;"> Total </td>
    <th> DA <?php echo $total; ?> .00 </th>

              </tr>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div> 
</div> 

<script src="js/jquery.min.js"> </script>
<script src="js/bootstrap.min.js"></script>

<script>

$(document).ready(function(data){

$(document).on('keyup', '.quantity', function(){

  var id = $(this).data("product_id");

  var quantity = $(this).val();

if(quantity  != ''){

$.ajax({

  url:"change.php",

  method:"POST",

  data:{id:id, quantity:quantity},

  success:function(data){

$("body").load('cart_body.php');
}
});
}
});
});

    </script>
  </body>
</html>
