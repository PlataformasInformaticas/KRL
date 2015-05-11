<?php
    $con;
    include "config.php";
    include "function/loadlang.php";
    $con = new mysqli($_DBHOST,$_DBUSER,$_DBPASS,$_DBNAME);
    if($con->connect_errno){
        echo $lang['MYSQL_TESTRSN'];
    }

?>
