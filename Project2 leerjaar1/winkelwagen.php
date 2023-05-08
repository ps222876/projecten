<?php
 	$fietsnummer= $_GET['fiets'];
	$naam = $_GET['naam'];
	$prijs = $_GET['prijs'];

?>

<!DOCTYPE html>
<html lang="nl">

<head>
  <title>Fietsen</title>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">


  <link rel="stylesheet" href="css/fiets3.css">

</head>

<body>
   <div class="Container">
   	   <div class="Header">
   	   	<h3 class="Heading">Shopping Cart</h3>
   	   	<h5 class="Action">Remove all</h5>
   	   </div>

   	   <div class="Cart-Items">
   	   	  <div class="image-box">
   	   	  	<img id="img1" src="fietsen/<?php echo $fietsnummer ?>.jpg" />
   	   	  </div>
   	   	  <div class="about">
   	   	  	<h1 class="titel"><?php echo $naam ?> </h1>
   	   	  </div>
   	   	  <div class="counter">
   	   	  	<div class="btn">+</div>
   	   	  	<div class="count">1</div>
   	   	  	<div class="btn">-</div>
   	   	  </div>
   	   	  <div class="prices">
   	   	  	<div class="amount" >€<?php echo $prijs ?></div>
   	   	  	<div class="save"><u>Save for later</u></div>
   	   	  	<div class="remove"><u>Remove</u></div>
   	   	  </div>
   	   </div>

   	 <hr id="line" > 
   	 <div class="checkout">
   	 <div class="total">
   	 	<div>
   	 		<div class="Subtotal">Sub-Total</div>
   	 		<div class="items">1 items</div>
   	 	</div>
   	 	<div class="total-amount"> €<?php echo $prijs ?></div>
   	 </div>
   	 <button class="button">Checkout</button></div>
   </div>
</body>

</html>