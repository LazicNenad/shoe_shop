<?php
#Admin Nalog Password: NenadLazic123 w.nesa.97@gmail.com
#User Nalog: Ivan Ivanovic, IvanIvanovic123- password ivan.ivanovic@gmail.com
session_start();
header("Content-type: application/json");
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
	include "../config/connection.php";
	include "../models/functions.php";

	try {
		$email = $_POST['email'];
		$password = $_POST['password'];
		$mdPassword = md5($password);

		$greske = 0;
		$regExEmail = '/\S+@\S+\.\S+/';
		$regExPassword = '/^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])[0-9a-zA-Z]{8,}$/';

		if (!preg_match($regExEmail, $email)) {
			$greske++;
		}

		if (!preg_match($regExPassword, $password)) {
			$greske++;
		}

		if ($greske == 0) {
			$userObject = checkLogin($email, $mdPassword);
			var_dump($userObject->name);
			if ($userObject) {
				$_SESSION['user'] = $userObject->name;
				http_response_code(204);
			} else {
				http_response_code(422);
			}
		}
	} catch (PDOException $exception) {
		http_response_code(500);
	}
} else {
	http_response_code(404);
}
