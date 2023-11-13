<?php

include "../functions.php";

$admin = query("SELECT * FROM admin");

?>

<div class="container-fluid">
    <h2 class="h3 mb-4 text-gray-800">Profile</h2>

    <div class="card p-2 shadow-sm border-bottom-success">
        <div class="card-header bg-white">
            <h4 class="h5 align-middle m-0 font-weight-bold text-success">
                Admin
            </h4>
        </div>

        <div class="card-body">
            <div class="row">
                <div class="col-md-2 mb-4 mb-md-0">
                    <img src="img/<?= $admin["gambar"]; ?>" class="img-thumbnail rounded mb-2">
                    <a href="index.php?halaman=ubahProfile" class="btn btn-sm btn-block btn-success"><i class="fa fa-edit"></i> Edit Profile</a>
                </div>
                <div class="col-md-6">
                    <table class="table">
                        <tr>
                            <th>Nama</th>
                            <td><?= $admin["nama"]; ?></td>
                        </tr>
                        <tr>
                            <th>Username</th>
                            <td><?= $admin["username"]; ?></td>
                        </tr>
                        <tr>
                            <th>Email</th>
                            <td><?= $admin["email"]; ?></td>
                        </tr>
                        <tr>
                            <th>No. Telp</th>
                            <td><?= $admin["no_telp"]; ?></td>
                        </tr>
                        <tr>
                            <th>Alamat</th>
                            <td><?= $admin["alamat"]; ?></td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>