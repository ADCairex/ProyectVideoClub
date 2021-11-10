<?php

require_once "../../base/utils/connection.php";

try {
	if ($_SERVER["REQUEST_METHOD"] == "POST") {

        $data = array(
            "username" => $_POST["username"],
            "name" => $_POST["name"],
            "surnames" => $_POST["surnames"],
            "email" => $_POST["email"],
            "pass" => $_POST["pass"]
        );

		$resp = addUser($data);

		if(is_null($resp))
			echo getResponse("KO","Error interno de base de datos",);
		else {
			if($resp)
            	echo getResponse("OK","Usuario añadido correctamente!",$resp);
			else
				echo getResponse("KO_LOGIN","Usuario ya existente!",$resp);
		}


	} else {
		echo getResponse("KO","Tipo de petición incorrecta");
	}

} catch(Exception $e) {
	echo getResponse("KO","Error interno");
}
?>