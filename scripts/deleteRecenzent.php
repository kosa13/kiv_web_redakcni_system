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
     $idArticle = substr($_POST['idArticle'], 1, strlen($_POST['idArticle']) - 2);
     $idRecenzent = substr($_POST['idRecenzent'], 1, strlen($_POST['idRecenzent']) - 2);

     $exist = dibi::fetchAll("SELECT * FROM review WHERE id_article = %s AND id_reviewer = %i", $idArticle, $idRecenzent);
     $result = array();

     if (count($exist) == 1) {
         dibi::query('DELETE FROM [review] WHERE [id_article] = %i AND [id_reviewer] = %i', $idArticle, $idRecenzent);
         $result['success'] = "true";
     } else {
         $result['msg'] = "Recenzent v kombinaci s příspěvkem nebyl nalezen!";
         $result['success'] = "false";
     }

     echo json_encode($result);
 } else {
     echo '{"success": "false"}';
 }











