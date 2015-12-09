<?php

 /**
  * Základní nastavení, připojení k databázy s přednastavenými parametry.
  *
  * @author Kosek David
  */
 define('DS', DIRECTORY_SEPARATOR);
 define('SERVER_ROOT', dirname(__FILE__));

 // debugování
 error_reporting(E_ALL);

 require_once '/lib/dibi.min.php';

 dibi::connect(array(
     'driver' => 'mysqli',
     'host' => 'localhost',
     'username' => 'root',
     'password' => '',
     'database' => 'kiv_web',
 ));

?>
