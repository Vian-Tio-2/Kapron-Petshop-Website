<?php
include_once('session-check.php');
$_SESSION["visited_page2"] = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";

//View Produk
$sql = "SELECT tb_order.order_id , tb_order.customer_id , tb_order.order_date , GROUP_CONCAT( CONCAT_WS(' ', '<li>',tb_produk.product_name, '<b class=text-danger>×', tb_order_item.order_item_quantity, '</b>') SEPARATOR '<br>' )  AS product , tb_payment_method.payment_method_name , tb_payments.payment_amount , tb_order.order_status , tb_order.order_bukti
        FROM tb_order
        LEFT OUTER JOIN tb_order_item
        ON tb_order.order_id = tb_order_item.order_id
        LEFT OUTER JOIN tb_payments
        ON tb_order.order_id = tb_payments.order_id
        LEFT OUTER JOIN tb_produk
        ON tb_produk.product_id = tb_order_item.product_id
        LEFT OUTER JOIN tb_payment_method
        ON tb_payment_method.payment_method_id  = tb_payments.payment_method_id 
        WHERE tb_order.order_status = 'Pesanan Diproses'
        GROUP BY tb_order.order_id";
$result = mysqli_query($db, $sql);
?>
<!-- DataTales -->
<div class="w-100 card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Kelola Data Transaksi Yang Sedang Diproses</h6>
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th style="width: 5%;">ID Order</th>
                        <th style="width: 5%;">ID Customer</th>
                        <th style="width: 10%; min-width: 100px;">Tanggal Order</th>
                        <th style="width: 30%; min-width: 200px;">Nama Barang</th>
                        <th style="width: 10%;">Metode Pembayaran</th>
                        <th style="width: 10%;">Jumlah Pembayaran</th>
                        <th style="width: 10%;">Status</th>
                        <th style="width: 10%;">Bukti Pembayaran</th>
                        <th style="width: 10%;">Aksi</th>
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
                        <th>Status</th>
                        <th>Bukti Pembayaran</th>
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
                        echo "<td>$row[1]</td>";
                        echo "<td>$row[2]</td>";
                        echo "<td><ul>$row[3]</ul></td>";
                        echo "<td>$row[4]</td>";
                        echo "<td>$row[5]</td>";
                        echo "<td class='text-info'>$row[6]</td>";
                        echo "<td class='text-center font-weight-bold'>" . $image . "</td>";
                        echo "<td>
                            <div class='d-flex w-100 list-group'>
                                <form class='d-flex h-100 w-100 ' method='POST' action='transaksi/proses.php'>
                                    <input type='hidden' name='id' id='id' value=" . "'" .  $row[0] . "'" . ">
                                    <button class='btn btn-sm btn-success shadow-sm mx-auto btn-block px-3' onclick='javascript:confirmationSelesai($(this));return false;' type='submit' id='selesai' name='selesai'><i class='fa fa-check'></i> Selesai</button>
                                </form>
                                <form id='form-id' class='d-flex h-100 w-100 mt-2' method='POST' action='transaksi/proses.php'>
                                    <input type='hidden' name='id' id='id' value=" . $row[0] . ">
                                    <button class='btn btn-sm btn-danger shadow-sm mx-auto btn-block' onclick='javascript:confirmationBatal($(this));return false;' type='submit' id='batal' name='batal'><i class='fa fa-times'></i> Batalkan</button>
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