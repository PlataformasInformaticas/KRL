<?php session_start(); ?>
<!doctype html>
<html>
<head>

<link rel="stylesheet" href="css/bootstrap.min.css">
<link href="css/default.css" rel="stylesheet"/>
<meta charset="utf-8">
<title>Documento sin título</title>
</head>

<body>

	<?php
        $con;
        include "../config.php";
        //include "function/loadlang.php";
    /*
        Para cargar el lenguaje, aun no implementado
    */
        $con = new mysqli($_DBHOST,$_DBUSER,$_DBPASS,$_DBNAME);
        if($con->connect_errno){
            echo $lang['MYSQL_TESTRSN'];
        }
		include("includes/cabecera.php");
		include("includes/contenido.php");
		include("includes/pie.php");
	 ?>

</body>
</html>
