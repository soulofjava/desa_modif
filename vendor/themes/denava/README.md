<h1 align="center">Selamat Datang di Tema DeNava!</h1>

<p align="center">
  <img style="max-width: 100%;" width="500" alt="Tema DeNava" src="https://user-images.githubusercontent.com/46939846/182389893-dce046f9-d335-4ed4-af18-8f3cfa84a515.png">
</p>

## Tentang Tema DeNava
Tema DeNava adalah salah satu tema yang digunakan untuk halaman website OpenSID (Sistem Informasi Desa).

Sebelumnya, ada tema Natra dan tema DeNatra, yang merupakan kependekan dari Natai Raya. Tema Natra adalah pemenang Sayembara Tema Web OpenSID 2019.

## Panduan Penggunaan
Untuk mengkonfigurasi berbagai pengaturan pada tema, Anda dapat melakukan langkah berikut:

### Salin dan Tempel Konfigurasi (tidak wajib)
Salin dan tempel beberapa baris kode konfigurasi di bawah ini sesuai dengan kebutuhan Anda ke dalam file `desa/config/config.php`. 

	$config['chats'] = true; // Munculkan icon chat di halaman website. Jika ingin sesuaikan jam tampil, edit file: partials/home/chats.php dibaris 45 sampai 51

	$config['kode_kota'] = '2207'; // Kode Kota Jadwal Sholat di https://www.ariandi.net/kode

	$config['style'] = 'gogreen'; // Tersedia 3 pilihan warna, ubah dengan menulis tourism, gogreen, atau classic

	$config['widget'] = 'w_grid'; // Ubah style widget dengan menulis w_slide atau w_grid

	$config['hide_banner_layanan'] = true; // Sembunyikan Info Layanan Surat Pengantar di halaman website

	$config['hide_banner_laporan'] = true; // Sembunyikan Info Perkembangan Penduduk di halaman website

	$config['berita_duka'] = 'Isi kalimat duka di sini'; // Sesuaikan kalimat berita duka di tabel Kematian pada Tabel Perkambangan Penduduk.

	$config['ip_address'] = 'ketik_ip_address'; // Tampilkan Halaman Anjungan Tema (URL Utama)

Cara mendapatkan ID Profil Akun Facebook bisa lihat di https://www.natairaya.desa.id/artikel/2019/1/30/memasang-komentar-facebook-di-sistem-informasi-desa

## Fitur Lapak (Manual)
Untuk menambahkan fitur Lapak secara manual, ikuti langkah-langkah berikut:

### Edit File `lapak.json`
1. Buka file `lapak.json` di direktori `denava/partials/lapak/`.

2. Temukan dan edit bagian berikut sesuai petunjuk:
   - `"aktif": false` (ubah `false` menjadi `true` untuk menampilkan Lapak Desa bawaan tema)
   - `"id": "1"` (pastikan id bersifat unik dan urut jika Anda menambahkan produk baru)
   - `"gambar": "akar_pinang.jpg"` (nama gambar, mp4, atau file wave/wom yang ada di folder `denava/assets/lapak`)
   - `"hp": "628115222660"` (nomor HP Penjual)
   - `"lat": "-2.665093"` (Titik koordinat Latitude)
   - `"lng": "111.709899"` (Titik koordinat Langitude)

### Tampilan Produk
Tampilan produk bisa berupa gambar, mp4, atau bahkan embed dari YouTube. Misalnya, jika Anda ingin menampilkan produk dengan gambar, Anda cukup menyertakan nama gambar dalam file `lapak.json`.

Jika Anda ingin menampilkan produk menggunakan video YouTube, cukup tambahkan ID video YouTube ke dalam file `lapak.json`. Misalnya, jika tautan YouTube adalah https://youtu.be/R2-vCJisOPY, Anda hanya perlu menambahkan ID video, yaitu `R2-vCJisOPY`.

