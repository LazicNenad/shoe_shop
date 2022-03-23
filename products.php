<?php
include "pages/head.php";
include "pages/nav.php";
include "config/connection.php";
include "models/functions.php";
?>


<?php
if (isset($_GET['idProduct'])) {
	$idProduct = $_GET['idProduct'];
	$product = getProductById($idProduct);
	if ($product) {
		echo "<div class='row container'>
		<div class='col s12 m4 mt-3'>
			<div class='card'>
				<div class='card-image'>
					<img src='$product->image'>
					
				</div>
			</div>
		</div>
		<div class='col s12 m8 mt-3'>
			<div class='card-content'>
			<span class='card-title grey-text text-darken-4'>$product->ProductName</span>
			<hr>
				<p>Gender: $product->CatName </p>
				<p>Brand: $product->BrandName</p>
				<p>New Price: $$product->price</p>
				<del>Old Price: $$product->oldPrice</del>
			</div>
			<div class='card-action'>";
		if (!isset($_SESSION['user'])) {
			echo "<p class='red-text'> Please Login/Register To Purchase </p> 
			<a class='btn disabled waves-effect waves-light mt-3'>Add To Cart</a>
			";
		} else {
			echo "
			<a class='btn waves-effect waves-light mt-3'>Add To Cart</a>";
		}
		echo "</div>
		</div>
	</div>";
	} else {
		echo "<p> Nema </p>";
	}
}
?>



<?php
include "pages/footer.php";
?>