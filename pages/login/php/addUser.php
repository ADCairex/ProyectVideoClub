<?php

	include '../../base/utils/sqlFunctions.php';
	include '../../base/utils/utils.php';
	// require_once "../../base/utils/connection.php";

	try {
		if ($_SERVER["REQUEST_METHOD"] == "POST") {

			$username = $_POST["username"];
			$name = $_POST["name"];
			$surnames = $_POST["surnames"];
			$email = $_POST["email"];
			$pass = $_POST["pass"];

			if (checkUserExist($username)) {
				addNewUser($username, $pass, $name, $surnames, $email);
				echo getResponse('OK', 'Agregado correctamente');
			} else {
				echo getResponse('KO', 'Error al agregar el usuario');
			}

		} else {
			echo getResponse("KO","Tipo de petición incorrecta");
		}

	} catch(Exception $e) {
		echo getResponse("KO","Error interno");
	}
?>