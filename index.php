<?php

include "functions.php";

$ikan = $conn->query("SELECT ikan.id_ikan, ikan.nama_ikan, ikan.harga, ikan.gambar, kategori.id_kategori, kategori.nama_kategori FROM ikan JOIN kategori on ikan.id_kategori = kategori.id_kategori where status = '1'");

$kategori = $conn->query("SELECT * FROM kategori");

?>

<!doctype html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="assets/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
  <!-- My fonts -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Viga">

  <link rel="stylesheet" type="text/css" href="assets/css/style.css">
  <link href="assets/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link type="text/css" href="vendor/sb-admin2/css/sb-admin-2.min.css" rel="stylesheet">
  <title>Main Page</title>
</head>

<body>
  <?php include "menu.php"; ?>

  <div class="container">
    <!-- info panel -->
    <div class="row justify-content-center">
      <div class="col-lg-12 info-panel">
        <div class="row">
          <div class="col-lg">
            <h3 class="text-center">List of Available Fish</h3>
            <hr />

            <?php foreach ($ikan as $row) : ?>

              <div class="card my-3 ml-5 float-left justify-content-center">
                <img class="card-img-top ml-4 mt-4" src="admin/img/<?= $row["gambar"]; ?>">
                <div class="card-body">
                  <h6 class="card-subtitle text-muted"><?= $row["nama_kategori"] ?></h6>
                  <h4 class="card-title" style="font-size: 15px;"><?= $row["nama_ikan"]; ?></h4>
                  <a href="https://wa.me/08888211839/?text=Apakah%20<?= $row["nama_ikan"]; ?>%20masih%20ada?" target="_blank" class="btn btn-success"><i class="fab fa-whatsapp mr-2"></i>Click for Purchase</a>
                </div>
              </div>

            <?php endforeach ?>

          </div>
        </div>
      </div>
    </div>
    <!-- akhir info panel -->

    <a class="scroll-to-top rounded" href="#top">
      <i class="fas fa-angle-up"></i>
    </a>

    <!-- footer -->
    <div class="row footer">
      <div class="col text-center">
        <p> <?= date('Y'); ?> All Rights Reserved by Fresh Mallta</p>
      </div>
    </div> -->
    <!-- akhir footer-->
  </div>
  <script>
    $('html, body').animate({
      scrollTop: $("#elementID").offset().top
    }, 2000);
  </script>

  <!-- Bootstrap core JavaScript-->
  <script src="assets/vendor/jquery/jquery.min.js"></script>
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="assets/vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="vendor/sb-admin2/js/sb-admin-2.min.js"></script>

  <!-- Page level plugins -->
  <script src="assets/vendor/datatables/jquery.dataTables.min.js"></script>
  <script src="assets/vendor/datatables/dataTables.bootstrap4.min.js"></script>
  <script src="vendor/sb-admin2/js/demo/datatables-demo.js"></script>

  <!-- Page level custom scripts -->
  <script src="vendor/js/demo/datatables-demo.js"></script>

  <!-- Javascript -->
  <script src="assets/js/script.js"></script>
</body>
</body>

</html>