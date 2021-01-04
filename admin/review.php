<?php
include_once('session-check.php');
$_SESSION["visited_page2"] = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";

//View
$sql = "SELECT * FROM tb_review";
$result = mysqli_query($db, $sql);
?>
<!-- DataTales -->
<div class="w-100 card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Kelola Review Customer</h6>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>ID Customer</th>
                        <th>ID Produk</th>
                        <th>Komentar</th>
                        <th>Bintang</th>
                        <th>Tanggal</th>
                        <th style="width: 10%;">Aksi</th>
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <th>ID Customer</th>
                        <th>ID Produk</th>
                        <th>Komentar</th>
                        <th>Bintang</th>
                        <th>Tanggal</th>
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
                        echo "<td>$row[4]</td>";
                        echo "<td>$row[3]</td>";
                        echo "<td>
                                    <form id='form-id' class='d-flex h-100 w-100' method='POST' action='review/hapus.php'>
                                        <input type='hidden' name='id' id='id' value=" . $row[0] . ">
                                        <input type='hidden' name='id2' id='id2' value=" . $row[1] . ">
                                        <button class='btn btn-sm btn-danger shadow-sm btn-block' onclick='javascript:confirmationDelete($(this));return false;' type='submit' id='hapus' name='hapus'><i class='fa fa-trash'></i> Hapus</button>
                                    </form>
                                    </td>";
                        echo "</tr>";
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</div>