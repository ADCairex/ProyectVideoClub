<?php
require_once 'dbconfig.php';

if($_POST)
{
    $user_name 		= mysql_real_escape_string($_POST['user_name']);
    $name 		    = mysql_real_escape_string($_POST['name']);
    $surname 		= mysql_real_escape_string($_POST['surname']);
    $user_email 	= mysql_real_escape_string($_POST['user_email']);
    $user_password 	= mysql_real_escape_string($_POST['password']);
	
	//password_hash see : http://www.php.net/manual/en/function.password-hash.php
	$password 	= password_hash( $user_password, PASSWORD_BCRYPT, array('cost' => 11));
	
    try
    {
        $stmt = $db_con->prepare("SELECT * FROM User WHERE user_email=:email");
        $stmt->execute(array(":email"=>$user_email));
        $count = $stmt->rowCount();
		
        if($count==0){
            $stmt = $db_con->prepare("INSERT INTO User(user_name,name,surname,user_email,user_password) VALUES(:uname, :name, :surname, :email, :pass)");
            $stmt->bindParam(":uname",$user_name);
            $stmt->bindParam(":name",$name);
            $stmt->bindParam(":surname",$surname);
            $stmt->bindParam(":email",$user_email);
            $stmt->bindParam(":pass",$password);

            if($stmt->execute())
            {
                echo "registered";
            }
            else
            {
                echo "Query could not execute !";
            }

        }
        else{

            echo "1"; //  not available
        }

    }
    catch(PDOException $e){
        echo $e->getMessage();
    }
}
?>