<div class="container">
    <div class="jumbotron">
        <header>
            <h2>Nový příspěvek</h2>
            <br />
        </header>
        <form class="form-horizontal" role="form" action="index.php?setting=addArticle" method="POST" enctype="multipart/form-data">
            <div class="form-group">
                <label class="control-label col-sm-2" for="nameArticle">Název</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="nameArticle" name="nameArticle" placeholder="Název příspěvku..." required autofocus>
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-sm-2" for="nameAuthors">Autoři</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="nameAuthors" name="nameAuthors" placeholder="Jména autorů...">
                    <span class="help-block">Své jméno neuvádějte, je přidáváno automaticky.</span>
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-sm-2" for="contentArticle">Obsah</label>
                <div class="col-sm-10">
                    <textarea class="form-control" id="contentArticle" placeholder="Obsah..." rows="10" name="contentArticle" style="resize: none;" required></textarea>
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-sm-2" for="file">PDF soubor</label>
                <div class="col-sm-10">
                    <input type="file" id="file" name="file">
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
                    <button type="submit" value="send" class="btn btn-success" id="submit">Uložit</button>
                </div>
            </div>
        </form>
    </div>
</div>



