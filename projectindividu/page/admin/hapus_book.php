<?php
include('../../config.php');
$bk=$_GET['id'];
mysql_query("DELETE FROM buku WHERE id_buku='$bk'");
header("location:index.php?page=buku");
 ?>