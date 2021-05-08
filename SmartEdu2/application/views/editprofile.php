<?php require 'header3.php'
?>
<div class="editprofile-content">
	<div class="container">
		<div class="row">
			<div class="col-md-offset-3 col-md-6 col-sm-offset-3 col-sm-6 col-xs-offset-2 col-xs-8">
			<div class="editprofile-form">
				<h3 id="editprofile-tittle">Edit Profile</h3>
				<form action="<?=base_url()?>index.php/smartedu/editprofile_auth" method="POST" role="form" enctype="multipart/form-data">
          <div class="form-group">
            <div id="image-preview">
              <label for="image-upload" id="image-label">Foto Profile : </label>
                <input type="file" required name="foto_profil" id="foto_buku" onchange="validate_img()" />
              </div>
          </div>
           <div class="status_img alert-danger" id="status_img"></div>
          <div id="imagePreview"></div>
          <div class="form-group">
            <label>Nama Lengkap : </label>
            <input type="text" name="nama_lengkap" class="form-control" required id="nama_lengkap">
          </div>
          <div class="form-group">
            <label>Jenis Kelamin : </label>
            <select name="jenis_kelamin" required>
              <option value="Laki-Laki">Laki-Laki</option>
              <option value="Perempuan">Perempuan</option>
            </select>
          </div>
          <div class="form-group" id="form_provinsi">
            <label for="jk" class="control-label col-sm-3">Provinsi</label>
			<?php
			$style_provinsi='class="form-control input-sm" id="provinsi_id"  required onChange="tampilKabupaten()"';
			echo form_dropdown('provinsi_id',$provinsi,'',$style_provinsi);
			?>
        </div>
        
    <div class="form-group">
            <label for="jk" class="control-label col-sm-3">Kabupaten</label>
        <?php
        $style_kabupaten='class="form-control input-sm" required id="kabupaten_id" onChange="tampilKecamatan()"';
        echo form_dropdown("kabupaten_id",array('Pilih Kabupaten'=>'- Pilih Kabupaten -'),'',$style_kabupaten);
        ?>
        </div>
        
    <div class="form-group">
            <label for="jk" class="control-label col-sm-3">Kecamatan</label>
        <?php
        $style_kecamatan='class="form-control input-sm" required id="kecamatan_id" onChange="tampilKelurahan()"';
        echo form_dropdown("kecamatan_id",array('Pilih Kecamatan'=>'- Pilih Kecamatan -'),'',$style_kecamatan);
        ?>
        </div>
        <div class="form-group">
            <label for="jk" class="control-label col-sm-3">Kelurahan</label>
        <?php
        $style_kelurahan='class="form-control required input-sm" id="kelurahan_id"';
        echo form_dropdown("kelurahan_id",array('Pilih Kelurahan'=>'- Pilih Kelurahan -'),'',$style_kelurahan);
        ?>
        </div>
          <div class="form-group">
             <input type="submit" class="btn btn-block btn-custom-green" id="btn-submitprofile" value="Submit Profile Baru" />
          </div>
          <?php if($this->session->flashdata('error_upload')) {?>
          <div class="alert-danger">Upload Buku Gagal Silahkan coba lagi</div>
          <?php }else if($this->session->flashdata('success_upload')) {?>
          <div class="alert-success">Upload Buku Sukses</div>
          <?php } else{}?>
        </form>
			</div>	
			</div>
		</div>
	</div>
</div>
<script>
function tampilKabupaten()
 {
	 kdprop = document.getElementById("provinsi_id").value;
	 $.ajax({
		 url:"<?php echo base_url();?>index.php/smartedu/pilih_kabupaten/"+kdprop+"",
		 success: function(response){
		 $("#kabupaten_id").html(response);
		 },
		 dataType:"html"
	 });
	 return false;
 }
 
 function tampilKecamatan()
 {
	 kdkab = document.getElementById("kabupaten_id").value;
	 $.ajax({
		 url:"<?php echo  base_url();?>index.php/smartedu/pilih_kecamatan/"+kdkab+"",
		 success: function(response){
		 $("#kecamatan_id").html(response);
		 },
		 dataType:"html"
	 });
	 return false;
 }
 
 function tampilKelurahan()
 {
	 kdkec = document.getElementById("kecamatan_id").value;
	 $.ajax({
		 url:"<?php echo  base_url();?>index.php/smartedu/pilih_kelurahan/"+kdkec+"",
		 success: function(response){
		 $("#kelurahan_id").html(response);
		 },
		 dataType:"html"
	 });
	 return false;
 }

</script>

<?php require 'footer.php'
?>