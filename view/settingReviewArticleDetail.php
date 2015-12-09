<?php

 /**
  * Stránka zobrazující detailní informace o příspěvku vybraného podle ID.
  *
  * @author Kosek David
  */

?>
<?php

 $settingModel = new SettingModel();
 $article = $settingModel->getArticleDetail($vars["id"]);

 if ($article) {

     ?>

     <div class="container">
         <div class="jumbotron">
             <div class="row">
                 <h2>Detail příspěvku - <?php echo $article['article_name']; ?></h2>
             </div>

             <table class="table table-striped">
                 <tr>
                     <td>Název</td>
                     <td><?php echo $article['article_name']; ?></td>
                 </tr>

                 <tr>
                     <td>Autoři</td>
                     <td><?php echo $article['authors']; ?></td>
                 </tr>
                 <tr>
                     <td>Datum vytvoření</td>
                     <td><?php echo date_format($article['create_date'], "d/m/Y") ?></td>
                 </tr>
                 <tr>
                     <td>Obsah</td>
                     <td><?php echo $article['content']; ?></td>
                 </tr>
                 <tr>
                     <td>Soubor</td>
                     <td><?php

                         if (!empty($article['file_name'])) {

                             echo "<a href='upload/articles/" . $article['file_name'] . "' target='_blank'>" . $article['file_name'] . "</a>";
                         }

                         ?></td>
                 </tr>
             </table>
             <br>
             <a class="btn btn-info" href="index.php?setting=show">Zpět</a>
         </div>

     </div>
     <?php

 } else {

     ?>
     <div class="container">
         <div class="jumbotron">
             <div class="row">
                 <h2>Detail příspěvku <?php echo($vars["id"]); ?> nenalezen!</h2>
             </div>
             <a class="btn btn-info" href="index.php?setting=show">Zpět</a>
         </div>
     </div>
     <?php

 }

?>







