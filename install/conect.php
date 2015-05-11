<?php
    include "../functions/loadlang.php";
    $con = mysqli_connect($_GET['server'],$_GET['user'],$_GET['pass'],$_GET['db']);

    if(! $con){
        echo $lang['MYSQL_TESTRSN'];
    }else{
        echo $lang['MYSQL_TESTRS'];
    }

?>
