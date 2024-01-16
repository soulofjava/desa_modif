<?php defined('BASEPATH') or exit('No direct script access allowed'); ?>

<div class="module-sinergi">
    <div class="head-widget flexleft bg-grey-dark2">
        <img src="<?= base_url("{$this->theme_folder}/{$this->theme}/assets/images/icon/arsip.svg") ?>" alt=""/>
        <?= $judul_widget ?>
    </div>
    <div class="widget-height bg-white border-grey-soft">
        <div class="widgetscroll">
            <div class="p-10">
                <div class="sinergi">
                    <div class="flexrow">
                        <?php if ($sinergi_program): ?>
                            <?php foreach ($sinergi_program as $program): ?>
                                <?php $baris[$program['baris']][$program['kolom']] = $program; ?>
                            <?php endforeach; ?>
                            <?php foreach ($baris as $baris_program): ?>
                                <?php $width = 100 / count($baris_program) - count($baris_program); ?>
                                <?php foreach ($baris_program as $program): ?>
                                    <div class="flex-column3 border-grey-soft">
                                        <div class="p-10">
                                            <a href="<?= $program['tautan'] ?>" rel="noopener noreferrer" target="_blank">
                                                <img src="<?= base_url().LOKASI_GAMBAR_WIDGET.$program['gambar'] ?>" alt=""/>
                                                <p><?= $program['judul'] ?></p>				
                                            </a>
                                        </div>
                                    </div>
                                <?php endforeach; ?>	
                            <?php endforeach; ?>
                        <?php else: ?>
                            <div class="mlr-10">
                                <div class="link-sinergi">
                                    <a href="https://www.kemendesa.go.id/" target="blank">
                                        <div class="flexleft">
                                            <img src="<?= base_url("$this->theme_folder/$this->theme/assets/images/kemendesa.png") ?>" alt=""/>
                                            <p>Kementerian Desa, PDT Dan Transmigrasi RI</p>
                                        </div>
                                    </a>
                                </div>
                                <div class="link-sinergi">
                                    <a href="https://opendesa.id/" target="blank">
                                        <div class="flexleft">
                                            <img src="<?= base_url() ?>assets/files/logo/opensid_logo.png" alt=""/>
                                            <p>OpenDesa - Perkumpulan Desa Digital Terbuka</p>
                                        </div>
                                    </a>
                                </div>
                                <div class="link-sinergi">
                                    <a href="https://dashboard-sdgs.kemendesa.go.id/#/login" target="blank">
                                        <div class="flexleft">
                                            <img src="<?= base_url("$this->theme_folder/$this->theme/assets/images/sdgs.png") ?>" alt=""/>
                                            <p>SDGs (Sustainable Development Goals)</p>
                                        </div>
                                    </a>
                                </div>
                            </div>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
            <div class="gradient-white-bottom"></div>
        </div>
    </div>
</div>
