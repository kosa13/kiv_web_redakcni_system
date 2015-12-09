<?php

 $settingModel = new SettingModel();
 $article = $settingModel->getAssignedArticlesById($vars["id"]);

?>
<div class="container">
    <div class="jumbotron">
        <header>
            <h2>Nová recenze k <?php echo $article['article_name']; ?></h2>
            <br />
        </header>
        <form class="form-horizontal" role="form" action="index.php?setting=reviewArticle&id=<?php echo $vars["id"]; ?>" method="POST">
            <div class="form-group">
                <label class="control-label col-sm-2" for="originalValue">Originalita</label>
                <div class="col-sm-10">
                    <select class="form-control" name="originalValue" id="originalValue" required>
                        <option value="" disabled selected>Vaše hodnocení</option>
                        <option value='1'>1</option>
                        <option value='2'>2</option>
                        <option value='3'>3</option>
                        <option value='4'>4</option>
                        <option value='5'>5</option>
                    </select>
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-sm-2" for="themeValue">Téma</label>
                <div class="col-sm-10">
                    <select class="form-control" id="themeValue" name="themeValue" required>
                        <option value="" disabled selected>Vaše hodnocení</option>
                        <option value='1'>1</option>
                        <option value='2'>2</option>
                        <option value='3'>3</option>
                        <option value='4'>4</option>
                        <option value='5'>5</option>
                    </select>
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-sm-2" for="technicalValue">Technická kvalita</label>
                <div class="col-sm-10">
                    <select class="form-control" id="technicalValue" name="technicalValue" required>
                        <option value="" disabled selected>Vaše hodnocení</option>
                        <option value='1'>1</option>
                        <option value='2'>2</option>
                        <option value='3'>3</option>
                        <option value='4'>4</option>
                        <option value='5'>5</option>
                    </select>
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-sm-2" for="languagesValue">Jazyková kvalita</label>
                <div class="col-sm-10">
                    <select class="form-control" id="languagesValue" name="languagesValue" required>
                        <option value="" disabled selected>Vaše hodnocení</option>
                        <option value='1'>1</option>
                        <option value='2'>2</option>
                        <option value='3'>3</option>
                        <option value='4'>4</option>
                        <option value='5'>5</option>
                    </select>
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-sm-2" for="recommendation">Doporučení</label>
                <div class="col-sm-10">
                    <select class="form-control" id="recommendation" name="recommendation" required>
                        <option value="" disabled selected>Vaše hodnocení</option>
                        <option value='1'>1</option>
                        <option value='2'>2</option>
                        <option value='3'>3</option>
                        <option value='4'>4</option>
                        <option value='5'>5</option>
                    </select>
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-sm-2" for="notes">Obsah</label>
                <div class="col-sm-10">
                    <textarea class="form-control" id="notes" placeholder="Poznámky..." rows="10" name="notes" style="resize: none;"></textarea>
                </div>
            </div>
            <div class="form-group">
                <div class="col-sm-offset-2 col-sm-10">
                    <div class="checkbox">
                        <label><input type="checkbox" name="rules" required> Neporušil/a jsem žádné z pravidel.</label>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <div class="col-sm-offset-2 col-sm-10">
                    <input type="hidden" value='<?php echo $article['id_article']; ?>' name='idArticle'>
                    <button type="submit" value="send" class="btn btn-success" id="submit">Uložit</button>
                </div>
            </div>
        </form>
    </div>
</div>



