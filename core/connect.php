<?php
	try {

		$db = new PDO('mysql:host=mysql.hostinger.es;dbname=u338185309_dir;charset=utf8', 'u338185309_dir', 'DeLorean89');
		$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		$db->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);

	} catch(PDOException $e){

	    echo "ERROR: " . $e->getMessage();
	}
?>