<?php
include"../../config.php";
$no = 1;
$qry_buku = mysql_query("SELECT * from buku");
?>
<div style="margin-top:30px;width:100%,height:50px;text-align:center;background:#0000ff;color:#fff;line-height:60px;font-size:20px;">
<b>Data Villa</b>
</div>
<a href="index.php?page=input_buku" class="btn btn-success" style="margin-top:20px;"><span class="glyphicon glyphicon-plus"> TAMBAH VILLA</span></a>
<?php
@$aksi = $_GET['aksi'];
if($aksi=="input")
{
	include("input_buku.php");
}
?>
<div class="th">
<table class="table table-bordered" style="margin-top:20px;">
 
	<th style=" background: #E6E6FA;"><center>No</center></th>
	<th style=" background: #E6E6FA;"><center>Kode</center></th>
	<th style=" background: #E6E6FA;"><center>Lokasi</center></th>
	<th style=" background: #E6E6FA;"><center>Luas Bangunan</center></th>
	<th style=" background: #E6E6FA;"><center>Gambar</center></th>
	<th style=" background: #E6E6FA;"><center>Jumlah Lantai</center></th>
	<th style=" background: #E6E6FA;"><center>Harga/malam</center></th>
	<th style=" background: #E6E6FA;"><center>Jumlah Kamar</center></th>
	<th style=" background: #E6E6FA;"><center>aksi</center></th>
	<?php while($data = mysql_fetch_array($qry_buku)) { ?>
	<tr>
	 <td><?php echo $no++ ?></td>
	 <td><?php echo $data['judul'] ?></td>
	 <td><?php echo $data['penerbit'] ?></td>
	 <td><?php echo $data['pengarang'] ?></td>
	 <td><center><img src="../../gambar/<?php echo $data['gambar'] ?>" style="width:100px;"></center></td>
	 <td><?php echo $data['halaman'] ?></td>
	 <td>Rp.<?php echo number_format($data['harga']); ?>,-</td>
	 <td><?php echo $data['stok'] ?></td>
	 <td><a href="index.php?page=editbuku&id=<?php echo $data['id_buku']; ?>"><center><span class="glyphicon glyphicon-pencil"></span></a> || <a href="hapus_book.php?id=<?php echo $data['id_buku']; ?>"><span class="glyphicon glyphicon-trash"></span></center></a></td>
	</tr>
	<?php } ?>
</table>
</div>