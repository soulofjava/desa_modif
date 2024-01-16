<?php defined('BASEPATH') or exit('No direct script access allowed'); ?>

<div class="article-single bg-grey-medium">
	<div class="container-page mb-20">
		<div class="headingpage border-grey-soft bg-white flexleft" style="border-radius:5px 5px 0 0;">
			<div class="headingpage-image border-grey-soft flexcenter"><img src="<?= base_url("$this->theme_folder/$this->theme/assets/images/icon/mandiri.svg") ?>" alt=""/></div>
			<h2>PETA <?= strtoupper($this->setting->sebutan_desa); ?></h2>
		</div>
		<div class="box-article bg-white" style="border-radius:0 0 5px 5px;">
			<div class="box-statis border-grey-soft" style="border-radius:0 0 5px 5px;">
				<div class="forstatis">
					<?php $this->load->view($halaman_peta); ?>
				</div>	
			</div>
		</div>
	</div>
</div>
