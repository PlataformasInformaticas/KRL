<?php
    $con;
    function conectar(){
     $GLOBALS['con'] = mysqli_connect('','','','');
    if (! $GLOBALS['con']) {
        die('No se puede Conectar: ' . mysqli_error( $GLOBALS['con']));
    }
    mysqli_select_db( $GLOBALS['con'],"elegir");
}
function cerrar(){
    mysqli_close( $GLOBALS['con']);
}
?>
