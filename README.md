# Elementor WPML Independent

Plugin helper untuk pengguna WPML + Elementor. Fungsinya menjaga agar konten Elementor tiap bahasa berdiri sendiri, sehingga ketika Anda menduplikasi atau menerjemahkan page, Theme Builder, atau Template lewat Elementor, layout dan konten antar bahasa tidak saling tarik-menarik (cross-translation sync).

## Masalah yang diselesaikan

Saat WPML dan Elementor dipakai bersamaan, meta data Elementor sering ikut disalin dan disinkronkan antar bahasa. Akibatnya, mengubah layout di satu bahasa bisa menimpa atau menarik layout bahasa lain, terutama pada Theme Builder dan Template (`elementor_library`). Plugin ini mencegah sinkronisasi tersebut agar tiap bahasa punya tampilan yang independen.

## Fitur

- Mencegah cross-translation sync meta Elementor untuk `elementor_library` (Theme Builder, Template, Header, Footer, dan sejenisnya).
- Menyetel bahasa editor Elementor sesuai post yang sedang diedit, agar editor tidak salah mengambil konten dari bahasa lain.
- Bekerja langsung tanpa halaman pengaturan. Cukup aktifkan.
- Independen dari theme. Tidak perlu menambahkan kode ke `functions.php`.

## Kebutuhan

- WordPress 5.0 atau lebih baru
- PHP 7.0 atau lebih baru
- Plugin Elementor
- Plugin WPML (WPML Multilingual CMS beserta modul terkait)

## Instalasi

1. Unduh berkas `elementor-wpml-independent.zip`.
2. Masuk ke dashboard WordPress, buka Plugins, lalu Add New.
3. Klik Upload Plugin, pilih berkas `.zip` tersebut, lalu klik Install Now.
4. Setelah terpasang, klik Activate.

Tidak ada konfigurasi tambahan. Plugin langsung aktif bekerja setelah diaktifkan.

## Cara pakai

Setelah aktif, lanjutkan pekerjaan Elementor dan WPML seperti biasa. Ketika Anda menerjemahkan atau menduplikasi page maupun Theme Builder, ubah layout tiap bahasa sesuai kebutuhan. Perubahan pada satu bahasa tidak akan menimpa bahasa lain.

## Catatan

- Plugin ini hanya membatasi sinkronisasi untuk konteks Elementor, sehingga penerjemahan teks biasa lewat WPML tetap berjalan normal.
- Disarankan melakukan backup sebelum melakukan perubahan besar pada layout multibahasa.

## Lisensi

GPL-2.0-or-later

## Author

GenWork
