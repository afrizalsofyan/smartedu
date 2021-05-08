<?php require 'header3.php'
?>
<div class="profile-content">
	<div class="container">
		<div class="row">
		<div class="col-md-offset-3 col-md-6 col-sm-offset-3 col-sm-6 col-xs-offset-2 col-xs-8">
         <div class="profile">
          <h3 class="profile-tittle">Profile Anda</h3>
          <span id="yourprofile">
            <div class="form-group">
              <label>Nama anda : <p><?php echo $data['nama_lengkap'] ?></p></label>
            </div>
            <div class="form-group">
              <label>Jenis Kelamin : <p><?php echo $data['jenis_kelamin'] ?></p></label>
            </div>
            <div class="form-group">
              <label>Provinsi : <p><?php echo $provinsi_nama ?></p></label>
            </div>
            <div class="form-group">
              <label>Kabupaten : <p><?php echo $kabupaten_nama ?></p></label>
            </div>
            <div class="form-group">
              <label>Kecamatan : <p><?php echo $kecamatan_nama ?></p></label>
            </div>
            <div class="form-group">
              <label>Kelurahan : <p><?php echo $kelurahan_nama  ?></p></label>
            </div>
          </span>
          <a href="<?=base_url()?>index.php/smartedu/editprofile_page/"><button class="btn" id="btn-editprofile" >Edit Profile</button></a>
        </div>
      </div>
    </div>
  </div>
</div>
<?php require 'footer.php'
?>