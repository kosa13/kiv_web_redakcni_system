<?php

 require_once (SERVER_ROOT . '/model/themes.model.php');

 class Themes extends Controler {

     /* Deklarace proměnné modelu */
     private $model;

     /* Bezparametrový konstruktor */
     public function __construct() {
         $this->model = new ThemesModel();
     }

     /* Metoda zavolání příslušného view
      *
      * @param array pole zpráv
      */
     public function show(array $vars) {
         $this->render(__FUNCTION__, $vars);
     }

     public function detailArticle(array $vars) {
         $this->render(__FUNCTION__, $vars);
     }

 }
