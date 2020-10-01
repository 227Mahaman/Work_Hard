<?php
$title = "Listing";
ob_start();
?>
    <h1>Listing User</h1>
    <?php if(isset($delete) and isset($type)): ?>
        <div class="alert alert-<?=$delete?>">
            <?= $delete; ?>
        </div>
    <?php endif; ?>
    <div class="row">
        <table class="table table-bordered">
            <tbody><tr>
                <th>#</th>
                <th>Nom</th>
                <th>Prénom</th>
                <th>Tel</th>
                <th>Email</th>
                <th>Address</th>
                <th>City</th>
                <th>State</th>
                <th>Action</th>
            </tr>
            <?php 
            if (is_array($resultat) || is_object($resultat)) {
                foreach ($resultat as $value) {  
                ?>
                <tr>
                    <td><?= $value['id'] ?></td>
                    <td><?= $value['first_name'] ?></td>
                    <td><?= $value['last_name'] ?></td>
                    <td><?= $value['phone'] ?></td>
                    <td><?= $value['email'] ?></td>
                    <td><?= $value['address'] ?></td>
                    <td><?= $value['city'] ?></td>
                    <td><?= $value['state'] ?></td>
                    <td>
                    <a href="/update/user/<?= $value['id'] ?>" class="btn btn-primary">
                        <i class="fa fa-edit"></i>
                    </a>
                    <a href="/users/delete/<?= $value['id'] ?>" class="btn btn-danger">
                        <i class="fa fa-delete"></i>
                    </a>
                    </td>
                </tr>
                <?php 
                }
            }?>
            </tbody>
        </table>
    </div>
    <?php
$content = ob_get_clean();
require('default.php');
?>