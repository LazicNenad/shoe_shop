<?php
// session_start();
include "pages/head.php";
include "pages/nav.php";
?>

<div class="row container py-3">
	<form class="col s12 ">
		<div class="row">
			<div class="input-field col s12">
				<input id="emailLogin" type="email" class="validate">
				<label for="email">Email</label>
				<span id="errorTextEmailLogin" class="error"></span>
			</div>
		</div>
		<div class="row">
			<div class="input-field col s12">
				<input id="passwordLogin" type="password" class="validate">
				<label for="password">Password</label>
				<span id="errorTextPasswordLogin" class="error"></span>
			</div>
		</div>
		<div class="row">
			<a type="button" class="btn #212121 grey darken-4 waves-effect waves-light" href="#" id="btnLogin">Log In</a>
		</div>
		<div class="row" id="responseLogin">
			<!-- <div class="row">
				<div class="col s12 m6">
					<div class="card-panel teal">
						<span class="white-text">Successfully registered!
						</span>
					</div>
				</div>
			</div> -->
		</div>
	</form>
</div>

<?php
include "pages/footer.php";
?>