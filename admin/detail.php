<?php

include "../functions.php";

$pmsn = query("SELECT pemesanan.id_pesanan,pelanggan.id_pelanggan, pelanggan.nama, pelanggan.alamat,pemesanan.jenis_produk, pemesanan.tanggal FROM pemesanan

JOIN pelanggan on pemesanan.id_pelanggan = pelanggan.id_pelanggan");
// var_dump($pmsn);
// die;
?>

<div class="container-fluid">
    <h2 class="h3 mb-4 text-gray-800">Pemesanan</h2>

    <div class="card p-2 shadow-sm border-bottom-primary">
        <div class="card-header bg-white">
            <div class="col">
                <div class="row">
                    <h4 class="h5 align-middle m-0 font-weight-bold text-primary">
                        Data Pemesanan
                    </h4>
                </div>
            </div>
        </div>

        <div class="card-body">
            <div class="row">
                <div class="col-md-12">
                    <table class="table table-bordered">
                        <tr>
                            <th width="100px">Nama</th>
                            <td><?= $pmsn["nama"]; ?></td>
                        </tr>
                        <tr>
                            <th>Alamat</th>
                            <td><?= $pmsn["alamat"]; ?></td>
                        </tr>
                        <tr>
                            <th>Produk</th>
                            <td><?= $pmsn["jenis_produk"]; ?></td>
                        </tr>
                        <tr>
                            <th>Tanggal</th>
                            <td><?= $pmsn["tanggal"]; ?></td>
                        </tr>
                    </table>
                </div>
            </div>
            <a class="btn btn-success btn-social mt-3 float-right" target="_blank" class="cetak" href="cetakPesan.php?id=<?php echo $pmsn['id_pesanan'] ?>">
                <i class="fa fa-print"></i> Cetak</a>
        </div>
    </div>
</div>