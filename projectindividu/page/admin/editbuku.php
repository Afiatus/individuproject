<link href="../../css/bootstrap.min.css" rel="stylesheet">
<?php
include"../../config.php";
$e=$_GET['id'];
$edit=mysql_query("SELECT * FROM buku WHERE id_buku='$e'");
$book = mysql_fetch_array($edit);
?>
<div style="margin-top:30px;width:100%,height:50px;text-align:center;background:#0000ff;color:#fff;line-height:60px;font-size:20px;margin-bottom:20px;">
Edit Buku
</div>
<form action="e_book.php" method="post" enctype="multipart/form-data">
 		<input type="hidden" name="id_buku" class="form-control" value =" <?php  echo $book['id_buku'];?>">
 		<b>Kategori Buku :</b><select name="kategori" class="form-control">
 			<?php
 			$d = mysql_query("SELECT * from kategori");
 			while($data = mysql_fetch_array($d)){ ?>;
 			<option> <?php echo $data['kategori']; ?> </option>
 			<?php } ?>
 		</select><br>
 		<b>Judul Buku :</b> <input type="text" name="judul" class="form-control" value =" <?php  echo $book['judul'];?>" ><br>
 		<b>Penerbit Buku :</b><input type="text" name="penerbit" class="form-control" value =" <?php  echo $book['penerbit'];?>"><br>
 		<b>Pengarang Buku : </b><input type="text" name="pengarang" class="form-control" value =" <?php  echo $book['pengarang'];?>"><br>
 		<b>Gambar Buku : </b><input type="file" name="gambar" class="form-control" value =" <?php  echo $book['gambar'];?>" ><br>
 		<b>Halaman Buku : </b><input type="text" name="halaman" class="form-control" value =" <?php  echo $book['halaman'];?>"><br>
 		<b>Harga Buku : </b><input type="text" name="harga" class="form-control" value =" <?php  echo $book['harga'];?>" ><br>
 		<b>Stok Buku : </b><input type="text" name="stok" class="form-control" value =" <?php  echo $book['stok'];?>" ><br>
 		<td><input type="submit" class="btn btn-success" value="simpan">
</form>