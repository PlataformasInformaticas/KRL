<?php
    if (empty($lang) || !is_array($lang)){
        $lang = array();
    }
    //Error Install
    $lang = array_merge($lang, array(
	    'ERRW'      => 'the file "config.php" is not writeable',
        'MYSQL_S'   => 'Server Mysql',
        'MYSQL_U'   => 'Mysql User',
        'MYSQL_P'   => 'Mysql Password',
        'MYSQL_DB'   => 'Data Base Name',
        'MYSQL_TEST'          => 'Test Connection',
        'MYSQL_TESTRS'        => 'Successful Connection',
        'MYSQL_TESTRSN'          => 'Connection Error'));
    //Buttons MSG
    $lang = array_merge($lang, array(
        'SEND'      => 'Send',
        'NEXT'      => 'Next',
        'USER'      => 'User',
        'PASS'      => 'Password',
        'PASSCONF'      => 'Confirm Password',
        'NAME'      => 'Name',
        'LASTNAME'      => 'Last Name',
        'BIRTHD'      => 'Birthday'));
?>
