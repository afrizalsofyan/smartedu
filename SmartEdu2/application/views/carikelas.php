<?php require 'header3.php';
?>
<div class="carikelas-content">
	<div class="container">
		<div class="row">
			<?php foreach ($kelas as $key => $class) { ?>
        <div class="col-sm-4" id="item-kelas">
          <div class="kelas-content">
            <div class="kelas-text">
            	<p>Nama Kelas: <?php echo $class['nama_kelas']; ?></p>
              <p>Mata Kuliah: <?php echo $class['mata_pelajaran']; ?></p>
              <p>Pengajar : <?php echo $class['username_mentor']; ?></p>
              <P>Pemilik Buku :<?php echo $class['tipe_kelas']; ?></P>
            </div>
            <button class="btn btn-success"  data-toggle="modal" data-target="#detailkelas-<?php echo $class['id_kelas'];?>">Detail</button>
            <button class="btn btn-warning" data-toggle="modal" data-target="#>">Masuk Kelas</button>
          </div>
        </div>
        <div class="modal fade" id="detailkelas-<?php echo $class['id_kelas'];?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          <h4 class="modal-title" id="myModalLabel">Detail Buku</h4>
          </div>
          <div class="modal-body">
            <div class="detilkelas-item">
              <p><label>Jumlah Maksimum Siswa : </label> <?php echo $class['jumlah_max_siswa']; ?></p>
            </div>
            <div class="detailkelas-item">
              <p><label>Jumlah Siswa yang mendaftar : </label> <?php echo $class['jumlah_siswa_daftar']; ?></p>
            </div>
            <div class="detailkelas-item">
              <p><label>Biaya per term : </label> <?php echo $class['biaya']; ?></p>
            </div>
            <div class="detailkelas-item">
              <p><label>Term dimulai : </label> <?php echo $class['start']; ?></p>
            </div>
            <div class="detailkelas-item">
              <p><label>Term Berakhir : </label> <?php echo $class['end']; ?></p>
            </div>
          </div>
      <div class="modal-footer">
        <button class="btn btn-danger" data-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
    </div>
        <?php } ?>
		</div>
	</div>
	<div class="col-sm-offset-5 col-sm-4" id="pagination">
    <?php echo $this->pagination->create_links(); ?>
  </div> 
</div>
<?php require 'footer.php';
?>