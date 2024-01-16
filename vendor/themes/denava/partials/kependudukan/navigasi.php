<?php defined('BASEPATH') or exit('No direct script access allowed'); ?>

<?php
$is_okt = IS_PREMIUM && (preg_replace("/[^0-9]/", "", AmbilVersi()) >= 231000);
$is_nop = IS_PREMIUM && (preg_replace("/[^0-9]/", "", AmbilVersi()) >= 231010);
if ($is_nop) : $daftar_statistik = daftar_statistik() ; endif;
$slug_aktif       = $is_nop ? str_replace('_', '-', $slug_aktif) : str_replace($is_okt ? [site_url(), 'data-statistik/'] : site_url(), '', current_url());
$s_links = [
    [
        'target' => 'statistikPenduduk',
        $is_okt ? 'label' : 'title' => 'Statistik Penduduk',
        'icon' => 'fa-user iconpenduduk',
        'submenu' => $is_okt ? $daftar_statistik['penduduk'] : [
            ['slug' => 'first/statistik/13', $is_okt ? 'label' : 'title' => 'Umur (Rentang)'],
            ['slug' => 'first/statistik/15', $is_okt ? 'label' : 'title' => 'Umur (Kategori)'],
            ['slug' => 'first/statistik/0', $is_okt ? 'label' : 'title' => 'Pendidikan Dalam KK'],
            ['slug' => 'first/statistik/14', $is_okt ? 'label' : 'title' => 'Pendidikan Sedang Ditempuh'],
            ['slug' => 'first/statistik/1', $is_okt ? 'label' : 'title' => 'Pekerjaan'],
            ['slug' => 'first/statistik/2', $is_okt ? 'label' : 'title' => 'Status Perkawinan'],
            ['slug' => 'first/statistik/3', $is_okt ? 'label' : 'title' => 'Agama'],
            ['slug' => 'first/statistik/4', $is_okt ? 'label' : 'title' => 'Jenis Kelamin'],
            ['slug' => 'first/statistik/5', $is_okt ? 'label' : 'title' => 'Warga Negara'],
            ['slug' => 'first/statistik/6', $is_okt ? 'label' : 'title' => 'Status Penduduk'],
            ['slug' => 'first/statistik/7', $is_okt ? 'label' : 'title' => 'Golongan Darah'],
            ['slug' => 'first/statistik/9', $is_okt ? 'label' : 'title' => 'Penyandang Cacat'],
            ['slug' => 'first/statistik/10', $is_okt ? 'label' : 'title' => 'Penyakit Menahun'],
            ['slug' => 'first/statistik/16', $is_okt ? 'label' : 'title' => 'Akseptor KB'],
            ['slug' => 'first/statistik/17', $is_okt ? 'label' : 'title' => 'Akta Kelahiran'],
            ['slug' => 'first/statistik/18', $is_okt ? 'label' : 'title' => 'Kepemilikan KTP'],
            ['slug' => 'first/statistik/19', $is_okt ? 'label' : 'title' => 'Asuransi Kesehatan'],
            ['slug' => 'first/statistik/covid', $is_okt ? 'label' : 'title' => 'Status Covid'],
            ['slug' => 'first/statistik/suku', $is_okt ? 'label' : 'title' => 'Suku / Etnis'],
            ['slug' => 'first/statistik/hamil', $is_okt ? 'label' : 'title' => 'Status Kehamilan'],
            ['slug' => 'first/statistik/hubungan_kk', $is_okt ? 'label' : 'title' => 'Hubungan Dalam KK'],
            ['slug' => 'first/statistik/bpjs-tenagakerjaan', $is_okt ? 'label' : 'title' => 'BPJS Ketenagakerjaan']
        ]
    ],
    [
        'target' => 'statistikKeluarga',
        $is_okt ? 'label' : 'title' => 'Statistik Keluarga',
        'icon' => 'fa-user iconkeluarga',
        'submenu' => $is_okt ? $daftar_statistik['keluarga'] : [
            ['slug' => 'first/statistik/kelas_sosial', $is_okt ? 'label' : 'title' => 'Kelas Sosial']
        ]
    ],
    [
        'target' => 'statistikBantuan',
        $is_okt ? 'label' : 'title' => 'Statistik Bantuan',
        'icon' => 'fa-user iconbantuan',
        'submenu' => $is_nop ? $daftar_statistik['bantuan'] : [
            ['slug' => 'first/statistik/bantuan_penduduk', $is_okt ? 'label' : 'title' => 'Penerima Bantuan Penduduk'],
            ['slug' => 'first/statistik/bantuan_keluarga', $is_okt ? 'label' : 'title' => 'Penerima Bantuan Keluarga']
        ]
    ],
    [
        'target' => 'statistikLainnya',
        $is_okt ? 'label' : 'title' => 'Statistik Lainnya',
        'icon' => 'fa-user iconlainnya',
        'submenu' => $is_nop ? $daftar_statistik['lainnya'] : [
            ['slug' => 'first/dpt', $is_okt ? 'label' : 'title' => 'Calon Pemilih'],
            ['slug' => 'data-vaksinasi', $is_okt ? 'label' : 'title' => 'Vaksinasi'],
            ['slug' => 'data-wilayah', $is_okt ? 'label' : 'title' => 'Wilayah Administratif']
        ]
    ]
];
?>

