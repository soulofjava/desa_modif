<?php defined('BASEPATH') or exit('No direct script access allowed'); ?>

<?php
$current_date = date('Y-m-d');
$file = __DIR__ . '/event.json';
?>
<?php if (is_file($file)) : ?>
    <?php
    $json = file_get_contents($file);
    $data = json_decode($json, true);
    ?>
    <?php if (isset($data['defaultevent']) && $data['defaultevent']) : ?>
        <?php foreach ($data['momentevent'] as $eventdetail) : ?>
            <?php
            $start_date = isset($eventdetail['start_date']) ? $eventdetail['start_date'] : null;
            $end_date = isset($eventdetail['end_date']) ? $eventdetail['end_date'] : null;
			?>
            <?php if ($start_date && $end_date) : ?>
				<?php
				$start_date_obj = DateTime::createFromFormat('d-m-Y', $start_date);
                $end_date_obj = DateTime::createFromFormat('d-m-Y', $end_date);
                $current_date_obj = DateTime::createFromFormat('Y-m-d', $current_date);
				?>
				<?php if ($current_date_obj >= $start_date_obj && $current_date_obj <= $end_date_obj) : ?>
				<?php
				$gambar1 = base_url($this->theme_folder.'/'.$this->theme .'/assets/event/' . $eventdetail['gambar1']);
				$gambar2 = base_url($this->theme_folder.'/'.$this->theme .'/assets/event/' . $eventdetail['gambar2']);
				?>
				<div class="event-body bg-grey-medium">
					<div class="event-container bg-gradient-hor">
						<div class="event-container-bg bg-pattern"></div>
						<div class="container-page">
							<div class="event-inner flexcenter">
								<?php
								$allowed = array('mp4', 'webm', 'ogg');
								$filename = pathinfo($gambar1);
								$ext = $filename['extension'];
								$allowed_pic = array('jpg', 'png', 'jpeg');
								$filename_pic = pathinfo($gambar1);
								$ext_pic = $filename['extension'];
								if (in_array($ext, $allowed)): ?>
								<?php elseif (in_array($ext_pic, $allowed_pic)): ?>
									<div class="event-image-left">
										<img src="<?= $gambar1 ?>" alt="">
									</div>
								<?php endif; ?>						
								<div class="event-title">
									<?php if ($eventdetail['toptitle']): ?>
										<h2 style="font-size:105%;font-weight:500;">Pemerintah <?= ucwords($this->setting->sebutan_desa); ?> <?= ucwords(($desa['nama_desa']) ? ' ' . $desa['nama_desa'] : ''); ?>, <?= $eventdetail['toptitle'] ?></h2>
									<?php endif; ?>    
									<?php if ($eventdetail['titlearab']): ?>
										<div class="event-title-arab color-light"><?= $eventdetail['titlearab'] ?></div>
									<?php endif; ?>
									<?php if ($eventdetail['titlestandar']): ?>
										<h1><?= $eventdetail['titlestandar'] ?></h1>
									<?php endif; ?>
									<?php if ($eventdetail['subtitle']): ?>
										<h2><?= $eventdetail['subtitle'] ?></h2>
									<?php endif; ?>
									<?php if ($eventdetail['desktitle']): ?>
										<p><?= $eventdetail['desktitle'] ?></p>
									<?php endif; ?>
								</div>
								<?php
								$allowed2 = array('mp4', 'webm', 'ogg');
								$filename2 = pathinfo($gambar2);
								$ext2 = $filename2['extension'];
								$allowed_pic2 = array('jpg', 'png', 'jpeg');
								$filename_pic2 = pathinfo($gambar2);
								$ext_pic2 = $filename2['extension']; ?>
								<?php if (in_array($ext2, $allowed2)): ?>
								<?php elseif (in_array($ext_pic2, $allowed_pic2)): ?>
									<div class="event-image-right">
										<img src="<?= $gambar2 ?>" alt="">
									</div>	
								<?php endif; ?>
							</div>
						</div>
					</div>
				</div>
				<?php endif; ?>
			<?php endif; ?>
		<?php endforeach; ?>
	<?php endif; ?>
<?php endif; ?>
