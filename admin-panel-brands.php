<?php
include "admin-pages/admin-header.php";
?>

<div class="row">
	<div class="container col s12 stripped">
		<div class="col s12">
			<h2>All Brands</h2>
		</div>
		<table>
			<thead>
				<tr>
					<th>RB</th>
					<th>Brand Name</th>
					<th>Delete</th>
				</tr>
			</thead>

			<tbody>

				<?php
				$rb = 1;
				$allBrands = getAll("brand");
				foreach ($allBrands as $brand) :
				?><tr>
						<td><?= $rb ?></td>
						<td><?= $brand->name ?></td>
						<td><a class="btn waves-effect waves-light delete-brand" id="<?= $brand->idBrand ?>">Delete</a></td>
					<tr>
					<?php
					$rb++;
				endforeach;
					?>
					</tr>
			</tbody>
		</table>
		<div class="col s12">
			<div class="addBrand mt-3 center-align">
				<a class="waves-effect waves-light btn modal-trigger btn-floating btn-large waves-effect waves-light" href="#modal1"><i class="material-icons">add</i></a>
			</div>
		</div>
	</div>
</div>



<!-- Modal Structure -->
<div id="modal1" class="modal">
	<div class="modal-content">
		<h4>Inser New Brand</h4>
		<div class="row">
			<form class="col s12">
				<div class="row">
					<div class="input-field col s12">
						<input id="brand-name" type="text" class="validate">
						<label for="brand-name">Brand Name</label>
					</div>
				</div>
				<a class="waves-effect waves-light btn" id="insert-brand">Insert New Brand</a>
			</form>
		</div>
	</div>
</div>

<?php
include "admin-pages/admin-footer.php";
?>