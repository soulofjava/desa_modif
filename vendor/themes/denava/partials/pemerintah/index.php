<?php defined('BASEPATH') or exit('No direct script access allowed'); ?>

<div class="article-single">
	<div class="container-page mb-20">
		<div class="headingpage border-grey-soft bg-white flexleft" style="border-radius:5px 5px 0 0;">
			<div class="headingpage-image border-grey-soft flexcenter"><img src="<?= base_url("$this->theme_folder/$this->theme/assets/images/statpenduduk.png") ?>" alt=""/></div>
			<h2><?= strtoupper(setting('sebutan_pemerintah_desa')) ?></h2>
		</div>
		<div class="box-article bg-white" style="border-radius:0 0 5px 5px;">
			<div class="box-statis border-grey-soft" style="border-radius:0 0 5px 5px;">
				<div class="relative-hid">
					<div class="pemerintah">
						<div class="flexrow">
							<?php foreach ($pemerintah as $data): ?>
								<div class="col-lg-6 col-md-6 col-xs-12 border-grey-soft">
									<div class="flexrow2">
										<div class="flex-column2b">
											<div class="image-pemerintah">
												<a href="<?= $data['foto'] ?>" data-fancybox="images" data-caption="<?= $data['jabatan'] ?>">
													<img class="yall_lazy" src="<?= base_url("$this->theme_folder/$this->theme/assets/images/icon/spinner.svg") ?>" data-src="<?= $data['foto'] ?>" alt="">
												</a>
											</div>
										</div>
										<div class="flex-column2b bg-grey-medium">
											<h2><?= $data['nama'] ?></h2>
											<div class="mb-10"><h3><?= $data['jabatan'] ?></h3></div>
											<?php $row = getPamongData($this->db, $data['pamong_id']); ?>
											<h4><small><?= $row['pamong_nosk'] ? 'No. SK : '.$row['pamong_nosk'] : '';  ?></small></h4>
											<h4><small><?= $row['pamong_tglsk'] ? 'Tgl. SK : '.tjs($row['pamong_tglsk'],'l') : ''; ?></small></h4>
											<h4><small><?= $row['pamong_nip'] ? 'NIP : ' . $row['pamong_nip'] : ($row['pamong_niap'] ? 'NIAP : ' . $row['pamong_niap'] : ''); ?></small></h4>
											<?php if(setting('tampilkan_kehadiran')) : ?>
											<?php if ($data['status_kehadiran'] == 'hadir'): ?>
												<div class="pem-status flexcenter">
													<div class="pem-status-inner flexcenter hadir">
														<svg viewBox="0 0 18 18">
															<path d="M4.9,7.1 L3.5,8.5 L8,13 L18,3 L16.6,1.6 L8,10.2 L4.9,7.1 L4.9,7.1 Z M16,16 L2,16 L2,2 L12,2 L12,0 L2,0 C0.9,0 0,0.9 0,2 L0,16 C0,17.1 0.9,18 2,18 L16,18 C17.1,18 18,17.1 18,16 L18,8 L16,8 L16,16 L16,16 Z"/>
														</svg>
														<p>Ada di Kantor</p>
													</div>
												</div>
											<?php endif ?>
											<?php if ($data['tanggal'] == date('Y-m-d') && $data['status_kehadiran'] != 'hadir'): ?>
											<div class="pem-status flexcenter"><div class="pem-status-inner flexcenter lupa-lapor"><p><?= ucwords($data['status_kehadiran']) ?></p></div></div>
											<?php endif ?>
											<?php if ($data['kehadiran'] == 1 && $data['tanggal'] != date('Y-m-d')): ?>
											<div class="pem-status flexcenter"><div class="pem-status-inner flexcenter tidak-hadir"><p>Tidak Ada di Kantor</p></div></div>
											<?php endif ?>
											<?php endif ?>
										</div>
									</div>
								</div>
							<?php endforeach ?>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
