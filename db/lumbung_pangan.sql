-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 31, 2025 at 04:26 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `lumbung_pangan`
--

-- --------------------------------------------------------

--
-- Table structure for table `carts`
--

CREATE TABLE `carts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `carts`
--

INSERT INTO `carts` (`id`, `user_id`, `created_at`, `updated_at`) VALUES
(1, 1, '2025-01-29 00:23:48', '2025-01-29 00:23:48');

-- --------------------------------------------------------

--
-- Table structure for table `cart_items`
--

CREATE TABLE `cart_items` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `cart_id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `quantity` int(11) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `cart_items`
--

INSERT INTO `cart_items` (`id`, `cart_id`, `product_id`, `quantity`, `price`, `created_at`, `updated_at`) VALUES
(2, 1, 16, 10, 10000.00, '2025-01-29 00:53:13', '2025-01-29 00:53:35'),
(16, 1, 1, 2, 17000.00, '2025-01-30 18:26:16', '2025-01-30 18:26:16');

-- --------------------------------------------------------

--
-- Table structure for table `kategori_produk`
--

CREATE TABLE `kategori_produk` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama` varchar(255) NOT NULL,
  `deskripsi` text NOT NULL,
  `path_img` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `kategori_produk`
--

INSERT INTO `kategori_produk` (`id`, `nama`, `deskripsi`, `path_img`) VALUES
(1, 'Perikanan', 'Produk hasil laut dan budidaya ikan seperti ikan segar, udang, dan rumput laut.', 'https://images.unsplash.com/photo-1690379718150-2c721c4de868?w=600&auto=format&fit=crop&q=60&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxzZWFyY2h8MTB8fGZpc2hlcnl8ZW58MHx8MHx8fDA%3D'),
(2, 'Perkebunan', 'Produk hasil perkebunan seperti kopi, teh, kelapa sawit, dan cokelat.', 'https://images.unsplash.com/photo-1433704334812-6c45b0b8784d?q=80&w=2074&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D'),
(3, 'Pertanian', 'Produk hasil pertanian seperti padi, jagung, sayuran, dan buah-buahan.', 'https://plus.unsplash.com/premium_photo-1661854008793-8ce54b2e622b?q=80&w=2069&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D'),
(4, 'Peternakan', 'Produk hasil peternakan seperti daging sapi, ayam, telur, dan susu.', 'https://images.unsplash.com/photo-1511117833895-4b473c0b85d6?q=80&w=2070&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2024_12_15_185934_create_kategori_produk_table', 1),
(2, '2024_12_15_191914_create_produk_table', 1),
(3, '2024_12_15_193251_create_user_table', 1),
(4, '2024_12_15_193316_create_cart_table', 1),
(5, '2024_12_15_193335_create_cart_item_table', 1),
(6, '2024_12_15_193348_create_transaksi_table', 1),
(7, '2025_01_29_124900_add_jumlah_terjual_to_products_table', 2),
(8, '2025_01_29_124914_add_jumlah_terjual_to_products_table', 2);

-- --------------------------------------------------------

--
-- Table structure for table `produk`
--

CREATE TABLE `produk` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama` varchar(255) NOT NULL,
  `deskripsi` text NOT NULL,
  `harga` decimal(10,2) NOT NULL,
  `kategori_id` bigint(20) UNSIGNED NOT NULL,
  `path_img` varchar(255) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `produk`
--

