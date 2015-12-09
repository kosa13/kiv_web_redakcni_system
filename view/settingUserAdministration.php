<div class="container">
    <header class="jumbotron">
        <div class="row">
            <h2>Přehled uživatelů</h2>
        </div>

        <br /> <br />
        <?php

         if (isset($vars['err']) && !empty($vars['err'])) {
             echo('<p class="btn btn-large btn-danger">' . $vars['err'] . '</p>');
         } else if (isset($vars['msg']) && !empty($vars['msg'])) {
             echo('<p class="btn btn-large btn-success">' . $vars['msg'] . '</p>');
         }

        ?>
        <h3>Uživatelé čekající na přiřazení role</h3>
        <table class="table table-striped">
            <thead>
                <tr style="text-align: center;">
                    <th>ID</th>
                    <th>Jméno</th>
                    <th>Email</th>
                    <th>Organizace</th>
                    <th>Role</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                <?php

                 $settingModel = new SettingModel();
                 $usersWithout = $settingModel->getUsersWithout();

                 if (count($usersWithout) != 0) {
                     foreach ($usersWithout as $temp) {
                         echo '<tr><td style="text-align: left;">' . $temp['id_user'] . '</td><td style="text-align: left;">' . $temp['name'] . '</td><td style="text-align: left;">' . $temp['email'] . '</td><td style="text-align: left;">' . $temp['organisation'] . '</td><td style="text-align: center;">-</td>';
                         echo '<td style="text-align: right;">'
                         . '<a href="index.php?setting=editRole&id=' . $temp['id_user'] . '" class="btn btn-success btn-xs"><i class="fa fa-plus"></i>&nbsp;&nbsp;Přiřadit roli</a></td>';
                     }
                 } else {
                     echo '<tr><td colspan="6">Žádný z uživatelů nečeká na přiřazení role.</td></tr>';
                 }

                ?>
            </tbody>
        </table>
        <br />
        <h3>Ostatní uživatelé</h3>
        <table class="table table-striped">
            <thead>
                <tr style="text-align: center;">
                    <th>ID</th>
                    <th>Jméno</th>
                    <th>Email</th>
                    <th>Organizace</th>
                    <th>Role</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                <?php

                 $temps = $settingModel->getUsers();

                 foreach ($temps as $temp) {
                     echo '<tr><td style="text-align: left;">' . $temp['id_user'] . '</td><td style="text-align: left;">' . $temp['name'] . '</td><td style="text-align: left;">' . $temp['email'] . '</td><td style="text-align: left;">' . $temp['organisation'] . '</td><td style="text-align: left;">' . $temp['description'] . '</td>';
                     echo '<td style="text-align: right;">'
                     . '<a href="index.php?setting=editRole&id=' . $temp['id_user'] . '" class="btn btn-success btn-xs"><i class="fa fa-pencil"></i>&nbsp;&nbsp;Změnit roli</a></td>';
                 }

                ?>
            </tbody>
        </table>

    </header>
</div>
