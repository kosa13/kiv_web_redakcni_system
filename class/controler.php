<?php

 /**
  * Kontrolér, ze kterého dědí všechny ostatní kontroléry. Protože všichni využívají tyto dvě metody.
  *
  * @author Kosek
  */
 class Controler {

     /**
      * Metoda, která zjištuje, kterou metodu zavolat.
      * @param array $vars parametry
      */
     public function main(array $vars) {

         $show = array_shift($vars);
         if (empty($show)) {
             $show = 'show';
         }
         if ($this->checkExistFunction($this, $show)) {
             $this->$show($vars);
         } else {
             $this->render("error/404", $vars);
         }
     }

     private function checkExistFunction($class, $function) {
         if (method_exists($class, $function)) {
             return true;
         } else {
             return false;
         }
     }

     /**
      * Metoda pro zobrazení příslušného view.
      *
      * @param type $show zobrazovana stranka
      * @param array $vars parametry
      */
     public function render($show, array $vars) {
         $file = 'view' . DS . strtolower(get_class($this)) . ucfirst($show) . '.php';
         //zjistíme, jestli existuje volaný view, pokud ne zavoláme stránku s chybou
         if (!file_exists($file)) {
             $file = 'view' . DS . 'error' . DS . '404.php';
         }

         extract($vars);
         ob_start();
         include($file);
         $output = ob_get_contents();
         ob_end_clean();
         echo $output;
     }

 }
