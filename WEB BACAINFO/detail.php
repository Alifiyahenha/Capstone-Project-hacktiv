<?php
session_start();
include 'koneksi.php';

$id = isset($_GET['id']) ? intval($_GET['id']) : 0;

$query = " 
    SELECT 
        a.title, 
        a.content, 
        a.picture, 
        a.date, 
        au.nickname AS author, 
        k.nama AS category 
    FROM article a 
    LEFT JOIN article_category ac ON a.id = ac.article_id 
    LEFT JOIN category k ON ac.category_id = k.id 
    LEFT JOIN article_author aa ON a.id = aa.article_id 
    LEFT JOIN author au ON aa.author_id = au.id 
    WHERE a.id = $id 
    LIMIT 1
";

$result = mysqli_query($koneksi, $query);
$artikel = mysqli_fetch_assoc($result);
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title><?= $artikel ? htmlspecialchars($artikel['title']) : 'Artikel Tidak Ditemukan' ?></title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        body, html {
            margin: 0;
            padding: 0;
            height: 100%;
        }

        .background-wrapper img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            position: fixed;
            top: 0;
            left: 0;
            z-index: -1;
        }

        .overlay {
            background: rgba(255, 255, 255, 0.06);
            backdrop-filter: blur(10px);
            min-height: 100vh;
            padding: 60px 20px;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .canvas-box {
            background: white;
            border-radius: 20px;
            box-shadow: 0 8px 30px rgba(0, 0, 0, 0.15);
            padding: 30px;
            max-width: 800px;
            width: 100%;
        }

        .canvas-box img {
            max-width: 200px;
            height: auto;
            border-radius: 10px;
            margin-bottom: 20px;
        }

        .canvas-box h2 {
            font-weight: bold;
            color: rgb(0, 0, 0);
        }

        .canvas-box p {
            color: #555;
        }

        .canvas-box small {
            font-style: italic;
            color: #666;
        }
    </style>
</head>
<body>
    <div class="background-wrapper">
        <img src="img/bgkategori.jpg" alt="Background Gambar">
    </div>

    <div class="overlay">
        <div class="canvas-box text-center">
            <?php if ($artikel): ?>
                <h2><?= htmlspecialchars($artikel['title']) ?></h2>
                <p>
                    <small>
                        Kategori: <?= htmlspecialchars($artikel['category']) ?> | 
                        Penulis: <?= htmlspecialchars($artikel['author']) ?> | 
                        Tanggal: <?= date('d M Y', strtotime($artikel['date'])) ?>
                    </small>
                </p>

                <?php if (!empty($artikel['picture'])): ?>
                    <img src="img/<?= htmlspecialchars($artikel['picture']) ?>" alt="<?= htmlspecialchars($artikel['title']) ?>">
                <?php endif; ?>

                <div class="text-left mt-4">
                    <?= $artikel['content'] ?>
                </div>
            <?php else: ?>
                <h2>Artikel tidak ditemukan</h2>
            <?php endif; ?>
        </div>
    </div>
    <footer class="text-center mt-5 mb-3 text-muted">
  &copy; <?= date('Y') ?> Bacainfo. All rights reserved.
</footer>
</body>
</html>
