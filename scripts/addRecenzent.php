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

     $idArticle = substr($_POST['idArticle'], 1, strlen($_POST['idArticle']) - 2);
     $idRecenzent = substr($_POST['idRecenzent'], 1, strlen($_POST['idRecenzent']) - 2);

     $exist = dibi::fetchAll("SELECT * FROM review WHERE id_article = %s AND id_reviewer = %i", $idArticle, $idRecenzent);
     $result = array();

     if (count($exist) != 0) {
         $result['msg'] = "Recenzent již příspěvek hodnotil!";
         $result['success'] = "false";
     } else {
         session_start();
         $arr = array(
             'review.id_article' => $idArticle,
             'review.id_reviewer' => $idRecenzent,
             'review.is_reviewed' => 0,
             'review.id_admin' => $_SESSION['login']['id']
         );
         dibi::query('INSERT INTO review', $arr);
         $result['success'] = "true";
     }

     echo json_encode($result);
 } else {
     echo '{"success": "false"}';
 }


