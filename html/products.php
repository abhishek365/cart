<?php
include "config.php";
if(!isset($_SESSION['cart'])||empty($_SESSION['cart'])){
	$_SESSION['cart'] = array();
}
//var_dump($_SESSION['cart']);
?>
<!DOCTYPE html>
<html>
<head>
	<title>
		Products
	</title>
	<link href="style.css" type="text/css" rel="stylesheet">
</head>
<body>
	<?php
	include "header.php";
	 ?>
	<div id="main">
		<div id="products">
		<?php 
		foreach($products as $prod)
		{
		?>
		<form action="" method="POST">
			<div id="product-<?php echo $prod['id']; ?>" class="product">
					<img src="<?php echo "images/" . $prod["image"]; ?>">
					<h2 class="title">Product <?php echo $prod["id"]; ?></h2>
					<span>Price: <?php echo $prod["price"]; ?>$</span>
					<input type="submit" name="submit" data-id="<?php echo $prod["id"]; ?>" class="add-to-cart" value="Add to Cart">
			</div>
		</form>
		<?php 
		}
		?>
		</div>
	</div>
	<div id="table">
    </div>
	<?php
	include "footer.php";
	?>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

	<script src="script.js"></script>
</body>
</html>