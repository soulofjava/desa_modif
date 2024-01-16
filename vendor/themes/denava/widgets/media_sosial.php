<?php defined('BASEPATH') or exit('No direct script access allowed'); ?>

<?php require("$this->theme_folder/$this->theme/commons/social_icons.php") ?>
<div class="box-default bgwhite mb-10">
	<div class="heading-module bggradient1 flexcenter">
		<i class="fa fa-share"></i><h1 class="flexcenter"><?= $judul_widget ?></h1>
	</div>
	<div class="relative-hidden p-10">
		<div class="footer-social flexcenter">
			<?php foreach($sosmed as $data) : ?>
				<?php if(!empty($data['link'])) : ?>
					<a href="<?= $data['link'] ?>" target="_blank" rel="noopener">
						<?php if(in_array($brand = strtolower(str_replace(' ', '-', $data['nama'])), $socials)) : ?>
							<svg viewBox="0 0 24 24" width="24" height="24" stroke="none" xmlns="http://www.w3.org/2000/svg" class="border-1"><?= $svg[$brand] ?></svg>
						<?php else : ?>
							<span data-feather="<?= strtolower(str_replace(' ', '-', $data['nama']))?>"></span>
						<?php endif ?>
					</a>
				<?php endif ?>
			<?php endforeach ?>
		</div>
	</div>
</div>
