<?php
//pengecekan session
if (!isset($_SESSION["login"])) {
    header("Location: login.php");
    exit;
}
include "../functions.php";

$admin = query("SELECT * FROM admin");

//cek tombol submit sudah ditekan
if (isset($_POST["submit"])) {

    //cek data berhasil diubah
    if (ubahProfile($_POST) > 0) {
        echo "<script>
				alert ('Profile Berhasil Diubah');
				document.location.href = 'index.php?halaman=profile';
			</script>";
    } else {
        echo "<script>
        alert ('Profile Gagal Diubah');
        document.location.href = 'index.php?halaman=ubahProfile';
    </script>";
    }
}
?>

<div class="container-fluid">
    <h2 class="h3 mb-4 text-gray-800">Profile</h2>

    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card shadow-sm border-bottom-primary">
                <div class="card-header bg-white py-3">
                    <div class="row">
                        <div class="col">
                            <h4 class="h5 align-middle m-0 font-weight-bold text-primary">
                                Form Ubah Profile Admin
                            </h4>
                        </div>
                        <div class="col-auto">
                            <a href="index.php?halaman=profile" class="btn btn-sm btn-secondary btn-icon-split">
                                <span class="icon">
                                    <i class="fa fa-arrow-left"></i>
                                </span>
                                <span class="text">
                                    Kembali
                                </span>
                            </a>
                        </div>
                    </div>
                </div>

                <div class="card-body">
                    <form action="" method="post" enctype="multipart/form-data">
                        <input type="hidden" name="id" value="<?= $admin["id_admin"]; ?>">
                        <input type="hidden" name="gambarLama" value="<?= $admin["gambar"]; ?>">
                        <input type="hidden" name="password" value="<?= $admin["password"]; ?>">

                        <div class="row form-group">
                            <label class="col-md-3 text-md-right"> Nama </label>
                            <div class="col-md-7">
                                <input type="text" class="form-control" name="nama" value="<?= $admin['nama']; ?>" required>
                            </div>
                        </div>
                        <div class="row form-group">
                            <label class="col-md-3 text-md-right"> Username </label>
                            <div class="col-md-7">
                                <input type="text" class="form-control" name="username" value="<?= $admin['username']; ?>" required>
                            </div>
                        </div>
                        <div class="row form-group">
                            <label class="col-md-3 text-md-right"> Email </label>
                            <div class="col-md-7">
                                <input type="text" class="form-control" name="email" value="<?= $admin['email']; ?>" required>
                            </div>
                        </div>
                        <div class="row form-group">
                            <label class="col-md-3 text-md-right"> No. Telp </label>
                            <div class="col-md-7">
                                <input type="text" class="form-control" name="no_telp" value="<?= $admin['no_telp']; ?>" required>
                            </div>
                        </div>
                        <div class="row form-group">
                            <label class="col-md-3 text-md-right"> Alamat </label>
                            <div class="col-md-7">
                                <input type="text" class="form-control" name="alamat" value="<?= $admin['alamat']; ?>" required>
                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="col-md-8">
                                <img src="img/<?= $admin['gambar']; ?>" width="200px" name="gambar" style="float: right;">
                            </div>
                        </div>
                        <div class="row form-group">
                            <label class="col-md-3 text-md-right"> Ganti Foto </label>
                            <div class="col-md-9">
                                <input type="file" class="form-control" name="gambar" id="gambar">
                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="col-md-9 offset-md-3">
                                <button type="submit" class="btn btn-primary" name="submit"> Ubah</button>
                                <button type="reset" class="btn btn-secondary">Reset</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>