<?php
include "../functions.php";

if (!isset($_SESSION["login"])) {
    header("Location: login.php");
    exit;
};

$ikan = mysqli_query($conn, "SELECT * FROM ikan");
$jmlIkan = mysqli_num_rows($ikan);

?>

<div class="container-fluid">
    <div class="row">
        <div class="col-xl-3 col-6 mb-4">
            <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Total Data Ikan</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $jmlIkan; ?></div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-folder fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
            <div class="card shadow mb-4">
                <div class="card-header bg-warning py-3">
                    <h6 class="m-0 font-weight-bold text-white text-center">Daftar List ikan</h6>
                </div>
                <div class="table-responsive">
                    <table class="table mb-0 table-sm table-striped text-center">
                        <thead>
                            <tr>
                                <th>Nama Ikan</th>
                                <th>Harga Ikan</th>
                                <th>Kategori Ikan</th>

                            </tr>
                        </thead>
                        <tbody>
                            <?php global $conn; ?>
                            <?php foreach ($ikan as $row) : ?>
                                <tr>
                                    <td><strong><?= $row["nama_ikan"]; ?></strong></td>
                                    <td>Harga</td>
                                    <td><?= $row["kategori"]; ?></td>

                                </tr>
                            <?php endforeach ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card shadow mb-4">
                <div class="card-header bg-success py-3">
                    <h6 class="m-0 font-weight-bold text-white text-center">Daftar List ikan</h6>
                </div>
                <div class="table-responsive">
                    <table class="table mb-0 table-sm table-striped text-center">
                        <thead>
                            <tr>
                                <th>Nama Ikan</th>
                                <th>Harga Ikan</th>
                                <th>Kategori Ikan</th>

                            </tr>
                        </thead>
                        <tbody>
                            <?php global $conn; ?>
                            <?php foreach ($ikan as $row) : ?>
                                <tr>
                                    <td><?= $row["nama_ikan"]; ?></td>
                                    <td>Harga</td>
                                    <td><?= $row["kategori"]; ?></td>

                                </tr>
                            <?php endforeach ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>