<?php require 'header3.php'
?>
<div class="dashboard-content" id="dashboard-content">
	<div class="container">
		<div class="row">
			<div class="col-md-8">
				<div class="row">
					<div class="col-md-6">
						<a href="<?=base_url()?>index.php/smartedu/buku_page"><div class="dashboard-item">
							<h2>Cari Buku</h2>
							<img src="<?=base_url()?>assets/img/item1.png">
						</div></a>
					</div>
					<div class="col-md-6">
						<a href="<?=base_url()?>index.php/smartedu/carikelas_page">
						<div class="dashboard-item">
							<h2>Cari Kelas</h2>
							<img src="<?=base_url()?>assets/img/item5.png"></a>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-md-6">
						<a href="<?=base_url()?>index.php/smartedu/uploadbuku_page"><div class="dashboard-item">
							<h2>Upload Buku</h2>
							<img src="<?=base_url()?>assets/img/item2.png">	
						</div></a>
					</div>
					<div class="col-md-6">
						<?php if($status=="SI") {?>
						<a href="#" id="jadimentor_link" onclick="warning_siswa();"><div class="dashboard-item">
							<h2>Buka Kelas</h2>
							<img src="<?=base_url()?>assets/img/item3.png">
						</div></a>
						<?php } elseif ($status=="ME") {?>
							<a href="<?=base_url()?>index.php/smartedu/bukakelas_page"><div class="dashboard-item">
							<h2>Buka Kelas</h2>
							<img src="<?=base_url()?>assets/img/item3.png">
						</div></a>
						<?php }?>
					</div>
				</div>
			</div>
			<div class="col-md-4">
				<?php if($status=="SI") {?>
				<a href="<?=base_url()?>index.php/smartedu/jadimentor_page">
				<div class="dashboard-item" id="jm">
					<h2>Jadi Mentor</h2>
					<img src="<?=base_url()?>assets/img/item4.png">
				</div>
			<?php }elseif ($status=="ME") {?>
					<a href="#" onclick="warning_mentor();">
				<div class="dashboard-item" id="jm">
					<h2>Jadi Mentor</h2>
					<img src="<?=base_url()?>assets/img/item4.png">
				</div>
				<?php }?>
				</a>
			</div>
		</div>
	</div>
</div>
<script type="text/javascript">
	function warning_siswa(){
		alert("maaf status anda siswa, silahkan mendaftar menjadi mentor terlebih dahulu jika ingin mengakses fitur ini");
	}
	function warning_mentor(){
		alert("maaf status anda sudah mentor, dan anda tidak bisa mendaftar menjadi mentor kembali");
	}
</script>
<?php require 'footer.php'
?>