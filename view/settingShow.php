<?php

 if (isset($_SESSION['login']['role'])) {

     $role = $_SESSION['login']['role'];
     $settingModel = new SettingModel();
     $roles = $settingModel->getRoles();

     switch ($role) {
         //admin
         case $roles[0]['description']:
             include 'settingAdmin.php';
             break;
         // recenzent
         case $roles[1]['description']:
             include 'settingReviewer.php';
             break;
         // autor
         case $roles[2]['description']:
             include 'settingAuthor.php';
             break;
         // unknow
         default:
             include 'error/404.php';
             break;
     }
 } else {
     include 'error/404.php';
 }

?>