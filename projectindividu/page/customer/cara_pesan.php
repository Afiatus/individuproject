<?php
include"../../config.php";
session_start();
if(!isset($_SESSION['username']))
{
  header("location:../../login.php");
}
$nama = $_SESSION['nama'];
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

    <title>Jumbotron Template for Bootstrap</title>
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
<li><?php include("kat.php");?></li>

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
          <?php }} ?>

         
           <li><a href="#"><span class="glyphicon glyphicon-user" style="color:#fff;"> <?php echo $nama; ?></span></a>
                <ul>
                  <li><a href="../admin/outpage.php"><span class="glyphicon glyphicon-log-out">Keluar</span></a></li>
                </ul>
          </li>
          
          </ul>
          <div class="clear"></div>
          
          </div>
      </div>
    </nav>
    <?php
    @$page= $_GET['page'];
    if($page=="pembelian_selesai")
    {
      include("pembelian_selesai.php");
    }
    else if($page=="konfirmasi")
    {
      include("konfirmasi.php");
    }
    else{
    ?>
     <div class="jumbotron">
      <div class="row">
      <div class="col-md-4" style="margin:30px;">
     <img src="../../img/buku31.jpg">   
    </div>
      <div class="col-md-6" style="margin-left:70px; margin-top: 80px;">
        <h2><b>Selamat datang di<h1 style="color:#f97b61;">Home<b>stay.com</b></h1></h2>
        <p>disini anda bisa menyewa villa dengan mudah.</p>
      </div>
    </div>
    </div>
    <div style="margin-top:30px;width:100%,height:50px;text-align:center;background:#d74b35;color:#fff;line-height:60px;font-size:20px;margin-bottom:20px;">
Cara Pesan
</div>
		  <p><h3><b>1. Pembayaran dilakukan dalam jangka waktu 1x24 jam setelah melakukan pemesanan.<br>
          2. Pembayaran dapat dilakukan melalui transfer ke Rekening kami. Melalui  Konfirmasi Pembayaran.<br>
          3. Setelah melakukan pembayaran, konfirmasi pembayaran dikirim ke-<br>
          <br>
    <p style="color:#0000ff;">Diko Pratama,
    BNI Syariah Bandar Alim,
    No Rek 00112233</p>
    <br>
          4. Selanjutnya buku yang telah dipesan akan dikirimkan dalam waktu maksimal 7 Hari.<br>
          5.Kami mengirimkan barang dengan menggunakan jasa pengiriman barang via POST<br><br></b></p>
    <p style="color:red;">* Harga buku belum termasuk ongkos kirim, dan ongkos kirim akan disesuaikan dengan tujuan pengiriman.</p></h3>
	


      <hr>
      <?php } ?>

      
    </div> 
  <div class="footer" style="width:100%;height:50%;color:#fff;background:#d74b35;">
    
      
        <div class="copyright" style="line-height:50px;">
        <center>&copy;2018 project individu web2.</center>
        </div>
      </div>
  </body>
</html>
