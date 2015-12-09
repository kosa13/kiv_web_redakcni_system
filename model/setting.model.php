<?php

 class SettingModel {

     /* Bezparametrový konstruktor */
     public function __construct() {

     }

     public function getArticles($id) {
         return dibi::fetchAll('SELECT * FROM article WHERE id_author = %i ORDER BY create_date DESC', $id);
     }

     public function getUsers() {
         return dibi::fetchAll('SELECT * FROM users LEFT JOIN roles ON users.id_role = roles.id_role WHERE id_user != %i AND users.id_role != "" ORDER BY id_user', $_SESSION['login']['id']);
     }

     public function getUserInfo($id) {
         return dibi::fetch('SELECT * FROM users WHERE id_user = %i', $id);
     }

     public function getUsersWithout() {
         return dibi::fetchAll('SELECT * FROM users WHERE id_role = "" ORDER BY id_user');
     }

     public function getCriteriumReview() {
         return dibi::fetch('SELECT * FROM settings WHERE description = %s', "criterium_review");
     }

     public function getAllReviewers() {
         return dibi::fetchAll('SELECT * FROM users WHERE id_role = 2 ORDER BY id_user');
     }

     public function getAllArticlesWithReview() {
         return dibi::fetchAll('SELECT * FROM article LEFT JOIN '
                         . 'users ON users.id_user = article.id_author ORDER BY create_date DESC');
     }

     public function getAllReviewed($id) {
         return dibi::fetchAll('SELECT * FROM review LEFT JOIN '
                         . 'users ON review.id_reviewer = users.id_user WHERE review.id_article = %i ORDER BY review_date DESC', $id);
     }

     public function getAssignedArticles($id) {
         return dibi::fetchAll('SELECT * FROM review LEFT JOIN '
                         . 'article ON review.id_article = article.id_article LEFT JOIN '
                         . 'users ON users.id_user = review.id_admin  WHERE review.id_reviewer = %i AND is_reviewed = 0 ORDER BY create_date DESC', $id);
     }

     public function getAssignedArticlesClosed($id) {
         return dibi::fetchAll('SELECT * FROM review LEFT JOIN '
                         . 'article ON review.id_article = article.id_article LEFT JOIN '
                         . 'users ON users.id_user = review.id_admin  WHERE review.id_reviewer = %i AND is_reviewed = 1 ORDER BY create_date DESC', $id);
     }

     public function getAssignedArticlesById($id) {
         return dibi::fetch('SELECT * FROM review LEFT JOIN '
                         . 'article ON review.id_article = article.id_article LEFT JOIN '
                         . 'users ON users.id_user = review.id_admin  WHERE review.id_review = %i ORDER BY create_date DESC', $id);
     }

     public function getCurrentReview($id) {
         $review = dibi::fetchAll('SELECT * FROM review WHERE review.id_article = %i AND is_reviewed = 1', $id);
         $resultValue = 0;
         $countNumber = 0;
         foreach ($review as $row) {
             $resultValue += $row['originalsReview'] + $row['themeReview'] + $row['technicalReview'] + $row['languagesReview'] + $row['recommendationReview'];
             $countNumber = $countNumber + 1;
         }

         if ($countNumber != 0) {
             $resultValue = $resultValue / (5 * $countNumber);
         }

         return $resultValue;
     }

     public function getRoles() {
         return dibi::fetchAll('SELECT * FROM roles');
     }

     public function getArticle($idArticle) {
         return dibi::fetch('SELECT * FROM article LEFT JOIN users ON users.id_user = article.id_author WHERE id_article = %i ', $idArticle);
     }

     public function getArticleDetail($idArticle) {
         return dibi::fetch('SELECT * FROM article WHERE id_article = %i ', $idArticle);
     }

     public function addArticle($param, $file) {
         $arr = array(
             'article.article_name' => $param['nameArticle'],
             'article.authors' => $param['nameAuthors'],
             'article.content' => $param['contentArticle'],
             'article.file_name' => $file['file']['name'],
             'article.id_author' => $_SESSION['login']['id']
         );
         dibi::query('INSERT INTO article', $arr);
     }

     public function setCriterium($param) {
         $arr = array(
             'settings.value' => $param['criterium']
         );
         dibi::query('UPDATE [settings] SET ', $arr, 'WHERE [description] = %s', "criterium_review");
     }

     public function deleteArticle($idArticle) {
         return dibi::query('DELETE FROM [article] WHERE [id_article] = %i AND [id_author] = %i', $idArticle, $_SESSION['login']['id']);
     }

     public function reviewArticle($param, $id) {
         $arr = array(
             'review.originalsReview' => $param['originalValue'],
             'review.themeReview' => $param['themeValue'],
             'review.technicalReview' => $param['technicalValue'],
             'review.languagesReview' => $param['languagesValue'],
             'review.recommendationReview' => $param['recommendation'],
             'review.review_date' => date("Y-m-d H:i:s"),
             'review.is_reviewed' => 1
         );
         dibi::query('UPDATE [review] SET ', $arr, 'WHERE [id_review] = %i', $id);
         $this->recalculateReview($id);
     }

     public function recalculateReview($param) {
         $review = count(dibi::fetchAll('SELECT * FROM review WHERE review.id_article = %i AND review.is_reviewed = 1', $param));
         $totalCount = $this->getCurrentReview($param);
         $currentParam = $this->getCriteriumReview();

         if ($review == 3) {
             $result = 0;
             if ($totalCount <= $currentParam['value']) {
                 $result = 1;
             }

             $changeTotal = array(
                 'article.total_score' => round($totalCount, 2),
                 'article.result' => $result
             );
         } else {
             $changeTotal = array(
                 'article.total_score' => $totalCount
             );
         }

         dibi::query('UPDATE [article] SET ', $changeTotal, 'WHERE [id_article] = %i', $param);
     }

     public function recalculated() {

         $allIdArticle = dibi::fetchAll("SELECT id_article FROM article");

         foreach ($allIdArticle as $key => $value) {
             $this->recalculateReview($value['id_article']);
         }
     }

     public function editRole($param, $id) {
         $arr = array(
             'users.id_role' => $param['idRole']
         );
         dibi::query('UPDATE [users] SET ', $arr, 'WHERE [id_user] = %i', $id);
     }

 }
