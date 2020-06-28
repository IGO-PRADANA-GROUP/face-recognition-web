<?php 
//BERITA
berita($tabel,$id,$tanggal,$judul,$foto,$isi);

//DETAIL BERITA
detail_berita($tabel,$id,$tanggal,$judul,$foto,$isi,$proses);

//PRODUK
produk($tabel,$id,$nama,$foto,$kategori,$harga,$stok,$namatombol);

//KATEGORI
kategori($tabel,$id,$nama,$foto,$kategori,$harga,$stok,$namatombol);

//DETAIL PRODUK
detail($tabel,$id,$nama,$foto,$kategori,$harga,$stok,$keterangan,$proses,$namatombol);

//KERANJANG BELANJA
keranjang_belanja($field,$tabel,$id,$tabel_produk,$id_produk,$nama_produk,$foto,$harga,$jumlah,$id_pelanggan,$judul,$pakai_ongkir,$tombolfinish);

//TRANSAKSI
transaksi($tabel,$id,$tabel_produk,$id_produk,$nama_produk,$foto,$harga,$jumlah,$id_pelanggan,$judul,$kode_transaksi,$tanggal);

//SLIDESHOW
slideshow();

//GALERY
galery($tabel,$id,$judul,$foto,$keterangan);

//KONTAK
kontak($nama_perusahaan,$no_telepon,$alamat,$longitude,$latitude);

?>