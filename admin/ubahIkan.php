<?php
// pengecekan session
if (!isset($_SESSION["login"])) {
  header("Location: login.php");
  exit;
}

require '../functions.php';

//ambil data dr url
$id = $_GET["id"];

$ikan = query("SELECT ikan.id_ikan, ikan.nama_ikan, ikan.harga, ikan.gambar, kategori.id_kategori, kategori.nama_kategori FROM ikan JOIN kategori on ikan.id_kategori = kategori.id_kategori where id_ikan = $id");

$kategori = $conn->query("SELECT * FROM kategori");

//cek tombol submit sudah ditekan
if (isset($_POST["submit"])) {

  //cek data berhasil diubah
  if (ubahIkan($_POST) > 0) {
    echo "<script>
				alert ('Data Berhasil Diubah');
				document.location.href = 'index.php?halaman=dataIkan';
			</script>";
  } else {
    echo "<script>
        alert ('Data Gagal Diubah');
        document.location.href = 'index.php?halaman=ubahIkan';
    </script>";
  }
}

?>
<div class="container-fluid">
  <h2 class="h3 mb-4 text-gray-800">Ikan</h2>
  <div class="row justify-content-center">
    <div class="col-md-8">
      <div class="card shadow-sm border-bottom-success">
        <div class="card-header bg-white py-3">
          <div class="row">
            <div class="col">
              <h4 class="h5 align-middle m-0 font-weight-bold text-success">
                Form Ubah Ikan
              </h4>
            </div>
            <div class="col-auto">
              <a href="index.php?halaman=dataIkan" class="btn btn-sm btn-secondary btn-icon-split">
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
          <form method="post" action="" enctype="multipart/form-data">
            <input type="hidden" name="id" value="<?= $ikan["id_ikan"]; ?>">
            <input type="hidden" name="gambarLama" value="<?= $ikan["gambar"]; ?>">
            <input type="hidden" name="status" value="<?= $ikan["status"]; ?>">

            <div class="row form-group">
              <label class="col-md-4 text-md-right"> Nama Ikan </label>
              <div class="col-md-8">
                <input type="text" class="form-control" name="nama_ikan" value="<?= $ikan['nama_ikan']; ?>">
              </div>
            </div>
            <div class="row form-group">
              <label class="col-md-4 text-md-right"> Harga Ikan </label>
              <div class="col-md-8">
                <input type="text" class="form-control" name="harga" value="<?= $ikan['harga']; ?>">
              </div>
            </div>
            <div class="row form-group">
              <div class="col-md-8">
                <img src="img/<?= $ikan['gambar']; ?>" width="200px" name="gambar" style="float: right;">
              </div>
            </div>
            <div class="row form-group">
              <label class="col-md-4 text-md-right"> Ganti Foto </label>
              <div class="col-md-8">
                <input type="file" class="form-control" name="gambar" id="gambar">
              </div>
            </div>
            <div class="row form-group">
              <label for="kategori" class=" col-md-4 text-md-right">Kategori</label>
              <div class="col-md-8">
                <div class="input-group">
                  <select class="custom-select" id="nama_kategori" name="nama_kategori">
                    <?php foreach ($kategori as $k) : ?>
                      <option value="<?= $k["id_kategori"]; ?>"><?= $k["nama_kategori"]; ?></option>
                    <?php endforeach ?>
                  </select>
                </div>
              </div>
            </div>
            <div class="row form-group">
              <div class="col-md-8 offset-md-4">
                <button type="submit" class="btn btn-success" name="submit"> Ubah</button>
                <button type="reset" class="btn btn-secondary">Reset</button>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>