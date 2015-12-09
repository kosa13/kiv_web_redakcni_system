<?php

 /**
  * Stránka zobrazující detailní informace o příspěvku vybraného podle ID.
  *
  * @author Kosek David
  */

?>
<?php

 $settingModel = new SettingModel();
 $user = $settingModel->getUserInfo($vars["id"]);
 $roles = $settingModel->getRoles();

 if ($user) {

     ?>

     <div class="container">
         <div class="jumbotron">
             <header>
                 <h2>Přiřazení role - <?php echo $user['name']; ?></h2>
                 <br />
             </header>
             <table class="table table-striped">
                 <tr>
                     <td>ID</td>
                     <td><?php echo $user['id_user']; ?></td>
                 </tr>
                 <tr>
                     <td>Jméno</td>
                     <td><?php echo $user['name']; ?></td>
                 </tr>
                 <tr>
                     <td>Email</td>
                     <td><?php echo $user['email']; ?></td>
                 </tr>
                 <tr>
                     <td>Organizace</td>
                     <td><?php echo $user['organisation']; ?></td>
                 </tr>
             </table>
             <hr>
             <form class="form-horizontal" role="form" action="index.php?setting=editRole&id=<?php echo $vars["id"]; ?>" method="POST">

                 <select class="form-control" name="idRole" required>
                     <option value="" disabled selected>Vyberte roli</option>';
                     <?php

                     foreach ($roles as $item) {
                         echo('<option value=' . $item['id_role'] . '>');
                         echo($item['description']);
                         echo('</option>');
                     }

                     ?>
                 </select>
                 <br />

                 <div class="col-sm-10">
                     <button type="submit" class="btn btn-success" value="submit" id="submit">Uložit</button>
                     <a class="btn btn-info" href="index.php?setting=userAdministration">Zpět</a>
                 </div>
             </form>
         </div>

     </div>
     <?php

 } else {

     ?>
     <div class="container">
         <div class="jumbotron">
             <div class="row">
                 <h2>Uživatel s ID - <?php echo($vars["id"]); ?> nenalezen!</h2>
             </div>
             <a class="btn btn-info" href="index.php?setting=show">Zpět</a>
         </div>
     </div>
     <?php

 }

?>







