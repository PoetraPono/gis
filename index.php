<!DOCTYPE html>
<?php
if (isset($_GET['page']) == null) {
 header("location:index.php?page=home");
}
include 'conf.php';
$konfigurasi = new konfigurasi();
?>
<html>
<?php include 'header.php'; ?>
<body style="margin-top:10px">
 <div class="container">
 <?php
 switch ($_GET['page']) {
   case 'kelola':
    include 'input.php';
   break;
   default:
    include 'home.php';
   break;
   }
 ?>
 </div>
</body>
<?php include 'footer.php'; ?>
</html>