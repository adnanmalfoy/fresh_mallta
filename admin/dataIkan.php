<?php

if (!isset($_SESSION["login"])) {
  header("Location: login.php");
  exit;
};

include "../functions.php";

//cek apakah tombol submit sudah ditekan atau belum
if (isset($_POST["submit"])) {
  //cek apakah data berhasil dikirimkan atau tidak
  if (tambahIkan($_POST) > 0) {
    echo "<script>
				alert ('Data Berhasil Ditambahkan');
				document.location.href = 'index.php?halaman=dataIkan';
			</script>";
  } else {
    echo "<script>
				alert ('Data Gagal Ditambahkan');
        document.location.href = 'index.php?halaman=dataIkan';
			</script>";
  }
}

$ikan = $conn->query("SELECT ikan.id_ikan, ikan.nama_ikan, ikan.harga, ikan.gambar, kategori.id_kategori, kategori.nama_kategori FROM ikan JOIN kategori on ikan.id_kategori = kategori.id_kategori where status = '1'");

$kategori = $conn->query("SELECT * FROM kategori");

?>

<div class="container-fluid">
  <h2 class="h3 mb-3 text-gray-800">Ikan</h2>

  <div class="card-shadow-sm border-bottom-success">
    <div class="card-header bg-white py-3">
      <div class="row">
        <div class="col">
          <h4 class="h5 align-middle m-0 font-weight-bold text-success">
            Data Ikan
          </h4>
        </div>
        <div class="col-auto">
          <!-- Button trigger modal -->
          <button type="button" class="btn btn-success my-2 btn-icon-split" data-toggle="modal" data-target="#exampleModal">
            <i class="fa fa-plus mr-3"></i>Tambah Data Ikan </button>
        </div>
      </div>

      <div class="table-responsive">
        <table class="table table-striped w-100 dt-responsive nowrap" id="dataTable" cellspacing="0">
          <thead class="thead-light">
            <tr>
              <th>No</th>
              <th>Nama Ikan</th>
              <th>Kategori</th>
              <th>Harga Ikan</th>
              <th>Gambar</th>
              <th>Aksi</th>
            </tr>
          </thead>

          <tbody>
            <?php $i = 1; ?>
            <?php global $conn; ?>
            <?php foreach ($ikan as $row) : ?>
              <tr>
                <td><?= $i; ?></td>
                <td><?= $row["nama_ikan"]; ?></td>
                <td><?= $row["nama_kategori"]; ?></td>
                <td>Rp. <?= number_format($row["harga"]); ?>/kg</td>
                <td><img width="80px" src="img/<?= $row["gambar"]; ?>"></td>
                <td>
                  <a href="index.php?halaman=ubahIkan&id=<?= $row['id_ikan']; ?>" class="btn btn-warning mt-2"><i class="fas fa-edit mr-1"></i>Ubah</a>
                  <a href="index.php?halaman=hapusIkan&id=<?= $row["id_ikan"]; ?>" onclick="return confirm('Yakin ingin menghapus ?');" class="btn btn-danger mt-2"><i class="fas fa-trash mr-1"></i>Hapus</a>
                </td>
              </tr>
              <?php $i++; ?>
            <?php endforeach ?>
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>

<a class="scroll-to-top rounded" href="#page-top">
  <i class="fas fa-angle-up"></i>
</a>

<!-- Modal Tambah-->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Form Tambah Data Ikan</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="" method="POST" enctype="multipart/form-data">
          <div class="row form-group">
            <label for="nama_ikan" class="col-md-4 text-md-right">Nama Ikan</label>
            <div class="col-md-7">
              <div class="input-group">
                <input type="text" name="nama_ikan" id="nama_ikan" class="form-control" required autofocus>
              </div>
            </div>
          </div>
          <div class="row form-group">
            <label for="nama_ikan" class="col-md-4 text-md-right">Harga Ikan / kg</label>
            <div class="col-md-7">
              <div class="input-group">
                <input type="text" name="harga" id="harga" class="form-control" required autofocus>
              </div>
            </div>
          </div>
          <div class="row form-group">
            <label for="gambar" class="col-md-4 text-md-right">Gambar</label>
            <div class="col-md-7">
              <div class="input-group">
                <input type="file" name="gambar" class="form-control" required>
              </div>
            </div>
          </div>
          <div class="row form-group">
            <label for="id_kategori" class="col-md-4 text-md-right">Kategori</label>
            <div class="col-md-7">
              <div class="input-group">
                <select class="custom-select" id="id_kategori" name="id_kategori" required>
                  <option value="" selected disabled>Pilih Kategori</option>
                  <?php foreach ($kategori as $k) : ?>
                    <option value="<?= $k["id_kategori"]; ?>"><?= $k["nama_kategori"]; ?></option>
                  <?php endforeach ?>
                </select>
              </div>
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-success" name="submit">Save changes</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>