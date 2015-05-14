<?php
	error_reporting(E_ALL^E_NOTICE);

	include("connect.php");

    include("function.php");
    
    //$personal = isset($_GET['col']) ? sanitise($_GET['col']) : header('location: 404.html'); /* versión con GET más evidente */
    
    $getName = array_keys($_GET);

    $personal = isset($_GET) ? sanitise($getName[0]) : header('location: 404.html'); /* versión con GET simplificado */
    
    if (!preg_match("/^[a-zA-Z0-9]{55}$/", $personal)) {

        $queryPersonal  = $db->query("SELECT * FROM personal WHERE name = '$personal'");

        $rowPersonal    = isset($queryPersonal) ? $queryPersonal->fetch(PDO::FETCH_ASSOC) : NULL;

        $queryPersonals = $db->query("SELECT * FROM personal ORDER BY rand() LIMIT 4");
    
    } else {
    
        header('location: 404.html');
    }
?>	