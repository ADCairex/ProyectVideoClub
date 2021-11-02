<?php

require_once "./sqlFunctions.php";

//Deja la estructura de la respuesta preparada
$response=[
	"status" => "",
	"message " => "",
	"data" => ""
];

print($response);
/* Compruebo el Login */
try {
	//Obtengo la cadena de conexión

	$bd = getDBConnection();
	
	//Realizo la consulta, compruebo que exista un usuario con ese email y password
	$sqlPrepared = $bd->prepare("SELECT username from User WHERE username = :username AND pass = :password " );
	$params = array(
		':username' => $_POST['username'],
		':password' => $_POST['password']
	);
	
	$sqlPrepared->execute($params);
	//--------------------------------------------------------------------------------

	if ($sqlPrepared->rowCount() > 0) {
		//Si hay algún usuario, login CORRECTO


		//Como el login ha ido bien, creo la sesión
		session_start();
		$_SESSION['username'] = $_POST['username'];
		//------------------------------


		$response["status"] = "OK";
		$response["message"] = "Login correcto";

		//Debo convertir el array de respuesta a JSON tipo texto para poder enviarlo
		echo json_encode($response);

	} else {
		//Si no se ha encontrado ningún usuario, el login no es correcto

		$response["status"] = "KO_LOGIN";
		$response["message"] = "Login incorrecto, usuario o contraseña incorrecta";

		echo json_encode($response);
	}	

} catch (PDOException $e) {
	//Si se produce algún error de base de datos, devuelvo un error
	
	$response["status"] = "KO";
	$response["message"] = "Error de base de datos";

	echo json_encode($response);
}
