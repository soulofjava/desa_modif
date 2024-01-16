<?php defined('BASEPATH') or exit('No direct script access allowed'); ?>

<div class="container-page">
	<div class="box-container ptb-10">
		<div class="layanan border-grey-soft bg-white-radial ptb-10 pd-lr-20">
			<div class="flexrow" style="margin:0;">
				<div class="layanan-intro">
					<div class="relative-row">
						<img src="<?= base_url("$this->theme_folder/$this->theme/assets/images/layanan.png") ?>" alt=""/>
						<div class="layanan-absolute flexright">
							<h1 style="text-align:center;"><span class="color-1">Layanan</span><br/>Mandiri</h1>
						</div>
					</div>
				</div>
				<div class="layanan-login bg-white border-grey-soft flexcenter">
					<div class="relative-row" style="width:100%;">
						<?php if( ! isset($_SESSION['mandiri']) OR $_SESSION['mandiri']<>1) : ?>
							<form action="<?= site_url('layanan-mandiri/cek'); ?>" method="post" target="blank">
								<input name="nik" type="text" autocomplete="off" placeholder="Ketik Nomor KTP" maxlength="16" class="form-control border-grey-soft" value="" required>
								<input name="pin" type="password" autocomplete="off" placeholder="Ketik Kode PIN" value="" maxlength="6" class="form-control border-grey-soft" required>
								<div class="flexcenter">
									<button type="submit" id="but" class="layanan-masuk bg-color3 flexcenter">Login<img src="<?= base_url("$this->theme_folder/$this->theme/assets/images/icon/admin.svg") ?>" alt=""/></button>
								</div>
							</form>
						<?php else : ?>
							<div class="relative-row" style="width:100%;text-align:center;">
								<p>Saat ini anda masih online<br/>di fitur Layanan Mandiri<br/><?= ucwords($this->setting->sebutan_desa); ?> <?= ucwords(($desa['nama_desa']) ? ' ' . $desa['nama_desa'] : ''); ?></p>
								<div class="flexcenter">
									<a href="<?= site_url('layanan-mandiri'); ?>" target="_blank">
										<button type="submit" class="layanan-masuk bg-color3 flexcenter">MASUK HALAMAN <img src="<?= base_url("$this->theme_folder/$this->theme/assets/images/icon/admin.svg") ?>" alt=""/></button>
									</a>
								</div>
							</div>
						<?php endif; ?>
					</div>
				</div>
				<div class="layanan-info border-grey-soft">
					<div class="layanan-info-latar">
						<img class="yall_lazy" src="<?= base_url("$this->theme_folder/$this->theme/assets/images/icon/spinner.svg") ?>" data-src="<?= gambar_desa($desa['kantor_desa'], TRUE)?>" alt=""/>
					</div>
					<div class="layanan-info-title bg-color4">
						<p>Hubungi <?= ucwords(setting('sebutan_pemerintah_desa')) ?> untuk mendapatkan PIN</p>
					</div>
					<div class="layanan-info-image">
						<img src="<?= base_url("$this->theme_folder/$this->theme/assets/images/online.png") ?>" alt=""/>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
