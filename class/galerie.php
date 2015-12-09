<?php

 require_once (SERVER_ROOT . '/model/galerie.model.php');

 class Galerie extends Controler {

     /* Deklarace proměnné modelu */
     private $model;

     /* Bezparametrový konstruktor */
     public function __construct() {
         $this->model = new GalerieModel();
     }

     /* Metoda zavolání příslušného view
      *
      * @param array pole zpráv
      */
     public function show(array $vars) {
         $this->render(__FUNCTION__, $vars);
     }

 }
