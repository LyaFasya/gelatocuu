<?php 
include "proses/koneksi.php";
$query= mysqli_query($conn, "SELECT * FROM user");
while ($record = mysqli_fetch_array($query)){
    $result[] = $record;
}
?>

<div class = "col-lg-9 mt-2">
                <div class="card">
                    <div class="card-header">
                    <b class="h5">Halaman User</b> 
    </div>
    <div class="card-body">
        <div class="row">
            <div class="col d-flex justify-content-end">
                <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#ModalTambahUser"> Tambah User</button>
            </div>
        </div>

        <!-- Modal Tambah User Baru -->
        <div class="modal fade" id="ModalTambahUser" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-xl modal-fullscreen-md-down">
            <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Tambah User</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
            <form class= "needs-validation" novalidate action="proses/proses_tambah_user.php" method= "POST">
                <div class="form-floating mb-3">
            <input type="text" class="form-control" id="floatingInput" placeholder="Your Name" name= "nama_user" required>
            <label for="floatingInput">Nama</label>
            <div class="invalid-feedback">
        Masukkan Nama dengan benar!
      </div>
            </div>
            <div class="row">
                <div class="col-lg-6">
            <div class="form-floating mb-3">
            <select class="form-select" aria-label="Default select example" name= "gender" required>
                <option selected value= "">Pilih Gender User</option>
                <option value="1">Male</option>
                <option value="2">Female</option>
            </select>
            <label for="floatingInput">Gender</label>
            <div class="invalid-feedback">
        Masukkan Gender dengan benar!
      </div>
            </div>
            </div>
            <div class="col-lg-6">
            <div class="form-floating mb-3">
            <select class="form-select" aria-label="Default select example" name= "role" required>
                <option selected hidden value= "0">Pilih Role User</option>
                <option value="1">Admin</option>
                <option value="2">Kasir</option>
                <option value="3">Pelayan</option>
                <option value="4">Dapur</option>
            </select>
            <label for="floatingInput">Role</label>
            <div class="invalid-feedback">
        Masukkan Role dengan benar!
      </div>
            </div>
            </div>
            </div>
            <div class="row">
            <div class="col-lg-6">
            <div class="form-floating mb-3">
            <input type="email" class="form-control" id="floatingInput" placeholder="name@example.com" name= "username" required>
            <label for="floatingInput">Username</label>
            <div class="invalid-feedback">
        Masukkan Username dengan benar!
      </div>
            </div>
            </div>
            <div class="col-lg-6">
            <div class="form-floating">
            <input type="password" class="form-control" id="floatingPassword" placeholder="Password" name= "password" required>
            <label for="floatingPassword">Password</label>
            <div class="invalid-feedback">
        Masukkan Password dengan benar!
      </div>
            </div>
            </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary" name= "input_user_validate" value="123">Save changes</button>
            </div>
            </form>
            </div>
            
            </div>
        </div>
        </div>
        <!-- Akhir Modal Tambah User Baru -->
        <?php
        foreach ($result as $row) {
        ?>
        <!-- Modal View -->
        <div class="modal fade" id="ModalView<?php echo $row['id'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-xl modal-fullscreen-md-down">
            <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Detail Data User</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
            <form class= "needs-validation" novalidate action="proses/proses_tambah_user.php" method= "POST">
            <div class="row">
            <div class="col-lg-6">
                <div class="form-floating mb-3">
            <input disabled type="text" class="form-control" id="floatingInput" placeholder="Your Name" name= "nama_user" value= "<?php echo $row['nama_user']?>">
            <label for="floatingInput">Nama</label>
            </div>
            </div>
            <div class="col-lg-6">
            <div class="form-floating mb-3">
            <input disabled type="email" class="form-control" id="floatingInput" name= "username" value= "<?php echo $row['username']?>">
            <label for="floatingInput">Username</label>
            </div>
            </div>
            </div>
            <div class="row">
                <div class="col-lg-6">
            <div class="form-floating mb-3">
            <input disabled type="text" class="form-control" id="floatingInput" name= "gender" value= 
            "<?php 
            echo $row['gender']
            ?>">
            <label for="floatingInput">Gender</label>
            
            </div>
            </div>
            <div class="col-lg-6">
            <div class="form-floating mb-3">
            <input disabled type="text" class="form-control" id="floatingInput" name= "role" value= "<?php echo $row['role']?>">
            <label for="floatingInput">Role</label>
            
            </div>
            </div>
            </div>
            </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            </div>
            </div>
        </div>
        </div>
        <!-- Akhir Modal View -->

        <!-- Modal Edit -->
        <div class="modal fade" id="ModalEdit<?php echo $row['id']?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-xl modal-fullscreen-md-down">
            <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Edit Data User</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
            <form class= "needs-validation" novalidate action="proses/proses_ubah_user.php" method= "POST">
                <input type= "hidden" value= "<?php echo $row['id']?>" name= "id">
                <div class="form-floating mb-3">
            <input type="text" class="form-control" id="floatingInput" placeholder="Your Name" name= "nama_user" required value= "<?php echo $row['nama_user']?>">
            <label for="floatingInput">Nama</label>
            <div class="invalid-feedback">
        Masukkan Nama dengan benar!
      </div>
            </div>
            <div class="row">
                <div class="col-lg-6">
            <div class="form-floating mb-3">
            <select class="form-select" aria-label="Default select example" name= "gender" required value= "<?php echo $row['gender']?>">
                <!-- <option selected hidden value= "0">Pilih Gender User</option> -->
                <option value="1">Male</option>
                <option value="2">Female</option>
            </select>
            <label for="floatingInput">Gender</label>
            <div class="invalid-feedback">
        Masukkan Gender dengan benar!
      </div>
            </div>
            </div>
            <div class="col-lg-6">
            <div class="form-floating mb-3">
            <select class="form-select" aria-label="Default select example" name= "role" required value= "<?php echo $row['role']?>">
                <!-- <option selected hidden value= "0">Pilih Role User</option> -->
                <option value="1">Admin</option>
                <option value="2">Kasir</option>
                <option value="3">Pelayan</option>
                <option value="4">Dapur</option>
            </select>
            <label for="floatingInput">Role</label>
            <div class="invalid-feedback">
        Masukkan Role dengan benar!
      </div>
            </div>
            </div>
            </div>
            <div class="row">
            <div class="col-lg-6">
            <div class="form-floating mb-3">
            <input <?php echo ($row['username'] == $_SESSION['username_gelatocuu']) ? 'disabled' : '' ; ?> type="email" class="form-control" id="floatingInput" placeholder="name@example.com" name= "username" required value= "<?php echo $row['username']?>">
            <label for="floatingInput">Username</label>
            <div class="invalid-feedback">
        Masukkan Username dengan benar!
      </div>
            </div>
            </div>
            <!-- <div class="col-lg-6">
            <div class="form-floating">
            <input type="password" class="form-control" id="floatingPassword" placeholder="Password" name= "password" required>
            <label for="floatingPassword">Password</label>
            <div class="invalid-feedback">
        Masukkan Password dengan benar!
      </div>
            </div>
            </div> -->
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary" name= "input_user_validate" value="123">Save changes</button>
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
                <h1 class="modal-title fs-5" id="exampleModalLabel">Hapus Data User</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
            <form class= "needs-validation" novalidate action="proses/proses_hapus_user.php" method= "POST">
                <input type= "hidden" value= "<?php echo $row['id']?>" name= "id">
                <div class= "col-lg-12">
                    <?php 
                    if  ($row['username'] == $_SESSION['username_gelatocuu']) {
                        echo "<div class='alert alert-danger'>Anda tidak dapat menghapus akun sendiri</div>";
                    }
                    else{
                        echo "Apakah anda yakin ingin menghapus user <b> $row[username]</b>";
                    }
                    ?>    
                </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-danger" name= "input_user_validate" value="123" <?php echo ($row['username'] == $_SESSION['username_gelatocuu']) ? 'disabled' : '' ; ?>>Hapus</button>
            </div>
            </form>
            </div>
            </div>
        </div>
        </div>
        <!-- Akhir Modal Delete -->

        <!-- Modal Reset Password -->
        <div class="modal fade" id="ModalResetPassword<?php echo $row['id']?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-md modal-fullscreen-md-down">
            <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Reset Password</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
            <form class= "needs-validation" novalidate action="proses/proses_reset_password.php" method= "POST">
                <input type= "hidden" value= "<?php echo $row['id']?>" name= "id">
                <div class= "col-lg-12">
                    <?php 
                    if  ($row['username'] == $_SESSION['username_gelatocuu']) {
                        echo "<div class='alert alert-danger'>Anda tidak dapat mereset password sendiri</div>";
                    }
                    else{
                        echo "Apakah anda yakin ingin mereset password user <b> $row[username]</b> menjadi password bawaan sistem yaitu <b>password</b>";
                    }
                    ?>    
                </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-success" name= "input_user_validate" value="123" <?php echo ($row['username'] == $_SESSION['username_gelatocuu']) ? 'disabled' : '' ; ?>>Reset Password</button>
            </div>
            </form>
            </div>
            </div>
        </div>
        </div>
        <!-- Akhir Modal Reset Password -->
        
        <?php 
        }
        if(empty($result)){
            echo "Data User tidak ditemukan";
        }else{
        ?>

        <div class= "table-responsive">
            <table class="table table-hover">
        <thead>
            <tr>
            <th scope="col">No</th>
            <th scope="col">Nama</th>
            <th scope="col">Gender</th>
            <th scope="col">Role</th>
            <th scope="col">Username</th>
            <th scope="col">Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php 
            $no =1;
            foreach ($result as $row) {
            ?>
            <tr>
            <th scope="row"><?php echo $no++ ?></th>
            <td><?php echo $row['nama_user'] ?></td>
            <td><?php echo $row['gender'] ?></td>
            <td><?php echo $row['role'] ?></td>
            <td><?php echo $row['username'] ?></td>
            <td class="d-flex">
                <button class= "btn btn-info btn-sm me-1" data-bs-toggle="modal" data-bs-target="#ModalView<?php echo $row['id'] ?>" ><i class="bi bi-eye"></i></button>
                <button class= "btn btn-warning btn-sm me-1" data-bs-toggle="modal" data-bs-target="#ModalEdit<?php echo $row['id'] ?>"><i class="bi bi-pencil-square"></i></button>
                <button class= "btn btn-danger btn-sm me-1" data-bs-toggle="modal" data-bs-target="#ModalDelete<?php echo $row['id'] ?>"><i class="bi bi-trash"></i></button>
                <button class= "btn btn-secondary btn-sm" data-bs-toggle="modal" data-bs-target="#ModalResetPassword<?php echo $row['id'] ?>"><i class="bi bi-heart-arrow"></i></button>
            </td>
            </tr>
            <?php 
            }
            ?>
        </tbody>
        </table>
        </div>
        <?php 
        }
        ?>
            </div>
    </div>
        </div>