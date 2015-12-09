<?php

 /*
  * To change this license header, choose License Headers in Project Properties.
  * To change this template file, choose Tools | Templates
  * and open the template in the editor.
  */
 require_once '../lib/dibi.min.php';

 dibi::connect(array(
     'driver' => 'mysqli',
     'host' => 'localhost',
     'username' => 'root',
     'password' => '',
     'database' => 'kiv_web',
 ));



 if (!empty($_POST)) {

     session_start();

     $id = substr($_POST['idArticle'], 1, strlen($_POST['idArticle']) - 2);

     dibi::query('DELETE FROM [article] WHERE [id_article] = %i AND [id_author] = %i', $id, $_SESSION['login']['id']);

     $result = array();
     $result['success'] = "true";

     echo json_encode($result);
 } else {
     echo '{"success": "false"}';
 }







