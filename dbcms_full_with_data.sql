-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jun 18, 2025 at 05:58 PM
-- Server version: 8.0.30
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dbcms`
--

-- --------------------------------------------------------

--
-- Table structure for table `article`
--

DROP TABLE IF EXISTS `article`;
CREATE TABLE `article` (
  `id` int NOT NULL,
  `date` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `title` varchar(255) DEFAULT NULL,
  `content` text,
  `picture` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `article`
--

INSERT INTO `article` (`id`, `date`, `title`, `content`, `picture`) VALUES
(18, '2025-06-18', 'Tren Fashion Berkelanjutan: Gaya Keren Tanpa Merusak Bumi.', '<p>Fashion bukan hanya soal gaya, tapi juga soal tanggung jawab. Di tahun 2025 ini, tren <strong>fashion berkelanjutan (sustainable fashion)</strong> semakin digemari, terutama oleh generasi muda yang peduli lingkungan.</p>\r\n\r\n<p>Label-label lokal seperti <strong>Sora Earthwear</strong> dan <strong>Langit Biru Project</strong> mulai menarik perhatian karena menghadirkan koleksi dari bahan daur ulang, pewarna alami, hingga model produksi terbatas untuk menghindari limbah berlebih. Tidak hanya ramah lingkungan, desainnya pun tak kalah stylish.</p>\r\n\r\n<p><strong>&quot;Kita bisa tetap tampil keren tanpa harus mengorbankan bumi. Pilihannya sekarang banyak dan makin terjangkau,&quot;</strong> ujar Nadine, fashion enthusiast sekaligus aktivis lingkungan.</p>\r\n\r\n<p>Selain membeli dari brand ramah lingkungan, banyak orang mulai melakukan <strong>upcycle</strong> (mendaur ulang pakaian lama), <strong>swap outfit</strong> (tukar baju dengan teman), hingga membeli pakaian bekas berkualitas tinggi dari thrift shop.</p>\r\n\r\n<p><strong>Tips Bergaya Ramah Lingkungan:</strong></p>\r\n\r\n<ul>\r\n	<li>\r\n	<p>Cek label: Pilih yang berbahan organik atau daur ulang.</p>\r\n	</li>\r\n	<li>\r\n	<p>Rawat pakaian dengan baik agar awet.</p>\r\n	</li>\r\n	<li>\r\n	<p>Kurangi impuls belanja, beli hanya yang benar-benar dibutuhkan.</p>\r\n	</li>\r\n	<li>\r\n	<p>Dukung brand lokal yang transparan soal proses produksinya.</p>\r\n	</li>\r\n</ul>\r\n\r\n<p>Kini, tampil modis tak harus membuat bumi menangis. Saatnya kita berpindah dari fast fashion ke fashion yang lebih bijak dan berdampak positif.</p>\r\n', 'Face Of Future Fashion!! It is our responsibility to change the face of future fashion_.jpg'),
(21, '2025-06-08 14:13:02', 'AI Semakin Canggih, Tapi Apakah Kita Siap? Menyambut Era Kecerdasan Buatan yang Humanis', '<p>Kecerdasan buatan atau <strong>Artificial Intelligence (AI)</strong> kini bukan sekadar teknologi masa depan. Dari asisten virtual, deteksi penyakit, hingga penulisan artikel, AI sudah menjadi bagian dari kehidupan sehari-hari. Namun di balik semua kecanggihan itu, muncul pertanyaan besar: <strong>apakah masyarakat benar-benar siap hidup berdampingan dengan AI?</strong></p>\r\n\r\n<p>Tahun ini, perkembangan AI semakin pesat dengan munculnya model generatif seperti <strong>GPT-4.5 dan O4</strong>, yang mampu menulis kode, membuat desain, hingga menghasilkan video realistis hanya dari perintah teks. Tak heran, banyak industri mulai mengintegrasikan AI untuk efisiensi, mulai dari perbankan hingga pendidikan.</p>\r\n\r\n<p><strong>&ldquo;Teknologi ini sangat membantu, tapi harus diiringi pemahaman etika dan tanggung jawab penggunaannya,&rdquo;</strong> ujar dr. Rizky Andrianto, peneliti bidang etika AI di sebuah universitas teknologi di Yogyakarta.</p>\r\n\r\n<h3><strong>Manfaat yang Mulai Dirasakan:</strong></h3>\r\n\r\n<ul>\r\n	<li>\r\n	<p><strong>Kesehatan</strong>: AI membantu diagnosis dini penyakit seperti kanker dan Alzheimer.</p>\r\n	</li>\r\n	<li>\r\n	<p><strong>Pendidikan</strong>: Platform berbasis AI mampu menyesuaikan pembelajaran dengan gaya belajar siswa.</p>\r\n	</li>\r\n	<li>\r\n	<p><strong>Industri Kreatif</strong>: Seniman digital memanfaatkan AI untuk eksplorasi ide visual dan musik.</p>\r\n	</li>\r\n</ul>\r\n\r\n<p>Namun, di balik kemudahan itu, muncul tantangan besar: <strong>deepfake, disinformasi, dan ancaman terhadap lapangan kerja konvensional</strong>.</p>\r\n\r\n<p>Pemerintah Indonesia sendiri sudah mulai merumuskan <strong>kerangka regulasi etika AI</strong>, yang diharapkan dapat mendorong penggunaan AI secara aman dan bertanggung jawab. Di sisi lain, edukasi publik juga sangat penting, agar masyarakat tidak hanya menjadi pengguna pasif, tapi juga pemilik kendali atas teknologi yang digunakan.</p>\r\n\r\n<h3><strong>Langkah yang Bisa Kita Ambil:</strong></h3>\r\n\r\n<ul>\r\n	<li>\r\n	<p>Pelajari dasar-dasar AI melalui kursus online gratis.</p>\r\n	</li>\r\n	<li>\r\n	<p>Gunakan teknologi secara sadar dan tidak membagikan informasi pribadi secara sembarangan.</p>\r\n	</li>\r\n	<li>\r\n	<p>Dukung pengembangan AI lokal yang berpihak pada kebutuhan masyarakat Indonesia.</p>\r\n	</li>\r\n</ul>\r\n\r\n<p>Era AI bukan tentang menggantikan manusia, tetapi <strong>berkolaborasi untuk masa depan yang lebih baik</strong>. Namun itu hanya bisa tercapai jika kita siap &mdash; secara teknologi, sosial, dan etika.</p>\r\n', 'AI.jpg'),
(22, '2025-06-08 14:15:53', 'Smart Home Makin Pintar: Rumah Masa Depan Kini Jadi Kenyataan', '<p>Bayangkan kamu pulang kerja dan rumahmu otomatis menyalakan lampu, menyesuaikan suhu ruangan, memutar musik favorit, hingga menyiapkan kopi hanya lewat satu perintah suara. Ini bukan adegan film fiksi ilmiah, tapi kenyataan yang kini sudah bisa dinikmati lewat teknologi <strong>smart home</strong>.</p>\r\n\r\n<p>Dengan hadirnya perangkat seperti <strong>Google Nest</strong>, <strong>Amazon Alexa</strong>, dan produk-produk lokal seperti <strong>Bardi</strong> dan <strong>Arbit</strong>, sistem rumah pintar kini semakin mudah dijangkau. Bahkan, banyak pengembang properti di Indonesia yang mulai menyediakan sistem otomasi rumah sejak awal.</p>\r\n\r\n<p><strong>&ldquo;Tren smart home meningkat 30% dalam dua tahun terakhir. Banyak pengguna tertarik karena efisiensi dan kenyamanannya,&rdquo;</strong> ungkap Arman Santosa, CEO startup teknologi rumah pintar di Jakarta.</p>\r\n\r\n<p>Fitur populer antara lain:</p>\r\n\r\n<ul>\r\n	<li>\r\n	<p>Kontrol lampu dan AC dari ponsel</p>\r\n	</li>\r\n	<li>\r\n	<p>Kamera keamanan yang bisa diakses dari mana saja</p>\r\n	</li>\r\n	<li>\r\n	<p>Sensor gerak otomatis dan pengingat pintu/kompor</p>\r\n	</li>\r\n</ul>\r\n\r\n<p>Namun, pengguna juga diimbau waspada terhadap keamanan data dan jaringan Wi-Fi yang menjadi pintu masuk utama bagi perangkat-perangkat ini.</p>\r\n', 'Eco Home System Blog.jpg'),
(23, '2025-06-08 14:19:36', 'Startup Teknologi Indonesia Makin Mendunia: Dari Game ke Green Tech', '<p>Tahun 2025 jadi saksi bangkitnya startup teknologi Indonesia ke panggung global. Tidak hanya di bidang e-commerce dan fintech, kini muncul gelombang baru startup di bidang <strong>game, agritech, hingga teknologi ramah lingkungan</strong>.</p>\r\n\r\n<p>Salah satu yang mencuri perhatian adalah <strong>Greenco.id</strong>, startup yang mengembangkan sistem monitoring emisi karbon berbasis IoT untuk perusahaan manufaktur. Di sisi lain, game buatan lokal seperti <strong>&ldquo;Legenda Nusantara&rdquo;</strong> berhasil menembus pasar Asia Tenggara dengan lebih dari 3 juta unduhan.</p>\r\n\r\n<p><strong>&ldquo;Kami ingin menunjukkan bahwa Indonesia bukan hanya pasar, tapi juga pemain besar dalam inovasi teknologi,&rdquo;</strong> ujar Diah Rahmawati, co-founder Greenco.id.</p>\r\n\r\n<p>Didukung oleh inkubator seperti BEKRAF, Kemendikbudristek, dan investor asing, ekosistem startup nasional menunjukkan pertumbuhan yang positif. Tantangannya kini adalah menjaga keberlanjutan bisnis dan memperkuat talenta digital dalam negeri.</p>\r\n', 'STARTUP.jpg'),
(24, '2025-06-08 14:22:01', 'Waspada Burnout! Ini Cara Mengenali dan Mengatasinya Sebelum Terlambat', '<p>Burnout bukan cuma rasa lelah biasa. Kondisi ini adalah kelelahan emosional dan mental akibat tekanan yang terus-menerus, terutama di dunia kerja. Organisasi Kesehatan Dunia (WHO) bahkan telah mengakui burnout sebagai fenomena pekerjaan yang serius dan perlu ditangani.</p>\r\n\r\n<p><strong>Tanda-tanda kamu mungkin mengalami burnout:</strong></p>\r\n\r\n<ul>\r\n	<li>\r\n	<p>Merasa kelelahan terus-menerus, bahkan setelah istirahat</p>\r\n	</li>\r\n	<li>\r\n	<p>Menjadi sinis atau tidak peduli terhadap pekerjaan</p>\r\n	</li>\r\n	<li>\r\n	<p>Menurunnya produktivitas dan motivasi</p>\r\n	</li>\r\n</ul>\r\n\r\n<p>Psikolog klinis, dr. Tania Kartika, menyarankan untuk tidak mengabaikan tanda-tanda tersebut. <strong>&ldquo;Burnout bisa berkembang jadi depresi jika tidak ditangani. Luangkan waktu untuk istirahat mental, dan jangan takut minta bantuan profesional.&rdquo;</strong></p>\r\n\r\n<p><strong>Tips menghindari burnout:</strong></p>\r\n\r\n<ul>\r\n	<li>\r\n	<p>Buat batasan jam kerja yang jelas</p>\r\n	</li>\r\n	<li>\r\n	<p>Ambil cuti secara berkala, walau hanya staycation</p>\r\n	</li>\r\n	<li>\r\n	<p>Lakukan aktivitas menyenangkan di luar pekerjaan</p>\r\n	</li>\r\n	<li>\r\n	<p>Coba teknik relaksasi seperti meditasi atau journaling</p>\r\n	</li>\r\n</ul>\r\n', 'BURNOUT.jpg'),
(25, '2025-06-08 14:26:27', 'Makanan Fermentasi Naik Daun: Baik untuk Pencernaan, Baik untuk Imun!', '<p>Popularitas makanan fermentasi seperti <strong>tempe, kimchi, yogurt, dan kombucha</strong> meningkat tajam, bukan hanya karena rasanya unik, tetapi juga manfaatnya yang besar untuk <strong>kesehatan usus dan sistem imun</strong>.</p>\r\n\r\n<p>Fermentasi menghasilkan <strong>probiotik alami</strong>, yaitu bakteri baik yang membantu menjaga keseimbangan mikrobiota usus. Penelitian menunjukkan bahwa usus yang sehat berpengaruh langsung terhadap sistem kekebalan tubuh, bahkan kondisi mental.</p>\r\n\r\n<p><strong>&quot;Kesehatan dimulai dari usus. Makanan fermentasi adalah investasi jangka panjang bagi tubuh,&quot;</strong> kata dr. Rifqi Zain, ahli gizi klinis.</p>\r\n\r\n<p><strong>Rekomendasi makanan fermentasi untuk konsumsi harian:</strong></p>\r\n\r\n<ul>\r\n	<li>\r\n	<p><strong>Tempe</strong>: tinggi protein nabati dan mudah diolah</p>\r\n	</li>\r\n	<li>\r\n	<p><strong>Yogurt plain</strong>: tanpa tambahan gula, baik untuk sarapan</p>\r\n	</li>\r\n	<li>\r\n	<p><strong>Kimchi &amp; sauerkraut</strong>: cocok jadi pendamping nasi atau salad</p>\r\n	</li>\r\n	<li>\r\n	<p><strong>Kombucha</strong>: alternatif minuman ringan yang sehat</p>\r\n	</li>\r\n</ul>\r\n\r\n<p>Namun, konsumsilah dalam jumlah wajar dan pastikan produk yang dikonsumsi tidak mengandung bahan tambahan berlebih.</p>\r\n', 'Peuyeum Bandung I Tape Singkong Mentega 500gr.jpg'),
(26, '2025-06-08 14:32:26', 'Menjelajah Labuan Bajo: Surga Bahari yang Tak Hanya Tentang Komodo', '<p>Terkenal sebagai rumah bagi komodo, Labuan Bajo kini menjelma menjadi salah satu destinasi premium wisata bahari Indonesia. Namun, pesonanya jauh lebih luas dari sekadar Taman Nasional Komodo.</p>\r\n\r\n<p>Dengan gugusan pulau-pulau eksotis seperti <strong>Padar</strong>, <strong>Kanawa</strong>, dan <strong>Kelor</strong>, wisatawan disuguhkan panorama yang seolah tak ada habisnya. Aktivitas seperti <strong>snorkeling di Pink Beach</strong>, <strong>hiking ke puncak Pulau Padar</strong>, hingga menyelam di perairan jernih penuh terumbu karang membuat tempat ini layak disebut &ldquo;Raja Ampat-nya Nusa Tenggara&rdquo;.</p>\r\n\r\n<p><strong>&ldquo;Sunset di atas kapal phinisi, ditemani angin laut dan warna langit yang magis &mdash; itu pengalaman yang nggak bisa dibeli di kota besar,&rdquo;</strong> cerita Intan, traveler asal Bandung.</p>\r\n\r\n<p>Tips liburan ke Labuan Bajo:</p>\r\n\r\n<ul>\r\n	<li>\r\n	<p>Pilih liveaboard minimal 2D1N agar bisa mengunjungi banyak pulau</p>\r\n	</li>\r\n	<li>\r\n	<p>Gunakan eco sunscreen agar tidak merusak ekosistem laut</p>\r\n	</li>\r\n	<li>\r\n	<p>Bawa dry bag dan pakaian ringan karena cuaca cenderung panas</p>\r\n	</li>\r\n</ul>\r\n', 'Labuan Bajo, Indonesia.jpg'),
(27, '2025-06-08 14:36:32', 'Staycation Rasa Luar Negeri: Hotel Tersembunyi di Lembang yang Instagramable Banget!', '<p>Tak bisa liburan ke luar negeri? Tenang, di Lembang ada beberapa hotel dan glamping yang menawarkan sensasi &ldquo;escape&rdquo; seolah kamu sedang berada di Eropa atau Jepang, tanpa perlu paspor!</p>\r\n\r\n<p>Salah satunya adalah <strong>Sakura Hills Cabin</strong>, penginapan bernuansa Jepang modern dengan pemandangan pegunungan dan kolam air panas ala onsen. Ada juga <strong>The Lodge Maribaya</strong> yang cocok untuk staycation keluarga, lengkap dengan wahana alam dan spot foto kekinian.</p>\r\n\r\n<p><strong>&quot;Tempatnya nyaman, cocok untuk recharge dari stres kerja. Anak-anak juga senang karena ada aktivitas outdoor,&quot;</strong> kata Rendi, wisatawan asal Jakarta.</p>\r\n\r\n<p>Fasilitas yang biasanya tersedia:</p>\r\n\r\n<ul>\r\n	<li>\r\n	<p>Jacuzzi outdoor dengan view hutan</p>\r\n	</li>\r\n	<li>\r\n	<p>Sarapan lokal &amp; internasional</p>\r\n	</li>\r\n	<li>\r\n	<p>Spot foto tematik (mini Europe, sakura garden, dll.)</p>\r\n	</li>\r\n</ul>\r\n\r\n<p>Pesan jauh hari di musim liburan karena tempat-tempat seperti ini sering fully booked!</p>\r\n', 'Pesona The Lodge Maribaya Lembang Bandung.jpg'),
(28, '2025-06-08 14:39:05', 'Tidur Berkualitas = Hidup Lebih Sehat: Ini Rahasianya', '<p>Di era digital, tidur sering dikorbankan demi scrolling media sosial atau menyelesaikan pekerjaan lembur. Padahal, kurang tidur dapat meningkatkan risiko obesitas, tekanan darah tinggi, hingga gangguan kecemasan.</p>\r\n\r\n<p><strong>Menurut dr. Nia Halim, spesialis tidur,</strong> orang dewasa idealnya tidur 7&ndash;9 jam setiap malam. &ldquo;Tidur adalah momen otak dan tubuh memperbaiki diri. Kualitas tidur lebih penting daripada kuantitasnya,&rdquo; ujarnya.</p>\r\n\r\n<p><strong>Tips tidur nyenyak ala pakar:</strong></p>\r\n\r\n<ul>\r\n	<li>\r\n	<p>Hindari layar gawai 1 jam sebelum tidur</p>\r\n	</li>\r\n	<li>\r\n	<p>Gunakan lampu temaram dan suhu ruangan sejuk</p>\r\n	</li>\r\n	<li>\r\n	<p>Rutin tidur dan bangun di jam yang sama setiap hari</p>\r\n	</li>\r\n	<li>\r\n	<p>Hindari kafein setelah pukul 14.00</p>\r\n	</li>\r\n</ul>\r\n\r\n<p>Dengan tidur cukup, produktivitas meningkat dan suasana hati pun lebih stabil. Ingat, self-care dimulai dari kasur.</p>\r\n', '14 Ways to Stop Snoring at Night.jpg'),
(29, '2025-06-08 15:07:09', 'Hobi Baru, Hidup Baru: Tren Clay Art hingga Urban Gardening di 2025', '<p>Pandemi mengajarkan banyak orang bahwa waktu luang bisa jadi momen paling berharga. Kini, hobi bukan sekadar pelepas stres, tapi juga bentuk ekspresi diri &mdash; bahkan bisa jadi peluang bisnis!</p>\r\n\r\n<p>Tren hobi yang sedang naik daun tahun ini:</p>\r\n\r\n<ul>\r\n	<li>\r\n	<p><strong>Clay art</strong>: bikin anting, gantungan kunci, hingga miniatur lucu</p>\r\n	</li>\r\n	<li>\r\n	<p><strong>Urban gardening</strong>: cocok buat kamu yang tinggal di apartemen</p>\r\n	</li>\r\n	<li>\r\n	<p><strong>Lettering &amp; journaling</strong>: membantu healing dan refleksi diri</p>\r\n	</li>\r\n	<li>\r\n	<p><strong>Solo travel</strong> sebagai cara &ldquo;bertemu diri sendiri&rdquo;</p>\r\n	</li>\r\n</ul>\r\n\r\n<p><strong>Psikolog Inez Salsabila mengatakan</strong>, &ldquo;Hobi memberi ruang untuk berkembang, mengenal diri, dan menemukan kebahagiaan kecil di tengah rutinitas.&rdquo;</p>\r\n\r\n<p>Kalau kamu merasa hidup monoton, mungkin waktunya cari hobi baru!</p>\r\n', '10 Stunning Clay Art Projects You Can Create at Home.jpg'),
(44, '2025-06-18 23:17:05', 'Timnas Indonesia U-23 Tembus Final Piala Asia, Ukir Sejarah Baru!', '<p>Tim Nasional Indonesia U-23 kembali mencatatkan sejarah dengan menembus partai final Piala Asia U-23 2025 setelah menaklukkan Jepang dengan skor 2-1 pada pertandingan semifinal yang berlangsung di Stadion Al Janoub, Qatar.</p>\r\n\r\n<p>Gol kemenangan Garuda Muda dicetak oleh Marselino Ferdinan di menit ke-35 lewat tendangan bebas indah, serta tandukan Bagas Kaffa di menit ke-78 yang memanfaatkan umpan silang Pratama Arhan. Sementara Jepang hanya mampu membalas satu gol lewat serangan cepat di awal babak kedua.</p>\r\n\r\n<p>Pelatih Shin Tae-yong mengungkapkan rasa bangga dan syukur atas pencapaian luar biasa ini. &ldquo;Para pemain telah menunjukkan semangat juang yang tinggi. Kami tidak takut menghadapi lawan mana pun. Ini adalah mimpi yang menjadi kenyataan bagi sepak bola Indonesia,&rdquo; ujarnya dalam konferensi pers usai pertandingan.</p>\r\n\r\n<p>Kemenangan ini membawa Indonesia melaju ke final Piala Asia U-23 untuk pertama kalinya dalam sejarah. Mereka akan menghadapi Korea Selatan yang sebelumnya mengalahkan Uzbekistan lewat adu penalti.</p>\r\n\r\n<p>Ribuan pendukung Indonesia yang hadir di stadion tampak larut dalam euforia kemenangan. Sementara itu, di tanah air, jalanan di beberapa kota besar dipenuhi konvoi dan sorak sorai warga yang menyambut kemenangan Garuda Muda.</p>\r\n\r\n<p>Final dijadwalkan berlangsung pada <strong>Sabtu, 21 Juni 2025</strong>, dan akan disiarkan langsung di beberapa stasiun televisi nasional.</p>\r\n', 'Timnas Indonesia.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `article_author`
--

DROP TABLE IF EXISTS `article_author`;
CREATE TABLE `article_author` (
  `article_id` int NOT NULL,
  `author_id` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `article_author`
--

INSERT INTO `article_author` (`article_id`, `author_id`) VALUES
(18, 3),
(21, 3),
(22, 3),
(23, 3),
(24, 3),
(25, 3),
(44, 3),
(26, 4),
(27, 4),
(28, 4);

-- --------------------------------------------------------

--
-- Table structure for table `article_category`
--

DROP TABLE IF EXISTS `article_category`;
CREATE TABLE `article_category` (
  `article_id` int NOT NULL,
  `category_id` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `article_category`
--

INSERT INTO `article_category` (`article_id`, `category_id`) VALUES
(1, 1),
(18, 1),
(27, 1),
(29, 1),
(32, 1),
(2, 2),
(24, 2),
(25, 2),
(28, 2),
(30, 2),
(34, 2),
(35, 2),
(36, 2),
(37, 2),
(38, 2),
(39, 2),
(40, 2),
(41, 2),
(42, 2),
(43, 2),
(21, 3),
(22, 3),
(23, 3),
(26, 4),
(31, 4),
(44, 5);

-- --------------------------------------------------------

--
-- Table structure for table `author`
--

DROP TABLE IF EXISTS `author`;
CREATE TABLE `author` (
  `id` int NOT NULL,
  `nickname` varchar(100) DEFAULT NULL,
  `email` varchar(150) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `role` enum('user','admin') DEFAULT 'user'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `author`
--

INSERT INTO `author` (`id`, `nickname`, `email`, `password`, `role`) VALUES
(3, 'AYYIIPP', 'admin@gmail.com', '$2y$10$m6QsnrhYnYqFIBT4FM/fP.mAtWOuvSJgGlvQVB4y3/WaEgiDkbQyu', 'admin'),
(4, 'FIYA', 'fiya@gmail.com', '$2y$10$63H2thTMznK5gqvFMzK0Cut1KQhnriBnpV6oyZNvGmJvqrurlGqom', 'user'),
(5, 'LIA', 'liea@gmail.com', '$2y$10$BAl/zjFTm92ae06S.rDkmOJiNGZiwYldZn/IE1zngIzXK.6Ngy7GG', 'user');

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

DROP TABLE IF EXISTS `category`;
CREATE TABLE `category` (
  `id` int NOT NULL,
  `nama` varchar(100) DEFAULT NULL,
  `description` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `nama`, `description`) VALUES
(1, 'Lifestyle', 'Buat hidup anda menjadi tenang'),
(2, 'Kesehatan', 'yoga membantu badan menjadi rileks cuuuyyy'),
(3, 'Teknologi', NULL),
(4, 'Traveling', NULL),
(5, 'Olahraga', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `article`
--
ALTER TABLE `article`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `article_author`
--
ALTER TABLE `article_author`
  ADD PRIMARY KEY (`article_id`),
  ADD KEY `FK_article_author_author` (`author_id`);

--
-- Indexes for table `article_category`
--
ALTER TABLE `article_category`
  ADD PRIMARY KEY (`article_id`),
  ADD KEY `FK_article_category_category` (`category_id`);

--
-- Indexes for table `author`
--
ALTER TABLE `author`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `article`
--
ALTER TABLE `article`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT for table `author`
--
ALTER TABLE `author`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `article_author`
--
ALTER TABLE `article_author`
  ADD CONSTRAINT `FK_article_author_article` FOREIGN KEY (`article_id`) REFERENCES `article` (`id`),
  ADD CONSTRAINT `FK_article_author_author` FOREIGN KEY (`author_id`) REFERENCES `author` (`id`);

--
-- Constraints for table `article_category`
--
ALTER TABLE `article_category`
  ADD CONSTRAINT `FK_article_category_category` FOREIGN KEY (`category_id`) REFERENCES `category` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;