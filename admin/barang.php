<?php
include_once('session-check.php');
$_SESSION["visited_page2"] = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";

//View Produk
$sql = "SELECT tb_produk.*, tb_kategori_produk.product_type_name
        FROM tb_produk
        LEFT JOIN tb_kategori_produk
        ON tb_produk.product_type_id = tb_kategori_produk.product_type_id";
$result = mysqli_query($db, $sql);
?>
<!-- Jumlah Barang -->
<div class="col-xl-6 col-md-6 mb-4">
    <div class="card border-left-info shadow h-100 py-2">
        <div class="card-body">
            <div class="row no-gutters align-items-center">
                <div class="col mr-2">
                    <div class="text-xs font-weight-bold text-info text-uppercase mb-1">
                        Total Barang Di Toko</div>
                    <div class="h5 mb-0 font-weight-bold text-gray-800">
                        <?php
                        $query = "SELECT COUNT(*) FROM tb_produk";
                        $hasil = mysqli_query($db, $query);
                        $jumlah = mysqli_fetch_array($hasil);
                        echo $jumlah['COUNT(*)'];
                        ?> Item
                    </div>
                </div>
                <div class="col-auto">
                    <i class="fa fa-dropbox fa-2x text-gray-300"></i>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Jumlah Barang Terjual -->
<div class="col-xl-6 col-md-6 mb-4">
    <div class="card border-left-info shadow h-100 py-2">
        <div class="card-body">
            <div class="row no-gutters align-items-center">
                <div class="col mr-2">
                    <div class="text-xs font-weight-bold text-info text-uppercase mb-1">
                        Total Barang Terjual</div>
                    <div class="h5 mb-0 font-weight-bold text-gray-800">
                        <?php
                        $query3 = "SELECT COUNT(*) FROM tb_order WHERE order_status = 'Pesanan Selesai' OR order_status = 'Pesanan Diproses'";
                        $sql3 = mysqli_query($db, $query3);
                        $row3 = mysqli_fetch_array($sql3);
                        echo $row3['COUNT(*)'];
                        ?> Item
                    </div>
                </div>
                <div class="col-auto">
                    <i class="fa fa-shopping-cart fa-2x text-gray-300"></i>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- DataTales -->
