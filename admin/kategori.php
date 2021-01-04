<?php
include_once('session-check.php');
$_SESSION["visited_page2"] = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";

//View
$sql = "SELECT * FROM tb_kategori_produk";
$result = mysqli_query($db, $sql);
?>
<!-- DataTales -->
<div class="w-100 card shadow mb-4">
    <div class="card-header py-3">
        <div class="d-inline-flex w-100">
            <h6 class="m-0 font-weight-bold text-primary">Kelola Data Kategori Barang</h6>
            <button type="button" class="btn btn-primary shadow ml-auto" data-toggle="modal" data-target="#tambah">
                Tambah Kategori
            </button>
        </div>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th style="max-width: 100px;">ID Kategori</th>
                        <th style="max-width: 200px;">Nama Kategori</th>
                        <th style="min-width: 250px;">Deskripsi Kategori</th>
                        <th style="min-width: 200px;">Aksi</th>
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <th>ID Kategori</th>
                        <th>Nama Kategori</th>
                        <th>Deskripsi Kategori</th>
                        <th>Aksi</th>
                    </tr>
                </tfoot>
                <tbody>
                    <?php
                    while ($row = mysqli_fetch_array($result)) {
                        echo "<tr>";
                        echo "<td>$row[0]</td>";
                        echo "<td>$row[1]</td>";
                        echo "<td>$row[2]</td>";
                        echo "<td>
                            <div class='d-inline-flex w-100'>
                                <form class='d-flex h-100 w-100' method='POST' action='kategori/edit.php'>
                                    <input type='hidden' name='id' id='id' value=" . "'" .  $row[0] . "'" . ">
                                    <input type='hidden' name='nama' id='nama' value=" . "'" .  $row[1] . "'" . ">
                                    <input type='hidden' name='desc' id='desc' value=" . "'" .  $row[2] . "'" . ">
                                    <button class='btn btn-sm btn-primary shadow-sm px-4 ml-auto' type='submit' id='edit' name='edit'><i class='fa fa-edit'></i> Edit</button>
                                </form>
                                <form id='form-id' class='d-flex h-100 w-100' method='POST' action='kategori/hapus.php'>
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

<!-- Modal Tambah -->
<div class="modal fade" id="tambah" tabindex="-1" role="dialog" aria-labelledby="tambahTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <form action="kategori/tambah.php" method="POST">
                <div class="modal-header">
                    <h5 class="modal-title text-primary" id="exampleModalLongTitle">Tambah Data Kategori Barang</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row align-items-center">
                        <div class="col-4 mb-3">
                            <label for="categoryName" class="text-dark">Nama Kategori</label>
                        </div>
                        <div class="col-8 mb-3">
                            <input type="text" class="form-control text-dark" id="categoryName" name="categoryName" placeholder="Nama Kategori" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Nama Kategori'">
                        </div>
                        <div class="col-4 mb-3">
                            <label for="categoryDesc" class="text-dark">Deskripsi Kategori</label>
                        </div>
                        <div class="col-8 mb-3">
                            <textarea type="text" rows="5" cols="1" class="form-control text-dark" id="categoryDesc" name="categoryDesc" placeholder="Deskripsi" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Deskripsi'"></textarea>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" onclick="location.href = 'index.php?page=kategori';" data-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-primary" id='tambah' name='tambah'>Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>