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

     $name = substr($_POST['fullname'], 1, strlen($_POST['fullname']) - 2);
     $email = substr($_POST['email'], 1, strlen($_POST['email']) - 2);
     $org = substr($_POST['org'], 1, strlen($_POST['org']) - 2);
     $login = substr($_POST['login'], 1, strlen($_POST['login']) - 2);
     $pass = substr($_POST['password'], 1, strlen($_POST['password']) - 2);


     $users = dibi::fetchAll("SELECT * FROM users WHERE email = %s OR login = %s", $email, $login);
     $result = array();

     if (count($users) != 0) {

         foreach ($users as $item) {

             if ($item['email'] == $email) {
                 $result['msg'] = "Email je již registrován!";
                 break;
             } else if ($item['login'] == $login) {
                 $result['msg'] = "Login je již obsazen!";
                 break;
             }
         }

         $result['success'] = "false";
     } else {
         $arr = array(
             'users.name' => $name,
             'users.email' => $email,
             'users.login' => $login,
             'users.password' => $pass,
             'users.organisation' => $org
         );
         dibi::query('INSERT INTO users', $arr);
         $result['success'] = "true";
     }


     echo json_encode($result);
 } else {
     echo '{"success": "false"}';
 }


