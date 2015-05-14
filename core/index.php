<?php
	error_reporting(E_ALL^E_NOTICE);

	include("connect.php");
	include("function.php");

	session_start();
	
	if(isset($_POST['submit']) && $_SERVER["REQUEST_METHOD"] == "POST") {

		if ( !empty($_POST['username'])) $username = sanitise_input($_POST["username"]); else $error = true;

		if ( !empty($_POST['password'])) $password = sanitise_input($_POST["password"]); else $error = true;
		
		if ( !empty($error)) header('Location: ../bt-admin/');
		
		//$password = sha1($password);
		
		$search = $db->query("SELECT * FROM users WHERE username = '$username' AND password = '$password'");
			
		if(isset($search)) {

			while($row = $search->fetch(PDO::FETCH_ASSOC)) {

				if($username == $row['username'] && $password == $row['password']) {

					$_SESSION['rol'] = $row['rol'];
					$_SESSION['user'] = $row['username'];
                    
					header('Location: ../bt-admin/');
				}
			}
		}
		else { 

			//session_start();
            
			$_SESSION['error'] = 'Usuario y/o contraseña invalidos';
			header('Location: ../bt-admin/');
		}
	}
	else {

		//session_start();
        
		$_SESSION['error'] = 'Ocurrio un error al enviar los datos';
		header('Location: ../bt-admin/');
	}
?>