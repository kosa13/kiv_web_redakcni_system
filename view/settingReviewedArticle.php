<div class="container">
    <header class="jumbotron">
        <div class="row">
            <h2>Historie přiřazených příspěvků</h2>
        </div>

        <div class="row">
            <a href="index.php?setting=show" class="btn btn-primary" style="float: left;">Příspěvky k posouzení</a>
        </div>
        <br /> <br />

        <table class="table table-striped">
            <thead>
                <tr style="text-align: center;">
                    <th>Název</th>
                    <th>Mé hodnocení</th>
                    <th>Celkové hodnocení</th>
                    <th>Datum hodnocení</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                <?php

                 $settingModel = new SettingModel();
                 $articles = $settingModel->getAssignedArticlesClosed($_SESSION['login']['id']);

                 foreach ($articles as $article) {
                     echo '<tr><td style="text-align: left;">' . $article['article_name'] . '</td>'
                     . '<td style="text-align: left;">' . (($article['originalsReview'] + $article['themeReview'] + $article['technicalReview'] + $article['languagesReview'] + $article['recommendationReview']) / 5) . '</td>'
                     . '<td style="text-align: left;">' . $article['total_score'] . '</td>'
                     . '<td style="text-align: left;">' . date_format($article['assigned_date'], "d/m/Y") . '</td>';
                     echo '<td style="text-align: right;">';

                     if ($article['result'] == 1) {
                         echo '<i class="fa fa-check"></i>';
                     } else {
                         echo '<i class="fa fa-close"></i>';
                     }
                 }

                ?>
            </tbody>
        </table>

    </header>
</div>
