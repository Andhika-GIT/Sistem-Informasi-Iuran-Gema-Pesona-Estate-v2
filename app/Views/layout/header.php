<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Sistem Informasi Iuran</title>
    <link rel="shortcut icon" type="image/png" href="<?= base_url('img/logo/logo.png'); ?>">

    <!-- include dari asset -->
    <!-- Custom styles for this template-->
    <link rel="stylesheet" type="text/css" href="<?= base_url('plugins/datepicker/css/bootstrap-datepicker.min.css'); ?> ">
    <link rel="stylesheet" href="<?= base_url('dataTables/datatables.min.css'); ?>">
    <link rel="stylesheet" href="<?= base_url('css/sb-admin-2.min.css'); ?>">

    <!-- Material Design Bootstrap -->
    <!-- <link href="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.19.1/css/mdb.min.css" rel="stylesheet"> -->
    <!-- Include Style -->
    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="<?= base_url('plugins/fontawesome-free/css/all.min.css'); ?>">
    <!-- Theme style -->
    <!-- <link rel="stylesheet" href="<= base_url('css/adminlte.min.css'); ?>"> -->

    <!-- Custom fonts for this template-->
    <link href="<?= base_url('vendor/fontawesome-free/css/all.min.css'); ?>" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">



    <!-- End Include Style -->
</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <?= $this->include('layout/sidebar'); ?>

        <!-- navbar-->
        <?= $this->include('layout/navbar'); ?>