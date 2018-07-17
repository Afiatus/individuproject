<?php
include"../../config.php";
session_start();
if(!isset($_SESSION['username']))
{
  header("location:../../login.php");
}
$nama = $_SESSION['nama'];
@$pesan = $_GET['pesan'];
if($pesan=="blok")
{
  echo"<script type='text/javascript'>alert('anda tidak dapat memesan dikarenakan anda belum membayar / belum di konfirmasi oleh admin');</script>";
}
else if($pesan=="suwon")
{
  echo"<script type='text/javascript'>alert('terima kasih telah melakukan konfirmasi :-)');</script>";
}
else if($pesan=="sudah konfirmasi")
{
  echo"<script type='text/javascript'>alert('anda sudah konfirmasi');</script>";
}
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

    <title>Homestay.com page Customer</title>
    <link href="../../css/bootstrap.min.css" rel="stylesheet">
    <link href="../../css/style.css" rel="stylesheet">
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
<li><?php include("../../kat.php");?></li>

</ul>
</li>
          
         


          <?php
          $q_cek_cekout = mysql_query("SELECT * from chekout where id_pembeli='$_SESSION[id_pembeli]'");
          $cek_cekout = mysql_num_rows($q_cek_cekout);
          if($cek_cekout>=1){
          $queri_cek = mysql_query("SELECT * from chekout where id_pembeli='$_SESSION[id_pembeli]' && status_terima='sudah diterima'");
          $cek = mysql_num_rows($queri_cek);
          if($cek>=1)
          {?>
          <li><a href="index.php?pesan=sudah konfirmasi"><span class="glyphicon glyphicon-check" style="color:#fff;"> Konfirmasi | </span></a></li><?php
          }else{
          ?>
          <li><a href="cara_pesan.php?page=konfirmasi"><span class="glyphicon glyphicon-check" style="color:#fff;"> Konfirmasi | </span></a></li>
          <?php } }?>




          <li><a href="#"><span class="glyphicon glyphicon-user" style="color:#fff;"> <?php echo $nama; ?></span></a>
<ul>
<li><a href="../admin/outpage.php"><span class="glyphicon glyphicon-log-out">Keluar</span></a></li>
</ul>
          </li>
          
          <div class="clear"></div>
          
          </div>
      </div>
    </nav>
    <div class="jumbotron">
      <div class="row">
      <div class="col-md-4" style="margin:30px;">
     <img src="../../img/logo2.png">   
    </div>
      <div class="col-md-6" style="margin-left:70px; margin-top: 80px;">
        <h2><b>Selamat datang di<h1 style="color:#f97b61;">Home<b>stay.com</b></h1></h2>
        <p>disini anda bisa mememesan villa dengan mudah.</p>
      </div>
    </div>
    </div>
<div style="margin-top: -30px; width:100%,height:50px;text-align:center;background:#d74b35;color:#fff;line-height:60px;font-size:20px;">
<b>List Villa</b>
</div>
    <div class="container">
      <div class="row">
     <?php
      @$idkat = $_GET['id'] ;
      $qrybukukat = mysql_query("SELECT * from buku where id_ketegori='$idkat'");
      $qrybuku= mysql_query("SELECT * from buku");
      if($idkat==0){
      while($buku = mysql_fetch_array($qrybuku)) {
      ?>
      
        <div class="col-md-3" style="margin-top:20px;">
        <div class="buku">
          <center><img src="../../gambar/<?php echo $buku['gambar'] ?>" style="width:180px;height:190px; margin-top:20px;"></center>
          <h3 style="text-align:center; color:#f97b61;"><?php echo $buku['judul'] ?></h3>
          <center><b>Harga</b> Rp.<?php echo $buku['harga']; ?></center> 
          <center><b>Jumlah Kamar</b> (<?php echo $buku['stok']; ?>)</center>
          <center><a class="btn btn-danger" href="detail.php?id=<?php echo $buku['id_buku'] ?>" role="button" style="margin-top:10px;">View details &raquo;</a></center>
         </div>
        </div>
        <?php } }
        else{ while($buku1 = mysql_fetch_array($qrybukukat)){?>
            <div class="col-md-3" style="margin-top:20px;">
        <div class="buku">
          <center><img src="../../gambar/<?php echo $buku1['gambar'] ?>" style="margin-top:20px;width:210px;height:190px;"></center>
        <h3 style="text-align:center; color:#f97b61; "><?php echo $buku1['judul'] ?></h3>
          <center><b>Harga</b> Rp.<?php echo $buku1['harga']; ?></center> 
          <center><b>Stok</b> (<?php echo $buku1['stok']; ?>)</center>
          <center><a class="btn btn-danger" href="detail.php?id=<?php echo $buku1['id_buku'] ?>" role="button" style="margin-top:10px;">View details &raquo;</a></center>
         </div>
        </div>
          <?php }} ?>
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