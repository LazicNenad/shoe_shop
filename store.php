<?php
include "pages/head.php";
include "pages/nav.php";
include "config/connection.php";
include "models/functions.php";


?>

<div class="row container">
	<div class="col s3">
		<aside class="aside">
			<div class="mt-3">
				<nav>
					<div class="nav-wrapper">
						<!-- <form> -->
						<div class="input-field #212121 grey darken-4">
							<input id="search" type="search" required>
							<label class="label-icon" for="search"><i class="material-icons">search</i></label>
							<i class="material-icons">close</i>
						</div>
						<!-- </form> -->
					</div>
				</nav>
			</div>
			<!-- Category -->
			<div class="mt-2 d-flex">
				<span>Category</span>
				<i class="fas fa-minus" id="categoryPlus"></i>
			</div>
			<div id="categories">
				<?php
				$allCategories = getAll("category");
				foreach ($allCategories as $category) :
				?>
					<p>
						<input type="checkbox" id="<?= $category->idCat ?>category" value="<?= $category->idCat ?>C" />
						<label for="<?= $category->idCat ?>category"><?= $category->name ?></label>
					</p>
				<?php
				endforeach;
				?>
				<!-- <p>
					<input type="checkbox" id="women" />
					<label for="women">Women</label>
				</p> -->
			</div>
			<!-- Brand -->
			<div class="mt-2 d-flex">
				<span>Brand</span>
				<i class="fas fa-minus" id="brandPlus"></i>
			</div>
			<div id="brands">
				<?php
				$allBrands = getAll("brand");
				foreach ($allBrands as $brand) :
				?>
					<p>
						<input type="checkbox" id="<?= $brand->idBrand ?>brand" value="<?= $brand->idBrand ?>" />
						<label for="<?= $brand->idBrand ?>brand"><?= $brand->name ?></label>
					</p>
				<?php
				endforeach;
				?>
				<!-- <p>
					<input type="checkbox" id="test6" />
					<label for="test6">Brand2</label>
				</p> -->
			</div>

			<!-- Price -->
			<div class="mt-2 d-flex">
				<span>Price</span>
				<i class="fas fa-minus" id="pricePlus"></i>
			</div>
			<div id="prices">
				<p>
					<input type="checkbox" id="price1" />
					<label for="price1">$100 - $200</label>
				</p>

				<p>
					<input type="checkbox" id="price2" />
					<label for="price2">$200 - $300</label>
				</p>

				<p>
					<input type="checkbox" id="price3" />
					<label for="price3">$200 - $300</label>
				</p>

				<p>
					<input type="checkbox" id="price4" />
					<label for="price4">$300 - $400</label>
				</p>

				<p>
					<input type="checkbox" id="price5" />
					<label for="price5">$400 - $500</label>
				</p>
			</div>
		</aside>
	</div>
	<div class="col s9">
		<div class="row mt-3" id="products">
			<!-- Products -->
			<?php
			include "alldata.php";
			?>

			<div class="col s12">
				<?php
				$countProducts = getCountProducts();

				$numberOfPages = ceil(($countProducts->numberPages / 6));


				?>
				<ul class="pagination center-align">
					<!-- <li class="active #212121 grey darken-4"><a href="store.php">1</a></li> -->
					<?php
					for ($i = 0; $i < $numberOfPages; $i++) :
					?>
						<li class="waves-effect"><a href="store.php?limit=<?= $i ?>"><?= $i + 1 ?></a></li>
					<?php
					endfor;
					?>
				</ul>
			</div>
		</div>
	</div>


</div>




<?php
include "pages/footer.php";
?>