INSERT INTO `produk` (`id`, `nama`, `deskripsi`, `harga`, `kategori_id`, `path_img`, `jumlah`, `created_at`) VALUES
(1, 'Bawang Merah', 'Bawang merah memerlukan tanah dengan drainase baik dan iklim kering saat panen untuk menghindari pembusukan. Dapat ditanam di lahan sawah tadah hujan atau dataran rendah.\r\n\r\nBibit: Menggunakan umbi bibit varietas unggul seperti Bima Brebes, Super Philip, dan Tuk Tuk. Umbi bibit memiliki ukuran 5–10 gram per siung.\r\nLuas Tanah: Diperlukan sekitar 1–1,5 ton umbi bibit per hektare dengan jarak tanam 15x15 cm.\r\nEstimasi Panen: 55–70 hari setelah tanam, tergantung varietas dan kondisi lingkungan.\r\nHasil Panen: Rata-rata 10–15 ton umbi basah per hektare. Setelah dikeringkan, hasilnya sekitar 7–10 ton umbi kering.\r\n\r\nHarga/ kg', 17000.00, 3, 'images/cc7ethkkIq8uYoSBbJhfjxBrnVYADrPvrtlsrAOZ.jpg', 10, NULL),
(2, 'Beras', 'Padi merupakan tanaman pangan utama di Indonesia. Ditanam di lahan sawah dengan sistem irigasi yang baik untuk meningkatkan hasil produksi.\r\n\r\nBibit: Menggunakan varietas unggul seperti Ciherang, Inpari, IR64, dan Mekongga.\r\nLuas Tanah: Dibutuhkan 25–30 kg benih per hektare dengan sistem tanam jajar legowo untuk efisiensi lahan.\r\nEstimasi Panen: 90–120 hari setelah tanam, tergantung varietas dan lokasi tanam.\r\nHasil Panen: 5–7 ton gabah kering per hektare. Setelah penggilingan, diperoleh sekitar 3,5–4,5 ton beras.\r\n\r\nHarga/kg', 13000.00, 3, 'images/zdIdIQlDYszXWRQJ4U61CihRaWF6HwBsEjVXCzfF.jpg', 100, NULL),
(3, 'Cabai', 'Cabai memiliki nilai ekonomi tinggi. Dapat ditanam di dataran rendah maupun tinggi dengan irigasi teratur.\r\n\r\nBibit: Menggunakan varietas unggul seperti Lado, TM99, dan Bara. Benih berasal dari biji buah matang yang diseleksi.\r\nLuas Tanah: Diperlukan 1–1,5 kg benih per hektare dengan jarak tanam 50x60 cm.\r\nEstimasi Panen: 75–90 hari setelah tanam dan dapat dipanen bertahap hingga 6 bulan.\r\nHasil Panen: 10–15 ton cabai segar per hektare.\r\n\r\nHarga/kg', 20000.00, 3, 'images/iQReyiSm6pqw02F3Ibs8gU8AWcO5fIMDLl1wvg09.jpg', 39, NULL),
(4, 'Garam', 'Garam diproduksi dengan metode evaporasi air laut menggunakan sinar matahari. Indonesia menghasilkan garam rakyat dan garam industri yang memiliki kualitas berbeda.\r\n\r\nBibit: Menggunakan air laut berkualitas dengan kadar garam tinggi.\r\nLuas Tanah: Petakan tambak garam berkisar 1–5 hektare per petani dengan sistem evaporasi.\r\nEstimasi Panen: 14–30 hari setelah air laut masuk ke tambak dan mengalami penguapan.\r\nHasil Panen: 60–100 ton per hektare per musim panen.\r\n\r\nHarga/kg', 5000.00, 3, 'images/LNsq7AjUYMV5m7Tm5NN3BnUGwNMYl2fRvvzZdrT0.jpg', 10, NULL),
(5, 'Jagung', 'Jagung menjadi bahan pangan dan pakan ternak. Tanaman ini tahan kekeringan dan dapat tumbuh di berbagai kondisi tanah.\r\n\r\nBibit: Menggunakan varietas unggul seperti Bisi-2, Pioner 32, dan NK Perkasa.\r\nLuas Tanah: Diperlukan 20–25 kg benih per hektare dengan jarak tanam 70x20 cm.\r\nEstimasi Panen: 90–110 hari setelah tanam.\r\nHasil Panen: 6–10 ton pipilan kering per hektare.\r\n\r\nHarga/kg', 30000.00, 3, 'images/SaVEN5rC3k5KhJJCKpU41bonlWtjajE2XZm4F2oB.jpg', 50, NULL),
(6, 'Kacang Tanah', 'Kacang tanah banyak digunakan dalam industri makanan seperti selai kacang dan minyak kacang. Tumbuh optimal di tanah gembur dengan curah hujan moderat.\r\n\r\nBibit: Menggunakan varietas unggul seperti Talam 1, Talam 2, dan Hypoma 1.\r\nLuas Tanah: Diperlukan 50–80 kg benih per hektare dengan jarak tanam 40x20 cm.\r\nEstimasi Panen: 90–110 hari setelah tanam.\r\nHasil Panen: 1,5–2,5 ton biji kering per hektare.\r\n\r\nHarga/kg', 15000.00, 3, 'images/UkGpytFl8UlBmovRcUnXMOmt3I0YAiLYsyNsHoCk.jpg', 35, NULL),
(7, 'Kentang', 'Kentang lebih cocok ditanam di dataran tinggi dengan suhu 15–20°C. Merupakan bahan utama dalam berbagai olahan makanan seperti kentang goreng dan keripik.\r\n\r\nBibit: Menggunakan umbi bibit varietas Granola, Atlantic, dan Margahayu.\r\nLuas Tanah: Diperlukan sekitar 1,5–2 ton bibit per hektare dengan jarak tanam 70x30 cm.\r\nEstimasi Panen: 90–120 hari setelah tanam.\r\nHasil Panen: 15–25 ton umbi segar per hektare.\r\n\r\nHarga/kg', 30000.00, 3, 'images/Ok8Q6YHJh0REUOthx1SVH7nzuVPOVIlctP6oghVN.jpg', 50, NULL),
(8, 'Paprika', 'Paprika banyak dibudidayakan di dataran tinggi dalam rumah kaca (greenhouse) untuk menjaga kualitasnya. Banyak digunakan dalam kuliner sebagai sayuran bernilai ekonomi tinggi.\r\n\r\nBibit: Menggunakan varietas California Wonder dan Bell Boy.\r\nLuas Tanah: Diperlukan 250–300 gram benih per hektare dengan jarak tanam 50x50 cm.\r\nEstimasi Panen: 100–120 hari setelah tanam.\r\nHasil Panen: 10–15 ton per hektare.\r\n\r\nHarga/kg', 45000.00, 3, 'images/FWSoP4n2ndPXjc2OtJggviFZKR4ZLfBN7NY6bTif.jpg', 15, NULL),
(9, 'Ketumbar', 'Ketumbar digunakan sebagai rempah dalam masakan dan memiliki nilai ekspor tinggi. Tanaman ini tumbuh baik di daerah dengan curah hujan rendah hingga sedang.\r\n\r\nBibit: Menggunakan varietas unggul dari biji ketumbar yang telah dikeringkan.\r\nLuas Tanah: Diperlukan 10–15 kg benih per hektare dengan jarak tanam 20x20 cm.\r\nEstimasi Panen: 90–110 hari setelah tanam.\r\nHasil Panen: 1–1,5 ton biji kering per hektare.\r\n\r\nHarga/kg', 10000.00, 3, 'images/6u2W9wZDEsXhgR18JkQW5FoZdsFm5vxtoGJsKnu3.jpg', 20, NULL),
(10, 'Jeruk Nipis', 'Jeruk nipis banyak digunakan dalam kuliner dan pengobatan tradisional. Pohon ini bisa hidup hingga 10–20 tahun dengan perawatan yang baik.\r\n\r\nBibit: Menggunakan bibit okulasi dari varietas unggul seperti jeruk nipis Lokal, Bearss, dan Tahiti.\r\nLuas Tanah: Diperlukan sekitar 200–300 pohon per hektare dengan jarak tanam 5x5 meter.\r\nEstimasi Panen: 2–3 tahun setelah tanam, dengan panen sepanjang tahun.\r\nHasil Panen: 20–30 ton buah per hektare per tahun.\r\n\r\nHarga/kg', 15000.00, 3, 'images/C0sSR5Np9nnUY2O44ny4Vivje3SkMar4URX2l27M.jpg', 50, NULL),
(11, 'Asam', 'Asam banyak digunakan dalam industri makanan, obat-obatan, dan minuman tradisional. Tanaman ini toleran terhadap kondisi tanah kering dan tumbuh baik di daerah tropis.\r\n\r\nBibit: Dapat diperbanyak melalui biji atau cangkok, dengan varietas unggul seperti asam manis dan asam pahit.\r\nLuas Tanah: 200–250 pohon per hektare dengan jarak tanam 5x5 meter.\r\nEstimasi Panen: 4–7 tahun setelah tanam, dengan masa produktif hingga 50 tahun.\r\nHasil Panen: 5–10 ton buah asam kering per hektare per tahun.\r\n\r\nHarga/kg', 7000.00, 2, 'images/WPY0lLRPeOYofZfdBxUE39NJk5pzRaeCSHQV7GdI.jpg', 10, NULL),
(12, 'Cengkeh', 'Cengkeh merupakan komoditas bernilai tinggi yang digunakan dalam industri rokok, rempah-rempah, dan farmasi. Membutuhkan curah hujan tinggi dan tanah subur untuk hasil optimal.\r\n\r\n\r\nBibit: Menggunakan benih dari pohon induk unggul atau stek batang.\r\nLuas Tanah: 150–200 pohon per hektare dengan jarak tanam 7x7 meter.\r\nEstimasi Panen: 5–7 tahun setelah tanam, dengan produksi meningkat setelah 10 tahun.\r\nHasil Panen: 300–700 kg bunga cengkeh kering per hektare per tahun.\r\n\r\nHarga/kg', 50000.00, 2, 'images/upwsjmLLRMI9l88uw8MIqbrOOqYh7bdl0d1kRBt9.jpg', 10, NULL),
(13, 'Kakao', 'Kakao merupakan bahan utama cokelat. Budidayanya memerlukan naungan di awal pertumbuhan dan pemangkasan rutin untuk hasil optimal.\r\n\r\n\r\nBibit: Menggunakan varietas unggul seperti MCC01, MCC02, MCC03, atau grafting dari pohon produktif.\r\nLuas Tanah: 500–1000 pohon per hektare dengan jarak tanam 3x3 meter.\r\nEstimasi Panen: 3–5 tahun setelah tanam, dengan panen utama dua kali setahun.\r\nHasil Panen: 1,5–2 ton biji kering per hektare per tahun.\r\n\r\nHarga/kg', 120000.00, 2, 'images/46bQDntHkyf2PfeFlJ7BZrNq5tEOfyu1BzaH3xna.jpg', 10, NULL),
(14, 'Kapas', 'Kapas merupakan bahan baku utama industri tekstil. Membutuhkan daerah beriklim kering dengan tanah subur untuk hasil optimal.\r\n\r\n\r\nBibit: Menggunakan varietas unggul seperti Kanesia-10 dan Kanesia-11.\r\nLuas Tanah: 100.000–120.000 tanaman per hektare dengan jarak tanam 1x0,5 meter.\r\nEstimasi Panen: 5–6 bulan setelah tanam.\r\nHasil Panen: 1,2–2 ton serat kapas per hektare.\r\n\r\nHarga/kg', 70000.00, 2, 'images/4BBsyfoLgctU4atiCFkkYgvJAJEl99y9EnGcARjU.jpg', 10, NULL),
(15, 'Karet', 'Karet digunakan dalam industri ban dan manufaktur lainnya. Penyadapan lateks dilakukan setiap 2–3 hari sekali untuk menjaga produktivitas.\r\n\r\n\r\n\r\nBibit: Menggunakan varietas unggul seperti PB 260, RRIM 600, dan GT1.\r\nLuas Tanah: 350–500 pohon per hektare dengan jarak tanam 6x6 meter.\r\nEstimasi Panen: 5–7 tahun setelah tanam, produksi optimal setelah 10 tahun.\r\nHasil Panen: 1,5–2 ton lateks kering per hektare per tahun.\r\n\r\nHarga/kg', 15000.00, 2, 'images/APNXTKwDjPVNq3NPwWFUMsrsw3KlPadQkheGHaSY.jpg', 10, NULL),
(16, 'Kelapa', 'Kelapa memiliki banyak manfaat, mulai dari air, daging buah, minyak, hingga serabutnya. Tumbuh baik di daerah pantai dengan curah hujan tinggi.\r\n\r\n\r\nBibit: Menggunakan varietas Genjah, Dalam, atau Hibrida.\r\nLuas Tanah: 100–150 pohon per hektare dengan jarak tanam 7x7 meter.\r\nEstimasi Panen: 4–5 tahun setelah tanam.\r\nHasil Panen: 10.000–15.000 butir kelapa per hektare per tahun.\r\n\r\nHarga/kg', 10000.00, 2, 'images/YWkVIT8aJtcSXbK0Ws682JV32uPzxxvGvK9SiFhM.jpg', 10, NULL),
(17, 'Kayu Manis', 'Kayu manis digunakan dalam industri rempah, makanan, dan farmasi. Bagian yang diambil adalah kulit kayunya yang memiliki aroma khas.\r\n\r\n\r\nBibit: Menggunakan benih atau stek dari varietas unggul.\r\nLuas Tanah: 500–1000 pohon per hektare dengan jarak tanam 3x3 meter.\r\nEstimasi Panen: 6–10 tahun setelah tanam, dengan panen bertahap.\r\nHasil Panen: 2–3 ton kulit kayu kering per hektare per tahun.\r\n\r\nHarga/kg', 36000.00, 2, 'images/6vwKXVK3Z5FZNuyAnDw75YxiQdvXcti9m3cNJoPC.jpg', 10, NULL),
(18, 'Kemiri', 'Kemiri banyak digunakan dalam masakan dan industri minyak. Pohon kemiri juga berfungsi sebagai tanaman konservasi tanah.\r\n\r\n\r\nBibit: Menggunakan benih dari buah matang atau okulasi.\r\nLuas Tanah: 100–150 pohon per hektare dengan jarak tanam 7x7 meter.\r\nEstimasi Panen: 4–6 tahun setelah tanam.\r\nHasil Panen: 2–4 ton biji kering per hektare per tahun.\r\n\r\nHarga/kg', 30000.00, 2, 'images/1aX7jeo4ew2A3EymYe1YoNHhj8O2k1Qp35WHHvu4.jpg', 10, NULL),
(19, 'Kopi', 'Kopi merupakan salah satu komoditas ekspor unggulan Indonesia. Perawatan yang baik seperti pemangkasan dan pemupukan berpengaruh pada kualitas biji kopi.\r\n\r\n\r\nBibit: Varietas Arabika (Gayo, Kintamani) atau Robusta (Lampung, Temanggung).\r\nLuas Tanah: 1.100–1.300 pohon per hektare dengan jarak tanam 2,5x2 meter.\r\nEstimasi Panen: 3–4 tahun setelah tanam.\r\nHasil Panen: 1–2 ton biji kering per hektare per tahun.\r\n\r\nHarga/kg`', 50000.00, 2, 'images/j20QBVgqaKG8PZyfsPTt7olTs8i9cxUeIH4BmxXA.jpg', 10, NULL),
(20, 'Kenari', 'Kenari merupakan komoditas bernilai tinggi dalam industri makanan dan minyak. Bijinya kaya akan lemak sehat dan sering digunakan dalam pembuatan kue serta makanan sehat.\r\n\r\n\r\nBibit: Menggunakan benih dari pohon berkualitas unggul atau cangkok.\r\nLuas Tanah: 80–120 pohon per hektare dengan jarak tanam 10x10 meter.\r\nEstimasi Panen: 8–10 tahun setelah tanam.\r\nHasil Panen: 1–2 ton biji kenari per hektare per tahun.\r\n\r\nHarga/kg', 160000.00, 2, 'images/LZQUWGUlVlEta7zsS5slhLksuvEeTfp81TICxTUo.jpg', 10, NULL),
(21, 'Ikan Bandeng', 'Ikan Bandeng adalah ikan yang toleran terhadap salinitas tinggi dan dapat dibudidayakan di tambak payau. Pemeliharaan meliputi pengendalian kualitas air dan pakan yang baik.\r\n\r\n\r\nBibit: Menggunakan benih bandeng (Chanos chanos) yang berkualitas, biasanya berukuran 5-10 cm.\r\nLuas Lahan: Ditanam di kolam atau tambak seluas 1 hektar.\r\nEstimasi Panen: Bandeng dapat dipanen setelah 4-6 bulan.\r\nHasil Panen: Hasil panen bisa mencapai 3-5 ton per hektar.\r\n\r\nHarga/kg', 35000.00, 1, 'images/Zk4m50AaPcA0KyrTylcNf0bI1ueOOPs9Jx1aV6oV.jpg', 10, NULL),
(22, 'Ikan Cakalang', 'Ikan Cakalang adalah ikan pelagis yang memerlukan pakan alami seperti plankton. Pemeliharaan meliputi pengendalian kualitas air dan pakan.\r\n\r\n\r\nBibit: Menggunakan benih cakalang (Katsuwonus pelamis) yang berkualitas.\r\nLuas Lahan: Dapat dibudidayakan di laut atau keramba jaring apung dengan luas 1 hektar.\r\nEstimasi Panen: Cakalang dapat dipanen setelah 6-12 bulan, tergantung pada ukuran yang diinginkan.\r\nHasil Panen: Hasil panen bisa mencapai 2-4 ton per hektar.\r\n\r\nHarga/kg', 39000.00, 1, 'images/koWfZfxMDxK1OFRY3yPiDYOyi5JWBL7weRMfTnUL.jpg', 10, NULL),
(23, 'Cumi', 'Cumi memerlukan lingkungan yang bersih dan kaya akan pakan alami. Pemeliharaan meliputi pengendalian kualitas air dan pakan\r\n\r\n\r\nBibit: Menggunakan benih cumi (Loligo spp.) yang berkualitas.\r\nLuas Lahan: Dapat dibudidayakan di keramba jaring apung atau kolam dengan luas 1 hektar.\r\nEstimasi Panen: Cumi dapat dipanen setelah 3-4 bulan.\r\nHasil Panen: Hasil panen bisa mencapai 1-2 ton per hektar.\r\n\r\nHarga/kg', 65000.00, 1, 'images/LSJy17s58iTCUQ7JuvbTVYb6354uHTgWub93HFik.jpg', 10, NULL),
(24, 'Udang', 'Udang memerlukan kualitas air yang baik dan pakan yang seimbang. Pemeliharaan meliputi pengendalian hama dan penyakit\r\n\r\n\r\nBibit: Menggunakan benih udang (Litopenaeus vannamei) yang berkualitas.\r\nLuas Lahan: Ditanam di tambak seluas 1 hektar.\r\nEstimasi Panen: Udang dapat dipanen setelah 3-4 bulan.\r\nHasil Panen: Hasil panen bisa mencapai 5-10 ton per hektar.\r\n\r\nHarga/kg', 50000.00, 1, 'images/crejVjPsf9FnqT8ZlyrzaeqCQsZX1BccH4apllrM.jpg', 10, NULL),
(25, 'Ikan Gurame', 'Ikan Gurame adalah ikan air tawar yang memerlukan kolam dengan kualitas air yang baik. Pemeliharaan meliputi pengendalian pakan dan kualitas air.\r\n\r\n\r\nBibit: Menggunakan benih gurame (Osphronemus goramy) yang berkualitas, biasanya berukuran 5-10 cm.\r\nLuas Lahan: Ditanam di kolam seluas 1 hektar.\r\nEstimasi Panen: Gurame dapat dipanen setelah 6-12 bulan.\r\nHasil Panen: Hasil panen bisa mencapai 2-4 ton per hektar.\r\n\r\nHarga/kg', 26000.00, 1, 'images/z1oIuWa6Mm6zpX8Rei9fkyK9M0kOWM7utTHHhfJn.jpg', 10, NULL),
(26, 'Kepiting', 'Kepiting memerlukan lingkungan yang kaya akan pakan alami dan kualitas air yang baik. Pemeliharaan meliputi pengendalian hama dan penyaki\r\n\r\n\r\nBibit: Menggunakan benih kepiting (Scylla spp.) yang berkualitas.\r\nLuas Lahan: Ditanam di tambak payau seluas 1 hektar.\r\nEstimasi Panen: Kepiting dapat dipanen setelah 4-6 bulan.\r\nHasil Panen: Hasil panen bisa mencapai 1-2 ton per hektar.\r\n\r\nHarga/kg', 135000.00, 1, 'images/jR7luAhObZMDPV1cqJBoLrwPUL0FgzcN9Rxkf04L.jpg', 10, NULL),
(27, 'Ikan Kerapu', 'Ikan Kerapu adalah ikan yang memerlukan pakan hidup dan kualitas air yang baik. Pemeliharaan meliputi pengendalian pakan dan pengawasan terhadap kesehatan ikan\r\n\r\n\r\nBibit: Menggunakan benih kerapu (Epinephelus spp.) yang berkualitas.\r\nLuas Lahan: Dapat dibudidayakan di keramba jaring apung atau kolam dengan luas 1 hektar.\r\nEstimasi Panen: Kerapu dapat dipanen setelah 6-12 bulan.\r\nHasil Panen: Hasil pan en bisa mencapai 1-3 ton per hektar.\r\n\r\nHarga/kg', 75000.00, 1, 'images/h4QbF9ciocmartl84XG21IJi1wLq5UyF99hi8s6l.jpg', 10, NULL),
(28, 'Ikan Lele', 'Ikan Lele adalah ikan yang toleran terhadap kondisi lingkungan yang kurang ideal. Pemeliharaan meliputi pengendalian pakan dan kualitas air.\r\n\r\n\r\nBibit: Menggunakan benih lele (Clarias spp.) yang berkualitas, biasanya berukuran 5-10 cm.\r\nLuas Lahan: Ditanam di kolam seluas 1 hektar.\r\nEstimasi Panen: Lele dapat dipanen setelah 3-4 bulan.\r\nHasil Panen: Hasil panen bisa mencapai 10-15 ton per hektar.\r\n\r\nHarga/kg', 50000.00, 1, 'images/5viUoRCOCgQomDzkfOedu1xGFqPQk2StS6jTNpTS.jpg', 10, NULL),
(29, 'Ikan Nila', 'Ikan Nila adalah ikan air tawar yang mudah dibudidayakan dan memerlukan pakan yang seimbang. Pemeliharaan meliputi pengendalian kualitas air dan pakan.\r\n\r\n\r\nBibit: Menggunakan benih nila (Oreochromis niloticus) yang berkualitas.\r\nLuas Lahan: Ditanam di kolam seluas 1 hektar.\r\nEstimasi Panen: Nila dapat dipanen setelah 4-6 bulan.\r\nHasil Panen: Hasil panen bisa mencapai 3-5 ton per hektar.\r\n\r\nHarga/kg', 50000.00, 1, 'images/1RjugnKnC80D8f7kZv5yFqUGOu23tceP0y82IJ3m.jpg', 10, NULL),
(30, 'Ikan Tongkol', 'Ikan Tongkol adalah ikan pelagis yang memerlukan pakan alami dan kualitas air yang baik. Pemeliharaan meliputi pengendalian pakan dan kualitas air.\r\n\r\n\r\nBibit: Menggunakan benih tongkol (Euthynnus affinis) yang berkualitas.\r\nLuas Lahan: Dapat dibudidayakan di laut atau keramba jaring apung dengan luas 1 hektar.\r\nEstimasi Panen: Tongkol dapat dipanen setelah 6-12 bulan.\r\nHasil Panen: Hasil panen bisa mencapai 2-4 ton per hektar.\r\n\r\nHarga/kg', 35000.00, 1, 'images/zQO0awvtgd5JRuVOVk3QoARfDaW2JKs67VOgkmC8.png', 4, NULL),
(31, 'Ayam', 'Pemeliharaan ayam meliputi pemberian pakan yang seimbang, pengendalian hama, dan menjaga kebersihan kandang.\r\n\r\n\r\nBibit: Menggunakan bibit ayam unggul, seperti ayam broiler untuk daging atau ayam petelur untuk telur.\r\nLuas Lahan: Diperlukan lahan sekitar 100-200 m² untuk 100 ekor ayam.\r\nEstimasi Panen: Ayam broiler siap panen dalam waktu 5-7 minggu, sedangkan ayam petelur mulai bertelur pada usia 5-6 bulan.\r\nHasil Panen: Hasil panen ayam broiler bisa mencapai 2-3 kg per ekor, sedangkan ayam petelur dapat menghasilkan 250-300 butir telur per tahun.\r\n\r\nHarga/ekor', 50000.00, 4, 'images/OAqeQhAN81YvC6ImfYiD5vPc7q7PGnOSUNaAzlZz.jpg', 10, NULL),
(32, 'Domba', 'Domba memerlukan pakan hijauan dan perawatan kesehatan yang baik. Pemeliharaan meliputi pengendalian penyakit dan pemotongan wol.\r\n\r\n\r\nBibit: Menggunakan bibit domba unggul, seperti domba lokal atau domba merino.\r\nLuas Lahan: Diperlukan lahan sekitar 1 hektar untuk 10-15 ekor domba.\r\nEstimasi Panen: Domba siap dipanen setelah 6-12 bulan, tergantung pada tujuan (daging atau wol).\r\nHasil Panen: Hasil panen daging domba bisa mencapai 20-30 kg per ekor, sedangkan wol bisa mencapai 2-5 kg per ekor per tahun.\r\n\r\nHarga/ekor', 3500000.00, 4, 'images/hgAV5KPKEGcSgjnxCx6kyT8RCdUSTmiMPoOR9Wz5.jpg', 10, NULL),
(33, 'Itik', 'Itik memerlukan pakan yang seimbang dan akses ke air untuk mandi. Pemeliharaan meliputi pengendalian hama dan menjaga kebersihan kandang.\r\n\r\n\r\nBibit: Menggunakan bibit itik unggul, seperti itik petelur atau itik pedaging.\r\nLuas Lahan: Diperlukan lahan sekitar 100-200 m² untuk 100 ekor itik.\r\nEstimasi Panen: Itik pedaging siap panen dalam waktu 6-8 minggu, sedangkan itik petelur mulai bertelur pada usia 5-6 bulan.\r\nHasil Panen: Hasil panen itik pedaging bisa mencapai 2-3 kg per ekor, sedangkan itik petelur dapat menghasilkan 200-250 butir telur per tahun.\r\n\r\nHarga/ekor', 55000.00, 4, 'images/J1hm3Nrk2HEc2ZZrKFXGmrGvNDOFNotvImtKh1zQ.jpg', 10, NULL),
(34, 'Kambing', 'Kambing memerlukan pakan hijauan dan perawatan kesehatan yang baik. Pemeliharaan meliputi pengendalian penyakit dan pemotongan bulu.\r\n\r\n\r\nBibit: Menggunakan bibit kambing unggul, seperti kambing Boer atau kambing lokal.\r\nLuas Lahan: Diperlukan lahan sekitar 1 hektar untuk 10-15 ekor kambing.\r\nEstimasi Panen: Kambing siap dipanen setelah 6-12 bulan.\r\nHasil Panen: Hasil panen daging kambing bisa mencapai 20-30 kg per ekor, sedangkan susu kambing bisa mencapai 1-2 liter per hari per ekor.\r\n\r\nHarga/ekor', 4000000.00, 4, 'images/qkj1XCjSmp0z9JukLwtj2s8Uan1cIrHD8eDpuVA7.jpg', 10, NULL),
(35, 'Kelinci', 'Kelinci memerlukan pakan yang seimbang dan kandang yang bersih. Pemeliharaan meliputi pengendalian hama dan penyakit\r\n\r\n\r\nBibit: Menggunakan bibit kelinci unggul, seperti kelinci New Zealand atau Flemish Giant.\r\nLuas Lahan: Diperlukan lahan sekitar 20-50 m² untuk 20-30 ekor kelinci.\r\nEstimasi Panen: Kelinci siap dipanen setelah 3-5 bulan.\r\nHasil Panen: Hasil panen daging kelinci bisa mencapai 2-3 kg per ekor.\r\n\r\nHarga/ekor', 170000.00, 4, 'images/oz6K9HwOk5ubuxJOowZg38Gq1gresnll2pJbCOnl.jpg', 10, NULL),
(36, 'Burung Puyuh', 'Burung Puyuh memerlukan pakan yang kaya nutrisi dan kandang yang nyaman. Pemeliharaan meliputi pengendalian hama dan menjaga kebersihan lingkungan.\r\n\r\n\r\nBibit: Menggunakan bibit puyuh unggul, seperti puyuh petelur atau puyuh pedaging.\r\nLuas Lahan: Diperlukan lahan sekitar 10-20 m² untuk 100 ekor puyuh.\r\nEstimasi Panen: Puyuh pedaging siap panen dalam waktu 4-6 minggu, sedangkan puyuh petelur mulai bertelur pada usia 6-7 minggu.\r\nHasil Panen: Hasil panen puyuh pedaging bisa mencapai 200-300 gram per ekor, sedangkan puyuh petelur dapat menghasilkan 250-300 butir telur per tahun.\r\n\r\n\r\nHarga/ekor', 80000.00, 4, 'images/mqpYe22QtPQ0DFIheViwbjJKgmSdKVtEwPkkILje.jpg', 10, NULL),
(37, 'Sapi', 'Sapi memerlukan pakan hijauan dan perawatan kesehatan yang baik. Pemeliharaan meliputi pengendalian penyakit dan pemeliharaan kebersihan kandang.\r\n\r\n\r\nBibit: Menggunakan bibit sapi unggul, seperti sapi potong atau sapi perah.\r\nLuas Lahan: Diperlukan lahan sekitar 1-2 hektar untuk 1-2 ekor sapi.\r\nEstimasi Panen: Sapi potong siap dipanen setelah 18-24 bulan, sedangkan sapi perah mulai memproduksi susu pada usia 2-3 tahun.\r\nHasil Panen: Hasil panen daging sapi bisa mencapai 250-400 kg per ekor, sedangkan susu sapi perah bisa mencapai 15-25 liter per hari.\r\n\r\n\r\nHarga/ekor', 20000000.00, 4, 'images/zvk8ael6t9rpwAowTeRjtbsovqUimh20ZNMsbJ8a.jpg', 10, NULL),
(38, 'Sarang Walet', 'Sarang walet memerlukan lingkungan yang tenang dan lembab. Pemeliharaan meliputi pengendalian hama dan menjaga kebersihan rumah walet.\r\n\r\n\r\nBibit: Menggunakan sarang walet yang sudah ada atau membangun rumah walet.\r\nLuas Lahan: Diperlukan lahan sekitar 100-200 m² untuk satu rumah walet.\r\nEstimasi Panen: Sarang walet dapat dipanen setelah 6-12 bulan.\r\nHasil Panen: Hasil panen sarang walet bisa mencapai 1-2 kg per bulan, tergantung pada populasi walet.\r\n\r\nHarga/kg', 13000000.00, 4, 'images/7KRQv5as5qt769gA7Qj9Z3bZbYk4n3zdttuPZIf0.jpg', 10, NULL),
(39, 'Telur Ayam', 'Pemeliharaan ayam petelur meliputi pemberian pakan yang seimbang dan menjaga kebersihan kandang.\r\n\r\n\r\nBibit: Menggunakan bibit ayam petelur unggul.\r\nLuas Lahan: Diperlukan lahan sekitar 100-200 m² untuk 100 ekor ayam petelur.\r\nEstimasi Panen: Ayam petelur mulai bertelur pada usia 5-6 bulan.\r\nHasil Panen: Hasil panen telur ayam bisa mencapai 250-300 butir per tahun per ekor.\r\n\r\nHarga/kg', 50000.00, 4, 'images/m2gC9EMQHC2es0guQhrECdmcKxPZDnjPY1gsrspZ.jpg', 10, NULL),
(40, 'Telur Itik', 'Pemeliharaan itik petelur meliputi pemberian pakan yang seimbang dan akses ke air untuk mandi.\r\n\r\n\r\nBibit: Menggunakan bibit itik petelur unggul.\r\nLuas Lahan: Diperlukan lahan sekitar 100-200 m² untuk 100 ekor itik petelur.\r\nEstimasi Panen: Itik petelur mulai bertelur pada usia 5-6 bulan.\r\nHasil Panen: Hasil panen telur itik bisa mencapai 200-250 butir per tahun per ekor.\r\n\r\nHarga/kg', 47000.00, 4, 'images/s09IPsvbJZC9tffnClsoKUibCVtIEM1yrBdQ5OlU.jpg', 10, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `transaksi`
--

CREATE TABLE `transaksi` (
  `id_transaksi` bigint(20) UNSIGNED NOT NULL,
  `id_pelanggan` bigint(20) UNSIGNED NOT NULL,
  `id_produk` bigint(20) UNSIGNED NOT NULL,
  `jumlah` int(11) NOT NULL,
  `harga_total` decimal(10,2) NOT NULL,
  `status` enum('pending','dikemas','dikirim','selesai') NOT NULL,
  `bukti_tf` varchar(255) NOT NULL,
  `tanggal_transaksi` timestamp NOT NULL DEFAULT current_timestamp(),
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `transaksi`
--

INSERT INTO `transaksi` (`id_transaksi`, `id_pelanggan`, `id_produk`, `jumlah`, `harga_total`, `status`, `bukti_tf`, `tanggal_transaksi`, `created_at`, `updated_at`) VALUES
(7, 2, 3, 1, 20000.00, 'selesai', 'bukti_transfer/nNXDizTKkPbYutxF9LoGXBGxdL3gDmzq2YQYNwe5.jpg', '2025-01-30 04:55:14', '2025-01-30 04:55:14', '2025-01-30 04:59:19');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `email` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `gender` enum('male','female') DEFAULT NULL,
  `role` varchar(255) NOT NULL,
  `address` varchar(255) DEFAULT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `birth_date` date DEFAULT NULL,
  `profile_photo` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `email`, `name`, `password`, `gender`, `role`, `address`, `phone`, `birth_date`, `profile_photo`, `created_at`, `updated_at`) VALUES
(1, 'admin123@gmail.com', 'Admin Lumbung Pangan', '$2y$12$aHOpBwL2fM0S15U0eKafxu6sScM8AdK9OipQGaLSlvO3y3Yhr97xi', 'female', 'admin', 'Toddopuli', '085233659983', '1994-01-11', 'profile_photos/RClOiiQB8k1ZIyj802PJT66NY9gIxKq2aNKV3MLj.jpg', NULL, NULL),
(2, 'widyaaprilianiridwan@gmail.com', 'Widya Apriliani Ridwan', '$2y$12$9PAHB9jhDW8sWkO1mvHiBO3Qg9FbJMn2RT1g.MDMsdQio72Ahvm8y', 'female', 'user', 'Perintis Kemerdekaan 7', '085242271149', '2004-04-11', 'profile_photos/qLq4ioaPfvbxXQA4nlNY9xKGOGd8mcVjMKX0htY7.jpg', NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `carts`
--
ALTER TABLE `carts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `carts_user_id_foreign` (`user_id`);

--
-- Indexes for table `cart_items`
--
ALTER TABLE `cart_items`
  ADD PRIMARY KEY (`id`),
  ADD KEY `cart_items_cart_id_foreign` (`cart_id`),
  ADD KEY `cart_items_product_id_foreign` (`product_id`);

--
-- Indexes for table `kategori_produk`
--
ALTER TABLE `kategori_produk`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `produk`
--
ALTER TABLE `produk`
  ADD PRIMARY KEY (`id`),
  ADD KEY `produk_kategori_id_foreign` (`kategori_id`);

--
-- Indexes for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD PRIMARY KEY (`id_transaksi`),
  ADD KEY `transaksi_id_pelanggan_foreign` (`id_pelanggan`),
  ADD KEY `transaksi_id_produk_foreign` (`id_produk`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `carts`
--
ALTER TABLE `carts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `cart_items`
--
ALTER TABLE `cart_items`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `kategori_produk`
--
ALTER TABLE `kategori_produk`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `produk`
--
ALTER TABLE `produk`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT for table `transaksi`
--
ALTER TABLE `transaksi`
  MODIFY `id_transaksi` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `carts`
--
ALTER TABLE `carts`
  ADD CONSTRAINT `carts_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `cart_items`
--
ALTER TABLE `cart_items`
  ADD CONSTRAINT `cart_items_cart_id_foreign` FOREIGN KEY (`cart_id`) REFERENCES `carts` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `cart_items_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `produk` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `produk`
--
ALTER TABLE `produk`
  ADD CONSTRAINT `produk_kategori_id_foreign` FOREIGN KEY (`kategori_id`) REFERENCES `kategori_produk` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD CONSTRAINT `transaksi_id_pelanggan_foreign` FOREIGN KEY (`id_pelanggan`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `transaksi_id_produk_foreign` FOREIGN KEY (`id_produk`) REFERENCES `produk` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
