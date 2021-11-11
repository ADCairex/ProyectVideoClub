<?php
    include '../../base/utils/sqlFunctions.php';
    include '../../base/utils/utils.php';
// require_once "../../base/utils/connection.php";

try {
	if ($_SERVER["REQUEST_METHOD"] == "POST") {

		$user = $_POST['username'];
		$pass = $_POST['pass'];

		if (checkUserExist($user)) {
			$userInfo = getUserData('', $user);
			if ($userInfo == 'No exist') {
				echo getResponse('KO', 'Error al iniciar sesion');
			} else {
				if ($pass == $userInfo['pass']) {
					
					session_start();
					$_SESSION['username'] = $userInfo['idUser'];
					echo getResponse('OK', 'Inicio de sesion correcto');
				} else {
					echo getResponse('KO', 'Error al iniciar sesion');
				}
			}
			
		} 

	} else {
		echo getResponse("KO","Tipo de petición incorrecta");
	}

} catch(Exception $e) {
	echo getResponse("KO","Error interno");
}
?>