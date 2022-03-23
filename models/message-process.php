<?php
session_start();
header("Content-type: application/json");
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
	include "../config/connection.php";
	include "../models/functions.php";

	try {
		$first_name = $_POST['first_name'];
		$last_name = $_POST['last_name'];
		$emailMessage = $_POST['emailMessage'];
		$taMessage = $_POST['taMessage'];

		$greske = 0;
		$regExEmail = '/\S+@\S+\.\S+/';
		$regExFirstLastName = '/^[A-Z][a-z]{2,14}/';

		if (!preg_match($regExEmail, $emailMessage)) {
			$greske++;
		}
		if (!preg_match($regExFirstLastName, $first_name)) {
			$greske++;
		}
		if (!preg_match($regExFirstLastName, $last_name)) {
			$greske++;
		}
		if (strlen($taMessage) < 15) {
			$greske++;
		}

		if ($greske == 0) {
			$insertMessage = insertMessage($first_name, $last_name, $emailMessage, $taMessage);
			if ($insertMessage) {
				http_response_code(204);
			} else {
				http_response_code(422);
			}
		}
	} catch (PDOException $excetion) {
		http_response_code(500);
	}
} else {
	http_response_code(404);
}
