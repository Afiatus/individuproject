<?php
include"../../config.php";
@$kd = $_GET['id'];
$qry = mysql_query("SELECT * from buku where id_buku='$kd'");
$data = mysql_fetch_array($qry);
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

    <title>Sewa Villa</title>
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
          <?php } }?>
          
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
@$aksi = $_GET['aksi'];
$tanggal = date("d-m-Y");
if($aksi=="checkout")
{?>
   <div class="jumbotron" style="margin-top:50px">
      <div class="row">
      <div class="col-md-5">
     <img src="../../img/vil.jpg"  style="width:300px;height:300px;">   
    </div>
      <div class="col-md-6" style=" margin-top: 50px;">
        <h2><b>Selamat datang di<h1 style="color:#f97b61;">Home<b>stay.com</b></h1></h2>
        <p>disini anda memesan villa dengan mudah.</p>
      </div>
    </div>
    </div>
  <div style="margin-top: 30px; width:100%,height:50px;text-align:center;background:#d74b35;color:#fff;line-height:60px;font-size:20px;">
<b>Checkout</b>
</div><br>
<form action="proses_chekout.php" method="post">
<label>Nama Penyewa</label>
<input type="text" name="nama" placeholder="Nama Anda" class="form-control">
<label>Alamat Lengkap</label>
<input type="text" name="alamat" placeholder="jalan/Dusun/Desa/Kecamatan/Kabupaten/Provinsi/kode pos" class="form-control"><br>
<label>Nomor Telepon</label>
<input type="text" name="nomor_tlp" placeholder="Nomor Telepon Anda" class="form-control"><br>
<label>Tanggal sewa</label>
<input type="text" name="tanggal"  class="form-control" placeholder="Hari/Bulan/Tahun">
<input type="submit" class="btn btn-info" value="selesai">
</form> 
 <?php }else{
    @$page = $_GET['page'];
    if($page=="keranjang"){
      include("keranjang.php");
    }
    else if($page==""){
    ?>
    <div class="jumbotron">
      <div class="row">
      <div class="col-md-3" style="margin:30px;">
     <img src="../../gambar/<?php echo $data['gambar']; ?>" style="width:250px; height:250px;">   
    </div>
      <div class="col-md-6" style="margin-left:10px ; margin-top:10px;">
        <table>
          <tr>
            <h3><td><b>Kode</b></td>   <td>: <?php echo $data['judul']; ?></td></h3>
          </tr>

          <tr>
            <h3><td><b>Lokasi</b></td>    <td>: <?php echo $data['penerbit']; ?></td></h3>
          </tr>

          <tr>
            <h3><td><b>Luas Bangunan</b></td>   <td>: <?php echo $data['pengarang']; ?></td></h3>
          </tr>

          <tr>
            <h3><td><b>Jumlah Lantai</b></td>   <td>: <?php echo $data['halaman']; ?></td></h3>
          </tr>

          <tr>
            <h3><td><b>Harga/malam</b></td>   <td>: <?php echo $data['harga']; ?></td></h3>
          </tr>

          <tr>
            <h3><td><b>Jumlah Kamar</b></td>    <td>: <?php echo $data['stok']; ?></td></h3>
          </tr>
        </table><br><br>
        <form action="tambah_keranjang.php" method="post">

         
              <input type="hidden" name='harga' value="<?php echo $data['harga'];?>">
              <input type="hidden" name='id_buku' value="<?php echo $data['id_buku'];?>">
              <?php if($data['stok']==0){ ?>
                 <a href="#" class="btn btn-danger">Tidak dapat membeli</a>
                <?php }
                else{?>
         <button type="submit" class="btn btn-success">Pesan</button>
         <?php } ?>
         </form>
        </div>
    </div>
    </div>
<?php } ?>
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
        <center><img src="../../gambar/<?php echo $buku['gambar'] ?>" style="margin-top:20px; width:200px;height:190px;"></center>
         <h3 style="text-align:center; color:#f97b61;"><?php echo $buku['judul'] ?></h3>
          <center><b>Harga</b> Rp.<?php echo $buku['harga']; ?></center> 
          <center><b>Stok</b> (<?php echo $buku['stok']; ?>)</center>
          <center><a class="btn btn-danger" href="detail.php?id=<?php echo $buku['id_buku'] ?>" role="button" style="margin-top:10px;">View details &raquo;</a></center>
         </div>
        </div>

        <?php } }?>
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
