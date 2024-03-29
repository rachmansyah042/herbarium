<!DOCTYPE html>
<html>

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    
    <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <!-- custom css -->
    <link rel="stylesheet" href="<?= base_url('assets/css/style.css'); ?>">

    <!-- custom datepicker -->
    <script src="https://unpkg.com/gijgo@1.9.13/js/gijgo.min.js" type="text/javascript"></script>
    <link href="https://unpkg.com/gijgo@1.9.13/css/gijgo.min.css" rel="stylesheet" type="text/css" />

</head>

<body>

<nav class="navbar navbar-expand-lg navbar-light bg-light navbar-padding">
  <a class="navbar-brand" href="<?= base_url('Herbarium') ?>">Herbarium</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNavDropdown">
    <ul class="navbar-nav ml-auto">
      <li class="nav-item dropdown">
      <?php if ($id_role==1) : ?>
            
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Super Admin
        </a>

        <?php else : ?>

        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Admin
        </a>

        <?php endif; ?>

        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
          <a class="dropdown-item" <?= $id_role == '2' ? 'hidden' : '' ?> href="<?= base_url('Famili') ?>">Famili</a>
          <a class="dropdown-item" <?= $id_role == '2' ? 'hidden' : '' ?> href="<?= base_url('Herbarium') ?>">Herbarium</a>
          <a class="dropdown-item" <?= $id_role == '2' ? 'hidden' : '' ?> href="<?= base_url('User') ?>">User</a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="<?= base_url('Admin/logout') ?>">Keluar</a>
        </div>
      </li>
    </ul>
  </div>
</nav>


