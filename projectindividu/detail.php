<?php
include"config.php";
$id = $_GET['id'];
$qry = mysql_query("SELECT * from buku where id_buku='$id'");
$data = mysql_fetch_array($qry);
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../favicon.ico">

    <title>Homestay</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
  </head>

  <body>

    <nav class="navbar navbar-default navbar-fixed-top" style="background:#d74b35;">
      <div class="container-fluid">
        <div class="navbar-header">
          
        <a class="navbar-brand" href="#"></a>
        </div>
        <div class="collapse navbar-collapse">


        <div class="nav navbar-nav navbar-right">
         <ul id="nav">
          <li ><a href="index.php" style="color:#fff;"><span class="glyphicon glyphicon-home"> Home | </span></a></li>

          <li><a href="" style="color:#fff;" ><span class="glyphicon glyphicon-list"> Kategori | </span></a>
<ul>
<li><?php include("kat.php");?></li>

</ul>
</li>
          
          <li class="a"><a href="login.php" style="color:#fff;"><span class="glyphicon glyphicon-log-in"> Login</span></a></li>
          </ul>
          <div class="clear"></div>
          
          </div>
      </div>
    </nav>
    <div class="jumbotron">
      <div class="row">
      <div class="col-md-3" style="margin:30px;">
     <img src="gambar/<?php echo $data['gambar']; ?>" style="width:250px; height:250px;">   
    </div>
      <div class="col-md-6" style="margin-left:10px ; margin-top:10px;">
        <table>
        	<tr>
        		<h3><td><b>Kode</b></td>		<td>: <?php echo $data['judul']; ?></td></h3>
        	</tr>

        	<tr>
        		<h3><td><b>Lokasi</b></td>		<td>: <?php echo $data['penerbit']; ?></td></h3>
        	</tr>

        	<tr>
        		<h3><td><b>Luas Bangunan</b></td>		<td>: <?php echo $data['pengarang']; ?></td></h3>
        	</tr>

        	<tr>
        		<h3><td><b>Jumlah Lantai</b></td>		<td>: <?php echo $data['halaman']; ?></td></h3>
        	</tr>

        	<tr>
        		<h3><td><b>Harga/malam</b></td>		<td>: <?php echo $data['harga']; ?></td></h3>
        	</tr>

        	<tr>
        		<h3><td><b>Jumlah Kamar</b></td>		<td>: <?php echo $data['stok']; ?></td></h3>
        	</tr>
        </table><br><br>
    
         <a href="login.php?pesan=a" class="btn btn-success">Pesan</a>
        </div>
    </div>
    </div>

    <div style="margin-top: -30px; width:100%,height:50px;text-align:center;background:#d74b35;color:#fff;line-height:60px;font-size:20px;">
<b>List Villa</b>
</div>
<div class="container">
      <div class="row">
      <?php
      $qrybuku= mysql_query("SELECT * from buku");
      while($buku = mysql_fetch_array($qrybuku)) {
      ?>

      <div class="col-md-3" style="margin-top:20px;">
        <div class="buku">
        <center><img src="gambar/<?php echo $buku['gambar'] ?>" style="margin-top:20px; width:210px;height:190px;"></center>
         <h3 style="text-align:center; color:#f97b61;"><?php echo $buku['judul'] ?></h3>
          <center><b>Harga</b> Rp.<?php echo $buku['harga']; ?></center> 
          <center><b>Stok</b> (<?php echo $buku['stok']; ?>)</center>
          <center><a class="btn btn-danger" href="detail.php?id=<?php echo $buku['id_buku'] ?>" role="button" style="margin-top:10px;">View details &raquo;</a></center>
         </div>
        </div>

        <?php } ?>
      </div>

      <hr>

      
    </div> 
   <div class="footer" style="width:100%;height:50px;color:#fff;background:#d74b35;">
      
        <div class="copyright" style="line-height:50px;">
        <center>&copy; 2018 project individu web2.</center>
        </div>
      </div>
  </body>
</html>