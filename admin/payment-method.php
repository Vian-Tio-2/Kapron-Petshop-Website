<?php
include_once('session-check.php');
$_SESSION["visited_page2"] = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";

//View
$sql = "SELECT * FROM tb_payment_method";
$result = mysqli_query($db, $sql);
?>
<!-- DataTales -->
<div class="w-100 card shadow mb-4">
    <div class="card-header py-3">
        <div class="d-inline-flex w-100">
            <h6 class="m-0 font-weight-bold text-primary">Kelola Data Metode Pembayaran</h6>
            <button type="button" class="btn btn-primary shadow ml-auto" data-toggle="modal" data-target="#tambah">
                Tambah Metode Pembayaran
            </button>
        </div>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>ID Metode Pembayaran</th>
                        <th>Nama</th>
                        <th>Kode Transfer</th>
                        <th>Detail</th>
                        <th>Logo Instansi</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <th>ID Metode Pembayaran</th>
                        <th>Nama</th>
                        <th>Kode Transfer</th>
                        <th>Detail</th>
                        <th>Logo Instansi</th>
                        <th>Aksi</th>
                    </tr>
                </tfoot>
                <tbody>
                    <?php
                    while ($row = mysqli_fetch_array($result)) {
                        if (!empty($row[4])) {
                            $image = "<img src=" . "../" . $row[4] . " class='zoomD'>";
                        } else {
                            $image = '';
                        }
                        echo "<tr>";
                        echo "<td>$row[0]</td>";
                        echo "<td>$row[1]</td>";
                        echo "<td>$row[2]</td>";
                        echo "<td>$row[3]</td>";
                        echo "<td class='text-center'>" . $image . "</td>";
                        echo "<td>
                            <div class='d-inline-flex w-100'>
                                <form class='d-flex h-100 w-100' method='POST' enctype='multipart/form-data' action='payment-method/edit.php'>
                                    <input type='hidden' name='id' id='id' value=" . "'" .  $row[0] . "'" . ">
                                    <input type='hidden' name='nama' id='nama' value=" . "'" .  $row[1] . "'" . ">
                                    <input type='hidden' name='kode' id='kode' value=" . "'" .  $row[2] . "'" . ">
                                    <input type='hidden' name='detail' id='detail' value=" . "'" .  $row[3] . "'" . ">
                                    <button class='btn btn-sm btn-primary shadow-sm px-4 ml-auto' type='submit' id='edit' name='edit'><i class='fa fa-edit'></i> Edit</button>
                                </form>
                                <form id='form-id' class='d-flex h-100 w-100' method='POST' action='payment-method/hapus.php'>
                                    <input type='hidden' name='id' id='id' value=" . $row[0] . ">
                                    <button class='btn btn-sm btn-danger shadow-sm px-3 mr-auto ml-3' onclick='javascript:confirmationDelete($(this));return false;' type='submit' id='hapus' name='hapus'><i class='fa fa-trash'></i> Hapus</button>
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
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <form action="payment-method/tambah.php" enctype="multipart/form-data" method="POST">
                <div class="modal-header">
                    <h5 class="modal-title text-primary" id="exampleModalLongTitle">Tambah Metode Pembayaran</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row align-items-center">
                        <div class="col-4 mb-3">
                            <label for="methodName" class="text-dark">Nama</label>
                        </div>
                        <div class="col-8 mb-3">
                            <input type="text" class="form-control text-dark" id="methodName" name="methodName" placeholder="Nama Metode Pembayaran" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Nama Metode Pembayaran'">
                        </div>
                        <div class="col-4 mb-3">
                            <label for="kode" class="text-dark">Kode Transfer</label>
                        </div>
                        <div class="col-8 mb-3">
                            <input type="text" class="form-control text-dark" id="kode" name="kode" placeholder="Kode Transfer" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Kode Transfer'">
                        </div>
                        <div class="col-4 mb-3">
                            <label for="detail" class="text-dark">Detail</label>
                        </div>
                        <div class="col-8 mb-3">
                            <textarea type="text" rows="5" cols="1" class="form-control text-dark" id="detail" name="detail" placeholder="Deskripsi" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Deskripsi'"></textarea>
                        </div>
                        <div class="col-4 mb-3">
                            <label for="file" class="text-dark">Logo Instansi</label>
                        </div>
                        <div class="col-8 mb-3">
                            <input type="file" class="form-control-file text-dark" id="file" name="file">
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" onclick="location.href = 'index.php?page=payment-method';" data-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-primary" id='tambah' name='tambah'>Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>