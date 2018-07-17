<?php
include"../../config.php";
$id = $_GET['id'];
$q = mysql_query("SELECT * FROM keranjang where id_pembeli='$id'");
$d_bayar = mysql_fetch_array(mysql_query("SELECT SUM(total_harga) as total_bayar from keranjang where id_pembeli='$id'"));
$bayar = $d_bayar['total_bayar'];
$total_bayar = $bayar+20000;
?>
<div style="margin-top:30px;width:100%,height:50px;text-align:center;background:#0000ff;color:#fff;line-height:60px;font-size:20px;margin-bottom:20px;">
<b>Detail Penyewaan</b>
</div>
<table class="table table-bordered">
		<th style=" background: #E6E6FA; "><center>Kode Villa</center></th>
 
 		<th style=" background: #E6E6FA; ""><center>Total Bayar</center></th>
	<?php while($c=mysql_fetch_array($q)){?>
	<tr>
		<td><center><?php $data=mysql_fetch_array(mysql_query("SELECT * from buku where id_buku='$c[id_buku]'"));$nama=$data['judul']; echo $nama; ?></center></td>
 		
 		<td><center><?php echo $total_bayar; ?></center></td>
 	
	</tr>
	<?php } ?>
</table>