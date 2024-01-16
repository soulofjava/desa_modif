<?php defined('BASEPATH') or exit('No direct script access allowed'); ?>
<?php
$page1 = $this->uri->segment(1);
$page2 = $this->uri->segment(2); // Yg masih menggunakan first
$page3 = $this->uri->segment(3); // Yg masih menggunakan first
$page5 = $this->uri->segment(5); // SLUG Artikel struktur-organisasi
$page6 = $this->uri->segment(6); // Yg masih menggunakan first struktur-organisasi
switch (true) {
	case ($page5 == 'struktur-organisasi' || $page6 == 'struktur-organisasi'):
	$tampil = 'artikel/statis';
	break;

	case ($page1 == 'artikel' && $page2 == 'kategori'):
	$tampil = 'artikel/index';
	break;

	case ($page1 == 'artikel' || $page2 == 'artikel'):
	$tampil = 'artikel/detail';
	$layout = 'widgets';
	break;

	case ($page1 == 'arsip' || $page2 == 'arsip'):
	$tampil = 'artikel/arsip';
	break;

	case ($page1 == 'data-kelompok' || $page2 == 'kelompok'):
	$tampil = 'kependudukan/kelompok';
	break;

	case ($page1 == 'data-suplemen' || $page2 == 'suplemen'):
	$tampil = 'kependudukan/suplemen';
	break;

	case ($page1 == 'data_analisis' || $page2 == 'data_analisis'):
	$tampil = 'analisis/index';
	break;

	case ($page1 == 'jawaban_analisis' || $page2 == 'jawaban_analisis'):
	$tampil = 'analisis/detail';
	break;

	case (in_array($page1, ['statistik', 'data-wilayah','data-statistik']) || in_array($page2, ['statistik', 'wilayah', 'dpt'])):
	$tampil = 'kependudukan/index';
	$data['tipe'] = $tipe;
	break;

	case (in_array($page1, ['galeri']) && in_array($page2, ['', 'index']) || in_array($page2, ['gallery'])):
	$tampil = 'galeri/index';
	break;

	case ($page1 == 'galeri' && $page2 != '' || $page2 == 'sub_gallery'):
	$tampil = 'galeri/detail';
	break;

	case ($page1 == 'peta' || $page2 == 'peta'):
	$tampil = 'halaman_statis/index';
	$data['halaman_statis'] = $halaman_peta;
	break;

	case (in_array($page1, ['peraturan_desa', 'peraturan-desa']) || in_array($page2, ['peraturan_desa', 'peraturan-desa'])):
	$tampil = 'halaman_statis/peraturan_desa';
	break;

	case (in_array($page1, ['informasi_publik', 'informasi-publik']) || in_array($page2, ['informasi_publik', 'informasi-publik'])):				
	$tampil = 'informasi_publik/index';
	break;

	case ($page1 == 'status-idm' || $page2 == 'status_idm'):
	$tampil = 'halaman_statis/status_idm';
	break;
	
	case ($page1 == 'status-sdgs' || $page2 == 'status_sdgs'):
	$tampil = 'halaman_statis/status_sdgs';
	break;

	case ($page1 == 'lapak'):
	$tampil = 'lapak/index';
	break;

	case ($page1 == 'pembangunan' && $page2 != '' && $page3 == ''):
	$tampil = 'pembangunan/detail';
	break;

	case ($page1 == 'pembangunan' || $page1 != 'first' && in_array($page2, ['', 'index']) && $page3 != ''):
	$tampil = 'pembangunan/index';
	break;

	case ($page1 == 'pengaduan'):
	$tampil = 'pengaduan/index';
	break;

	case ($page1 == 'data-vaksinasi'):
	$tampil = 'vaksin/index';
	break;

	case ($page1 == 'data-lembaga'):
	$tampil = 'kependudukan/kelompok';
	break;
	
	case ($page1 == 'pemerintah'):
	$tampil = 'pemerintah/index';
	break;

	default:
	$tampil = 'artikel/index';
	$layout = 'widgets';
	break;
} ?>
