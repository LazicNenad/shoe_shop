<?php
include "../config/connection.php";
include "functions.php";
header("Content-type: application/json");
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
	try {
		$id = $_POST['idElement'];

		$deletedItem = deleteItem($id);
		if ($deletedItem) {
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
