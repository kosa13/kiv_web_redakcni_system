<?php

 require_once (SERVER_ROOT . '/model/setting.model.php');

 class Setting extends Controler {

     /* Deklarace proměnné modelu */
     private $model;

     /* Bezparametrový konstruktor */
     public function __construct() {
         $this->model = new SettingModel();
     }

     /* Metoda zavolání příslušného view
      *
      * @param array pole zpráv
      */
     public function show(array $vars) {
         $this->render(__FUNCTION__, $vars);
     }

     public function permissionDenied() {
         $this->render("permissionDenied", array());
     }

     public function addArticle(array $vars) {
         if ($_SESSION['login']['role'] == 'autor') {
             if (!empty($_POST)) {
                 $this->uploadFile($_FILES);
                 $this->model->addArticle($_POST, $_FILES);
                 $this->render("show", $vars);
             } else {
                 $this->render(__FUNCTION__, $vars);
             }
         } else {
             $this->permissionDenied();
         }
     }

     private function uploadFile() {
         $target_dir = "upload/articles/";
         $target_file = $target_dir . basename($_FILES["file"]["name"]);
         move_uploaded_file($_FILES["file"]["tmp_name"], $target_file);
     }

     public function deleteArticle(array $vars) {
         if ($_SESSION['login']['role'] == 'autor') {
             if (!empty($vars['id'])) {
                 $result = $this->model->deleteArticle($vars['id']);

                 if ($result === 1) {
                     $vars['msg'] = "Příspěvek byl odstraněn";
                 } else {
                     $vars['err'] = "Příspěvek nenalezen";
                 }
             }
             $this->render("show", $vars);
         } else {
             $this->permissionDenied();
         }
     }

     public function editArticle(array $vars) {
         if ($_SESSION['login']['role'] == 'autor') {
             if (!empty($_POST)) {
                 $result = $this->model->editArticle($_POST, $vars['id']);
                 if ($result === 1) {
                     $vars['msg'] = "Příspěvek byl aktualizován";
                 } else {
                     $vars['err'] = "Příspěvek nenalezen";
                 }
                 $this->render("show", $vars);
             } else {
                 $this->render(__FUNCTION__, $vars);
             }
         } else {
             $this->permissionDenied();
         }
     }

     public function detailArticle(array $vars) {
         if ($_SESSION['login']['role'] == 'autor') {
             if (!empty($vars['id'])) {
                 $this->render(__FUNCTION__, $vars);
             } else {
                 $vars['err'] = "Příspěvek nenalezen";
                 $this->render("show", $vars);
             }
         } else {
             $this->permissionDenied();
         }
     }

     public function reviewedArticle(array $vars) {
         if ($_SESSION['login']['role'] == 'recenzent') {
             $this->render(__FUNCTION__, $vars);
         } else {
             $this->permissionDenied();
         }
     }

     public function reviewArticleDetail(array $vars) {
         if ($_SESSION['login']['role'] == 'recenzent') {
             $this->render(__FUNCTION__, $vars);
         } else {
             $this->permissionDenied();
         }
     }

     public function reviewArticle(array $vars) {
         if ($_SESSION['login']['role'] == 'recenzent') {
             if (!empty($_POST)) {
                 $this->model->reviewArticle($_POST, $vars['id']);
                 $vars['msg'] = "Děkujeme za recenzi";
                 $this->render("show", $vars);
             } else {
                 $this->render(__FUNCTION__, $vars);
             }
         } else {
             $this->permissionDenied();
         }
     }

     public function recalculate(array $vars) {
         if ($_SESSION['login']['role'] == 'administrator') {
             $this->model->recalculated();
             $vars['msg'] = "Rozhodnutí byla přepočítána.";
             $this->render("show", $vars);
         } else {
             $this->permissionDenied();
         }
     }

     public function userAdministration(array $vars) {
         if ($_SESSION['login']['role'] == 'administrator') {
             $this->render(__FUNCTION__, $vars);
         } else {
             $this->permissionDenied();
         }
     }

     public function editRole(array $vars) {
         if ($_SESSION['login']['role'] == 'administrator') {
             if (!empty($_POST)) {
                 $this->model->editRole($_POST, $vars['id']);
                 $vars['msg'] = "Role byla aktualizována.";
                 $this->render("userAdministration", $vars);
             } else {
                 $this->render("editRole", $vars);
             }
         } else {
             $this->permissionDenied();
         }
     }

     public function setParam(array $vars) {
         if ($_SESSION['login']['role'] == 'administrator') {
             if (!empty($_POST)) {
                 $this->model->setCriterium($_POST);
                 $vars['msg'] = "Kritérium přenastaveno.";
                 $this->render("show", $vars);
             } else {
                 $this->render(__FUNCTION__, $vars);
             }
         } else {
             $this->permissionDenied();
         }
     }

 }
