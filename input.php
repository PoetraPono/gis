<div class="col-md-12">
  <div class="row">
  <center><h3>Sistem Informasi Geografis</h3></center>
    <p class="alert alert-info"><strong>Kelola Data Lokasi</strong><a href="index.php?page=kelola&aksi=tambah" class="btn btn-primary"><i class="fa fa-plus"></i> Tambah</a><a href="index.php?page=home" class="btn btn-success"><i class="fa fa-arrow-left"></i> Kembali</a></p>
  </div>
  <div class="row">
   <?php 
    if ($_GET['page'] == 'kelola' && isset($_GET['hapus']) == 'true' && !empty($_GET['data']) ) {
     try {
      $delete = $konfigurasi->hapus('tabel_data','id',$_GET['data']);
      if ($delete) {
       echo "<script>alert('Data Lokasi Berhasil Dihapus');window.location.href = 'index.php?page=kelola'</script>";
      }
     }
     catch (PDOException $e) {
      echo $e->getMessage();
     }
    }
    else if ($_GET['page'] == 'kelola' && isset($_GET['aksi']) == 'tambah' && empty($_GET['data'])) {
     if (isset($_POST['simpan'])) {
      try {
       $insert = $konfigurasi->tambah('tabel_data',$_POST['latitude'],$_POST['longitude'],$_POST['keterangan'],$_POST['kategori']);
       if ($insert) {
        echo "<script>alert('Data Lokasi Berhasil Disimpan');window.location.href = 'index.php?page=kelola'</script>";
       }
      }
      catch (PDOException $e) {
       echo $e->getMessage();
      }
     }
     ?>
    <script type="text/javascript">
       function updateMarkerPosition(latLng) {
            document.getElementById('latitude').value = [latLng.lat()]
            document.getElementById('longitude').value = [latLng.lng()]
        }
        function initMap(){
       var map = new google.maps.Map(document.getElementById('maps'), {
           zoom: 14,
           center: new google.maps.LatLng(-6.7246261,108.5542099), 
           mapTypeId: google.maps.MapTypeId.ROADMAP,
           mapTypeControl: false,         zoomControl: true,
         scaleControl: false,
         streetViewControl: false,
         rotateControl: false,
         fullscreenControl: false
       });
       var latLng = new google.maps.LatLng(-6.7246261,108.5542099);
       var marker = new google.maps.Marker({
           position : latLng,
           title : 'lokasi',
           map : map,
           streetViewControl: false,
           draggable : true,
       });
       updateMarkerPosition(latLng);
       google.maps.event.addListener(marker, 'drag', function() {
           updateMarkerPosition(marker.getPosition());
       });
        }
        </script>
   <div class="col-md-12">
    <div class="panel panel-default">
    <div class="panel-body">
    <div class="col-md-6">
     <form class="form-horizontal" method="POST" action="">
      <div class="form-group">
       <div class="col-md-12">
        <input type="text" placeholder="Latitude" name="latitude" id="latitude" class="form-control">
       </div>
      </div>
      <div class="form-group">
       <div class="col-md-12">
        <input type="text" placeholder="Longitude" name="longitude" id="longitude" class="form-control">
       </div>
      </div>
      <div class="form-group">
       <div class="col-md-12">
       <textarea class="form-control" name="keterangan" rows="3"></textarea>
       </div>
     </div>
      <div class="form-group">
       <div class="col-md-12">
        <select class="form-control" name="kategori">
         <option>WISATA</option>
         <option>HOTEL</option>
         <option>KULINER</option>
        </select>
       </div>
      </div>
      <input type="submit" class="btn btn-success" name="simpan" value="SIMPAN">
      <a href="index.php?page=kelola" class="btn btn-warning">BATAL</a>
     </form>
     </div>
     <div class="col-md-6">
      <div id="maps" style="width:100%;height:300px"></div>
     </div>
    </div>
    </div>
   </div>
    <?php
   }
   else if ($_GET['page'] == 'kelola' && isset($_GET['aksi']) == 'edit' && !empty($_GET['data'])) {
   $read = $konfigurasi->tampilBerdasarkanData('tabel_data','id',$_GET['data']);
   $result = $read->fetch();
   if (isset($_POST['ubah'])) {
    try {
     $update = $konfigurasi->ubah('tabel_data' , $_POST['latitude'],$_POST['longitude'],$_POST['keterangan'],$_POST['kategori'],'id',$_GET['data']);
     if ($update) {
      echo "<script>alert('Data Lokasi Berhasil Diubah');window.location.href = 'index.php?page=kelola'</script>";
     }
    }
    catch (PDOException $e) {
     echo $e->getMessage();
    }
   }
    ?>
<script type="text/javascript">
       function updateMarkerPosition(latLng) {
            document.getElementById('latitude').value = [latLng.lat()]
            document.getElementById('longitude').value = [latLng.lng()]
        }
        function initMap(){
       var map = new google.maps.Map(document.getElementById('maps'), {
           zoom: 14,
           center: new google.maps.LatLng(<?php echo $result['latitude'];?>, <?php echo $result['longitude']; ?>),
           mapTypeId: google.maps.MapTypeId.ROADMAP,
           mapTypeControl: false,
          zoomControl: true,
         scaleControl: false,
         streetViewControl: false,
         rotateControl: false,
         fullscreenControl: false
       });
       var latLng = new google.maps.LatLng(<?php echo $result['latitude'];?>, <?php echo $result['longitude']; ?>);
       var marker = new google.maps.Marker({
           position : latLng,
           title : 'lokasi',
           map : map,
           streetViewControl: false,
           draggable : true,
       });
       updateMarkerPosition(latLng);
       google.maps.event.addListener(marker, 'drag', function() {
           updateMarkerPosition(marker.getPosition());
       });
        }
        </script>
     <div class="col-md-12">
      <div class="panel panel-default">
      <div class="panel-body">
      <div class="col-md-6">
       <form class="form-horizontal" method="POST" action="">
        <div class="form-group">
         <div class="col-md-12">
          <input type="text" placeholder="Latitude" name="latitude" id="latitude" class="form-control" value="<?php echo $result['latitude']; ?>">
         </div>
        </div>
        <div class="form-group">
         <div class="col-md-12">
          <input type="text" placeholder="Longitude" name="longitude" id="longitude" class="form-control" value="<?php echo $result['longitude']; ?>">
         </div>
        </div>
        <div class="form-group">
         <div class="col-md-12">
          <textarea class="form-control" name="keterangan" rows="3"><?php echo $result['keterangan']; ?></textarea>
         </div>
        </div>
        <div class="form-group">
         <div class="col-md-12">
          <select class="form-control" name="kategori">
          <?php
          if ($result['kategori'] == "WISATA") {
           echo "
           <option selected>WISATA</option>
           <option>HOTEL</option>
           <option>KULINER</option>
           ";
          }
          else if ($result['kategori'] == "HOTEL") {
           echo "
            <option>WISATA</option>
            <option selected>HOTEL</option>
            <option>KULINER</option>
          ";
          }
          else if ($result['kategori'] == "KULINER"){
           echo "
            <option>WISATA</option>
            <option>HOTEL</option>
            <option selected>KULINER</option>";
         }
          ?>
          </select>
         </div>
        </div>
        <input type="submit" class="btn btn-success" name="ubah" value="UBAH">
        <a href="index.php?page=kelola" class="btn btn-warning">BATAL</a>
       </form>
       </div>
       <div class="col-md-6">
        <div id="maps" style="width:100%;height:300px"></div>
       </div>
       </div>
     </div>
    </div>
      <?php
     }
    ?>
     <table id="table" class="table table-responsive table-bordered table-striped">
      <thead>
       <th width="5%">No</th>
       <th width="15%">Latitude</th>
       <th width="15%">Longitude</th>
       <th width="10%">Kategori</th>
       <th>Keterangan</th>
       <th width="5%">Ubah</th>
       <th width="5%">Hapus</th>
      </thead>
          <tbody>
          <?php
          $read = $konfigurasi->tampil('tabel_data','id');
          $no = 1;
          while ($result = $read->fetch()) {
            ?>
            <tr>
                <td><?php echo $no++; ?></td>
                <td><?php  echo $result['latitude'];?></td>
                <td><?php  echo $result['longitude'];?></td>
                <td><?php  echo $result['kategori'];?></td>
                <td><?php  echo $result['keterangan'];?></td>
                <td><a href="index.php?page=kelola&aksi=edit&data=<?php echo $result['id']; ?>" class="btn btn-info"><i class='fa fa-edit'></i></a></td>
				<td><a href="index.php?page=kelola&hapus=true&data=<?php echo $result['id']; ?>" class="btn btn-danger"><i class='fa fa-remove'></i></a></td>
             </tr>
                <?php
              }
            ?>
          </tbody>
        </table>
      </div>
</div>