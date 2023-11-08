<?php 
include "koneksi.php";
$id =$_POST['id'];
$foto_menu =$_POST['foto_menu'];

if (!empty($_POST['input_menu_validate'])){
    $query = mysqli_query($conn, " DELETE FROM menu WHERE id = '$id'");
    if($query){
        unlink("../assets/img/$foto_menu");
        $message = '<script>alert("data berhasil dihapus");
        window.location="../menu"</script>';
        
    }
    else{
        $message = '<script>alert("data gagal dihapus");
        window.location="../menu"</script>';
    }
}echo $message;
?>