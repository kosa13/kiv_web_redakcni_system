<div class="container">
    <header class="jumbotron">
        <div class="row">
            <h2>Seznam příspěvků k posouzení</h2>
        </div>

        <div class="row">
            <a href="index.php?setting=reviewedArticle" class="btn btn-primary" style="float: left;">Zobrazit již posouzené</a>
        </div>
        <br /> <br />
        <?php

         if (isset($vars['err']) && !empty($vars['err'])) {
             echo('<p class="btn btn-large btn-danger">' . $vars['err'] . '</p>');
         } else if (isset($vars['msg']) && !empty($vars['msg'])) {
             echo('<p class="btn btn-large btn-success">' . $vars['msg'] . '</p>');
         }

        ?>
        <table class="table table-striped">
            <thead>
                <tr style="text-align: center;">
                    <th>Název</th>
                    <th>Přiřadil</th>
                    <th>Aktuální hodnocení</th>
                    <th>Datum přiřazení</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                <?php

                 $settingModel = new SettingModel();
                 $articles = $settingModel->getAssignedArticles($_SESSION['login']['id']);

                 if (count($articles) == 0) {
                     echo "<tr><td colspan='5'>Aktuálně nemáte přiřazené žádné příspěvky</td></tr>";
                 } else {
                     foreach ($articles as $article) {
                         $currentReview = $settingModel->getCurrentReview($article['id_article']);
                         echo '<tr><td style="text-align: left;">' . $article['article_name'] . '</td>'
                         . '<td style="text-align: left;">' . $article['name'] . '</td>'
                         . '<td style="text-align: left;">' . $currentReview . '</td>'
                         . '<td style="text-align: left;">' . date_format($article['assigned_date'], "d/m/Y") . '</td>';
                         echo '<td style="text-align: right;">'
                         . '<a href="index.php?setting=reviewArticleDetail&id=' . $article['id_article'] . '" class="btn btn-info btn-xs"><i class="fa fa-commenting-o"></i>&nbsp;DETAIL</a>&nbsp;&nbsp;'
                         . '<a href="index.php?setting=reviewArticle&id=' . $article['id_review'] . '" class="btn btn-success btn-xs"><i class="fa fa-commenting-o"></i>&nbsp;HODNOTIT</a>';
                     }
                 }

                ?>
            </tbody>
        </table>

    </header>
</div>
