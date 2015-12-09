<div class="container">
    <header class="jumbotron">
        <div class="row">
            <h2>Seznam příspěvků</h2>
        </div>

        <div class="row">
            <a href="index.php?setting=setParam" class="btn btn-primary" style="float: left;">Nastavit kritéria</a>
            <a href="index.php?setting=recalculate" class="btn btn-warning" style="float: left; margin-left: 10px;">Přepočítat rozhodnutí</a>
            <a href="index.php?setting=userAdministration" class="btn btn-info" style="float: left; margin-left: 10px;">Správa uživatelů</a>
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
                    <th rowspan="2" style='vertical-align: middle;'>Název</th>
                    <th rowspan="2" style='vertical-align: middle;'>Autoři</th>
                    <th colspan="7" style='text-align: center;'>Recenze</th>
                    <th rowspan="2" class='text-midle'>Rozhodnutí</th>
                </tr>
                <tr>
                    <th>Recenzent</th>
                    <th>orig.</th>
                    <th>téma</th>
                    <th>tech.</th>
                    <th>jaz.</th>
                    <th>dop.</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>

                <?php

                 $settingModel = new SettingModel();
                 $articles = $settingModel->getAllArticlesWithReview();
                 $reviewers = $settingModel->getAllReviewers();

                 foreach ($articles as $article) {

                     $reviewed = $settingModel->getAllReviewed($article['id_article']);


                     if ($article['result'] == 1) {
                         $result = "Přijmuto";
                     } else {
                         $result = "Nepřijmuto";
                     }

                     echo '<tr>'
                     . '<td rowspan="4" style="vertical-align: middle;">' . $article['article_name'] . '</td>'
                     . '<td rowspan="4" style="vertical-align: middle;">' . $article['name'] . ", " . $article['authors'] . '</td>';

                     if (count($reviewed) > 0) {
                         echo '<tr><td class="text-left">' . $reviewed[0]['name'] . '</td>'
                         . '<td  class="text-midle">' . $reviewed[0]['originalsReview'] . '</td>'
                         . '<td  class="text-midle">' . $reviewed[0]['themeReview'] . '</td>'
                         . '<td  class="text-midle">' . $reviewed[0]['technicalReview'] . '</td>'
                         . '<td  class="text-midle">' . $reviewed[0]['languagesReview'] . '</td>'
                         . '<td  class="text-midle">' . $reviewed[0]['recommendationReview'] . '</td>'
                         . '<td  class="text-midle">'
                         . '<input type="hidden" value="' . $reviewed[0]['id_reviewer'] . '" ">'
                         . '<button class="btn btn-danger btn-xs removeReviewer" id="' . $article['id_article'] . '"><i class="fa fa-trash-o"></button></td>'
                         . '    <td rowspan="4" class="text-midle">' . $result . '</td></tr>';
                         if (count($reviewed) > 1) {
                             echo '<tr><td  class="text-left"">' . $reviewed[1]['name'] . '</td>'
                             . '<td  class="text-midle"">' . $reviewed[1]['originalsReview'] . '</td>'
                             . '<td  class="text-midle"">' . $reviewed[1]['themeReview'] . '</td>'
                             . '<td  class="text-midle"">' . $reviewed[1]['technicalReview'] . '</td>'
                             . '<td  class="text-midle"">' . $reviewed[1]['languagesReview'] . '</td>'
                             . '<td  class="text-midle"">' . $reviewed[1]['recommendationReview'] . '</td>'
                             . '<td  class="text-midle""><input type="hidden" value="' . $reviewed[0]['id_reviewer'] . '" ">'
                             . '<button class="btn btn-danger btn-xs removeReviewer" id="' . $article['id_article'] . '"><i class="fa fa-trash-o"></button></td></tr>';
                             if (count($reviewed) > 2) {
                                 echo '<tr><td  class="text-left"">' . $reviewed[2]['name'] . '</td>'
                                 . '<td  class="text-midle"">' . $reviewed[2]['originalsReview'] . '</td>'
                                 . '<td  class="text-midle"">' . $reviewed[2]['themeReview'] . '</td>'
                                 . '<td  class="text-midle"">' . $reviewed[2]['technicalReview'] . '</td>'
                                 . '<td  class="text-midle"">' . $reviewed[2]['languagesReview'] . '</td>'
                                 . '<td  class="text-midle"">' . $reviewed[2]['recommendationReview'] . '</td>'
                                 . '<td  class="text-midle""><input type="hidden" value="' . $reviewed[0]['id_reviewer'] . '" ">'
                                 . '<button class="btn btn-danger btn-xs removeReviewer" id="' . $article['id_article'] . '"><i class="fa fa-trash-o"></button></td></tr>';
                             } else {
                                 selectReviewers($article['id_article'], $reviewers, 3);
                             }
                         } else {
                             selectReviewers($article['id_article'], $reviewers, 2);
                             selectReviewers($article['id_article'], $reviewers, 3);
                         }
                     } else {
                         selectReviewers($article['id_article'], $reviewers, 1);
                         echo '<td rowspan="4" style="vertical-align: middle; text-align: center;">' . $result . '</td></tr>';
                         selectReviewers($article['id_article'], $reviewers, 2);
                         selectReviewers($article['id_article'], $reviewers, 3);
                     }
                 }
                 function selectReviewers($articleId, $reviewers, $position) {
                     echo '<tr><td colspan="3">';
                     echo '<input type="hidden" value="' . $articleId . '" ">';
                     echo '<select class="form-control" id="recenzent' . $articleId . $position . '" required>
                            <option value="" disabled selected>Vyber recenzenta</option>';
                     foreach ($reviewers as $item) {
                         echo('<option value="' . $item['id_user'] . '" >');

                         echo($item['name']);
                         echo('</option>');
                     }
                     echo '</select>';
                     echo '</td><td colspan="4"><button id="' . $position . '" class="btn btn-success btn-block addReviewer">Přiřadit</button>';
                 }

                ?>
            </tbody>
        </table>

    </header>
