<?php

?>
<!-- Footer -->
<footer class="page-footer #212121 grey darken-4 ">
	<div class="container">
		<div class="row">
			<div class="col l6 s12 ">
				<h5 class="white-text">Documentation & Sitemap</h5>
				<a class="grey-text text-lighten-4 mr-3 " href="#"><i class="fas fa-sitemap fa-3x"></i></a>
				<a class="grey-text text-lighten-4" href="http://shoeshopphp.epizy.com/dokumentacija.pdf"><i class="fas fa-file-pdf fa-3x"></i></a>
			</div>
			<div class="col l4 offset-l2 s12">
				<h5 class="white-text">Links</h5>
				<ul>
					<li><a class="grey-text text-lighten-3" href="index.php">Home</a></li>
					<li><a class="grey-text text-lighten-3" href="store.php">Store</a></li>
					<li><a class="grey-text text-lighten-3" href="contact.php">Contact</a></li>
					<li><a class="grey-text text-lighten-3" href="author.php">Author</a></li>
					<?php
					if (isset($_SESSION['user'])) {
						if ($_SESSION['user'] == 'Admin') {
							echo "<li><a class='grey-text text-lighten-3' href='admin-panel.php'>Admin</a></li>";
						}
						echo "<li><a href='models/logout-process.php' class='grey-text text-lighten-3'>Log Out</a></li>";
					} else {
						echo "<li><a href='login.php' class='grey-text text-lighten-3'>Login</a></li>";
					}
					?>
					<li><a class="grey-text text-lighten-3" href="register.php">Register</a></li>
				</ul>
			</div>
		</div>
	</div>
	<div class="footer-copyright">
		<div class="container center-align">
			© 2021 Nenad Lazic
		</div>
	</div>
</footer>

<!-- jQuery -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<!-- Compiled and minified JavaScript -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.100.2/js/materialize.min.js"></script>
<script src="assets/js/main.js"></script>
</body>

</html>