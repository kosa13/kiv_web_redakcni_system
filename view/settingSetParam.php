<?php

 $settingModel = new SettingModel();
 $value = $settingModel->getCriteriumReview();

?>
<div class="container">
    <div class="jumbotron">
        <header>
            <h2>Nastavení</h2>
            <br />
        </header>
        <form class="form-horizontal" role="form" action="index.php?setting=setParam" method="POST">
            <div class="form-group">
                <div class="col-sm-offset-2 col-sm-10">
                    <label for="form-value" class="control-label">Mezní hodnota rozhodující o přijetí/odmítnutí článku</label>
                    <input type="text" class="form-control" id="form-value" autofocus required name="criterium" value='<?php echo $value['value']; ?>'>
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



