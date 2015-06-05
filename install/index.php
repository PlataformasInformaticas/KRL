<!DOCTYPE HTML>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <meta name="description" content="Kids 'R' Learning">
        <meta name="keywords" content="Kids,R,Learning,platform">
        <meta name="author" content="Universidad Mariano Galvez de Guatemala, ext Quetzatenango">
        <!-- titulo de la pagina -->
        <title>Install Kids 'R' Learning</title>
        <link rel="icon" href="../earth.ico"/>
    </head>
    <body>
        <?php
            include_once "../functions/loadlang.php";
            if(!(is_writable("../config.php"))){
                die ($lang["ERRW"]);
            }

        ?>

        <div id="content">
            <?php
    if(!isset($_GET['page'])){
        if(isset($_POST['Sellanguaje'])){
            $fileConfig = explode("\n", file_get_contents("../config.php"));
            $fileConfig[5]='$_LANGUAJE="'.$_POST['Sellanguaje'].'";';
            $textFile ="<?php";
            for ($i =1; $i<6; $i++){
                $textFile = $textFile . "\n" . $fileConfig[$i];
            }
            $textFile=$textFile."\n?>";
            file_put_contents("../config.php", $textFile);
            include "../functions/loadlang.php";
            echo '<div id="licencia"><br>';
            include "../LICENSE";
            echo '<br></div><br>';
            ?>
            <form name="nextAction" method="get" action="index.php">
                <button type="submit" name="page" value="2"><?php echo $lang['NEXT']; ?></button>
            </form>
            <?php

        }else{
?>
<form name="lang" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">

    <select name="Sellanguaje">
        <option value="es">Español</option>
        <option value="en">English</option>

    </select>
    <button type="submit" ><?php echo $lang['SEND']; ?></button>
</form>
<?php
        }
    }else{

        switch($_GET['page']){
            case 2:
                if(isset($_POST['DbConfig'])){
                    $fileConfig = explode("\n", file_get_contents("../config.php"));
                    $fileConfig[1]='$_DBHOST="'.$_POST['DbConfigServer'].'";';
                    $fileConfig[2]='$_DBUSER="'.$_POST['DbConfigUser'].'";';
                    $fileConfig[3]='$_DBPASS="'.$_POST['DbConfigPass'].'";';
                    $fileConfig[4]='$_DBNAME="'.$_POST['DbConfigDB'].'";';
                    $textFile ="<?php";
                    for ($i =1; $i<6; $i++){
                        $textFile = $textFile . "\n" . $fileConfig[$i];
                    }
                    $textFile=$textFile."\n?>";
                    file_put_contents("../config.php", $textFile);
                    ?>
                    <form name="nextAction" method="get" action="index.php">
                        <button type="submit" name="page" value="3"><?php echo $lang['NEXT']; ?></button>
                    </form>
                    <?php
                }else{
                ?>
            <script src="testconect.js"></script>
            <form name="DbConfig" action="<?php echo $_SERVER['PHP_SELF']; echo "?page=2"; ?>" method="post">
                <label><?php echo $lang['MYSQL_S']; ?> </label><input type="text" name="DbConfigServer" placeholder="localhost" required>
                <br>
                <label><?php echo $lang['MYSQL_U']; ?> </label><input type="text" name="DbConfigUser" required>
                <br>
                <label><?php echo $lang['MYSQL_P']; ?> </label><input type="password" name="DbConfigPass" required>
                <br>
                <label><?php echo $lang['MYSQL_DB']; ?> </label><input type="text" name="DbConfigDB" required>
                <br>
                <button name="TestConection" onclick="testConexion(DbConfigServer.value, DbConfigUser.value, DbConfigPass.value, DbConfigDB.value );"  type="button"><?php echo $lang['MYSQL_TEST']; ?></button>

                <button name="DbConfig" value="DbConfig" type="submit"><?php echo $lang['SEND']; ?></button>
            </form>
            <?php
                }
                break;
            case 3:

                include "../conect.php";
                $sql = file_get_contents('script.sql');
                if(!($con -> multi_query($sql))){
                    echo "Error". errorInfo;
                }
                if( (isset($_POST['txt_name']))){
                    $v_name=$_POST['txt_name'];
                    $v_lName = $_POST['txt_lname'];
                    $v_bday=$_POST['txt_bday'];
                    $v_user= $_POST['txt_user'];
                    $v_pass= $_POST['txt_pass'];
                    include "../conect.php";
                    $sql="INSERT INTO `Persona` (`Nombre`, `Apellido`, `FechaNac`, `Pass`, `Usuario`, `TipoUsuario_id`) VALUES ('$v_name', '$v_lName', '$v_bday', sha1('$v_pass'), '$v_user',1);";
                    if(!($con -> query($sql))){
                        echo "Error: ". $con->error;
                    }else{
                        echo '<h1>Instalación Completada, Borre la carpta install</h1>';
                    }
                }else{
                ?>

                <form name="AdmForm" action="<?php echo $_SERVER['PHP_SELF'];echo "?page=3";?>" method="post">

                    <label><?php echo $lang['NAME']; ?></label>
                    <input type="text" name="txt_name" maxlength="90" required ><br>
                    <label><?php echo $lang['LASTNAME']; ?></label>
                    <input type="text" name="txt_lname" maxlength="90" required ><br>
                    <label><?php echo $lang['BIRTHD']; ?></label>
                    <input type="date" name="txt_bday" required ><br>
                    <label><?php echo $lang['USER']; ?></label>
                    <input type="text" name="txt_user" maxlength="90" required><br>
                    <label><?php echo $lang['PASS']; ?></label>
                    <input type="password" name="txt_pass" id="txt_pass" required onchange="document.getElementById('txt_pass2').value='';"><br>
                    <label><?php echo $lang['PASSCONF']; ?></label>
                    <input type="password" name="txtpass2" id="txt_pass2" required onchange="if(document.getElementById('txt_pass').value!=this.value){document.getElementById('txt_pass').value='';};"><br>
                    <button name="DbConfig" value="DbConfig" type="submit"><?php echo $lang['SEND']; ?></button>
                </form>
                <?php
                }
                break;
        }

    }
            ?>

        </div>
    </body>
</html>
