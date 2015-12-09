<div class="container">
    <header class="jumbotron">
        <h2>Fotogalerie ze společných akcích</h2>
    </header>
    <hr>
    <div class="row">
        <div class="col-lg-12 text-center">
            <section>
                <?php

                 $pocetSouboru = 0;
                 $nazvySouboru = array();
                 $dir = 'gallery/';
                 if ($handle = opendir($dir)) {
                     while (($file = readdir($handle)) !== false) {
                         if (!in_array($file, array('.', '..')) && !is_dir($dir . $file)) {
                             $pocetSouboru++;
                             array_push($nazvySouboru, $file);
                         }
                     }
                 }
                 $from = 0;
                 $to = 0;

                 if (isset($vars['stranka'])) {
                     $stranka = $vars['stranka'];
                     if ($stranka < 1 || $stranka > ceil($pocetSouboru / 12)) {
                         echo ' <p class="lead">';
                         echo 'Požadovaná stránka nenalezena, byli jste přesměrovány na začátek.</p>';
                         $from = 0;
                         $stranka = 1;
                     } else {
                         $stranka--;
                         //kdyz je dost obrazku
                         if (($stranka * 12) <= $pocetSouboru) {
                             $from = $stranka * 12;
                         }
                         $stranka++;
                     }
                 } else {
                     $stranka = 1;
                     $from = 0;
                 }

//                 if ($from == 0) {
//                     $from = 1;
//                 } else if ($from != 1) {
//                     $from++;
//                 }
//
                 if (($from + 12 ) <= $pocetSouboru) {
                     $to = $from + 12;
                 } else {
                     $to = $pocetSouboru;
                 }

                 echo '<div class="container-fluid"><div class="row">';

                 for ($i = $from; $i < $to; $i++) {
                     echo '<div class="col-lg-3 col-md-4 col-xs-6 thumb">
                            <a class="thumbnailFoto" href="gallery/' . $nazvySouboru[$i] . '" data-lightbox="main" data-title=""><img class="img-responsive" src="gallery/' . $nazvySouboru[$i] . '" data-lightbox="main" data-title="main" alt="error image!"></a>
                        </div>';
                 }
                 echo '</div></div>';

                 echo '<div class="col-lg-12 text-center">';
                 echo '<nav><ul class="pagination">';


                 for ($k = 1; $k <= ceil($pocetSouboru / 12); $k++) {

                     if ($stranka == $k) {
                         echo '<li class = "active"><a href = "index.php?galerie=show&stranka=' . $k . '">' . $k . '<span class = "sr-only">(current)</span></a></li>';
                     } else {
                         echo '<li><a href = "index.php?galerie=show&stranka=' . $k . '">' . $k . '<span class = "sr-only"></span></a></li>';
                     }
                 }


                 echo '</ul></nav></div>';

                ?>


            </section>
        </div>
    </div>
</div>