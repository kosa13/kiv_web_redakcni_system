<?php

 class ThemesModel {

     /* Bezparametrový konstruktor */
     public function __construct() {

     }

     public function getAllPublicArticles() {
         return dibi::fetchAll('SELECT * FROM article WHERE result = 1 ORDER BY create_date DESC');
     }

     public function getAuthorArticle($id) {
         return dibi::fetch('SELECT * FROM users WHERE id_user = %i', $id);
     }

     public function getArticle($idArticle) {
         return dibi::fetch('SELECT * FROM article LEFT JOIN users ON users.id_user = article.id_author WHERE id_article = %i ', $idArticle);
     }

 }
