<?php
session_start();
?>

<!-- Navigation -->
<nav class="#212121 grey darken-4 z-depth-3">
	<div class="nav-wrapper container ">
		<a href="index.php" class="brand-logo">ShoeShop</a>
		<a href="#" data-activates="mobile-demo" class="button-collapse"><i class="material-icons">menu</i></a>
		<ul class="right hide-on-med-and-down">
			<li><a href="index.php">Home</a></li>
			<li><a href="store.php">Store</a></li>
			<li><a href="contact.php">Contact</a></li>
			<li class="mr-3"><a href="author.php">Author</a></li>
			<?php
			if (isset($_SESSION['user'])) {
				if ($_SESSION['user'] == 'Admin') {
					echo "<li class='mr-3'><a href='admin-panel.php'>Admin</a></li>";
				}
				echo "<li><a href='models/logout-process.php'>Log Out</a></li>";
			} else {
				echo "<li><a href='login.php'>Login</a></li>";
			}
			?>

			<li><a href="register.php" class="mr-3">Register</a></li>
			<?php
			if (isset($_SESSION['user'])) {
				echo "<a href='cart.php'><i class='material-icons cart'>add_shopping_cart</i></a>";
			}
			?>
		</ul>
		<ul class="side-nav" id="mobile-demo">
			<li><a href="index.php">Home</a></li>
			<li><a href="store.php">Store</a></li>
			<li><a href="contact.php">Contact</a></li>
			<li><a href="author.php">Author</a></li>

			<?php
			if ($_SESSION['user'] == 'Admin') {
				echo "<li class='mr-3'><a href='admin-panel.php'>Admin</a></li>";
			}
			if (isset($_SESSION['user'])) {
				echo "<li><a href='logout.php'>Log Out</a></li>";
			} else {
				echo "<li><a href='login.php'>Login</a></li>";
			}
			?>
			<li><a href="register.php">Register</a></li>
		</ul>
	</div>
</nav>