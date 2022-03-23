<?php
include "pages/head.php";
include "pages/nav.php";
?>

<div class="row">
	<div class="container">
		<div class="col s12 center-align mb-3">
			<h2>Message</h2>
		</div>
		<div class="row mt-3">
			<form class="col s12">
				<div class="row">
					<div class="input-field col s6">
						<input id="first_name" type="text" class="validate">
						<label for="first_name">First Name</label>
					</div>
					<div class="input-field col s6">
						<input id="last_name" type="text" class="validate">
						<label for="last_name">Last Name</label>
					</div>
				</div>

				<div class="row">
					<div class="input-field col s12">
						<input id="emailMessage" type="email" class="validate">
						<label for="emailMessage">Email</label>
					</div>
				</div>
				<div class="row">
					<div class="row">
						<div class="input-field col s12">
							<textarea id="textarea1" class="materialize-textarea"></textarea>
							<label for="textarea1">Message</label>
							<span id="taMessageError"></span>
						</div>
					</div>
				</div>
				<input type="button" value="Submit Message" class="btn #212121 grey darken-4 waves-effect waves-light" id="submitMessage">
			</form>
		</div>
		<div id="responseMessage"></div>
	</div>
</div>

<?php
include "pages/footer.php";
?>