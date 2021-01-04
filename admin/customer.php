<?php
include_once('session-check.php');
$_SESSION["visited_page2"] = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";

//View
$sql = "SELECT * FROM tb_customer";
$result = mysqli_query($db, $sql);

?>
<!-- DataTales -->
<div class="w-100 card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Kelola Data Customer</h6>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>ID Customer</th>
                        <th>Nama Customer</th>
                        <th>Email</th>
                        <th>Jenis Kelamin</th>
                        <th>Alamat</th>
                        <th>No Telephone</th>
                        <th>Foto</th>
                        <th style="width: 10%;">Aksi</th>
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <th>ID Customer</th>
                        <th>Nama Customer</th>
                        <th>Email</th>
                        <th>Jenis Kelamin</th>
                        <th>Alamat</th>
                        <th>No Telephone</th>
                        <th>Foto</th>
                        <th>Aksi</th>
                    </tr>
                </tfoot>
                <tbody>
                    <?php 
                        while ($row = mysqli_fetch_array($result)) {
                            if(!empty($row[8]))
                            {
                                $image = "<img src="."../".$row[8]." class='zoomD'>";
                            } else {
                                $image = '';
                            }
                            echo "<tr>";
                                echo "<td>$row[0]</td>";
                                echo "<td>$row[3]</td>";
                                echo "<td>$row[4]</td>";
                                echo "<td>$row[5]</td>";
                                echo "<td>$row[6]</td>";
                                echo "<td>$row[7]</td>";
                                echo "<td class='text-center'>".$image."</td>";
                                echo "<td>
                                    <form id='form-id' class='d-flex h-100 w-100' method='POST' action='customer/hapus.php'>
                                        <input type='hidden' name='id' id='id' value=" . $row[0] . ">
                                        <button class='btn btn-sm btn-danger shadow-sm btn-block mx-auto' onclick='javascript:confirmationDelete($(this));return false;' type='submit' id='hapus' name='hapus'><i class='fa fa-trash'></i> Hapus</button>
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