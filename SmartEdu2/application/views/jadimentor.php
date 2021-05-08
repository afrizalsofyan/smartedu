<?php require 'header3.php'
?>
<div class="jadimentor-content">
	<div class="container">
		<div class="row">
			<div class="col-md-offset-3 col-md-6 col-sm-offset-3 col-sm-6 col-xs-offset-2 col-xs-8">
        <div class="form-jadimentor">
          <form action="<?=base_url()?>index.php/smartedu/jadimentor_auth" method="POST" enctype="multipart/form-data">
            <h3 class="jadimentor-tittle">Jadi Mentor di SMART EDU</h2>
          <div class="form-group">
          	<label>Mata Kuliah ingin yang diajar : </label>
            <select class="form-control" name="mata_kuliah" required>
            	<option value="Fisika">Fisika</option>
            	<option value="Kimia">Kimia</option>
            	<option value="Kalkulus">Kalkulus</option>
            </select>
          </div>
          <div class="form-group">
          	<label>Video Singkat Mengajar : </label>
            <input required type="file" id="video" name="video_singkat" placeholder="Username" onchange="validate_video();">
            <p>Format video singkat : .mp4, .mkv, .webm</p>
            <div class="status_img alert-danger" id="status_video"></div>
          </div>
          <div class="form-group">
          	<label>Transkrip Nilai : </label>
           <input type="file" required id="foto_buku" name="transkrip_nilai"  placeholder="Password" onchange="validate_img()">
           <p>Format transkrip nilai : .jpg, .png, .jpeg</p>
          </div>
          <div class="status_img alert-danger" id="status_img"></div>
          <div id="imagePreview"></div>
          <div class="form-group">
           <input required type="text" name="no_rekening" class="form-control" placeholder="Nomor Rekening">
          </div>
          <div class="form-group">
          	<label>Akun Bank : </label>
            <select required class="form-control" name="bank">
            	<option value="BCA">BCA</option>
            	<option value="BRI">BRI</option>
            	<option value="Mandiri">Mandiri</option>
            	<option value="BNI">BNI</option>
            </select>
          <div class="form-group">
            <input type="submit" class="btn btn-block btn-custom-green" id="jadimentor-btn" value="DAFTAR" />
            <?php if($this->session->flashdata('error_upload')) {?>
          <div class="alert-danger">Upload Buku Gagal Silahkan coba lagi</div>
          <?php }else if($this->session->flashdata('success_upload')) {?>
          <div class="alert-success">Pendaftaran mentor Sukses</div>
          <?php } else{}?>
          </div>
        </form>
        </div>
      </div>
		</div>
	</div>
</div>
<?php require 'footer.php'
?>