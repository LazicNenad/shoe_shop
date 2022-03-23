<?php
include "pages/head.php";
include "pages/nav.php";
?>

<div class="row container py-3">
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
				<label for="password">Repeat Password</label>
				<span id="errorTextRepeatPassword" class="error"></span>
			</div>
		</div>
		<div class="row">
			<a type="button" class="btn #212121 grey darken-4 waves-effect waves-light" href="#" id="btnRegister">Register</a>
		</div>
		<div class="row" id="response">
			<!-- <div class="row">
				<div class="col s12 m6">
					<div class="card-panel teal">
						<span class="white-text">Successfully registered!
						</span>
					</div>
				</div>
			</div> -->
		</div>
</div>
</form>
</div>


<?php
include "pages/footer.php";
include "config/connection.php";
include "models/functions.php";
?>