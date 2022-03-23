<?php
include "admin-pages/admin-header.php";
$limit = isset($_GET['limit']) ? $_GET['limit'] : "0";
?>
<main>
	<div class="container">
		<div class="masonry row">
			<div class="col s12">
				<h2>Dashboard</h2>
			</div>
			<div class="col l4 m6 s12">

				<div class="card">
					<div class="card-stacked">
						<div class="card-metrics card-metrics-dynamic">
							<div class="card-metric">
								<div class="card-metric-title">Total Products</div>
								<div class="card-metric-value">
									<?php
									$totalProducts = totalProducts();
									echo ($totalProducts->totalProducts);
									?>
								</div>
							</div>
						</div>
					</div>
				</div>

			</div>
			<div class="col l4 m6 s12">

				<div class="card">
					<div class="card-stacked">
						<div class="card-metrics card-metrics-static">
							<div class="card-metric">
								<div class="card-metric-title">Total Users</div>
								<div class="card-metric-value">
									<?php
									$totalUsers = totalUsers();
									echo ($totalUsers->totalUsers);
									?>
								</div>
							</div>
						</div>
					</div>
				</div>

			</div>
			<div class="col l4 m6 s12">

				<div class="card">
					<div class="card-stacked">
						<div class="card-metrics card-metrics-static">
							<div class="card-metric">
								<div class="card-metric-title">Total Admins</div>
								<div class="card-metric-value">
									<?php
									$totalAdmins = totalAdmins();
									echo ($totalAdmins->totalAdmins);
									?>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>

		</div>
		<div class="row masonry">
			<div class="container col s12 stripped">
				<div class="col s12">
					<h2>All Products</h2>
				</div>
				<table>
					<thead>
						<tr>
							<th>RB</th>
							<th>Product Image</th>
							<th>Product Name</th>
							<th>Product Price</th>
							<th>Product Date</th>
							<th>Product Brand</th>
							<th>Product Category</th>
							<th>Delete</th>
						</tr>
					</thead>

					<tbody>

						<?php
						$rb = 1;
						$allProductsAdmin = getAllProducts($limit);
						foreach ($allProductsAdmin as $product) :
							$timestamp = strtotime($product->date);
						?><tr>
								<td><?= $rb++ ?></td>
								<td><img src="<?= $product->image ?>" alt="" style='width: 70px; border-radius: 50%'></td>
								<td><?= $product->name ?></td>
								<td>$<?= $product->price ?></td>
								<td><?= date('d. M. Y', $timestamp) ?></td>
								<td><?= $product->ProductBrand ?></td>
								<td><?= $product->ProductCategory ?></td>
								<td><a class=" waves-effect waves-light btn  btn-delete" id="<?= $product->idProduct ?>">Delete</a></td>
							<tr>

							<?php
						endforeach;
							?>
					</tbody>
				</table>
				<div class="col s12">
					<div class="addBrand mt-3 center-align">
						<a class="waves-effect waves-light btn modal-trigger btn-floating btn-large waves-effect waves-light" href="#modal4"><i class="material-icons">add</i></a>
					</div>
				</div>
				<div class="col s12">
					<?php
					$countProducts = getCountProducts();

					$numberOfPages = ceil(($countProducts->numberPages / 4));


					?>
					<ul class="pagination center-align">
						<!-- <li class="active #212121 grey darken-4"><a href="store.php">1</a></li> -->
						<?php
						for ($i = 0; $i < $numberOfPages; $i++) :
						?>
							<li class="waves-effect"><a href="admin-panel.php?limit=<?= $i ?>"><?= $i + 1 ?></a></li>
						<?php
						endfor;
						?>
					</ul>
				</div>

			</div>

		</div>

	</div>

	</div>

</main>

<!-- Modal Structure -->
<div id="modal4" class="modal">
	<div class="modal-content">
		<h4>Insert Product</h4>
		<div class="row">
			<form class="col s12" method='post' name='form-insert' enctype="multipart/form-data" action='insert-item-admin.php' onSubmit='return checkInsertFields()'>
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
					<input type="submit" value="Insert New Product" class="btn mt-3" name="btnSubmit" id='btnSubmit'>
				</div>
			</form>
		</div>

	</div>
</div>

<?php
include "admin-pages/admin-footer.php";
?>