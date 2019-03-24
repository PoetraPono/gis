<?php
include 'conf.php';
$konfigurasi = new konfigurasi();
$getData = $konfigurasi->getXMLData('tabel_data');
header("Content-type: text/xml");
try {
echo "<markers>";
    while ($result = $getData->fetch(PDO::FETCH_OBJ)) {
    if ($getData->rowCount() < 1) {
     echo "<marker Data Kosong />";
    }
    else {
     echo "<marker ";
     echo "a='" . $result->id. "' ";
     echo "b='" . $result->latitude. "' ";
     echo "c='" . $result->longitude. "' ";
     echo "d='" . $result->keterangan. "' ";
     echo "e='" . $result->kategori. "' ";
     echo "/>";
    }
   }
  echo "</markers>";
}
catch (PDOException $e) {
   echo $e->getMessage();
}


?>
