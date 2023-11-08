<?php 
include "koneksi.php";
$id =$_POST['id'];
$nama_user =$_POST['nama_user'];
$gender =$_POST['gender'];
$role = $_POST['role'];
$username = $_POST['username'];
// $password = md5 ($_POST['password']);


if (!empty($_POST['input_user_validate'])){
    $select = mysqli_query($conn,"SELECT * FROM user WHERE username = '$username'");
    if (mysqli_num_rows($select) > 0){
        $message = '<script>alert("username yang dimasukkan telah ada");
        window.location="../user"</script>
        </script>';
    }else{
    $query = mysqli_query($conn, " UPDATE user SET nama_user='$nama_user', gender='$gender', role='$role',username='$username' WHERE id= '$id' ");
    if($query){
        $message = '<script>alert("data berhasil di update");
        window.location="../user"</script>
        </script>';
        
    }
    else{
        $message = '<script>alert("data gagal diupdate")</script>';
    }
}
}echo $message;
?>