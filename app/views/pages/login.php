<?php
$title = "Se connecter";
ob_start();
?>
<h1>Se connecter</h1>
    <?php if(isset($Notconnected)): ?>
        <div class="alert alert-danger">
            <?= $Notconnected; ?>
        </div>
    <?php endif; ?>
<form method="POST">

    <div class="form-group">
        <label for="">Pseudo ou email</label>
        <input type="text" name="email" class="form-control" required/>
    </div>

    <div class="form-group">
        <label for="">Mot de passe<a href="#">(J'ai oublié mon mot de passe)</a></label>
        <input type="password" name="city" class="form-control" required/>
    </div>

    <button type="submit" class="btn btn-primary">Se connecter</button>
</form>
<?php
$content = ob_get_clean();
require('default.php');
?>