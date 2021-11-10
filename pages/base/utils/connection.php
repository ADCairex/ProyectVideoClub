<?php
//Quiero que todas las respuestas tengan el mismo formato, para ello me creo una función que me devuelve la respuesta
function getResponse($status="",$message="",$data="") {
    $response = array(
        "status"=>$status,
        "message"=>$message,
        "data"=>$data
    );

    return json_encode($response);
}


function getDBConfig() {
    $dbFileConfig=dirname(__FILE__)."/dbconfiguration.xml";

	$config = new DOMDocument();
	$config->load($dbFileConfig);

	$datos = simplexml_load_file($dbFileConfig);	
	$ip = $datos->xpath("//ip");
	$name = $datos->xpath("//dbname");
	$user = $datos->xpath("//user");
	$pass = $datos->xpath("//pass");
	$cad = sprintf("mysql:dbname=%s;host=%s", $name[0], $ip[0], 'charset=utf8');
    $result = array(
        "cad" => $cad,
        "user" => $user[0],
        "pass" => $pass[0]
    );

	return $result;
} 

function getDBConexion() {
    try {
        $res = getDBConfig();

        $bd = new PDO($res["cad"], $res["user"], $res["pass"]);

        return $bd;
    } catch(Exception $e) {
        return null;
    }
}
function checkLogin($username, $pass) {
    try {
    	$bd = getDBConexion();

        if(!is_null($bd)) {
            $sqlPrepared = $bd->prepare("SELECT * from User WHERE username = :username AND pass = :pass " );
            $params = array(    
                ':username' => $username,
                ':pass' => $pass
            );
            $sqlPrepared->execute($params);
            $array=$sqlPrepared->fetchAll();
            if (count($array)>0){
                session_start();
                $_SESSION["username"]= $username;
                $_SESSION["pass"]= $pass;
            }
            
            return $sqlPrepared->rowCount() > 0 ? true : false;
         } else
            return $bd;

    } catch (PDOException $e) {
       return null;
    }
}
function addUser($data) {
    try {
    	$bd = getDBConexion();

        
        $username = $data["username"]; 
        $sql = $bd->prepare("SELECT * FROM User where username = :username");
        $sql->bindParam(':username', $username);
        $sql->execute();
        $rows= $sql->rowCount();

        if(!is_null($bd)) { 
            if ($rows == 0){
                $sqlPrepared = $bd->prepare("
                    INSERT INTO User (username,name,surnames,email,pass)
                    VALUES (:username,:name,:surnames,:email,:pass)
                ");
                $params = array(
                    ':username' => $data["username"],
                    ':name' => $data["name"],
                    ':surnames' => $data["surnames"],
                    ':email' => $data["email"],
                    ':pass' => $data["pass"]
                );
                session_start();
                 $username = $_SESSION["username"];
                 $name = $_SESSION["name"];
                $sqlPrepared->execute($params);

                return true;
            } else {
                return false;
            }
        }
    } catch (PDOException $e) {
        echo $e->getMessage();
       return null;
    }
}

?>