## Fitur Galeri Video (Manual)
Untuk menambahkan fitur Galeri Video secara manual, ikuti langkah-langkah berikut:

### Edit File `video.json`
1. Buka file `video.json` di direktori `desa/themes/denava/partials/video/`.

2. Temukan dan edit bagian berikut sesuai petunjuk:
   - `"aktif": false` (ubah `false` menjadi `true` untuk menampilkan Galeri Video)
   - `"id": "1"` (pastikan id bersifat unik dan urut jika Anda menambahkan video baru)
   - `"youtube": "R2-vCJisOPY"` (ganti dengan link video YouTube yang ingin Anda tambahkan)

### Tampilan Embed dari YouTube
Untuk menampilkan video dari YouTube, cukup gunakan ID video dari tautan YouTube. Misalnya, jika tautan YouTube adalah https://youtu.be/R2-vCJisOPY, Anda hanya perlu menambahkan ID video, yaitu `R2-vCJisOPY`.

## Keterangan Tambahan
Berikut adalah langkah-langkah untuk melakukan perubahan pada Tema DeNava:

### Ubah Background Header
Untuk mengubah latar belakang header, ikuti langkah berikut:
- Unggah gambar latar website melalui menu "Pengaturan Halaman Admin".
- Atau, ganti file "header.jpg" di direktori `denava/assets/images`.

### Tambahkan Script pada Bagian Meta Web
Jika Anda ingin menambahkan script pada bagian meta web (sebelum tag `</head>`), ikuti langkah berikut:
- Sisipkan pada file `denava/partials/module_top.php`.

### Tambahkan Script pada Bagian Footer Web
Untuk menambahkan script pada bagian footer web (sebelum tag `</body>`), lakukan hal berikut:
- Sisipkan pada file `denava/partials/module_bottom.php`.

### Sesuaikan Sidebar
Jika Anda perlu menyesuaikan sidebar (tombol bagian atas), ikuti langkah ini:
- Edit file `denava/commons/sidebar.php` sesuai kebutuhan.

### Sesuaikan Banner di Halaman Utama
Untuk mengubah link tujuan dan link gambar pada banner di halaman utama, lakukan hal berikut:
- Edit file `denava/partials/home/banner.php` sesuai kebutuhan.

### Sesuaikan Event yang Muncul di Bagian Atas
Jika Anda ingin mengatur event yang muncul di bagian atas, termasuk hitung mundur manual, ikuti instruksi ini:
- Edit file `denava/partials/event/event.json`.
- Ubah `"defaultevent"` menjadi `true` untuk menampilkan moment event.
- Ubah `"hitungmundur"` menjadi `true` untuk menampilkan countdown.

### Ubah Waktu pada Countdown Otomatis
Jika Anda perlu merubah jam pada countdown otomatis, lakukan langkah berikut:
- Edit file `denava/partials/event/countdown.php`.
- Sesuaikan waktu pada variabel `$customTime` di baris 5 sesuai kebutuhan.

### Aktifkan Autoplay Gambar Artikel pada Halaman Utama
Untuk mengaktifkan autoplay gambar artikel pada halaman utama, ikuti langkah ini:
- Edit file `denava/partials/artikel/index.php`.
- Ubah `"autoPlay": false` menjadi `"autoPlay": true` pada baris 70.

### Sesuaikan Kata pada Status Kehadiran di Halaman Website
Jika Anda ingin menyesuaikan kata pada status kehadiran di halaman website, lakukan hal berikut:
- Edit file `desa/themes/denava/partials/home/aparatur.php` (baris 18, 24, 54, 60).
- Edit file `desa/themes/denava/partials/pemerintah/index.php` (baris 38 dan 46).
- Edit file `desa/themes/denava/widgets/aparatur_desa.php` (baris 32 dan 38).

Pastikan untuk menyimpan perubahan yang Anda buat setelah mengedit file-file tersebut. Semoga panduan ini membantu!
