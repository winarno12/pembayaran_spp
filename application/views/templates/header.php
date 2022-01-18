<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="<?= base_url('assets/css/bootstrap.min.css'); ?>">
    <!-- data tables -->
    <script type="text/javascript" src="<?= base_url('assets/DataTables/media/js/jquery.js'); ?>"></script>
    <script type="text/javascript" src="<?= base_url('assets/DataTables/media/js/jquery.dataTables.js'); ?>"></script>
    <link rel="stylesheet" type="text/css" href="<?= base_url('assets/DataTables/media/css/jquery.dataTables.css'); ?>">
    <link rel="stylesheet" type="text/css" href="<?= base_url('assets/DataTables/media/css/dataTables.bootstrap.css'); ?>">
    <script type="text/javascript">
        $(document).ready(function() {
            $('.mytable').DataTable();
        });
    </script>
</head>

<body>