<?php

 require_once '../lib/dibi.min.php';

 dibi::connect(array(
     'driver' => 'mysqli',
     'host' => 'localhost',
     'username' => 'root',
     'password' => '',
     'database' => 'kiv_web',
 ));



 if (!empty($_POST)) {

     $name = substr($_POST['login'], 1, strlen($_POST['login']) - 2);
     $pass = substr($_POST['password'], 1, strlen($_POST['password']) - 2);

     $existuje = dibi::fetchAll("SELECT * FROM users LEFT JOIN roles ON roles.id_role = users.id_role WHERE login = %s AND password = %s", $name, $pass);

     $result = array();

     if (count($existuje) != 0) {

         session_start();
         $_SESSION['login']['id'] = $existuje[0]['id_user'];
         $_SESSION['login']['login'] = $existuje[0]['login'];
         $_SESSION['login']['name'] = $existuje[0]['name'];
         $_SESSION['login']['role'] = $existuje[0]['description'];

         $result['success'] = "true";
         echo json_encode($result);
     } else {
         $result['success'] = "false";
         echo json_encode($result);
     }
 }


