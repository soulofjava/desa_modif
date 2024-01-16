<?php defined('BASEPATH') or exit('No direct script access allowed'); ?>

<div class="mainheader bg-color1">
	<div class="mainheader-cover-image1" style="background-image:url(<?= $latar_website ? $latar_website : base_url($this->theme_folder.'/'.$this->theme.'/assets/images/header.jpg'); ?>);"></div>
	<div class="mainheader-cover-image2" style="background-image:url(<?= $latar_website ? $latar_website : base_url($this->theme_folder.'/'.$this->theme.'/assets/images/header.jpg'); ?>);"></div>
	<div class="mainheader-cover-color">
		<ul class="bg-bubbles">
			<li></li>
			<li></li>
			<li></li>
		</ul>
	</div>
	<div class="container-page">
		<div class="mainheader-inner">
			<div class="mainheader-inner2 flexcenter">
				<div class="logo">
					<a href="<?= site_url(); ?>">
						<div class="flexleft">
							<div class="logo-image">
								<img src="<?= gambar_desa($desa['logo']);?>" alt=""/>
							</div>
							<div class="logo-title">
								<h1><?= ucwords($this->setting->sebutan_desa); ?> <?= ucwords(($desa['nama_desa']) ? ' ' . $desa['nama_desa'] : ''); ?></h1> 
								<h2><?= ucwords($this->setting->sebutan_kecamatan_singkat." ".$desa['nama_kecamatan'])?>, <?= ucwords($this->setting->sebutan_kabupaten_singkat." ".$desa['nama_kabupaten'])?><br/><?= ucwords("Prov. ".$desa['nama_propinsi'])?></h2>
							</div>
						</div>
					</a>
				</div>
				<div class="header-right flexright">
					<div class="big-screen">
						<h2><?= ucwords($this->setting->sebutan_desa) . ' ' . ucwords($desa['nama_desa']); ?></h2>
					</div>
					<?php $this->load->view("$folder_themes/partials/event/countdown"); ?>
				</div>
			</div>
		</div>
	</div>
</div>
<div class="bg-grey-medium">
	<div class="mainmenu">
		<div class="container-page">
			<div class="mainmenu-inner bg-mainmenu">
				<div class="nav-wrapper large-nav">
					<ul class="clearlist local-scroll" style="margin:0;padding:0;">
						<div class="to-home flexcenter"><a style="border:none;" href="<?= site_url(); ?>"><img style="float:left;height:20px;opacity:0.6;"src="<?= base_url("$this->theme_folder/$this->theme/assets/images/icon/home.svg") ?>" alt=""/></a></div>
						<div class="carouselcustom js-flickity" data-flickity='{ "autoPlay": false, "groupCells": true, "groupCells": 1, "contain": true, "cellAlign": "left"}'>
						<div class="carouselcustom-item "></div>
							<?php foreach($menu_atas as $data): ?>
								<div class="carouselcustom-item ">
									<?php if(count($data['submenu'])>0): ?>
										<li><a style="white-space: nowrap;" class="menu-down" href="<?= count($data['submenu'])>0 ? 'javascript:void(0);' : $data['link'] ?>"><?= $data['nama']; if(count($data['submenu'])>0) { echo "<span class='caret'></span>"; } ?></a>
											<ul class="nav-sub bg-navsub">
												<?php foreach($data['submenu'] as $submenu): ?>
													<li><a href="<?= $submenu['link']?>"><?= $submenu['nama']?></a></li>
												<?php endforeach; ?>
											</ul>
										</li>
									<?php else: ?>
										<li><a style="white-space: nowrap;" href="<?= $data['link']?>"><?= $data['nama']?></a></li>
									<?php endif; ?>
								</div>
							<?php endforeach; ?>
						</div>
					</ul>
				</div>
			</div>
		</div>
	</div>
</div>
