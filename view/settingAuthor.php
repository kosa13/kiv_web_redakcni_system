<div class="container">
    <header class="jumbotron">
        <div class="row">
            <h2>Přehled příspěvků</h2>
        </div>

        <div class="row">
            <a href="index.php?setting=addArticle" class="btn btn-primary" style="float: left;">Přidat příspěvek</a>
            <!--            <button type="submit" class="btn btn-info" style="float: left; margin-left: 10px;">Párek v rohlíku</button>
                        <button type="submit" class="btn btn-warning" style="float: left; margin-left: 10px;">Langoš se sýrem</button>
                        <button type="submit" class="btn btn-success" style="float: left; margin-left: 10px;">Cukrová vata</button>-->
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
                    <th>Autor</th>
                    <th>Datum vložení</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                <?php

                 $settingModel = new SettingModel();
                 $articles = $settingModel->getArticles($_SESSION['login']['id']);

                 foreach ($articles as $article) {
                     echo '<tr><td style="text-align: left;">' . $article['article_name'] . '</td><td style="text-align: left;">' . $_SESSION['login']['name'] . ", " . $article['authors'] . '</td><td style="text-align: left;">' . date_format($article['create_date'], "d/m/Y") . '</td>';
                     echo '<td style="text-align: right;">'
                     . '<a href="index.php?setting=detailArticle&id=' . $article['id_article'] . '" class="btn btn-success btn-xs"><i class="fa fa-eye"></i>&nbsp;DETAIL</a>&nbsp;&nbsp;'
                     . '<a href="index.php?setting=editArticle&id=' . $article['id_article'] . '" class="btn btn-warning btn-xs"><i class="fa fa-pencil"></i>&nbsp;EDITACE</a>&nbsp;&nbsp;'
                     . '<a href="index.php?setting=deleteArticle&id=' . $article['id_article'] . '" class="btn btn-danger btn-xs"><i class="fa fa-trash-o"></i>&nbsp;ODSTRANIT</a></td>';
                 }

                ?>
            </tbody>
        </table>

    </header>
</div>

<!--<script type="text/javascript">

    $(document).ready(function () {

        $body = $("body");
        jQuery.fn.extend({
            myFunction: function () {
                alert("parek");
            }
        });
//        $('#parek').myfunction(){
//            $("#idRemoveArtcile").val($(this).parents('tr').find('input[type="hidden"]').val());
//            alert($(this).parents('tr').find('input[type="hidden"]').val());
//            $("#removeModal").modal('show');
//        }

//        $("#removeArticleId").click(function () {
//            $("#idRemoveArtcile").val($(this).parents('tr').find('input[type="hidden"]').val());
//            alert($(this).parents('tr').find('input[type="hidden"]').val());
//            $("#removeModal").modal('show');
//        });

        $("#removeAtricle").on("click", function () {
            $body.addClass("loading");
            var idArticle = $("#idRemoveArtcile").val();
            var params = "&idArticle=" + JSON.stringify(idArticle);
            var http = new XMLHttpRequest();
            http.onreadystatechange = callbackRemove;
            http.open("POST", "scripts/deleteArticle.php", true);
            http.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
            http.send(params);
        });
        var callbackRemove = function () {
            if (this.readyState == 4 && this.status == 200) {
                var data = JSON.parse(this.responseText);
                if (data.success === "true") {
                    $body.removeClass("loading");
                    $('#removeModal').modal('hide');
                    alertify.success('Příspěvek byl odstraněn.');
                    location.reload();
                } else {
                    $body.removeClass("loading");
                    alertify.success('Příspěvek se nepodařilo odstranit.');
                }
            }
        };
    });

</script>-->
