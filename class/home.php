<?php

 /**
  * Třída Home sloužící jako úvodní strana s přehledem a rychlím přístupem na jiné stránky
  *
  * @author Kosek David
  */
 /* načtení příslušného modelu */


 require_once (SERVER_ROOT . '/model/home.model.php');

 class Home extends Controler {

     /* Deklarace proměnné modelu */
     private $model;

     /* Bezparametrový konstruktor */
     public function __construct() {
         $this->model = new HomeModel();
     }

     /* Metoda zavolání příslušného view
      *
      * @param array pole zpráv
      */
     public function show(array $vars) {
         $this->render(__FUNCTION__, $vars);
     }

 }