<div class="big-screen">
<?php foreach($s_links as $statistik) : ?>
  <?php $is_active = in_array($slug_aktif, array_column($statistik['submenu'], 'slug')) ?>
    <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
      <div class="panel panel-default" style="margin-bottom:10px;">
       <div class="heading-stat bg-grey-medium flexleft border-grey-soft" id="heading-<?= $statistik['target'] ?>" role="tab">
         <a role="button" data-toggle="collapse" data-parent="#accordion" href="#<?= $statistik['target']?>" aria-expanded="<?= $is_active ? 'true' : 'false' ?>" aria-controls="<?= $statistik['target']?>"><div class="flexleft"><i class="fa <?= $statistik['icon'] ?>"></i> <?= $statistik[$is_okt ? 'label' : 'title'] ?></div></a>
       </div>
       <div id="<?= $statistik['target'] ?>" class="panel-collapse collapse<?php $is_active && print('show') ?>" role="tabpanel" aria-labelledby="heading-<?= $statistik['target']?>">
        <div class="panel-box border-grey-soft">
          <?php foreach($statistik['submenu'] as $submenu) : ?>
            <?php
            $stat_slug = in_array($statistik['target'], [(!IS_PREMIUM ? 'statistikPenduduk' : ''), (!IS_PREMIUM ? 'statistikKeluarga' : ''), 'statistikBantuan', 'statistikLainnya']) ? str_replace('first/', '', $submenu[$is_nop ? 'url' : 'slug']) : 'statistik/' . $submenu['key'];
            if ($this->web_menu_model->menu_aktif($stat_slug)) :
            ?>
            <p class="stat-sub" id="statistik_13"><a href="<?= site_url($submenu[$is_nop ? 'url' : 'slug']) ?>" class="<?= $submenu['slug'] == $slug_aktif ? 'stat-active color-1 popin2' : 'hover:cursor-pointer hover:text-primary-100' ?>"><?= $submenu[$is_okt ? 'label' : 'title'] ?></a></p>
            <?php endif ?>
         <?php endforeach ?>
       </div>
     </div>
   </div>
 </div>
<?php endforeach ?>
</div>
<div class="small-screen">
  <?php foreach($s_links as $statistik) : ?>
    <?php $is_active = in_array($slug_aktif, array_column($statistik['submenu'], 'slug')) ?>
    <div class="">
      <div class="panel panel-default" style="margin-bottom:5px !important;">
       <div class="heading-stat bg-grey-medium flexleft border-grey-soft" id="heading-<?= $statistik['target'] ?>" role="tab">
         <a role="button" data-toggle="collapse" data-parent="#accordion" href="#<?= $statistik['target']?>" aria-expanded="<?= $is_active ? 'true' : 'false' ?>" aria-controls="<?= $statistik['target']?>"><div class="flexleft"><i class="fa <?= $statistik['icon'] ?>"></i> <?= $statistik[$is_okt ? 'label' : 'title'] ?></div></a>
       </div>
       <div id="<?= $statistik['target'] ?>">
        <div class="panel-box border-grey-soft">
        <?php foreach($statistik['submenu'] as $submenu) : ?>
            <?php
            $stat_slug = in_array($statistik['target'], [(!IS_PREMIUM ? 'statistikPenduduk' : ''), (!IS_PREMIUM ? 'statistikKeluarga' : ''), 'statistikBantuan', 'statistikLainnya']) ? str_replace('first/', '', $submenu[$is_nop ? 'url' : 'slug']) : 'statistik/' . $submenu['key'];
            if ($this->web_menu_model->menu_aktif($stat_slug)) :
            ?>
            <p class="stat-sub" id="statistik_13"><a href="<?= site_url($submenu[$is_nop ? 'url' : 'slug']) ?>" class="<?= $submenu['slug'] == $slug_aktif ? 'stat-active color-1 popin2' : 'hover:cursor-pointer hover:text-primary-100' ?>"><?= $submenu[$is_okt ? 'label' : 'title'] ?></a></p>
            <?php endif ?>
         <?php endforeach ?>
       </div>
     </div>
   </div>
 </div>
<?php endforeach ?>
</div>
