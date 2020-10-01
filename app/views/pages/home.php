<?php
$title = "Accueil";
ob_start();
?>
<h1>User</h1>
    <div class="row">
    <?php if(isset($Oui)){?>
        <div class="alert alert-success">    
            <p>Success user add !</p>
        </div>
    <?php } elseif(isset($Non)) { ?>
        <div class="alert alert-danger">    
            <p>Echec user add !</p>
        </div>
    <?php }?>
    <div class="col-md-12">
    <form method="POST">

        <div class="form-group">
            <label for="">Nom</label>
            <input type="text" value="<?= (!empty($first_name)) ? $first_name : "" ?>" name="first_name" class="form-control" />
        </div>

        <div class="form-group">
            <label for="">Prénom</label>
            <input type="text" value="<?= (!empty($last_name)) ? $last_name : "" ?>" name="last_name" class="form-control" />
        </div>

        <div class="form-group">
            <label for="">Phone</label>
            <input type="text" value="<?= (!empty($phone)) ? $phone : "" ?>" name="phone" class="form-control" />
        </div>

        <div class="form-group">
            <label for="">Email</label>
            <input type="text" value="<?= (!empty($email)) ? $email : "" ?>" name="email" class="form-control" />
        </div>

        <div class="form-group">
            <label for="">Adresse</label>
            <input type="text" value="<?= (!empty($address)) ? $address : "" ?>" name="address" class="form-control" />
        </div>

        <div class="form-group">
            <label for="">Ville</label>
            <input type="text" value="<?= (!empty($city)) ? $city : "" ?>" name="city" class="form-control" />
        </div>

        <div class="form-group">
            <label for="">Pays</label>
            <input type="text" value="<?= (!empty($state)) ? $state : "" ?>" name="state" class="form-control" />
        </div>

        <button type="submit" class="btn btn-primary">Enregistrer</button>
    </form>
    </div>
    </div>
<?php
$content = ob_get_clean();
require('default.php');
?>