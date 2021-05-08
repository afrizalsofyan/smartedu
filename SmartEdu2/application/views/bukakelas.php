<?php require 'header3.php';
?>
<div class="bukakelas-content">
	<div class="container">
		<div class="row">
			<div class="col-md-offset-2 col-md-8 col-sm-offset-3 col-sm-8 col-xs-offset-2 col-xs-8">
         <div class="form-bukakelas">
          <form action="<?=base_url()?>index.php/smartedu/bukakelas_auth" method="POST">
          <h3 class="bukakelas-tittle">Form Buka Kelas</h3>
          <div class="form-group" align="center">
            <input type="text" required name="nama_kelas" class="form-control" placeholder="Nama Kelas" >
          </div>
          <div class="form-group"  align="center">
          	<label>Mata Kuliah kelas : </label>
            <select name="mata_pelajaran" required class="form-control">
            	<option value="Kalkulus">Kalkulus</option>
            	<option value="Fisika">Fisika</option>
            	<option value="Kimia">Kimia</option>
            </select>
          </div>
          <div class="form-group"  align="center">
            <label>Tipe Kelas : </label>
            <select name="tipe_kelas" class="form-control" id="tipe_kelas" required onchange="get_tipe_kelas(this.value)">
            	<option value="Private">Private</option>
            	<option value="Tutor">Tutor</option>
            </select>
          </div>
          <div class="form-group" id="form-jumlah_siswa" hidden="true"  align="center">
            <input type="text" name="jumlah_siswa" class="form-control" placeholder="Max Jumlah Siswa" id="jumlah_siswa">
          </div>
          <div class="form-group col-sm-12" align="center">
          	<p><strong>Masukan durasi Term : </strong></p>
          	<div class="col-sm-6">
          		<label>Term Mulai : </label>
          		<input type="date" required name="start" class="form-control" style="width: 150px;">
          	</div>
			<div class="col-sm-6">
				<label>Term Selesai : </label>
          		<input type="date" required name="end" class="form-control" style="width: 150px;">
          	</div>
          </div>
          <div class="form-group" align="center">
            <input type="text" required name="biaya" class="form-control" placeholder="Biaya Kelas Per Term">
          </div>
          <div class="form-group" align="center">
            <input type="text" required name="peraturan" class="form-control" placeholder="Peraturan">
          </div>
          <div class="form-group" align="center">
          	<label>Jumlah pertemuan per minggu : </label>
            <select name="jumlah_hari" required class="form-control" onchange="get_jumlah_hari(this.value)">
            	<option value="1">1</option>
            	<option value="2">2</option>
            	<option value="3">3</option>
            	<option value="4">4</option>
            	<option value="5">5</option>
            	<option value="6">6</option>
            </select>
          </div>
          <div class="form-group col-sm-12" align="center">
            	<div id="hari_belajar" class="col-sm-4">
            		
            	</div>
            	<div id="jam_mulai" class="col-sm-4">
            		
            	</div>
            	<div id="jam_selesai" class="col-sm-4">
            		
            	</div>
          </div>
          <label>Masukan Lokasi Belajar : </label>
          <div class="form-group" id="form_provinsi" align="center">
            <label for="jk" class="control-label">Provinsi</label>
			<?php
			$style_provinsi='class="form-control input-sm" id="provinsi_id"  required onChange="tampilKabupaten()"';
			echo form_dropdown('provinsi_id',$provinsi,'',$style_provinsi);
			?>
        </div>
        
    <div class="form-group" align="center">
            <label for="jk" class="control-label">Kabupaten</label>
        <?php
        $style_kabupaten='class="form-control input-sm" required id="kabupaten_id" onChange="tampilKecamatan()"';
        echo form_dropdown("kabupaten_id",array('Pilih Kabupaten'=>'- Pilih Kabupaten -'),'',$style_kabupaten);
        ?>
        </div>
        
    <div class="form-group" align="center">
            <label for="jk" class="control-label">Kecamatan</label>
        <?php
        $style_kecamatan='class="form-control input-sm" required id="kecamatan_id"';
        echo form_dropdown("kecamatan_id",array('Pilih Kecamatan'=>'- Pilih Kecamatan -'),'',$style_kecamatan);
        ?>
        </div>
        <div class="form-group" align="center">
        	<label>Detail Lokasi</label>
        	<input type="text" class="form-control" name="detail_lokasi">
        </div>
          <div class="form-group">
            <input type="submit" class="btn btn-custom-green" id="btn-bukakelas" value="upload" />
          </div>
          <?php if($this->session->flashdata('error_upload')) {?>
          <div class="alert-danger">Buka kelas gagal</div>
          <?php }else if($this->session->flashdata('success_upload')) {?>
          <div class="alert-success">Buka kelas sukses</div>
          <?php } else{}?>
        </form>
         </div>
		</div>
		</div>
	</div>
</div>
<script type="text/javascript">
	function get_tipe_kelas(value){
		if(value=="Private"){
			document.getElementById("form-jumlah_siswa").setAttribute("hidden", "true");
		}
		else{
			document.getElementById("form-jumlah_siswa").removeAttribute("hidden");
		}
	}
	function get_jumlah_hari(value){
		var x = parseInt(value);
		var i;
		document.getElementById("hari_belajar").innerHTML = "";
		document.getElementById("jam_mulai").innerHTML = "";
		document.getElementById("jam_selesai").innerHTML = "";
		for(i=0; i<x; i++){
			document.getElementById("hari_belajar").innerHTML += "<label>Hari Belajar : </label>"+"<select name='hari_belajar-"+i
		 +"' class='form-control' required style='width:100px;'>"+
            	"<option value='Senin'>Senin</option>"+
            	"<option value='Selasa'>Selasa</option>"+
            	"<option value='Rabu'>Rabu</option>"+
            	"<option value='Kamis'>Kamis</option>"+
            	"<option value='Jumat'>Jumat</option>"+
            	"<option value='Sabtu'>Sabtu</option>"+"</select>";
            	document.getElementById("jam_mulai").innerHTML += "<label>Jam Mulai : </label>"+"<input type='time' class='form-control' style='width:110px;' required name='jam_mulai-"+i+"'>";
            	document.getElementById("jam_selesai").innerHTML += "<label>Jam Selesai : </label>"+"<input type='time' class='form-control' style='width:110px;' required name='jam_selesai-"+i+"'>";
		}
	}
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
</script>
<?php require 'footer.php';
?>