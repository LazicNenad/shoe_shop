<?php
// session_start();
// include "config/connection.php";
// include "models/functions.php";
$limit = isset($_GET['limit']) ? $_GET['limit'] : "0";
$allProducts = getAllLimit($limit);
if (isset($_SESSION['user']) && $limit === "0") {
	if ($_SESSION['user'] == 'Admin') {
		echo "<div class='col s12 m6 l4 d-flex' id='btnHolder'>
					<div class='  '>
						<span class='white-text'>
						<a class='waves-effect waves-light btn modal-trigger btn-floating pulse #212121 grey darken-4' href='#modal1' id='addBtn'><i class='material-icons'>add</i></a>
						</span>
					</div>
				</div>";
	}
}
foreach ($allProducts as $product) :
?>
	<div class="col s12 m6 l4">
		<div class="card">
			<div class="card-image">
				<img src="<?= $product->image ?>">
			</div>
			<span class="card-title grey-text text-darken-4 center-align-products"><?= $product->name ?></span>
			<div class="card-content">
				<p>$<?= $product->price ?></p>
				<del>$<?= $product->oldPrice ?></del>
			</div>
			<div class="card-action">
				<a href="products.php?idProduct=<?= $product->idProduct ?>" class="grey-text text-darken-4 seeMore">See More</a>
				<?php
				if (isset($_SESSION['user'])) {
					if ($_SESSION['user'] == 'Admin') {
						echo "<a class='#212121 grey darken-4 waves-effect waves-light btn mt-1 btn-delete' id='$product->idProduct'>Delete</a>";
					}
					echo "<a class='waves-effect waves-light btn mt-1 addClass'>Add To Cart</a>";
				} else {
					echo "<a class='waves-effect waves-light btn mt-1 addClass disabled'>Add To Cart</a>";
					echo "<p class='red-text'> Please Login/Register To Purchase </p>";
				}
				?>
			</div>
		</div>
	</div>
<?php
endforeach;

?>

<!-- Modal Structure -->
<div id="modal1" class="modal">
	<div class="modal-content">
		<h4>Insert Product</h4>
		<div class="row">
			<form class="col s12" method='post' name='form-insert' enctype="multipart/form-data" action='insert-item.php' onSubmit='return checkInsertFields()'>
				<div class="row">
					<div class="input-field col s12">
						<input id="productName" type="text" class="validate" name='productName'>
						<label for="productName">Product Name</label>
					</div>
					<div class="input-field col s12">
						<input id="productPrice" type="number" class="validate" name='productPrice'>
						<label for="productPrice">Price</label>
					</div>
				</div>

				<div class="row">
					<div class="input-field col s12">
						<input id="productOldPrice" type="number" class="validate" name='productOldPrice'>
						<label for="productOldPrice">Old Price</label>
					</div>
				</div>
				<div class="row">
					<div class="input-field col s12">
						<input id="image-file" type="file" class="validate" name='userfile'>

					</div>
				</div>
				<div class="row">
					<div class="input-field col s6">
						<select name='productCategory' id='selectCategory'>
							<option value="0">Choose the category</option>
							<?php
							$allCategories = getAll("category");
							foreach ($allCategories as $category) :
							?>
								<option value="<?= $category->idCat ?>"><?= $category->name ?></option>

							<?php
							endforeach;
							?>
						</select>
						<label>Choose Category</label>
						<span id="spanCategory"></span>
					</div>

					<div class="input-field col s6">
						<select name='productBrand' id='selectBrand'>
							<option value="0">Choose the brand</option>
							<?php
							$allBrands = getAll("brand");
							foreach ($allBrands as $brand) :
							?>
								<option value="<?= $brand->idBrand ?>"><?= $brand->name ?></option>

							<?php
							endforeach;
							?>
						</select>
						<label>Choose Brand</label>
						<span id="spanBrand"></span>
					</div>
					<input type="submit" value="Insert" class="btn mt-3" name="btnSubmit" id='btnSubmit'>
				</div>
			</form>
		</div>
	</div>
</div>