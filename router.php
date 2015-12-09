<?php

 /**
  * Soubor pro určení, který z kontroléru se má zavolat, v případě jeho neexistence
  * se vypíše chyba.
  *
  * @author Kosek David
  */
 $request = $_SERVER['QUERY_STRING'];

 $existClasses = ['galerie', 'home', 'rules', 'setting', 'themes'];

 $parsed = explode('=', $request);
 $page = array_shift($parsed);
 $existPage = null;

 for ($index = 0; $index < count($existClasses); $index++) {
     if ($page == $existClasses[$index]) {
         $existPage = $page;
     }
 }

 $getVars = array();

 if (!empty($existPage)) {
     $target = SERVER_ROOT . DS . 'class' . DS . $existPage . '.php';

     $param = explode('&', $request);
     if (!empty($param[0])) {
         foreach ($param as $argument) {
             list($variable, $value) = preg_split('/=/', $argument);
             $getVars[$variable] = $value;
         }
     }
 } else {
     $existPage = 'home';
     $target = SERVER_ROOT . DS . 'class' . DS . 'home.php';
 }


 if (file_exists($target)) {
     include_once($target);
     $class = ucfirst($existPage);
     if (class_exists($class)) {
         $controller = new $class;
     } else {
         die('class ' . $class . ' does not exist!');
     }
 } else {
     die('page "' . $page . '" does not exist!' . $target);
 }
