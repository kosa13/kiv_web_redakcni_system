<div class="container">
    <header class="jumbotron">
        <h2>Témata určená k zveřejnění</h2>
    </header>
    <hr>

    <div class="row">
        <div class="col-lg-12">

            <table class="table table-striped">
                <thead>
                    <tr style="text-align: center;">
                        <th>Název</th>
                        <th>Autor</th>
                        <th>Datum vložení</th>
                        <th>Hodnocení</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    <?php

                     $themesModel = new ThemesModel();
                     $articles = $themesModel->getAllPublicArticles();

                     foreach ($articles as $article) {
                         $authorOrignial = $themesModel->getAuthorArticle($article['id_author']);
                         echo '<tr><td style="text-align: left;">' . $article['article_name'] . '</td>'
                         . '<td style="text-align: left;">' . $authorOrignial['name'] . ", " . $article['authors'] . '</td>'
                         . '<td style="text-align: left;">' . date_format($article['create_date'], "d/m/Y") . '</td>'
                         . '<td style="text-align: left;">' . $article['total_score'] . '</td>';

                         echo '<td style="text-align: right;">'
                         . '<a href="index.php?themes=detailArticle&id=' . $article['id_article'] . '" class="btn btn-success btn-xs"><i class="fa fa-eye"></i>&nbsp;DETAIL</a>';
                     }

                    ?>
                </tbody>
            </table>



        </div>
    </div>
</div>