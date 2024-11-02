</head>

  <body>

  <header class="page-header">
    
<div style="background-color: #87ab9b; height: 100px;" class="page-header__topline">
      
<div class="container clearfix">

<div class="currency">

  <img style="width: 100px; position: absolute; top: 5px; left: 470px;" src="images/FMS.PNG" alt="logo">

  <img style="width: 120px; position: absolute; top: 8px; left: 620px;" src="images/Logo FMS.PNG" alt="logo">  

  <p style="font-family: Brush Script MT, Brush Script Std, cursive; color: white; font-size: 33px;
  position: absolute; top: 50px; left: 45px;">
  <span style="color: #a74cea;">F</span>ashion 
  <span style="color: #a74cea;">M</span>osta 
  <span style="color: #a74cea;">S</span>hop</p>
          
  <a class="currency__change" href="customer/my_account.php?my_orders">
          
<?php
          
if(!isset($_SESSION['customer_email'])){
  
  echo "<span style='color:white; font-size:20px'> Bienvenue : Invité ! </span>"; 
          
}else { 
             
   echo "
   <a href='shop.php'>
   <span style='color:white; font-size:20px'> Bienvenue : " . $_SESSION['customer_email'] . " </span>";
}
?>
          
  </a>
</div>

<div class="basket">
          
  <a href="cart.php" class="btn btn--basket">
  
  <i class="icon-basket"></i>
            
<?php items(); ?> &emsp;<span style="color: black; font-weight: bold;"> Articles </span>
          
  </a>
</div>
        
  <ul class="login">

    <li class="login__item">

<?php
  
if(!isset($_SESSION['customer_email'])){
  
  echo '<a href="customer_register.php" class="login__link"><span style="color:white; font-size:20px"> 
  Inscription</a></span>';

}else { 
      
  echo '<a href="customer/my_account.php?my_orders" class="login__link"><span style="color:white; 
  font-size:20px">Mon Compte</a></span>';
}   
?>  

</li>

    <li class="login__item">

<?php

if(!isset($_SESSION['customer_email'])){
  echo '<a href="checkout.php" class="login__link"><span style="color:white; font-size:20px">
  Connexion</a></span>';

}else { 
  echo '<a href="./logout.php" class="login__link"><span style="color:white; font-size:20px">
  Deconnexion</a></span>';
  
}   
?>  
  
      </li>
    </ul>
  </div>
</div>
   
<div class="page-header__bottomline">
      
<div class="container clearfix">

<div class="logo">
          
  <a class="logo__link" href="index.php">
            
  <p style="font-family: Palatino; font-size: 30px;">
  <span style="color: #a74cea;">F</span>ashion 
  <span style="color: #a74cea;">M</span>osta 
  <span style="color: #a74cea;">S</span>hop</p>
          
  </a>
</div>

  <nav class="main-nav">
          
  <ul class="categories">

    <li style="font-size: 20px; position: absolute; top: 130px; left: 600px;" class="categories__item">
    <a href="shop.php">Prêt à Porter</a></li>
               
    <li style="font-size: 20px; position: absolute; top: 130px; left: 780px;" class="categories__item">
    <a href="shop.php">Achats</a></li>
                
    <li style="font-size: 20px; position: absolute; top: 130px; left: 900px;" class="categories__item">
    <a href="localstore.php">Boutiques</a></li>
                
    <li style="font-size: 20px; position: absolute; top: 130px; left: 1050px;" class="categories__item">
    
    <a href="customer/my_account.php?my_orders"> Mon Compte <i class="icon-down-open-1"></i></a>
              
<div style="background-color: #609882;" class="dropdown dropdown--lookbook">
                
<div class="clearfix">
                  
<div class="dropdown__half">
                    
<div style="color: white; font-size: 18px;"> Paramètres </div><br>
                    
  <ul class="dropdown__items">
                      
    <li class="dropdown__item"><a style="color: white; font-size: 14px;" href="customer/my_wishlist.php" 
    class="dropdown__link"> Mes Favoris </a></li> 
                        
    <li class="dropdown__item"><a style="color: white; font-size: 14px;" href="customer/my_orders.php" 
    class="dropdown__link"> Mes Commandes </a></li>
                      
    <li class="dropdown__item"><a style="color: white; font-size: 14px;" href="./cart.php" 
    class="dropdown__link"> Afficher le Panier </a></li>
                      
  </ul>
</div>
                  
<div class="dropdown__half">
                    
<div class="dropdown__heading"></div>
                    
  <ul class="dropdown__items">
                      
    <li class="dropdown__item"><a style="color: white; font-size: 14px;" href="customer/edit_account.php" 
    class="dropdown__link"> Editer votre Compte </a></li>
                      
    <li class="dropdown__item"><a style="color: white; font-size: 14px;" href="customer/change_pass.php" 
    class="dropdown__link"> Changer le Mot de Passe </a></li>
                      
    <li class="dropdown__item"><a style="color: red; font-size: 18px;" href="customer/delete_account.php" 
    class="dropdown__link"> Supprimer le Compte </a></li>
                      
                  </ul>
                </div>
              </div>
            </div>
          </li>
        </ul>
      </nav>
    </div>
  </div>
</header>
