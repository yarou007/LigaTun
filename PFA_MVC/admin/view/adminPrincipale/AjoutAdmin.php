<?php
session_start();
$title = "Ajout Admin";
ob_start();

?>

<table class="table table-striped" style=" margin-left: 0px;">
    <form action="../../index.php?action=ajoutAdmin" method="post">
        <tr>
            <td>Nom</td>
            <td>Email</td>
            <td>Departement</td>
            <td>login</td>
            <td>password</td>
           
        </tr>
        <tr>
            <td class="col-lg-2"> <input type="text" class="form-control" name="nomAd" placeholder="Nom admin"></td>
            <td  class="col-md-2"> <input type="email" class="form-control" name="emailAd" placeholder="Email admin"></td>
           
            <td class="col-md-2"> 
                
                <select name="fonctionAd" id="fonctionAd" class="form-control">
                      <option value="superAdmin"> Super Admin</option>
                      <option value="MKT&SALES">MKT & SALES</option>
                    <option value="CS">Customer Support</option>
                    <option value="CXP">Customer Experience</option>
                </select>
        </td>
        <td class="col-sm-2"> <input type="text" class="form-control" name="loginAd" placeholder="Login admin"></td>
        <td class="col-sm-2"><input type="password" class="form-control" name="pwdAdmin" placeholder="Password Admin"></td>

             <td><input type="submit" class="btn btn-success" value="submit" name="submit" style="margin-left:10px;"></td>

        </tr>


    </form>
</table>


<?php $content = ob_get_clean(); ?>
<?php require_once('accueilAdP.php'); ?>