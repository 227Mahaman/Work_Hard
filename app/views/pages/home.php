<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../favicon.ico">

    <title>Mon super projet</title>

    <!-- Bootstrap core CSS -->
    <link href="public/css/app.css" rel="stylesheet">

    <![endif]-->
</head>

<body>

<nav class="navbar navbar-inverse">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="#">Mon super projet Slim v3.5</a>
        </div>
        <div id="navbar" class="collapse navbar-collapse">
            <ul class="nav navbar-nav">
                    <!--<li><a href="logout.php"></a>Se déconnecter</li>-->
                    <li><a href="lstUsers">Listing Users</a></li>
                    <li><a href="register.php">S'inscrire</a></li>
                    <li><a href="login.php">Se connecter</a></li>
            </ul>
        </div><!--/.nav-collapse -->
    </div>
</nav>

<div class="container">
<h1>User</h1>

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