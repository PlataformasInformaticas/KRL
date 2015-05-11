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
		include("../config2.php");
		conectar();
		include("includes/cabecera.php");
		include("includes/contenido.php");
		include("includes/pie.php");
	 ?>

</body>
</html>
