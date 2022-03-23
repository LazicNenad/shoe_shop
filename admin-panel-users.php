<?php
include "admin-pages/admin-header.php";
?>
<div class="row">
	<div class="container col s12 stripped">
		<div class="col s12 m12">
			<h2>All Users</h2>
		</div>
		<table>
			<thead>
				<tr>
					<th>RB</th>
					<th>First Name</th>
					<th>Last Name</th>
					<th>Email</th>
					<th>Date</th>
					<th>Role</th>
					<th>Remove User</th>
				</tr>
			</thead>

			<tbody>

				<?php
				$rb = 1;
				$allUsers = getAllUsers();
				foreach ($allUsers as $user) :
					$timestamp = strtotime($user->date);
				?><tr>
						<td><?= $rb++ ?></td>
						<td><?= $user->firstName ?></td>
						<td><?= $user->lastName ?></td>
						<td><?= $user->email ?></td>
						<td><?= date('d. M. Y', $timestamp) ?></td>
						<td><?= $user->name ?></td>
						<td><a type="button" class=" waves-effect waves-light btn  btn-deleteUser" id="<?= $user->idUser ?>">Delete</a></td>
					<tr>

					<?php
				endforeach;
					?>
					</tr>
			</tbody>
		</table>

		<div class="col s12">
			<div class="addBrand mt-3 center-align">
				<a class="waves-effect waves-light btn modal-trigger btn-floating btn-large waves-effect waves-light" href="#modal3"><i class="material-icons">add</i></a>
			</div>
		</div>
	</div>
</div>

<!-- Modal Structure -->
<div id="modal3" class="modal">
	<div class="modal-content">
		<h4>Inser New User</h4>
		<div class="row">
			<form class="col s12 ">
				<div class="row">
					<div class="input-field col s6">
						<input id="first_name" type="text" class="validate">
						<label for="first_name">First Name</label>
						<span id="errorTextFirstName" class="error"></span>
					</div>
					<div class="input-field col s6">
						<input id="last_name" type="text" class="validate">
						<label for="last_name">Last Name</label>
						<span id="errorTextLastName" class="error"></span>
					</div>
				</div>
				<div class="row">
					<div class="input-field col s12">
						<input id="email" type="email" class="validate">
						<label for="email">Email</label>
						<span id="errorTextEmail" class="error"></span>
					</div>
				</div>
				<div class="row">
					<div class="input-field col s12">
						<input id="password" type="password" class="validate">
						<label for="password">Password</label>
						<span id="errorTextPassword" class="error"></span>
					</div>
				</div>
				<div class="row">
					<div class="input-field col s12">
						<input id="passwordRepeat" type="password" class="validate">
						<label for="passwordRepeat">Repeat Password</label>
						<span id="errorTextRepeatPassword" class="error"></span>
					</div>
				</div>
				<div class="row">
					<div class="input-field col s12">
						<select id='userRole'>
							<option value="0">Select User Role</option>
							<?php
							$roles = getAll("roles");
							foreach ($roles as $role) :
							?>
								<option value="<?= $role->idRole ?>"><?= $role->name ?></option>
							<?php
							endforeach;
							?>
						</select>
						<label>Materialize Select</label>
					</div>
				</div>
				<div class="row">
					<a type="button" class="btn #212121 grey darken-4 waves-effect waves-light" href="#" id="btnInserUser">Inser User</a>
				</div>

		</div>
		</form>
	</div>
</div>
</div>

<?php
include "admin-pages/admin-footer.php";
?>