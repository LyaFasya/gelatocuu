<?php 
    // session_start();
    if (empty($_SESSION['username_gelatocuu'])){
        header('location:login');
    }

    include "proses/koneksi.php";
    $query = mysqli_query($conn,"SELECT * FROM user WHERE username = '$_SESSION[username_gelatocuu]' ");
        $hasil = mysqli_fetch_array($query);

?>

<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>GelatoCuu - Website Pemesanan Eskrim dan Gelato</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    </head>

    <!-- <body style="height: 3000px"> -->
    <body>
        <!-- header -->
        <?php include "header.php"?>
    <!-- end header -->
    <div class= "container-lg">
        <div class="row">
            <!-- sidebar -->
            <?php include "sidebar.php";?>
        <!-- end side bar -->

        <!-- content -->
            <?php 
            include $page;
            ?>
        <!-- end content -->
    </div>
    <div class="fixed-bottom text-center bg-light py-2">
    Copyright © 2023 All Rights Reserved. Developed by Rizkya Dwi Aulya Fasya
    </div>
</div>
            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
            <script>
        (() => {
        'use strict'

        const forms = document.querySelectorAll('.needs-validation')

        // Loop over them and prevent submission
        Array.from(forms).forEach(form => {
            form.addEventListener('submit', event => {
            if (!form.checkValidity()) {
                event.preventDefault()
                event.stopPropagation()
            }

            form.classList.add('was-validated')
            }, false)
        })
    })()
</script>
        </body>
</html>