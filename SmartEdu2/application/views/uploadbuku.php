<?php require 'header3.php'
?>
<div class="uploadbuku-content">
	<div class="container">
		<div class="row">
		<div class="col-md-offset-3 col-md-6 col-sm-offset-3 col-sm-6 col-xs-offset-2 col-xs-8">
         <div class="form-uploadbuku">
          <form action="<?=base_url()?>index.php/smartedu/uploadbuku_auth" method="POST" role="form" enctype="multipart/form-data">
          <h3 class="uploadbuku-tittle">Upload Buku</h3>
          <div class="form-group">
            <input type="text" required name="judul_iklan" class="form-control" placeholder="Judul Iklan">
          </div>
          <div class="form-group">
            <input type="text" required name="judul_buku" class="form-control" placeholder="Judul Buku">
          </div>
          <div class="form-group">
            <input type="text" required name="isbn" class="form-control" placeholder="ISBN">
          </div>
          <div class="form-group">
            <input type="text" required name="penerbit" class="form-control" placeholder="Penerbit Buku">
          </div>
          <div class="form-group">
            <input type="text" required name="penulis" class="form-control" placeholder="Penulis Buku">
          </div>
          <div class="form-group">
            <input type="text" required name="kategori" class="form-control" placeholder="Kategori">
          </div>
          <div class="form-group">
            <input type="text" required name="sinopsis" class="form-control" placeholder="Sinopsis">
          </div>
            <input id="foto_buku" required name="foto_buku" type="file" onchange="validate_img()">
            <p>Format foto buku : .jpg, .png, .jpeg</p>
          <div class="form-group">
            <input type="submit" class="btn btn-block btn-custom-green" id="btn-uploadbuku" value="upload" />
          </div>
          <div class="status_img alert-danger" id="status_img"></div>
          <div id="imagePreview"></div>
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
<?php require 'footer.php'
?>