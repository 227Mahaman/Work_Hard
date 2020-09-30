<?php
$title = "Accueil";
ob_start();
?>
<h1>User</h1>
    <div class="row">
    <div class="col-md-12">
    <form method="POST">

        <div class="form-group">
            <label for="">Nom</label>
            <input type="text" name="first_name" class="form-control" />
        </div>

        <div class="form-group">
            <label for="">Prénom</label>
            <input type="text" name="last_name" class="form-control" />
        </div>

        <div class="form-group">
            <label for="">Phone</label>
            <input type="text" name="phone" class="form-control" />
        </div>

        <div class="form-group">
            <label for="">Email</label>
            <input type="text" name="email" class="form-control" />
        </div>

        <div class="form-group">
            <label for="">Adresse</label>
            <input type="text" name="address" class="form-control" />
        </div>

        <div class="form-group">
            <label for="">Ville</label>
            <input type="text" name="city" class="form-control" />
        </div>

        <div class="form-group">
            <label for="">Pays</label>
            <input type="text" name="state" class="form-control" />
        </div>

        <button type="submit" class="btn btn-primary">Enregistrer</button>
    </form>
    </div>
    </div>
<?php
$content = ob_get_clean();
require('default.php');
?>