</div>
<script type="text/javascript" src="js/ajax.googleapis.com_ajax_libs_jquery_1.11.3_jquery.min.js"></script>
<script type="text/javascript">

    $(document).ready(function () {
        $body = $("body");

        $(document).on("click", ".addReviewer", function () {
            $body.addClass("loading");
            var idArticle = $(this).parents('tr').find('input[type="hidden"]').val();
            var position = this.id;
            var idRecenzent = $("#recenzent" + idArticle + position + " option:selected").val();

            if (idRecenzent === "") {
                alertify.error('Vyberte recenzenta!');
                $body.removeClass("loading");
            } else {
                var params = "&idArticle=" + JSON.stringify(idArticle) + "&idRecenzent=" + JSON.stringify(idRecenzent);
                var http = new XMLHttpRequest();
                http.onreadystatechange = callbackAddRecenzent;
                http.open("POST", "scripts/addRecenzent.php", true);
                http.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
                http.send(params);
            }
        });

        $(document).on("click", ".removeReviewer", function () {
            $body.addClass("loading");
            var idRecenzent = $(this).parents('tr').find('input[type="hidden"]').val();
            var idArticle = this.id;

            if (idRecenzent === "") {
                alertify.error('Vyberte recenzenta!');
                $body.removeClass("loading");
            } else {
                var params = "&idArticle=" + JSON.stringify(idArticle) + "&idRecenzent=" + JSON.stringify(idRecenzent);
                var http = new XMLHttpRequest();
                http.onreadystatechange = callbackDeleteRecenzent;
                http.open("POST", "scripts/deleteRecenzent.php", true);
                http.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
                http.send(params);
            }
        });

        var callbackAddRecenzent = function () {
            if (this.readyState === 4 && this.status === 200) {
                var data = JSON.parse(this.responseText);
                if (data.success === "true") {
                    alertify.success('Recenzent byl úspěšně přiřazen!');
                    location.reload();
                } else {
                    alertify.error(data.msg);
                }
                $body.removeClass("loading");
            }
        };

        var callbackDeleteRecenzent = function () {
            if (this.readyState === 4 && this.status === 200) {
                var data = JSON.parse(this.responseText);
                if (data.success === "true") {
                    alertify.success('Recenzent byl i s hodnocení úspěšně odstraněn!');
                    location.reload();
                } else {
                    alertify.error(data.msg);
                }
                $body.removeClass("loading");
            }
        };





    });
</script>