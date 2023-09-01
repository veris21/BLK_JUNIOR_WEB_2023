<?php require 'koneksi.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $title ?></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="//cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/dataTables.bootstrap5.min.css">
</head>
<body>

    <nav class="navbar bg-body-tertiary">
      <div class="container">
        <a class="navbar-brand"><b class="d-sm-none d-md-block"><?= $title ?></b><b class="d-none d-sm-block d-md-none"><?= $titlesm ?></b></a>
        <div class="d-flex" >
          <!-- <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search"> -->
          <a class="btn btn-outline-success" href="./form.php">Tambah Data <i class="fa fa-plus"></i></a>
        </div>
      </div>
    </nav>
<div class="container">
<hr>