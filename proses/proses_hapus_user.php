<?php 
include "koneksi.php";
$id =$_POST['id'];

if (!empty($_POST['input_user_validate'])){
    $query = mysqli_query($conn, " DELETE FROM user WHERE id = '$id'");
    if($query){
        $message = '<script>alert("data berhasil dihapus");
        window.location="../user"</script>';
        
    }
    else{
        $message = '<script>alert("data gagal dihapus")</script>';
    }
}echo $message;
?>