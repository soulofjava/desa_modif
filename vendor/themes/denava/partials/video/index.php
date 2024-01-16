<?php defined('BASEPATH') or exit('No direct script access allowed'); ?>

<?php if($artikel) : ?>
<?php $file = __DIR__ . '/video.json'; ?>
<?php if(is_file($file)) : ?>
<?php $json = file_get_contents($file); ?>
<?php $array = json_decode($json, true); ?>
<?php if($array['aktif']) : ?>
	<div class="module-gallery">
		<div class="relative-row ptb-10">
			<div class="container-page">
				<div class="fotohome border-grey-soft bg-white-transparent">
					<div class="margin-min5">
						<div class="fotohome-left">
							<div class="pd-lr-5">
								<div class="fotohome-label" style="background-image:url(<?= gambar_desa($desa['kantor_desa'], TRUE)?>);">
									<div class="fotohome-label2">
										<img class="yall_lazy" src="<?= base_url("$this->theme_folder/$this->theme/assets/images/icon/spinner.svg") ?>" data-src="<?= gambar_desa($desa['kantor_desa'], TRUE)?>" alt=""/>
									</div>
									<div class="bottom-gradient"></div>
									<img src="<?= base_url("$this->theme_folder/$this->theme/assets/images/latar.png") ?>" alt=""/>
								</div>
							</div>
						</div>
						<div class="fotohome-right">
							<div class="pd-lr-5">
								<div class="margin-min5">
									<div class="carouselcustom js-flickity" data-flickity='{ "autoPlay": false, "wrapAround": true, "cellAlign": "left" }'>
										<?php shuffle($array['video']); foreach($array['video'] as $index => $video) : ?>
										<?php $youtube = 'https://www.youtube.com/embed/'.$video['youtube'] ?>
										<div class="carouselcustom-item">
											<div class="mlr-5">
												<div class="image-fotohome">
													<iframe width="100%" height="100%" scrolling="no" frameborder="no" src="<?= $youtube ?>" loading="lazy"></iframe>
													<div class="foto-title" style="text-align:center;">
														<h2><?= $video['judul']; ?></h2>
													</div>
												</div>	
											</div>
										</div>
										<?php endforeach; ?>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
<?php endif; ?>	
<?php foreach($array['video'] as $index => $video) : ?>
<?php $youtube = 'https://youtu.be/'.$video['youtube'] ?>
<div class="modal fade" id="descGaleri<?= $video['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="descModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="descModalLabel">Video</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <h5><i class="fa fa-video-camera"></i>&nbsp;<?=$video['judul']?></h5>
                <?= $video['deskripsi'] ?><br><br>
            </div>
            <div class="modal-footer">
                <div class="btn-group">
				<a class="btn btn-sm btn-success" href="<?= $youtube ?>" rel="noopener noreferrer" target="_blank">Buka Video</a>
				</div>
			</div>
        </div>
    </div>
</div>
<?php endforeach; ?>
<?php endif ?>
<?php endif ?>
