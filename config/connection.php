<?php

define("SERVER", "	sql207.epizy.com"); //sql204.epizy.com localhost
define("DATABASE", "epiz_31357837_shoe_shop_database"); //epiz_28449503_shoe_shop_database
define("USERNAME", "epiz_31357837"); //epiz_28449503 root
define("PASSWORD", "czWPOyGiGPS2VSG");  //CD9HISJKOaPAuS
try {
	$conn = new PDO("mysql:host=" . SERVER . ";dbname=" . DATABASE . ";charset=utf8", USERNAME, PASSWORD);

	$conn->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);

	$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $ex) {
	echo $ex->getMessage();
}
