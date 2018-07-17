<?php
include"../../config.php";
$id_pembeli = $_SESSION['id_pembeli'];
$qry = mysql_query("SELECT * from keranjang where id_pembeli='$id_pembeli'");
@$aksi = $_GET['aksi'];
if($aksi=="hapus"){
	$id_keranjang = $_GET['id'];
	$query_qty = mysql_query("SELECT * from keranjang where id_keranjang='$id_keranjang'");
	$data_qty = mysql_fetch_array($query_qty);
	$qty = $data_qty['qty'];
	$id_buku = $data_qty['id_buku'];
	$query_buku = mysql_query("SELECT * from buku where id_buku='$id_buku'");
	$data_buku = mysql_fetch_array($query_buku);
	$stok = $data_buku['stok'];
	$stok_ubah = $stok+$qty;
	mysql_query("UPDATE buku set stok='$stok_ubah' where id_buku='$id_buku'");
	mysql_query("DELETE from keranjang where id_keranjang='$id_keranjang'");
	header("location:detail.php?page=keranjang");
}
?>
<div class="jumbotron">
<table class="table table-bordered">
	<th>Kode Villa</th><th>Total Bayar</th><th>Aksi</th>
	<?php while($keranjang=mysql_fetch_array($qry)){?>
		<tr>
		<td><?php
		$q = mysql_query("SELECT * from buku where id_buku='$keranjang[id_buku]'");
		$d = mysql_fetch_array($q);
		$judul = $d['judul']; echo $judul;
		$qbyar = mysql_fetch_array(mysql_query("SELECT SUM(total_harga) as total_bayar from keranjang where id_pembeli='$id_pembeli'"));
		$bayar = $qbyar['total_bayar'];
		?></td>
		<td><?php echo $keranjang['harga'] ?></td>
		<td><center><a href="detail.php?aksi=checkout" class="btn btn-info">checkout</a></center></td>
		</tr>
<?php } ?>

</table>
</div>