<?php require 'header3.php';
?>
<div class="setelahpeminjaman_content">
	<div class="container">
		<div class="row">
			<div class="col-sm-offset-3 col-sm-6">
				<div class="setelahpeminjaman_card">
					<?php if($success){ ?>
					<h3>Peminjaman Sukses!!</h3>
						<?php if($metode=="COD") {?>
						<div class="card-content">
							<p>Peminjaman telah berhasil dilakukan dan telah masuk kedalam sistem kami. Dimohon untuk menunggu konfirmasi dari pemilik buku. Karena metode peminjaman buku anda COD maka anda tidak perlu membayar biaya administrasi. Terima Kasih!!</p>
							<a href="<?=base_url()?>index.php/smartedu/dashboard_page""><input type="button" class="btn btn-success" id="btn-setelahpeminjaman" value="kembali ke dashboard">
								</a>
						</div>
						<?php } elseif($metode=="Delivery"){ ?>
						<div class="card-content">
							<p>Peminjaman telah berhasil dilakukan dan telah masuk kedalam sistem kami. Dimohon untuk menunggu konfirmasi dari pemilik buku. Karena metode peminjaman buku anda COD maka anda tidak perlu membayar biaya administrasi sebesar RP: 1300000 ke no rekening kami : 099999111. Terima Kasih!!</p>
							<a href="<?=base_url()?>index.php/smartedu/dashboard_page""><input type="button" class="btn btn-success" id="btn-setelahpeminjaman" value="kembali ke dashboard">
								</a>
							</div>
						<?php ?>
					<?php }} else{ ?>
					<h3>Peminjaman Gagal</h3>
					<div class="card-content">
							<p>Mohon maaf peminjaman anda gagal dikarenakan terjadi kesalahan pada sistem kami.</p>
							<<a href="<?=base_url()?>index.php/smartedu/dashboard_page""><input type="button" class="btn btn-success" id="btn-setelahpeminjaman" value="kembali ke dashboard">
								</a>
					</div>
					<?php }?>
				</div>
			</div>
		</div>
	</div>
</div>
<?php require 'footer.php';
?>