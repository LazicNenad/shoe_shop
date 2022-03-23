<?php
header("Content-type: application/json");
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
	include "../config/connection.php";
	include "../models/functions.php";

	try {
		$brandName = $_POST['brandName'];

		$insertedBrand = insertBrand($brandName);
		if ($insertedBrand) {
			http_response_code(204);
		} else {
			http_response_code(422);
		}
	} catch (PDOException $exception) {
		http_response_code(500);
	}
} else {
	http_response_code(404);
}
