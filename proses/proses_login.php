<?php 
session_start();
    include "koneksi.php";
    $username = (isset($_POST['username'])) ? htmlentities($_POST['username']):'';
    $password = (isset($_POST['password'])) ? md5 (htmlentities($_POST['password'])) :'';
    if(!empty($_POST['submit_validate'])){
        $query = mysqli_query($conn,"SELECT * FROM user WHERE username = '$username' && password = '$password' ");
        $hasil = mysqli_fetch_array($query);
        if($hasil){
            $_SESSION['username_gelatocuu'] = $username;
            $_SESSION['role_gelatocuu'] = $hasil['role'];
            $_SESSION['id_gelatocuu'] = $hasil['id'];
            header('location:../home');
    } else { ?>
        <script> 
            alert("Username atau password yang anda masukkan salah");    
            window.location='../login'
    </script>
    
    <?php
    }
}
?>