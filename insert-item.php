<?php
include "config/connection.php";
include "models/functions.php";
session_start();
if (isset($_SESSION['user'])) {
	if (isset($_POST['btnSubmit']) && ($_SESSION['user'] === 'Admin')) {
		$productName = $_POST['productName'];
		$productPrice = $_POST['productPrice'];
		$productOldPrice = $_POST['productOldPrice'];
		$productCategory = $_POST['productCategory'];
		$productBrand = $_POST['productBrand'];

		$productImage = $_FILES['userfile'];

		$uploadDir = 'assets/uploaded_img/';

		$filePath = $uploadDir . time() . $productImage['name'];

		$result = move_uploaded_file($productImage['tmp_name'], $filePath);

		$greske = 0;

		// Server checking values
		if (strlen($productName) < 3) {
			$greske++;
		}
		if ($productPrice < 0) {
			$greske++;
		}
		if ($productOldPrice < 0) {
			$greske++;
		}
		if ($productCategory == 0) {
			$greske++;
		}
		if ($productBrand == 0) {
			$greske++;
		}

		if ($greske == 0 && $result) {
			$uploadProduct = uploadProduct($productName, $productPrice, $productOldPrice, $filePath, $productCategory, $productBrand);
			if ($uploadProduct) {
				http_response_code(204);
				header('Location: store.php');
			} else {
				http_response_code(422);
			}
		}
	}
} else {
	header("Location: ../index.php");
}
