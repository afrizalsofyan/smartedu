<?php require 'header3.php'
?>
<section class="caribuku-content">
  <div class="container">
    <div class="row">
      <?php foreach ($buku as $key => $book) { $foto = json_decode($book['foto_buku']); $foto = (array)$foto; ?>
        <div class="col-sm-4" id="item-buku">
          <div class="buku-content">
            <p class="judul-iklan"><?php echo $book['judul_iklan']; ?></p>
            <img src="<?=base_url()?>assets/img-buku/<?php echo $book['pemilik_buku']?>/<?php echo $foto['foto_buku[0]']?>" height="180px" width="120px">
            <div class="buku-text">
              <p>Judul Buku : <?php echo $book['judul_buku']; ?></p>
              <p>Penulis Buku : <?php echo $book['penulis']; ?></p>
              <P>Pemilik Buku :<?php echo $book['pemilik_buku']; ?></P>
            </div>
            <button class="btn btn-success"  data-toggle="modal" data-target="#detailbuku-<?php echo $book['isbn'];?>">Detail</button>
            <button class="btn btn-warning" data-toggle="modal" data-target="#pinjambuku-<?php echo $book['isbn'];?>">Pinjam</button>
          </div>
        </div>
        <div class="modal fade" id="detailbuku-<?php echo $book['isbn'];?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          <h4 class="modal-title" id="myModalLabel">Detail Buku</h4>
          </div>
          <div class="modal-body">
            <div class="detailbuku-item">
              <p><label>Judul Buku : </label> <?php echo $book['judul_buku']; ?></p>
            </div>
            <div class="detailbuku-item">
              <p><label>Penulis Buku : </label> <?php echo $book['penulis']; ?></p>
            </div>
            <div class="detailbuku-item">
              <p><label>Pemilik Buku : </label> <?php echo $book['pemilik_buku']; ?></p>
            </div>
            <div class="detailbuku-item">
              <p><label>Penerbit Buku : </label> <?php echo $book['penerbit']; ?></p>
            </div>
            <div class="detailbuku-item">
              <p><label>Sinopsis Buku : </label> <?php echo $book['judul_buku']; ?></p>
            </div>
          </div>
      <div class="modal-footer">
        <button class="btn btn-danger" data-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
    </div>
    <div class="modal fade" id="pinjambuku-<?php echo $book['isbn'];?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          <h4 class="modal-title" id="myModalLabel">Pinjam Buku</h4>
          </div>
          <div class="modal-body">
          <form action="<?=base_url()?>index.php/smartedu/peminjaman_auth" method="POST" role="form" enctype="multipart/form-data">
          <div class="form-group">
            <label>Pemilik Buku : </label>
            <input class="form-control" type="text" value="<?php echo $book['pemilik_buku']; ?>" readonly name="username_pemilik"> 
          </div>
          <div class="form-group">
            <label>Judul Buku : </label>
            <input class="form-control" type="text" value="<?php echo $book['judul_buku']; ?>" readonly name="judul_buku"> 
          </div>
          <div class="form-group">
            <label>ISBN Buku : </label>
            <input class="form-control" type="text" value="<?php echo $book['isbn']; ?>" readonly name="isbn"> 
          </div>
          <div class="form-group">
            <label>Penulis Buku : </label>
            <input class="form-control" type="text" value="<?php echo $book['penulis']; ?>" readonly name="penulis"> 
          </div>
          <div class="form-group">
             <label for="dtp_input2" class="control-label">Tanggal Kembali</label>
                <div class="input-group date form_date" data-date="" data-date-format="dd MM yyyy" data-link-field="dtp_input2-<?php echo $book['isbn'] ?>" data-link-format="yyyy-mm-dd">
                    <input class="form-control" size="16" type="text" value="" readonly onchange="kurangtanggal(this.value,<?php echo $book['isbn'] ?>);" required="">
                    <span class="input-group-addon"><span class="glyphicon glyphicon-remove"></span></span>
         <span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span></span>
                </div>
        <input type="hidden" name="tanggal_kembali" id="dtp_input2-<?php echo $book['isbn'] ?>" value="" /><br/>
        <div class="alert-danger" id="warning-days-<?php echo $book['isbn'] ?>" hidden="true">
          <p>Waktu peminjaman buku minimal 7 hari</p>
        </div>
          </div>
          <div class="form-group">
            <label>Upload Foto Pengenal : </label>
            <input id="foto_buku" name="foto_pengenal" type="file" onchange="validate_img()" required>
          </div>  
          <div class="form-group">
            <label>Metode Peminjaman: </label>
            <select name="metode_peminjaman" id="metode_peminjaman">
              <option value="COD">COD</option>
              <option value="Delivery">Delivery</option>
            </select>
          </div>  
          <div class="form-group" id="alamat" style="visibility: hidden;">
            <label>Alamat : </label>
            <input type="text" name="alamat">
          </div>
          <p>Note : peminjaman buku minimal 7 hari</p>
          <div id="imagePreview"></div>
          <?php if($this->session->flashdata('error_upload')) {?>
          <div class="alert-danger">Upload Buku Gagal Silahkan coba lagi</div>
          <?php }else if($this->session->flashdata('success_upload')) {?>
          <div class="alert-success">Upload Buku Sukses</div>
          <?php } else{}?>     
          </div>
      <div class="modal-footer">
        <button class="btn btn-danger" data-dismiss="modal">No</button>
        <button type="submit" class="btn btn-success" id="btn-pinjambuku-<?php echo $book['isbn'] ?>"><a>Submit</a></button>
        <p>Difference :
           <input type="text" id="TextBox3-<?php echo $book['isbn'] ?>" />
        </p>
        </form>
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
</section>
<script type="text/javascript"> 
$('.form_date').datetimepicker({
        language:  'en',
        weekStart: 1,
        todayBtn:  1,
    autoclose: 1,
    todayHighlight: 1,
    startView: 2,
    minView: 2,
    forceParse: 0
    });

function kurangtanggal(value,isbn){
  var end = value;
  var currentdate = new Date();
  var start = currentdate.getFullYear()+"-"+(currentdate.getMonth()+1)+"-"+currentdate.getDate();
  var st = new Date(start);
  var en = new Date(end);
  var days = (en - st) / (1000 * 60 * 60 * 24);
  var textbox = "#TextBox3-"+isbn;
  var btn = "btn-pinjambuku-"+isbn;
  var p = "warning-days-"+isbn;
  $(textbox).val(days);
  alert(btn);
  if(days<7){
    document.getElementById(btn).setAttribute("disabled", "disabled");
    document.getElementById(p).removeAttribute("hidden")
  }
  else{
    document.getElementById(btn).removeAttribute("disabled")
    document.getElementById(p).setAttribute("hidden","hidden");
  }
}
</script>
<?php require 'footer.php'
?>