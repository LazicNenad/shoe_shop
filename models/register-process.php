<?php
#Admin Nalog Password: NenadLazic123 w.nesa.97@gmail.com
#User Nalog: Ivan Ivanovic, IvanIvanovic123- password ivan.ivanovic@gmail.com
header("Content-type: application/json");

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
	include "../config/connection.php";
	include "../models/functions.php";

	try {
		$firstName = $_POST['firstName'];
		$lastName = $_POST['lastName'];
		$email = $_POST['email'];
		$password = $_POST['password'];
		$mdPassword = md5($password);
		$idRole = 2;

		// RegEx Server
		$regExFirstLastName = '/^[A-Z][a-z]{2,14}/';
		$regExEmail = '/\S+@\S+\.\S+/';
		$regExPassword = '/^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])[0-9a-zA-Z]{8,}$/';

		$greske = 0;
		if (!preg_match($regExFirstLastName, $firstName)) {
			$greske++;
		}

		if (!preg_match($regExFirstLastName, $lastName)) {
			$greske++;
		}

		if (!preg_match($regExEmail, $email)) {
			$greske++;
		}

		if (!preg_match($regExPassword, $password)) {
			$greske++;
		}

		if ($greske == 0) {
			$insertUser = insertUser($firstName, $lastName, $email, $mdPassword, $idRole);
			if ($insertUser) {
				$response = ["message" => "Success"];
				echo json_encode($response);
				http_response_code(201);
			}
		}
	} catch (PDOException $exception) {
		http_response_code(500);
	}
} else {
	http_response_code(404);
}
