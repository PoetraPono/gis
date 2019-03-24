<?php
/**
* Dibuat Oleh Hady Eka Saputra || www.java-sc.com
*/
class konfigurasi {
   public function __construct() {
    try {
     $host = "localhost";
     $db = "danang";
     $user = "root";
     $pass = "";
     $this->db = new PDO('mysql:host='.$host.';dbname='.$db.'',''.$user.'',''.$pass.'');
     $this->db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
     // echo "Berhasil terkoneksi !";
    }
    catch (PDOException $e) {
     echo $e->getMessage();
    }
   }
public function getXMLData($tabel){
   $getXMLData = $this->db->prepare("SELECT * FROM $tabel");
   $getXMLData->execute();
   return $getXMLData;
}
public function tampil($tabel , $id){
   $tampil = $this->db->prepare("SELECT * FROM $tabel ORDER BY $id DESC");
   $tampil->execute();
   return $tampil;
}
public function tampilBerdasarkanData($tabel , $kondisi ,$id){
   $tampil = $this->db->prepare("SELECT * FROM $tabel WHERE $kondisi='$id'");
   $tampil->execute();
   return $tampil;
}
public function tambah($tabel , $latitude,$longitude,$keterangan,$kategori){
   $tambah = $this->db->prepare("INSERT INTO $tabel (id, latitude, longitude, keterangan, kategori) VALUES (NULL,'$latitude','$longitude','$keterangan','$kategori') ");
   $tambah->execute();
   return $tambah;
}
public function ubah($tabel , $latitude,$longitude,$keterangan,$kategori,$kondisi,$nilai){
   $ubah = $this->db->prepare("UPDATE $tabel SET latitude='$latitude', longitude='$longitude', keterangan='$keterangan', kategori='$kategori' WHERE $kondisi='$nilai'");
   $ubah->execute();
   return $ubah;
}
public function hapus($tabel , $kondisi,$nilai){
   $hapus = $this->db->prepare("DELETE FROM $tabel WHERE $kondisi='$nilai'");
   $hapus->execute();
   return $hapus;
}
}


?>