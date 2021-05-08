<!DOCTYPE html>
<html lang="en">
  <head>
<title>Daftar Mahasiswa</title>
 <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="favicon.ico">
    <!-- Bootstrap core CSS -->
    <link href="<?php echo base_url();?>dist/css/bootstrap.min.css" rel="stylesheet">

  </head>
  <body>
	  <br/>
<div class="container">
		
	<nav class="navbar navbar-default" role="navigation">
        <div class="container-fluid">
        <div class="navbar-header">
<h4 style="color:#FFFFFF;font-weight:bold;"><span class="glyphicon glyphicon-fire"></span>&nbsp;Chain Selected di CodeIgniter V. 2.2.0</h4>
			</div>
		</div>
	</nav>

     

<div class="panel panel-primary">	
<div class="panel-heading"><b><span class="glyphicon glyphicon-user"></span>&nbsp;Penambahan Data Mahasiswa</b></div>
      <div class="panel-body">
        <p>Masukan data mahasiswa pada form dibawah ini . 			<?php
	echo validation_errors();
	      ?></p>
      
		<form role="form" class="form-horizontal" method="POST" role="form" class="form-horizontal" action="<?php echo base_url();?>mahasiswa/tambah/">
		<div class="form-group">

         <label for="nim" class="control-label col-sm-3">Nomor Induk Mahasiswa</label>
            <div class="col-sm-3">
			<?php
			$setting_nim=array('type'=>'text','name'=>'nim','class'=>'form-control input-sm','placeholder'=>'Masukkan No Induk');
			echo form_input($setting_nim);
			?>
			</div>
        </div>
        
		<div class="form-group">
            <label for="nama" class="control-label col-sm-3">Nama Mahasiswa</label>
            <div class="col-sm-5">
			<?php
			$setting_nama_lengkap=array('type'=>'text','name'=>'nama','class'=>'form-control input-sm','placeholder'=>'Nama mahasiswa');
			echo form_input($setting_nama_lengkap);
			?>
			</div>
        </div>

		<div class="form-group">
            <label for="angkatan" class="control-label col-sm-3">Angkatan</label>
            <div class="col-sm-3">
			<?php
			$setting_angkatan=array('type'=>'text','name'=>'angkatan','class'=>'form-control input-sm','placeholder'=>'Angkatan','size'=>'4');
			echo form_input($setting_angkatan);
			?>
			</div>
        </div>

		<div class="form-group">
            <label for="jk" class="control-label col-sm-3">Jenis Kelamin</label>
            <div class="col-sm-2">
			<?php
			$style0='class="form-control input-sm"';
			echo form_dropdown('jk',$jk,'',$style0);
			?>
			</div>
        </div>
        
		<div class="form-group">
            <label for="program_studi" class="control-label col-sm-3">Program Studi</label>
            <div class="col-sm-3">
			<?php
			$style='class="form-control input-sm"';
			echo form_dropdown('program_studi',$program_studi,'',$style);
			?>
			</div>
	        </div>
        
		<div class="form-group">
            <label for="jk" class="control-label col-sm-3">Provinsi</label>
            <div class="col-sm-4">
			<?php
			$style_provinsi='class="form-control input-sm" id="provinsi_id"  onChange="tampilKabupaten()"';
			echo form_dropdown('provinsi_id',$provinsi,'',$style_provinsi);
			?>
		</div>
        </div>
        
		<div class="form-group">
            <label for="jk" class="control-label col-sm-3">Kabupaten</label>
            <div class="col-sm-4">
				<?php
				$style_kabupaten='class="form-control input-sm" id="kabupaten_id" onChange="tampilKecamatan()"';
				echo form_dropdown("kabupaten_id",array('Pilih Kabupaten'=>'- Pilih Kabupaten -'),'',$style_kabupaten);
				?>
			</div>
        </div>
        
		<div class="form-group">
            <label for="jk" class="control-label col-sm-3">Kecamatan</label>
            <div class="col-sm-4">
				<?php
				$style_kecamatan='class="form-control input-sm" id="kecamatan_id" onChange="tampilKelurahan()"';
				echo form_dropdown("kecamatan_id",array('Pilih Kecamatan'=>'- Pilih Kecamatan -'),'',$style_kecamatan);
				?>
			</div>
        </div>
        
		<div class="form-group">
            <label for="program_studi" class="control-label col-sm-3">Kelurahan</label>
            <div class="col-sm-4">
				<?php
				$style_kelurahan='class="form-control input-sm" id="kelurahan_id"';
				echo form_dropdown("kelurahan_id",array('Pilih Kelurahan'=>'- Pilih Kelurahan -'),'',$style_kelurahan);
				?>
			</div>
        </div>
        
        <div class="form-group">
            <label for="nama" class="control-label col-sm-3">Alamat </label>
            <div class="col-sm-5">
			<?php
			$setting_alamat_lengkap=array('type'=>'text','name'=>'alamat','class'=>'form-control input-sm','placeholder'=>'RT RW Jalan Kampung dll');
			echo form_input($setting_alamat_lengkap);
			?>
			</div>
			<div class="col-sm-1"><button type="text" class="btn btn-primary btn-sm">Simpan</button></div>
        </div>
        
        
    </form>
</div>
 


</div>
<script src="<?php echo base_url();?>dist/js/jquery-2.1.1.js"></script>
<script>
function tampilKabupaten()
 {
	 kdprop = document.getElementById("provinsi_id").value;
	 $.ajax({
		 url:"<?php echo base_url();?>mahasiswa/pilih_kabupaten/"+kdprop+"",
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
		 url:"<?php echo  base_url();?>mahasiswa/pilih_kecamatan/"+kdkab+"",
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
		 url:"<?php echo  base_url();?>mahasiswa/pilih_kelurahan/"+kdkec+"",
		 success: function(response){
		 $("#kelurahan_id").html(response);
		 },
		 dataType:"html"
	 });
	 return false;
 }

</script>
