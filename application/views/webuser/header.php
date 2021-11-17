<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <!-- my css -->
    <link rel="stylesheet" href="<?= base_url("assets/css/"); ?>style.css">
    <!-- my font -->
    <link href="https://fonts.googleapis.com/css2?family=Viga&display=swap" rel="stylesheet">

    <title><?= $title; ?></title>
</head>

<body>
    <!-- navbar -->
    <nav class="navbar navbar-expand-lg navbar-light">
        <div class="container">
            <a class="navbar-brand" href="<?= base_url('home/index') ?>"><img src="<?= base_url("assets/img/icon_new.png") ?>" style="width: 80px;"> TIE Forum Web App</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                <div class="navbar-nav ml-auto">
                    <a class="nav-link" href="<?= base_url("home/index"); ?>">Beranda <span class="sr-only">(current)</span></a>
                    <a class="nav-link" href="<?= base_url("article/index"); ?>">Artikel</a>
                    <a class="nav-link" href="<?= base_url("u_discuss/index"); ?>">Diskusi</a>
                </div>
            </div>
        </div>
    </nav>
    <!-- akhir navbar -->