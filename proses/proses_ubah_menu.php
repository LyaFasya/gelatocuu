<?php 
include "koneksi.php";
$id =$_POST['id'];
$foto_menu = $_POST['foto_menu'];
$nama_menu = $_POST['nama_menu'];
$kategori = $_POST['kategori'];
$harga = $_POST['harga'];
$stok = $_POST['stok'];
$keterangan = $_POST['keterangan'];

$kode_rand = rand(10000, 999999)."-";
$target_dir = "../assets/img/".$kode_rand;
$target_file = $target_dir.basename($_FILES['foto_menu']['name']);
$imageType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));


if (!empty($_POST['input_menu_validate'])){
    // cek apakah gambar atau bukan

    $cek = getimagesize($_FILES['foto_menu']['tmp_name']);
    if ($cek === false) {
        $message = "ini bukan file gambar";
        $statusUpload = 0;
    } else {
        $statusUpload = 1;
        if (file_exists($target_file)) {
            $message = "maaf file yang dimasukkan sudah ada";
            $statusUpload = 0;
    } else {
        if ($_FILES['foto_nama']['size'] > 500000){
            $message = "file foto yang di upload terlalu besar";
            $statusUpload = 0;
        } else {
            if($imageType!= "jpg" && $imageType!= "png" && $imageType!= "jpeg" && $imageType!= "gif"){
                $message = "Maaf hanya diperbolehkan gambar yang memiliki format JPG, JPEG, PNG, dan GIF";
                $statusUpload = 0;
            }
        }
    }
}

if($statusUpload == 0){
    $message = '<script>alert("'.$message.',gambar tidak dapat diupload");
            window.location="../menu"</script>';
}else {
    $select = mysqli_query($conn,"SELECT * FROM menu WHERE nama_menu = '$nama_menu'");    
    if (mysqli_num_rows($select) > 0){
        $message = '<script>alert("nama menu yang dimasukkan telah ada");
        window.location="../menu"</script>';
}
else {
    if (move_uploaded_file($_FILES['foto_menu']['tmp_name'], $target_file)){
        $query = mysqli_query($conn, "UPDATE menu SET foto_menu='".$kode_rand.$_FILES['foto_menu']['name']."', nama_menu='$nama_menu', keterangan='$keterangan', kategori='$kategori', harga='$harga', stok='$stok'  WHERE id = '$id'");
    if($query){
        $message = '<script>alert("data berhasil dimasukkan");
        window.location="../menu"</script>';
    }
    else {
        $message = '<script>alert("data gagal dimasukkan");
        window.location="../menu"</script>';
    }
}
else {
    $message = '<script>alert("maaf terjadi kesalahan file tidak dapat diupload");
        window.location="../menu"</script>';
}
}
}}echo $message;
?>