<?php

 require_once (SERVER_ROOT . '/model/rules.model.php');

 class Rules extends Controler {

     /* Deklarace proměnné modelu */
     private $model;

     /* Bezparametrový konstruktor */
     public function __construct() {
         $this->model = new RulesModel();
     }

     /* Metoda zavolání příslušného view
      *
      * @param array pole zpráv
      */
     public function show(array $vars) {
         $this->render(__FUNCTION__, $vars);
     }

 }
