<?php
include_once 'session-check.php';
$_SESSION["visited_page2"] = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";

//View Produk
$sql = "SELECT tb_order.order_id , tb_order.customer_id , tb_order.order_date , GROUP_CONCAT( CONCAT_WS(' ', '<li>',tb_produk.product_name, '<b class=text-danger>×', tb_order_item.order_item_quantity, '</b>') SEPARATOR '<br>' )  AS product , tb_payment_method.payment_method_name , tb_payments.payment_amount , tb_order.order_bukti
        FROM tb_order
        LEFT OUTER JOIN tb_order_item
        ON tb_order.order_id = tb_order_item.order_id
        LEFT OUTER JOIN tb_payments
        ON tb_order.order_id = tb_payments.order_id
        LEFT OUTER JOIN tb_produk
        ON tb_produk.product_id = tb_order_item.product_id
        LEFT OUTER JOIN tb_payment_method
        ON tb_payment_method.payment_method_id  = tb_payments.payment_method_id 
        WHERE tb_order.order_status = 'Pesanan Menunggu Pembayaran'
        GROUP BY tb_order.order_id";
$result = mysqli_query($db, $sql);
?>

<!-- Card -->
<div class="col-xl-3 col-md-6 mb-4">
    <div class="card border-left-primary shadow h-100 py-2">
        <div class="card-body">
            <div class="row no-gutters align-items-center">
                <div class="col mr-2">
                    <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                        Pendapatan (Bulan ini)</div>
                    <div class="h5 mb-0 font-weight-bold text-gray-800">Rp
                        <?php
                        $query2 = "SELECT SUM(tb_payments.payment_amount) 
                                    FROM tb_payments
                                    LEFT OUTER JOIN tb_order
                                    ON tb_order.order_id = tb_payments.order_id
                                    WHERE MONTH(tb_order.order_date) = MONTH(CURRENT_TIMESTAMP) AND (tb_order.order_status = 'Pesanan Diproses' OR tb_order.order_status = 'Pesanan Selesai')";
                        $sql2 = mysqli_query($db, $query2);
                        $row2 = mysqli_fetch_array($sql2);
                        echo number_format($row2['SUM(tb_payments.payment_amount)'], 0, ",", ".");
                        ?>
                    </div>
                </div>
                <div class="col-auto">
                    <i class="fa fa-calendar fa-2x text-gray-300"></i>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Card -->
<div class="col-xl-3 col-md-6 mb-4">
    <div class="card border-left-success shadow h-100 py-2">
        <div class="card-body">
            <div class="row no-gutters align-items-center">
                <div class="col mr-2">
                    <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                        Pendapatan (Tahun ini)</div>
                    <div class="h5 mb-0 font-weight-bold text-gray-800">Rp
                        <?php
                        $query2 = "SELECT SUM(tb_payments.payment_amount) 
                                    FROM tb_payments
                                    LEFT OUTER JOIN tb_order
                                    ON tb_order.order_id = tb_payments.order_id
                                    WHERE YEAR(tb_order.order_date) = YEAR(CURRENT_TIMESTAMP) AND (tb_order.order_status = 'Pesanan Diproses' OR tb_order.order_status = 'Pesanan Selesai')";
                        $sql2 = mysqli_query($db, $query2);
                        $row2 = mysqli_fetch_array($sql2);
                        echo number_format($row2['SUM(tb_payments.payment_amount)'], 0, ",", ".");
                        ?>
                    </div>
                </div>
                <div class="col-auto">
                    <i class="fa fa-dollar fa-2x text-gray-300"></i>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Card -->
<div class="col-xl-3 col-md-6 mb-4">
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

