<?php 
include "koneksi.php";
$nama_user = (isset($_POST['nama_user'])) ? htmlentities($_POST['nama_user']):"";
$gender = (isset($_POST['gender'])) ? htmlentities($_POST['gender']):"";
$role = (isset($_POST['role'])) ? htmlentities($_POST['role']):"";
$username = (isset($_POST['username'])) ? htmlentities($_POST['username']):"";
$password = md5 ($_POST['password']);


if (!empty($_POST['input_user_validate'])){
    $select = mysqli_query($conn,"SELECT * FROM user WHERE username = '$username'");
    if (mysqli_num_rows($select) > 0){
        $message = '<script>alert("username yang dimasukkan telah ada");
        window.location="../user"</script>';
    }else{
    $query = mysqli_query($conn, "INSERT INTO user (nama_user,gender,role,username,password) values ('$nama_user','$gender','$role','$username','$password')");
    if(!$query){
        $message = '<script>alert("data gagal dimasukkan")</script>';
    }
    else{
        $message = '<script>alert("data berhasil dimasukkan");
        window.location="../user"</script>';
    }
}
}echo $message;
?>