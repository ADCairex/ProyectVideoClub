<?php

include_once 'database.php';
	session_start();
	if($_POST['type']==1){
        $username=$_POST['username'];
		$name=$_POST['name'];
        $surname=$_POST['surname'];
		$email=$_POST['email'];
		$password=$_POST['password'];
        $duplicate = $pdo->query("SELECT * FROM User WHERE email='$email'");

// Ya se ha terminado; se cierra

		if (mysqli_num_rows($duplicate)>0) //BUSCAR el cambio
		{
			echo json_encode(array("statusCode"=>201));
		}
		else{
			$sql = "INSERT INTO `User`( `username`,`name`, `surname`,`email`,`password`) 
			VALUES ('$username','$name','$surname','$email','$password')";
            $pdo->prepare($sql)->execute([$username,$name, $surname, $email, $password]);
			if (mysqli_query($conn, $sql)) { //BUSCAR el cambio
				echo json_encode(array("statusCode"=>200));
			} 
			else {
				echo json_encode(array("statusCode"=>201));
			}
		}
		$duplicate = null;
        $pdo = null;
	}
	if($_POST['type']==2){
		$username=$_POST['username'];
		$pass=$_POST['pass'];
        $check = $pdo->query("SELECT * FROM User WHERE username='$username' AND pass='$pass'");
		// $rows = $check->fetchAll();

		// print($pdo);
		print('hola');
		print($username);


		



			foreach ($check as $row) {
				echo $row['name']."<br />\n";
			}


		
// 		if (mysqli_num_rows($check)>0)  //BUSCAR el cambio



// // $res = $DB->query('SELECT COUNT(*) FROM table');
// // $num_rows = $res->fetchColumn();
// 		{
// 			$_SESSION['usernameLog']=$username;
// 			echo json_encode(array("statusCode"=>200));
// 		}
// 		else{
// 			echo json_encode(array("statusCode"=>201));
// 		}
		$duplicate = null;
        $pdo = null;
	}


//     /* Borrar todas las filas de la tabla FRUIT */
// $del = $gbd->prepare('DELETE FROM fruit');
// $del->execute();

// /* Devolver el número de filas que fueron eliminadas */
// print("Devolver el número de filas que fueron eliminadas:\n");
// $cuenta = $del->rowCount();
// print("Eliminadas $cuenta filas.\n");
?>
  
