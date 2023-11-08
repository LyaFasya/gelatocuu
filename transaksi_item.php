<?php 
include "proses/koneksi.php";

$query= mysqli_query($conn, "SELECT *, SUM(harga*jumlah) AS harganya FROM list_transaksi
LEFT JOIN transaksi ON transaksi.id = list_transaksi.transaksi
LEFT JOIN menu ON menu.id = list_transaksi.menu
GROUP BY list_transaksi.id
HAVING list_transaksi.transaksi = $_GET[transaksi]");

    $kode = $_GET['transaksi'];
    $meja = $_GET['meja'];
    $pelanggan = $_GET['nama_pelanggan'];

while ($record = mysqli_fetch_array($query)){
    $result[] = $record;
    // $kode = $record['id'];
    // $meja = $record['meja'];
    // $pelanggan = $record['nama_pelanggan'];
}
?>

<div class = "col-lg-9 mt-2">
                <div class="card">
                    <div class="card-header">
       <b class="h5">Halaman Transaksi Item</b> 
    </div>
    <div class="card-body">
    <div class="row">
                <div class="col-lg-3">
            <div class="form-floating mb-3">
            <input disabled type="text" class="form-control" id="kodeTransaksi" value= "<?php echo $kode; ?>">
            <label for="uploadFoto">Kode Transaksi</label>
            </div>
            </div>
            <div class="col-lg-3">
            <div class="form-floating mb-3">
            <input disabled type="text" class="form-control" id="meja" value= "<?php echo $meja; ?>">
            <label for="uploadFoto">Meja</label>
            </div>
            </div>
            <div class="col-lg-3">
            <div class="form-floating mb-3">
            <input disabled type="text" class="form-control" id="pelanggan" value= "<?php echo $pelanggan; ?>">
            <label for="uploadFoto">Pelanggan</label>
            </div>
            </div>
        </div>

        <!-- Modal Tambah Item Baru -->
        <div class="modal fade" id="tambahItem" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-xl modal-fullscreen-md-down">
            <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Tambah Menu</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
            <form class= "needs-validation" novalidate action="proses/proses_tambah_menu.php" method= "POST" enctype="multipart/form-data">
            <div class="row">
                <div class="col-lg-6">
            <div class="input-group mb-3">
            <input type="file" class="form-control py-3" id="uploadFoto" name= "foto_menu" required>
            <label class="input-group-text" for="uploadFoto">Upload Foto Menu</label>
            <div class="invalid-feedback">
        Masukkan File Foto dengan benar!
      </div>
            </div>
            </div>
            <div class="col-lg-6">
                <div class="form-floating mb-3">
            <input type="text" class="form-control" id="floatingInput" placeholder="Your Name" name= "nama_menu" required>
            <label for="floatingInput">Nama Menu</label>
            <div class="invalid-feedback">
        Masukkan Nama Menu dengan benar!
      </div>
            </div>
            </div>
            </div>
            <div class="row">
                <div class="col-lg-4">
            <div class="form-floating mb-3">
            <select class="form-select" aria-label="Default select example" name= "kategori" required>
                <option selected value= "">Pilih Kategori</option>
                <option value="1">Gelato</option>
                <option value="2">Ice Cream</option>
            </select>
            <label for="floatingInput">Kategori</label>
            <div class="invalid-feedback">
        Masukkan Kategori dengan benar!
      </div>
            </div>
            </div>
            <div class="col-lg-4">
            <div class="form-floating mb-3">
            <input type="number" class="form-control" id="floatingInput" placeholder="xx000" name= "harga" required>
            <label for="floatingInput">Harga</label>
            <div class="invalid-feedback">
        Masukkan Harga dengan benar!
      </div>
            </div>
            </div>
            <div class="col-lg-4">
            <div class="form-floating mb-3">
            <input type="number" class="form-control" id="floatingInput" placeholder="xx000" name= "stok" required>
            <label for="floatingInput">Stok</label>
            <div class="invalid-feedback">
        Masukkan Stok dengan benar!
      </div>
            </div>
            </div>
            </div>
            <div class="form-floating mb-3">
            <input type="text" class="form-control" id="floatingInput" placeholder="Your Name" name= "keterangan" required>
            <label for="floatingInput">Keterangan Menu</label>
            <div class="invalid-feedback">
        Masukkan Keterangan Menu dengan benar!
      </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary" name= "input_menu_validate" value="123">Save changes</button>
            </div>
            </form>
            </div>
            
            </div>
        </div>
        </div>
        <!-- Akhir Modal Tambah Item Baru -->
        <?php
        if(empty($result)){
            echo "Data Menu tidak ditemukan";
        }else{
        foreach ($result as $row) {
        ?>
        <!-- Modal View Menu-->
        <div class="modal fade" id="ModalView<?php echo $row['id'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-xl modal-fullscreen-md-down">
            <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">View Menu</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
            <form class= "needs-validation" novalidate action="proses/proses_tambah_menu.php" method= "POST" enctype="multipart/form-data">
            <div class="row">
            <div class="col-lg-6">
                <div class="form-floating mb-3">
            <input disabled type="text" class="form-control" id="floatingInput" value = "<?php echo $row['nama_menu'] ?>">
            <label for="floatingInput">Nama Menu</label>
            <div class="invalid-feedback">
        Masukkan Nama Menu dengan benar!
      </div>
            </div>
            </div>
            <div class="col-lg-6">
            <div class="form-floating mb-3">
            <input disabled type="text" class="form-control" id="floatingInput" placeholder="Your Name" name= "keterangan" value = "<?php echo $row['keterangan'] ?>">
            <label for="floatingInput">Keterangan Menu</label>
            <div class="invalid-feedback">
        Masukkan Keterangan Menu dengan benar!
      </div>
            </div>
            </div>
            </div>
            <div class="row">
                <div class="col-lg-4">
                <div class="form-floating mb-3">
            <input disabled type="text" class="form-control" id="floatingInput" value= 
            "<?php 
            echo $row['kategori']
            ?>">
            <label for="floatingInput">Kategori</label>
            </div>
            </div>
            <div class="col-lg-4">
            <div class="form-floating mb-3">
            <input disabled type="number" class="form-control" id="floatingInput" value = "<?php echo $row['harga'] ?>">
            <label for="floatingInput">Harga</label>
            <div class="invalid-feedback">
        Masukkan Harga dengan benar!
      </div>
            </div>
            </div>
            <div class="col-lg-4">
            <div class="form-floating mb-3">
            <input disabled type="number" class="form-control" id="floatingInput" value = "<?php echo $row['stok'] ?>">
            <label for="floatingInput">Stok</label>
            <div class="invalid-feedback">
        Masukkan Stok dengan benar!
      </div>
            </div>
            </div>
            </div>
            
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            </div>
            </form>
            </div>
            
            </div>
        </div>
        </div>
        <!-- Akhir Modal View Menu-->

        <!-- Modal Edit -->
        <div class="modal fade" id="ModalEdit<?php echo $row['id'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-xl modal-fullscreen-md-down">
            <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Edit Menu</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
            <form class= "needs-validation" novalidate action="proses/proses_ubah_menu.php" method= "POST" enctype="multipart/form-data">
                <input type= "hidden" value ="<?php echo $row['id'] ?>" name="id">
            <div class="row">
                <div class="col-lg-6">
            <div class="input-group mb-3">
            <input type="file" class="form-control py-3" id="uploadFoto" placeholder="Your Name" name= "foto_menu" required >
            <label class="input-group-text" for="uploadFoto">Upload Foto Menu</label>
            <div class="invalid-feedback">
        Masukkan File Foto dengan benar!
      </div>
            </div>
            </div>
            <div class="col-lg-6">
                <div class="form-floating mb-3">
            <input type="text" class="form-control" id="floatingInput" placeholder="Your Name" name= "nama_menu" required value = "<?php echo $row['nama_menu'] ?>">
            <label for="floatingInput">Nama Menu</label>
            <div class="invalid-feedback">
        Masukkan Nama Menu dengan benar!
      </div>
            </div>
            </div>
            </div>
            <div class="row">
                <div class="col-lg-4">
            <div class="form-floating mb-3">
            <select class="form-select" aria-label="Default select example" name= "kategori" required value = "<?php echo $row['kategori'] ?>">
                <!-- <option selected hidden value= "">Pilih Kategori</option> -->
                <option value="1">Gelato</option>
                <option value="2">Ice Cream</option>
            </select>
            <label for="floatingInput">Kategori</label>
            <div class="invalid-feedback">
        Masukkan Kategori dengan benar!
      </div>
            </div>
            </div>
            <div class="col-lg-4">
            <div class="form-floating mb-3">
            <input type="number" class="form-control" id="floatingInput" placeholder="xx000" name= "harga" required value = "<?php echo $row['harga'] ?>">
            <label for="floatingInput">Harga</label>
            <div class="invalid-feedback">
        Masukkan Harga dengan benar!
      </div>
            </div>
            </div>
            <div class="col-lg-4">
            <div class="form-floating mb-3">
            <input type="number" class="form-control" id="floatingInput" placeholder="xx000" name= "stok" required value = "<?php echo $row['stok'] ?>">
            <label for="floatingInput">Stok</label>
            <div class="invalid-feedback">
        Masukkan Stok dengan benar!
      </div>
            </div>
            </div>
            </div>
            <div class="form-floating mb-3">
            <input type="text" class="form-control" id="floatingInput" placeholder="Your Name" name= "keterangan" required value = "<?php echo $row['keterangan'] ?>">
            <label for="floatingInput">Keterangan Menu</label>
            <div class="invalid-feedback">
        Masukkan Keterangan Menu dengan benar!
      </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary" name= "input_menu_validate" value="123">Save changes</button>
            </div>
            </form>
            </div>
            
            </div>
        </div>
        </div>
        <!-- Akhir Modal Edit -->

        <!-- Modal Hapus -->
        <div class="modal fade" id="ModalDelete<?php echo $row['id']?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-md modal-fullscreen-md-down">
            <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Hapus Data Menu</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
            <form class= "needs-validation" novalidate action="proses/proses_hapus_menu.php" method= "POST">
                <input type= "hidden" value= "<?php echo $row['id']?>" name= "id">
                <input type= "hidden" value= "<?php echo $row['foto_menu']?>" name= "foto_menu">
                <div class= "col-lg-12">
                       Apakah anda ingin menghapus menu <b><?php echo $row['nama_menu']?></b> ?
                </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-danger" name= "input_menu_validate" value="123" >Hapus</button>
            </div>
            </form>
            </div>
            </div>
        </div>
        </div>
        <!-- Akhir Modal Delete -->
        
        <?php 
        }
        
        ?>

        <div class= "table-responsive">
            <table class="table table-hover">
        <thead>
            <tr class="text-nowra">
            <th scope="col">Menu</th>
            <th scope="col">Harga</th>
            <th scope="col">Qty</th>
            <th scope="col">Total</th>
            <th scope="col">Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php 
            $total = 0;
            foreach ($result as $row) {
            ?>
            <tr>
            <td><?php echo $row['nama_menu'] ?></td>
            <td><?php echo number_format($row['harga'], 0, ',','.'); ?></td>
            <td><?php echo $row['jumlah'] ?></td>
            <td><?php echo number_format($row['harganya'], 0, ',','.'); ?></td>
            <td>
                <div class="d-flex">
                <button class= "btn btn-info btn-sm me-1" data-bs-toggle="modal" data-bs-target="#ModalView<?php echo $row['id'] ?>" ><i class="bi bi-eye"></i></button>
                <button class= "btn btn-warning btn-sm me-1" data-bs-toggle="modal" data-bs-target="#ModalEdit<?php echo $row['id'] ?>"><i class="bi bi-pencil-square"></i></button>
                <button class= "btn btn-danger btn-sm me-1" data-bs-toggle="modal" data-bs-target="#ModalDelete<?php echo $row['id'] ?>"><i class="bi bi-trash"></i></button>
                </div>
            </td>
            </tr>
            <?php 
            $total += $row['harganya'];
            }
            ?>
            <tr>
               <td colspan="3" class="fw-bold">
                    Total Harga
               </td> 
               <td class="fw-bold">
                    <?php echo number_format($total, 0, ',','.'); ?>
               </td>
            </tr>
        </tbody>
        </table>
        
        </div>
        <?php 
        }
        ?>
        <div>
            <button class= "btn btn-success" data-bs-toggle="modal" data-bs-target="#tambahItem" ><i class="bi bi-patch-plus-fill"></i> Item</button>
            <button class= "btn btn-primary" data-bs-toggle="modal" data-bs-target="#bayar" ><i class="bi bi-cash-coin"></i> Bayar</button>
        </div>
            </div>
    </div>
        </div>