<div class="w-100 card shadow mb-4">
    <div class="card-header py-3">
        <div class="d-inline-flex w-100">
            <h6 class="m-0 font-weight-bold text-primary">Kelola Data Barang</h6>
            <button type="button" class="btn btn-primary shadow ml-auto" data-toggle="modal" data-target="#tambah">
                Tambah Barang
            </button>
        </div>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>ID Produk</th>
                        <th>Nama Kategori</th>
                        <th>Nama Produk</th>
                        <th>Harga</th>
                        <th>Warna</th>
                        <th>Ukuran</th>
                        <th>Berat</th>
                        <th>Deskripsi Singkat</th>
                        <th>Deskripsi Lengkap</th>
                        <th>Gambar</th>
                        <th style="width: 10%;">Aksi</th>
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <th>ID Produk</th>
                        <th>Nama Kategori</th>
                        <th>Nama Produk</th>
                        <th>Harga</th>
                        <th>Warna</th>
                        <th>Ukuran</th>
                        <th>Berat</th>
                        <th>Deskripsi Singkat</th>
                        <th>Deskripsi Lengkap</th>
                        <th>Gambar</th>
                        <th>Aksi</th>
                    </tr>
                </tfoot>
                <tbody>
                    <?php
                    while ($row = mysqli_fetch_array($result)) {
                        if (!empty($row[7])) {
                            $image = "<img src=" . "../" . $row[7] . " class='zoomD'>";
                        } else {
                            $image = '';
                        }
                        echo "<tr>";
                        echo "<td>$row[0]</td>";
                        echo "<td>$row[10]</td>";
                        echo "<td>$row[2]</td>";
                        echo "<td>$row[3]</td>";
                        echo "<td>$row[4]</td>";
                        echo "<td>$row[5]</td>";
                        echo "<td>$row[6]</td>";
                        echo "<td>".mb_strimwidth("$row[8]", 0, 70, '...')."</td>";
                        echo "<td>".mb_strimwidth("$row[9]", 0, 70, '...')."</td>";
                        echo "<td class='text-center'>" . $image . "</td>";
                        echo "<td>
                            <div class='d-inline-flex w-100 list-group'>
                                <form class='mb-2 d-flex h-100 w-100' method='POST' enctype='multipart/form-data' action='barang/edit.php'>
                                    <input type='hidden' name='id' id='id' value=" . "'" .  $row[0] . "'" . ">
                                    <input type='hidden' name='idk' id='idk' value=" . "'" .  $row[1] . "'" . ">
                                    <input type='hidden' name='nama' id='nama' value=" . "'" .  $row[2] . "'" . ">
                                    <input type='hidden' name='harga' id='harga' value=" . "'" .  $row[3] . "'" . ">
                                    <input type='hidden' name='warna' id='warna' value=" . "'" .  $row[4] . "'" . ">
                                    <input type='hidden' name='ukuran' id='ukuran' value=" . "'" .  $row[5] . "'" . ">
                                    <input type='hidden' name='berat' id='berat' value=" . "'" .  $row[6] . "'" . ">
                                    <input type='hidden' name='desc' id='desc' value=" . "'" .  $row[8] . "'" . ">
                                    <input type='hidden' name='descl' id='descl' value=" . "'" .  $row[9] . "'" . ">
                                    <button class='btn btn-sm btn-primary shadow-sm btn-block' type='submit' id='edit' name='edit'><i class='fa fa-edit'></i> Edit</button>
                                </form>
                                <form id='form-id' class='d-flex h-100 w-100' method='POST' action='barang/hapus.php'>
                                    <input type='hidden' name='id' id='id' value=" . $row[0] . ">
                                    <button class='btn btn-sm btn-danger shadow-sm btn-block' onclick='javascript:confirmationDelete($(this));return false;' type='submit' id='hapus' name='hapus'><i class='fa fa-trash'></i> Hapus</button>
                                </form>
                            </div>
                            </td>";
                        echo "</tr>";
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="tambah" tabindex="-1" role="dialog" aria-labelledby="tambahTitle" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
        <div class="modal-content">
            <form action="barang/tambah.php" enctype="multipart/form-data" method="POST">
                <div class="modal-header">
                    <h5 class="modal-title text-primary" id="exampleModalLongTitle">Tambah Data Barang</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row align-items-center">
                        <div class="col-4 mb-3">
                            <label for="kategori" class="text-dark">Kategori</label>
                        </div>
                        <div class="col-8 mb-3">
                            <select class="form-control rounded" name="kategori" id="kategori">
                                <option value="" selected disabled hidden>Pilih Kategori</option>
                                <?php
                                $query = "SELECT * FROM tb_kategori_produk";
                                $hasil = mysqli_query($db, $query);
                                while ($row = mysqli_fetch_array($hasil)) {
                                    echo "<option value='$row[0]'>$row[1]</option>";
                                }
                                ?>
                            </select>
                        </div>
                        <div class="col-4 mb-3">
                            <label for="productName" class="text-dark">Nama Produk</label>
                        </div>
                        <div class="col-8 mb-3">
                            <input type="text" class="form-control text-dark" id="productName" name="productName" placeholder="Nama Produk" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Nama Produk'">
                        </div>
                        <div class="col-4 mb-3">
                            <label for="harga" class="text-dark">Harga</label>
                        </div>
                        <div class="col-8 mb-3">
                            <input type="number" class="form-control text-dark" id="harga" name="harga" placeholder="Harga" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Harga'">
                        </div>
                        <div class="col-4 mb-3">
                            <label for="warna" class="text-dark">Warna</label>
                        </div>
                        <div class="col-8 mb-3">
                            <input type="text" class="form-control text-dark" id="warna" name="warna" placeholder="Warna" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Warna'">
                        </div>
                        <div class="col-4 mb-3">
                            <label for="ukuran" class="text-dark">Ukuran</label>
                        </div>
                        <div class="col-8 mb-3">
                            <input type="text" class="form-control text-dark" id="ukuran" name="ukuran" placeholder="Ukuran" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Ukuran'">
                        </div>
                        <div class="col-4 mb-3">
                            <label for="berat" class="text-dark">Berat</label>
                        </div>
                        <div class="col-8 mb-3">
                            <input type="number" class="form-control text-dark" id="berat" name="berat" placeholder="Berat (Gram)" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Berat (Gram)'">
                        </div>
                        <div class="col-4 mb-3">
                            <label for="shortDesc" class="text-dark">Deskripsi Singkat</label>
                        </div>
                        <div class="col-8 mb-3">
                            <textarea type="text" rows="3" cols="1" class="form-control text-dark" id="shortDesc" name="shortDesc" placeholder="Deskripsi Singkat (400 Karakter)" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Deskripsi Singkat (400 Karakter)'"></textarea>
                        </div>
                        <div class="col-4 mb-3">
                            <label for="longDesc" class="text-dark">Deskripsi Lengkap</label>
                        </div>
                        <div class="col-8 mb-3">
                            <textarea type="text" rows="5" cols="1" class="form-control text-dark" id="longDesc" name="longDesc" placeholder="Deskripsi Panjang" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Deskripsi Panjang'"></textarea>
                        </div>
                        <div class="col-4 mb-3">
                            <label for="logo" class="text-dark">Gambar Produk</label>
                        </div>
                        <div class="col-8 mb-3">
                            <input type="file" class="form-control-file text-dark" id="file" name="file" accept=".png, .jpg, .jpeg">
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" onclick="location.href = 'index.php?page=barang';" data-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-primary" id='tambah' name='tambah'>Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>