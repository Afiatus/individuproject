<div style="margin-top: 30px; width:100%,height:50px;text-align:center;background:#d74b35;color:#fff;line-height:60px;font-size:20px;">
<b>Konfirmasi Pesanan</b>
</div>
<?php
$id_pembeli = $_SESSION['id_pembeli'];
$query_checkout = mysql_query("SELECT * from  chekout where id_pembeli='$id_pembeli'");
$data_chekout = mysql_fetch_array($query_checkout);
?>
<h3><b>Data Penyewa :</b></h3>
<table>
	<tr>
		<td><p><b>Nama</b></p></td>  	<td>: <?php echo $data_chekout['nama']; ?></td>
	</tr>

	<tr>
		<td><p><b>Alamat</b></p></td>	<td>: <?php echo $data_chekout['alamat']; ?></td>
	</tr>

	<tr>
		<td><p><b>Nomor Telepon</b></p></td>	<td>: <?php echo $data_chekout['nomor_tlp']; ?></td>
	</tr>
</table>

<h3><b>Data Villa yang disewa</b></h3>
<?php
$qry = mysql_query("SELECT * from keranjang where id_pembeli='$id_pembeli'");
?>
<div class="jumbotron">
<table class="table table-bordered">
	<th>Kode Villa</th><th>Total Bayar</th>
	<?php while($keranjang=mysql_fetch_array($qry)){?>
		<tr>
		<td><?php
		$q = mysql_query("SELECT * from buku where id_buku='$keranjang[id_buku]'");
		$d = mysql_fetch_array($q);
		$judul = $d['judul']; echo $judul;
		$qbyar = mysql_fetch_array(mysql_query("SELECT SUM(total_harga) as total_bayar from keranjang where id_pembeli='$id_pembeli'"));
		$bayar = $qbyar['total_bayar'];
		?>
			
		</td>
		<td><?php echo $keranjang['harga'] ?></td>
		
		</tr>
<?php } ?>

</table>
<p>Silahkan konfirmasi penyewaan villa<a href="konfirmasi_terima.php?id=<?php echo $id_pembeli; ?>" class="btn btn-info">Konfirmasi</a></p>
</div>