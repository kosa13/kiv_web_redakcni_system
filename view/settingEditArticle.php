<?php

 /**
  * Stránka zobrazující detailní informace o příspěvku vybraného podle ID.
  *
  * @author Kosek David
  */

?>
<?php

 $settingModel = new SettingModel();
 $article = $settingModel->getArticle($vars["id"]);

 if ($article) {

     ?>

     <div class="container">
         <div class="jumbotron">
             <header>
                 <h2>Editace příspěvku  - <?php echo $article['article_name']; ?></h2>
                 <br />
             </header>
             <form class="form-horizontal" role="form" action="index.php?setting=editArticle&id=<?php echo $vars["id"]; ?>" method="POST">
                 <div class="form-group">
                     <label class="control-label col-sm-2" for="nameArticle">Název</label>
                     <div class="col-sm-10">
                         <input type="text" class="form-control" id="nameArticle" name="nameArticle" placeholder="Název příspěvku..." value='<?php echo $article['article_name']; ?>' required autofocus>
                     </div>
                 </div>
                 <div class="form-group">
                     <label class="control-label col-sm-2" for="nameAuthors">Autoři</label>
                     <div class="col-sm-10">
                         <input type="text" class="form-control" id="nameAuthors" name="nameAuthors" placeholder="Jména autorů..." value='<?php echo $article['authors']; ?>'>
                         <span class="help-block">Své jméno neuvádějte, je přidáváno automaticky.</span>
                     </div>
                 </div>
                 <div class="form-group">
                     <label class="control-label col-sm-2" for="contentArticle">Obsah</label>
                     <div class="col-sm-10">
                         <textarea class="form-control" id="contentArticle" placeholder="Obsah..." rows="10" name="contentArticle" style="resize: none;" required><?php echo $article['content']; ?></textarea>
                     </div>
                 </div>
                 <!--                 <div class="form-group">
                                      <label class="control-label col-sm-2" for="file">PDF soubor</label>
                                      <div class="col-sm-10">
                                          <input readonly type="file" id="file" name="file" value='<?php echo $article['file_name']; ?>'>
                                      </div>
                                  </div>-->
                 <div class="form-group">
                     <div class="col-sm-offset-2 col-sm-10">
                         <div class="checkbox">
                             <label><input type="checkbox" name="rules" required> Neporušil/a jsem žádné z pravidel.</label>
                         </div>
                     </div>
                 </div>
                 <div class="form-group">
                     <div class="col-sm-offset-2 col-sm-10">
                         <button type="submit" value="send" class="btn btn-success" id="submit">Uložit</button>
                         <a class="btn btn-info" href="index.php?setting=show">Zpět</a>
                     </div>
                 </div>
             </form>
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







