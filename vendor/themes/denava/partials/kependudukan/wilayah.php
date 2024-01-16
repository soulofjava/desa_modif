<?php defined('BASEPATH') or exit('No direct script access allowed'); ?>

<div class="article-single">
  <div class="statistikstyle">
    <div class="container-page mb-20">
      <div class="headingpage border-grey-soft bg-gradient-hor flexleft" style="border-radius:5px 5px 0 0;">
        <div class="headingpage-image border-grey-soft flexcenter"><img src="<?= base_url("$this->theme_folder/$this->theme/assets/images/icon/location.svg") ?>" alt=""/></div>
        <div class="articlehome-head flexleft"><h1>STATISTIK</h1></div>
      </div>
      <div class="box-article mb-30 bg-white" style="border-radius:0 0 5px 5px;">
        <div class="relative-border p-15 border-grey-soft" style="border-radius:0 0 5px 5px;">
          <div class="gridview">
            <div class="sidebarright">
              <img style="width:100%;height:1px;display:block;" src="<?= base_url("$this->theme_folder/$this->theme/assets/images/empty-pic.png") ?>"/>
              <ul>
                <?php $this->load->view($folder_themes .'/partials/kependudukan/navigasi') ?>
              </ul>
            </div>
            <div class="head-content">
              <div style="text-align:center;">
                <h1>Data <?=$heading?></h1>
              </div>
              <?php if(count($daftar_dusun) > 0) : ?>
              <div class="table-responsive">
                <table class="table table-striped table-bordered">
                  <thead>
                    <tr>
                      <th>No.</th>
                      <th colspan="8">Wilayah, <?= ucwords($this->setting->sebutan_singkatan_kadus) ?>/Ketua</th>
                      <th class="text-center">KK</th>
                      <th class="text-center">Jiwa</th>
                      <th class="text-center">L</th>
                      <th class="text-center">P</th>
                    </tr>
                  </thead>
                    <tbody>
                      <?php foreach ($daftar_dusun as $key_dusun => $data_dusun): ?>
                        <tr>
                          <td class="text-center"><?= $key_dusun + 1; ?></td>
                          <td colspan="8">
                            <?= ucwords($this->setting->sebutan_dusun . ' ' . $data_dusun['dusun']); ?><?php if ($data_dusun['nama_kadus']): ?>, <?= ucwords($this->setting->sebutan_singkatan_kadus) ?> <?= $data_dusun['nama_kadus']; ?><?php endif ?>
                          </td>
                          <td class="text-right"><?= ribuan($data_dusun['jumlah_kk']); ?></td>
                          <td class="text-right"><?= ribuan($data_dusun['jumlah_warga']); ?></td>
                          <td class="text-right"><?= ribuan($data_dusun['jumlah_warga_l']); ?></td>
                          <td class="text-right"><?= ribuan($data_dusun['jumlah_warga_p']); ?></td>
                        </tr>
                        <?php
                        $no_rw = 1;
                        foreach ($data_dusun['daftar_rw'] as $data_rw):
                          ?>
                          <?php if ($data_rw['rw'] != '-'): ?>
                            <tr>
                              <td></td>
                              <td class="text-center"><?= $no_rw++; ?></td>
                              <td colspan="7">
                                RW. <?= $data_rw['rw']; ?><?php if ($data_rw['nama_ketua']): ?>, Ketua <?= $data_rw['nama_ketua']; ?><?php endif ?>
                              </td>
                              <td class="text-right"><?= ribuan($data_rw['jumlah_kk']); ?></td>
                              <td class="text-right"><?= ribuan($data_rw['jumlah_warga']); ?></td>
                              <td class="text-right"><?= ribuan($data_rw['jumlah_warga_l']); ?></td>
                              <td class="text-right"><?= ribuan($data_rw['jumlah_warga_p']); ?></td>
                            </tr>
                          <?php endif ?>
                          <?php
                          $no_rt = 1;
                          foreach ($data_rw['daftar_rt'] as $data_rt):
                            ?>
                            <?php if ($data_rt['rt'] != '-'): ?>
                              <tr>
                                <td></td>
                                <td></td>
                                <td class="text-center"><?= $no_rt++; ?></td>
                                <td colspan="6">
                                  RT. <?= $data_rt['rt']; ?><?php if ($data_rt['nama_ketua']): ?>, Ketua <?= $data_rt['nama_ketua']; ?><?php endif ?>
                                </td>
                                <td class="text-right"><?= ribuan($data_rt['jumlah_kk']); ?></td>
                                <td class="text-right"><?= ribuan($data_rt['jumlah_warga']); ?></td>
                                <td class="text-right"><?= ribuan($data_rt['jumlah_warga_l']); ?></td>
                                <td class="text-right"><?= ribuan($data_rt['jumlah_warga_p']); ?></td>
                              </tr>
                            <?php endif ?>
                          <?php endforeach; ?>
                        <?php endforeach; ?>
                      <?php endforeach; ?>
                    </tbody>
                    <tfoot>
                      <tr>
                        <th colspan="9">TOTAL</th>
                        <th class="text-right"><?= ribuan($total['total_kk']) ?></th>
                        <th class="text-right"><?= ribuan($total['total_warga']) ?></th>
                        <th class="text-right"><?= ribuan($total['total_warga_l']) ?></th>
                        <th class="text-right"><?= ribuan($total['total_warga_p']) ?></th>
                      </tr>
                    </tfoot>
                </table>
              </div>
              <?php else : ?>
                <div class="no-photo mb-20 flexcenter">
                  <p>Untuk sementara<br/>Data <?=$heading?> belum tersedia.</p>
                  <img src="<?= base_url("$this->theme_folder/$this->theme/assets/images/nofdata1.png") ?>" alt=""/>
                </div>
              <?php endif; ?>
            </div>
          </div>
          <div class="small-screen"><?php $this->load->view($folder_themes .'/partials/kependudukan/navigasi') ?></div>
        </div>
      </div>
    </div>
  </div>
</div>
