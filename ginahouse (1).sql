-- phpMyAdmin SQL Dump
-- version 3.2.4
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Waktu pembuatan: 12. Oktober 2013 jam 12:49
-- Versi Server: 5.1.41
-- Versi PHP: 5.3.1

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `ginahouse`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `admin`
--

CREATE TABLE IF NOT EXISTS `admin` (
  `id_admin` int(11) NOT NULL AUTO_INCREMENT,
  `username_admin` varchar(50) NOT NULL,
  `nama_admin` varchar(100) NOT NULL,
  `password_admin` varchar(50) NOT NULL,
  `email_admin` varchar(70) NOT NULL,
  PRIMARY KEY (`id_admin`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data untuk tabel `admin`
--

INSERT INTO `admin` (`id_admin`, `username_admin`, `nama_admin`, `password_admin`, `email_admin`) VALUES
(1, 'admin', 'Neng Maya', '21232f297a57a5a743894a0e4a801fc3', 'maya@yahoo.com');

-- --------------------------------------------------------

--
-- Struktur dari tabel `captcha`
--

CREATE TABLE IF NOT EXISTS `captcha` (
  `captcha_id` bigint(13) unsigned NOT NULL AUTO_INCREMENT,
  `captcha_time` int(10) unsigned NOT NULL,
  `ip_address` varchar(16) NOT NULL DEFAULT '0',
  `word` varchar(20) NOT NULL,
  PRIMARY KEY (`captcha_id`),
  KEY `word` (`word`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=12 ;

--
-- Dumping data untuk tabel `captcha`
--

INSERT INTO `captcha` (`captcha_id`, `captcha_time`, `ip_address`, `word`) VALUES
(6, 1369841511, '::1', 'OHRb0UcL'),
(7, 1369842136, '::1', 'o4UOToWh'),
(8, 1369842159, '::1', 'FpcSlTXC'),
(9, 1369842382, '::1', '4JhU1czS'),
(10, 1369842707, '::1', '0pbSeK6W'),
(11, 1369847068, '::1', 'DlpRAC6Z');

-- --------------------------------------------------------

--
-- Struktur dari tabel `costumer`
--

CREATE TABLE IF NOT EXISTS `costumer` (
  `id_costumer` int(11) NOT NULL AUTO_INCREMENT,
  `nama_costumer` varchar(70) NOT NULL,
  `alamat_costumer` text NOT NULL,
  `email_costumer` varchar(100) NOT NULL,
  `user_name` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `date_join_costumer` date NOT NULL,
  PRIMARY KEY (`id_costumer`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dumping data untuk tabel `costumer`
--

INSERT INTO `costumer` (`id_costumer`, `nama_costumer`, `alamat_costumer`, `email_costumer`, `user_name`, `password`, `date_join_costumer`) VALUES
(1, 'maya', 'asd', 'maebee@yahoo.com', 'maiia', '12345', '2013-06-04'),
(5, 'idan', 'lim|||', 'maiai@yahoo.com', 'dan', '9180b4da3f0c7e80975fad685f7f134e', '0000-00-00'),
(6, 'fazira', 'samsi tirta|||', 'zia@yahoo.com', 'zia', '223344', '0000-00-00'),
(7, 'coba', 'jalan', 'coba@coba.com', 'coba', '21232f297a57a5a743894a0e4a801fc3', '2013-08-17');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kategori_product`
--

CREATE TABLE IF NOT EXISTS `kategori_product` (
  `id_kategori` int(11) NOT NULL AUTO_INCREMENT,
  `nama_kategori` varchar(100) NOT NULL,
  PRIMARY KEY (`id_kategori`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dumping data untuk tabel `kategori_product`
--

INSERT INTO `kategori_product` (`id_kategori`, `nama_kategori`) VALUES
(3, 'Jilbab'),
(4, 'coba'),
(5, 'welcome'),
(6, 'bisa'),
(7, 'zoya');

-- --------------------------------------------------------

--
-- Struktur dari tabel `konfirmasi`
--

CREATE TABLE IF NOT EXISTS `konfirmasi` (
  `id_konfirmasi` int(11) NOT NULL AUTO_INCREMENT,
  `no_transaksi` varchar(25) NOT NULL,
  `costumer_id` int(11) NOT NULL,
  `nama_bank` varchar(50) NOT NULL,
  `no_rekening` varchar(50) NOT NULL,
  `tanggal_konfirmasi` date NOT NULL,
  `telepon_transfer` varchar(30) NOT NULL,
  `tanggal_transfer` date NOT NULL,
  `catatan` text NOT NULL,
  PRIMARY KEY (`id_konfirmasi`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

--
-- Dumping data untuk tabel `konfirmasi`
--

INSERT INTO `konfirmasi` (`id_konfirmasi`, `no_transaksi`, `costumer_id`, `nama_bank`, `no_rekening`, `tanggal_konfirmasi`, `telepon_transfer`, `tanggal_transfer`, `catatan`) VALUES
(6, '1234456', 5, 'BCA', '03482390420', '0000-00-00', '0873423477', '2010-01-01', 'XCatalajskldj'),
(7, '1234456', 5, 'BCA', '03482390420', '2013-05-29', '0873423477', '2010-01-01', 'cataggsam'),
(8, '1234456', 5, 'BCA', '03482390420', '2013-05-29', '0873423477', '2010-01-01', 'cataggsam'),
(9, '1234456', 5, 'BCA', '03482390420', '2013-05-29', '0873423477', '2010-01-01', 'cataggsam');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kurir`
--

CREATE TABLE IF NOT EXISTS `kurir` (
  `id_kurir` int(11) NOT NULL AUTO_INCREMENT,
  `provinsi_kurir` varchar(75) NOT NULL,
  `kota_kurir` varchar(100) NOT NULL,
  `biaya_kurir` int(11) NOT NULL,
  `lama_kurir` int(11) NOT NULL,
  PRIMARY KEY (`id_kurir`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data untuk tabel `kurir`
--

INSERT INTO `kurir` (`id_kurir`, `provinsi_kurir`, `kota_kurir`, `biaya_kurir`, `lama_kurir`) VALUES
(1, 'Jawa Barat', 'Cianjur', 1000, 1),
(3, 'Jawa Barat', 'Sukabumi', 0, 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `news`
--

CREATE TABLE IF NOT EXISTS `news` (
  `id_news` int(11) NOT NULL AUTO_INCREMENT,
  `judul_news` varchar(100) NOT NULL,
  `description_news` text NOT NULL,
  `date_news` date NOT NULL,
  `status_news` enum('0','1') NOT NULL,
  PRIMARY KEY (`id_news`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data untuk tabel `news`
--

INSERT INTO `news` (`id_news`, `judul_news`, `description_news`, `date_news`, `status_news`) VALUES
(2, 'Coba', 'Isi COba, Isi COba, Isi COba, Isi COba, Isi COba, Isi COba', '2013-05-01', '1'),
(3, 'Coba', 'djalskdjalskj', '2013-05-01', '1');

-- --------------------------------------------------------

--
-- Struktur dari tabel `page_web`
--

CREATE TABLE IF NOT EXISTS `page_web` (
  `id_page` int(11) NOT NULL AUTO_INCREMENT,
  `judul_page` varchar(100) NOT NULL,
  `deskripsi_page` text NOT NULL,
  `status_page` enum('0','1') NOT NULL,
  PRIMARY KEY (`id_page`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data untuk tabel `page_web`
--

INSERT INTO `page_web` (`id_page`, `judul_page`, `deskripsi_page`, `status_page`) VALUES
(1, 'Cara Order', '<p>Tata Cara Order website toko online di Gina House adalah :</p>\r\n<ol>\r\n<li>Silahkan email ke kami&nbsp;<a title="Kirim email perihal Order Toko Online" href="mailto:ecommercemurah@gmail.com" target="_blank"><em><strong>ginahouse13@gmail.com</strong></em></a>, dengan subject ORDER TOKO ONLINE, sertakan juga nama domain yang akan anda daftarkan. Pastikan bahwa domain yang anda kirimkan belum diregister oleh orang lain.&nbsp;<em>( jika anda bingung untuk mengecek nama domain, silahkan hubungi admin *)</em></li>\r\n<li>Lakukan pembayaran kepada kami sebesar&nbsp;<strong>Rp. 225.000</strong>&nbsp;yang di transfer ke Rekening kami.</li>\r\n<li>Konfirmasikan perihal transfer anda kepada kami via SMS dengan format<strong>TRF_NAM_JUMLAH_NAMADOMAIN</strong>&nbsp;kirim ke&nbsp;<strong>08131 444 5757</strong></li>\r\n<li>Setelah pembayaran anda kami terima, maka kami akan melakukan proses pendaftaran domain anda, dan proses pembangunan website toko online akan kami lakukan.</li>\r\n<li>Anda bisa mengecek perihal progres pembuatan website toko online secara onlnine, dengan cara membuka domain yang anda pesan.</li>\r\n<li>Jika pekerjaan kami sudah seselai, maka kami akan memberitahukan kepada anda.</li>\r\n</ol>\r\n<p>Demikian perihal tata cara order toko online di Ginahouse</p>', '1'),
(2, 'Hubungi Kami', '<p>Jika ada pertanyaan seputar produk dari Gina House, silahkan hubungi kami di :</p>\r\n<p>ECommerceMurah.Com<br />Jl. Dr. Muwardi Timur VII No. 29<br />Semarang &ndash; Jawa Tengah 50198<br />Phone : 08131 444 5757</p>', '1'),
(3, 'Tentang Kami', '<p>E-Commerce Murah adalah sebuah bidang usaha yang bergerak dibidang Informasi Teknologi. Kami memberikan solusi tentang IT,Pelatihan, Seminar Internet Marketing dan lain &ndash; lain yang berhubungan dengan dunia IT. Kami juga memberikan solsusi bagi para pelaku usaha di seluruh Indonesia untuk memasarkan produk mereka.</p>\r\n<p>E Commerce Murah memberikan solusi jitu kepada para pelaku UKM yaitu memberikan media online berupa WEBSITE TOKO ONLINE atau WEB E-COMMERCE. Diharapkan dengan adanya media yang kami sediakan ini, penjualan produk para pelaku UKM di Indonesia akan menunjukan peningkatan yang sangat pesat.</p>\r\n<p>Selain untuk media penjualan, website toko online ini juga bisa sebagai media promosi didunia maya. Dimana promosi di dunia maya sudah tidak diragukan lagi. Banyak para pengusaha kecil yang sukses berkat dunia maya atau internet.</p>\r\n<p>Sesuai dengan nama kami Gina House, maka kami memberikan media toko online ini dengan harga yang sangat terjangkau untuk seluruh pelaku UKM di seluruh Indonesia. Anggap saja ini adalah investasi awal yang akan menjadikan anda menjadi seorang pengusaha sukses.</p>\r\n<p>Untuk mendapatkan media toko online yang sangat poerfull ini, anda hanya menginvestasikan sebesar Rp. 225.000,- untuk satu tahun. Kami yakin untuk investasi sebesar itu dan akan mendapatkan feedback yang sangat besar bukanlah menjadi halangan anda unutk menjadi SUKSES.</p>\r\n<p>Tunggu apa lagi?? Gunakan penawaran kami dengan sebaik &ndash; baiknya. Mari ONLINEKAN USAHA ANDA SEKARANG JUGA !!</p>\r\n<p><em><strong>Catatan :</strong></em></p>\r\n<p><em>Kegiatan kami adalah dilakukan full online, jadi semua transaksi kami lakukan dengan online. Jika anda ingin berkonsultasi secara langsung silahkan kunjungi alamat kami yang tertera diwebsite&nbsp;Gina House</em></p>\r\n<p>&nbsp;</p>\r\n<p>Regards,</p>\r\n<p>Admin Gina House</p>', '1'),
(4, 'Site Map', '<p>Site Map</p>', '1'),
(5, 'services', '<p>Service Kami Dimulai Dari Hari Senin-Sabtu Jam 08.00-17.00</p>', '1'),
(6, 'Privacy Policy', '<ol>\r\n<li>Seluruh informasi pribadi yang Anda berikan kepada ginara.com dilindungi oleh Ginara.com. Informasi yang kami kumpulkan adalah data personal anda yang akan kami gunakan untuk keperluan pengiriman barang dan konfirmasi pemesanan barang yang anda masukkan pada waktu pemesanan barang, seperti: Nama Lengkap, Alamat Rumah, Email, dan Nomor Telephone anda.</li>\r\n<li>Tujuan utama kami dalam pengumpulan data pribadi anda adalah untuk keamanan, kelancaran pemberian layanan dalam bertransaksi. Data pribadi yang telah anda berikan akan kami gunakan untuk keperluan :<ol>\r\n<li>Memberikan pelayanan dan support pelanggan seperti yang anda inginkan</li>\r\n<li>Memproses transaksi belanja</li>\r\n<li>Mempermudah proses pembayaran</li>\r\n<li>Keperluan konfirmasi pembayaran</li>\r\n<li>Mempermudah pengiriman barang</li>\r\n</ol></li>\r\n<li>Jika anda terdaftar sebagai member di ginara.com, anda dapat mengubah data pribadi di &ldquo;Akun&rdquo;</li>\r\n<li>Jika ada pertanyaan mengenai Privacy Policy, silahkan kunjungi halaman "<a href="../../page/contact" target="_blank">Hubungi Kami</a>"</li>\r\n</ol>', '1');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pembelian`
--

CREATE TABLE IF NOT EXISTS `pembelian` (
  `id_pembelian` int(11) NOT NULL AUTO_INCREMENT,
  `total` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `no_transaksi` varchar(25) NOT NULL,
  `date_order` date NOT NULL,
  `status` varchar(30) NOT NULL,
  `jenis_pembayaran` varchar(100) NOT NULL,
  PRIMARY KEY (`id_pembelian`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data untuk tabel `pembelian`
--

INSERT INTO `pembelian` (`id_pembelian`, `total`, `quantity`, `no_transaksi`, `date_order`, `status`, `jenis_pembayaran`) VALUES
(1, 7644, 1, '163629201306040', '2013-06-04', 'pending', 'Transfer BCA - 327717277177 - ');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pembeliandetail`
--

CREATE TABLE IF NOT EXISTS `pembeliandetail` (
  `id_pembeliandetail` int(11) NOT NULL AUTO_INCREMENT,
  `no_transaksi` varchar(25) NOT NULL,
  `product_id` int(11) NOT NULL,
  `sub_total` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `costumer_id` int(11) NOT NULL,
  PRIMARY KEY (`id_pembeliandetail`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data untuk tabel `pembeliandetail`
--

INSERT INTO `pembeliandetail` (`id_pembeliandetail`, `no_transaksi`, `product_id`, `sub_total`, `quantity`, `costumer_id`) VALUES
(1, '163629201306040', 7, 7644, 1, 5);

-- --------------------------------------------------------

--
-- Struktur dari tabel `pengiriman`
--

CREATE TABLE IF NOT EXISTS `pengiriman` (
  `id_pengiriman` int(11) NOT NULL AUTO_INCREMENT,
  `no_transaksi` varchar(25) NOT NULL,
  `costumer_id` int(11) NOT NULL,
  `alamat_pengiriman` text NOT NULL,
  `jenis_pengiriman` varchar(30) NOT NULL,
  PRIMARY KEY (`id_pengiriman`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data untuk tabel `pengiriman`
--

INSERT INTO `pengiriman` (`id_pengiriman`, `no_transaksi`, `costumer_id`, `alamat_pengiriman`, `jenis_pengiriman`) VALUES
(1, '163629201306040', 5, 'lim|Jawa Barat|Sukabumi|43112', 'Kurir');

-- --------------------------------------------------------

--
-- Struktur dari tabel `product`
--

CREATE TABLE IF NOT EXISTS `product` (
  `id_product` int(11) NOT NULL AUTO_INCREMENT,
  `nama_product` varchar(100) NOT NULL,
  `foto_product` varchar(100) NOT NULL,
  `harga_product` int(11) NOT NULL,
  `stok_product` int(5) NOT NULL,
  `deskripsi_product` text NOT NULL,
  `diskon_product` tinyint(4) NOT NULL,
  `kategori_id` int(11) NOT NULL,
  `featured_product` enum('0','1') NOT NULL,
  `related_product` varchar(100) NOT NULL,
  `product_star` date NOT NULL,
  `product_finish` date NOT NULL,
  PRIMARY KEY (`id_product`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=15 ;

--
-- Dumping data untuk tabel `product`
--

INSERT INTO `product` (`id_product`, `nama_product`, `foto_product`, `harga_product`, `stok_product`, `deskripsi_product`, `diskon_product`, `kategori_id`, `featured_product`, `related_product`, `product_star`, `product_finish`) VALUES
(7, 'jilbab', '37bae20686c0480700e215df0a4d470f.gif', 7644, 4, 'strfsjtgadfkydd', 0, 12, '0', '', '0000-00-00', '0000-00-00'),
(10, 'jilbab', '43e9068b490e6220aa0bab54772d45c1.jpg', 87000, 200, 'dwdjnbsjbrs', 0, 3, '0', '', '0000-00-00', '0000-00-00'),
(11, 'kerudung', '494aaad0b6a7459ebb6757b3db08bf4d.jpg', 65000, 22, 'kfhbak,eja', 10, 3, '', '', '0000-00-00', '0000-00-00'),
(12, 'jilbab', '81aa9789ce9e1c9915ec20c549d217c3.jpg', 7644, 200, 'desk', 5, 3, '1', '', '2013-04-13', '2013-04-15'),
(13, 'jilbab', '6bf5ef02e7966518eaa04f41f8b86877.jpg', 7644, 5, 'sss', 10, 3, '', '', '2013-04-13', '2013-04-13'),
(14, 'coba', '9afa4e9c91c8a2c95ff3c74c09313189.gif', 100000, 200, 'coba', 20, 3, '1', '7,', '2013-04-10', '2013-04-24');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
