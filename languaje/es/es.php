<?php
    if (empty($lang) || !is_array($lang)){
        $lang = array();
    }
    //Install
    $lang = array_merge($lang, array(
        'ERRW'      => 'No se puede escribir el archivo "config.php" asegurese que sea escirible',
        'MYSQL_S'   => 'Servidor Mysql',
        'MYSQL_U'   => 'Usuario de Mysql',
        'MYSQL_P'   => 'Contraseña de Mysql',
        'MYSQL_DB'   => 'Nombre de la Base de Datos',
        'MYSQL_TEST'          => 'Probar Conexión',
        'MYSQL_TESTRS'          => 'Conexión Exitosa',
        'MYSQL_TESTRSN'          => 'Error en la Conexión'));
    //Buttons MSG
    $lang = array_merge($lang, array(
        'SEND'      => 'Enviar',
        'NEXT'      => 'Siguiente',
        'USER'      => 'Usuario',
        'PASS'      => 'Contraseña',
        'PASSCONF'      => 'Confirme su Contraseña',
        'NAME'      => 'Nombre',
        'LASTNAME'      => 'Apellido',
        'BIRTHD'      => 'Fecha de Nacimiento'));

?>
