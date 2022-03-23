<?php
// session_start();
include "pages/head.php";
?>
<a href="#" class="scrollToTop waves-effect waves-light #212121 grey darken-4"><i class="material-icons">arrow_upward</i></a>
<?php
include "pages/nav.php";
?>

<!-- Parallax Image -->
<div class="parallax-container">
	<div class="parallax"><img src="assets/img/background.jpg"></div>
</div>

<!-- Card 1 -->
<div class="row container">
	<div class="col s12 m6 l4 mt-3">
		<div class="card">
			<div class="card-image">
				<img src="assets/img/bogner-index.jpg">
				<span class="card-title grey-text text-darken-4">Bogner</span>
			</div>
			<div class="card-content">
				<p>I am a very simple card. I am good at containing small bits of information.
					I am convenient because I require little markup to use effectively.</p>
			</div>
			<div class="card-action center-align">
				<a href="store.php" class="btn #212121 grey darken-4 waves-effect waves-light">Go To Store</a>
			</div>
		</div>
	</div>

	<!-- Card 2-->
	<div class="col s12 m6 l4 mt-3">
		<div class="card">
			<div class="card-image">
				<img src="assets/img/paciotti-index.jpg">
				<span class="card-title grey-text text-darken-4">Paciotti</span>
			</div>
			<div class="card-content">
				<p>I am a very simple card. I am good at containing small bits of information.
					I am convenient because I require little markup to use effectively.</p>
			</div>
			<div class="card-action center-align">
				<a href="store.php" class="btn #212121 grey darken-4 waves-effect waves-light">Go To Store</a>
			</div>
		</div>
	</div>
	<!-- Card 3 -->
	<div class="col s12 m6 l4 mt-3">
		<div class="card">
			<div class="card-image">
				<img src="assets/img/paciotti-index2.jpg">
				<span class="card-title grey-text text-darken-4">Paciotti</span>
			</div>
			<div class="card-content">
				<p>I am a very simple card. I am good at containing small bits of information.
					I am convenient because I require little markup to use effectively.</p>
			</div>
			<div class="card-action center-align">
				<a href="store.php" class="btn #212121 grey darken-4 waves-effect waves-light">Go To Store</a>
			</div>
		</div>
	</div>
</div>

<?php
include "pages/footer.php";
?>