<?php
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
    }else{
?>
<form name="lang" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">

    <select name="Sellanguaje">
        <option value="es">Español</option>
        <option value="en">English</option>

    </select>
    <button type="submit"><?php echo $lang['SEND']; ?></button>
</form>
<?php
     }
?>
