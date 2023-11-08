<?php 
session_start();
include "koneksi.php";
$kode_transaksi = $_POST['kode_transaksi'];
$meja = $_POST['meja'];
$nama_pelanggan = $_POST['nama_pelanggan'];
$catatan = $_POST['catatan'];

if (!empty($_POST['input_transaksi_validate'])){
    $select = mysqli_query($conn,"SELECT * FROM transaksi WHERE id = '$kode_transaksi'");
    if (mysqli_num_rows($select) > 0){
        $message = '<script>alert("transaksi yang dimasukkan telah ada");
        window.location="../transaksi"</script>';
    }else{
    $query = mysqli_query($conn, "INSERT INTO transaksi (id, meja, nama_pelanggan, catatan, id_pelayan) values ('$kode_transaksi','$meja','$nama_pelanggan','$catatan', '$_SESSION[id_gelatocuu]')");
    if($query){
        $message = '<script>alert("data berhasil dimasukkan");
        window.location="../?x=transaksiitem&transaksi='.$kode_transaksi.'&meja='.$meja.'&nama_pelanggan='.$nama_pelanggan.'"</script>';
        
    }
    else{
        $message = '<script>alert("data gagal dimasukkan")</script>';
    }
}
}echo $message;
?>