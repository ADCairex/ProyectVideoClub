<?php
    include '../../base/utils/sqlFunctions.php';
    include '../../base/utils/utils.php';
// require_once "../../base/utils/connection.php";

try {
	if ($_SERVER["REQUEST_METHOD"] == "POST") {

		$user = $_POST['username'];
		$pass = $_POST['pass'];

	//Call UserExist Function to 
		if (checkUserExist($user)) {
			$userInfo = getUserData('', $user);
			if ($userInfo == 'No exist') {
				echo getResponse('KO', 'Failed to Login');
			} else {
				if ($pass == $userInfo['pass']) {
					
					session_start();
					$_SESSION['username'] = $userInfo['idUser'];
					$_SESSION['name'] = $userInfo['name'];
					$_SESSION['LAST_ACTIVITY'] = time(); // update last activity
					echo getResponse('OK', 'Successful login');
				} else {
					echo getResponse('KO', 'Failed to Login');
				}
			}
			
		} else {
			echo getResponse('KO', 'User does not existUsuario no existe');
		}

	} else {
		echo getResponse("KO","Wrong request type");
	}

} catch(Exception $e) {
	echo getResponse("KO","Internal error");
}
?>