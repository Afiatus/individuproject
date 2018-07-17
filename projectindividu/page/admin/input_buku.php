<?php
$qry_kategori = mysql_query("SELECT * from kategori");

	?>
	<div style="margin-top:30px;width:100%,height:50px;text-align:center;background:#0000ff;color:#fff;line-height:60px;font-size:20px;">
Tambah Villa
</div>
<form method="post" class="form-group" action="tambah_buku.php" enctype="multipart/form-data" style="margin-top:20px;">
	<select name="kat" class="form-control">
	<?php 
	while($kategori=mysql_fetch_array($qry_kategori)){
	?>
			<option><?php echo $kategori['kategori']; ?></option>
			<?php } ?>
	</select><br>
	<input type="text" name="judul" placeholder="Kode" class="form-control"><br>
	<input type="text" name="penerbit" placeholder="Lokasi" class="form-control"><br>
	<input type="text" name="pengarang" placeholder="Luas Bangunan" class="form-control"><br>
	<input type="file" name="gambar" placeholder="Gambar Villa" class="form-control"><br>
	<input type="text" name="halaman" placeholder="Jumlah Lantai" class="form-control"><br>
	<input type="text" name="harga" placeholder="Harga Villa" class="form-control"><br>
	<input type="text" name="stok" placeholder="Jumlah Kamar" class="form-control"><br>
	<input type="submit" name="simpan" value="simpan" class="btn btn-success"><br>
	</form>