<!-- Pending Requests Card -->
<div class="col-xl-3 col-md-6 mb-4">
    <div class="card border-left-warning shadow h-100 py-2">
        <div class="card-body">
            <div class="row no-gutters align-items-center">
                <div class="col mr-2">
                    <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                        Pesanan Menunggu Persetujuan </div>
                    <div class="h5 mb-0 font-weight-bold text-gray-800">
                        <?php
                        $query4 = "SELECT COUNT(*) FROM tb_order WHERE order_status = 'Pesanan Menunggu Pembayaran'";
                        $sql4 = mysqli_query($db, $query4);
                        $row4 = mysqli_fetch_array($sql4);
                        echo $row4['COUNT(*)'];
                        ?> Pesanan
                    </div>
                </div>
                <div class="col-auto">
                    <i class="fa fa-list-ol fa-2x text-gray-300"></i>
                </div>
            </div>
        </div>
    </div>
</div>
</div>

<!-- DataTales -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Persetujuan Pesanan</h6>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th style="width: 5%;">ID Order</th>
                        <th style="width: 5%;">ID Customer</th>
                        <th style="width: 10%; min-width: 100px;">Tanggal Order</th>
                        <th style="width: 40%; min-width: 280px;">Nama Barang</th>
                        <th style="width: 10%;">Metode Pembayaran</th>
                        <th style="width: 10%;">Jumlah Pembayaran</th>
                        <th style="width: 10%;">Bukti Pembayaran</th>
                        <th style="width: 10%; min-width: 80px;">Aksi</th>
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <th>ID Order</th>
                        <th>ID Customer</th>
                        <th>Tanggal Order</th>
                        <th>Nama Barang</th>
                        <th>Metode Pembayaran</th>
                        <th>Jumlah Pembayaran</th>
                        <th>Bukti Pembayaran</th>
                        <th>Aksi</th>
                    </tr>
                </tfoot>
                <tbody>
                    <?php
                    while ($row = mysqli_fetch_array($result)) {
                        if (!empty($row[6])) {
                            $image = "<img src=" . "../" . $row[6] . " class='zoomD'>";
                        } else {
                            $image = '';
                        }
                        echo "<tr>";
                        echo "<td>$row[0]</td>";
                        echo "<td>$row[1]</td>";
                        echo "<td>$row[2]</td>";
                        echo "<td><ul>$row[3]</ul></td>";
                        echo "<td>$row[4]</td>";
                        echo "<td>$row[5]</td>";
                        echo "<td class='text-center'>" . $image . "</td>";
                        echo "<td>
                            <div class='d-flex w-100 list-group'>
                                <form class='d-flex h-100 w-100 ' method='POST' action='transaksi/proses.php'>
                                    <input type='hidden' name='id' id='id' value=" . "'" .  $row[0] . "'" . ">
                                    <button class='btn btn-sm btn-primary shadow-sm mx-auto btn-block px-3' onclick='javascript:confirmationProses($(this));return false;' type='submit' id='proses' name='proses'><i class='fa fa-spinner'></i> Proses</button>
                                </form>
                                <form id='form-id' class='d-flex h-100 w-100 mt-2' method='POST' action='transaksi/proses.php'>
                                    <input type='hidden' name='id' id='id' value=" . $row[0] . ">
                                    <button class='btn btn-sm btn-danger shadow-sm mx-auto btn-block' onclick='javascript:confirmationTolak($(this));return false;' type='submit' id='tolak' name='tolak'><i class='fa fa-times'></i> Tolak</button>
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

<script>
    function confirmationTolak() {
        var conf = confirm('Apakah Anda yakin ingin Menolak Pesanan ini?');
        if (conf)
            document.getElementById('form-id').submitObject.value = "tolak";
    }

    function confirmationBatal() {
        var conf = confirm('Apakah Anda yakin ingin Membatalkan Pesanan ini?');
        if (conf)
            document.getElementById('form-id').submitObject.value = "batal";
    }

    function confirmationProses() {
        var conf = confirm('Apakah Anda yakin ingin Memproses Pesanan ini?');
        if (conf)
            document.getElementById('form-id').submitObject.value = "proses";
    }

    function confirmationSelesai() {
        var conf = confirm('Apakah Anda yakin ingin Menyelesaikan Pesanan ini?');
        if (conf)
            document.getElementById('form-id').submitObject.value = "selesai";
    }
</script>