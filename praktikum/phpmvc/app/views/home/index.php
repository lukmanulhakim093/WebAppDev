<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>LMS - Learning Management System</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Bootstrap Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" rel="stylesheet">

    <style>

        body {
            font-family: Arial, sans-serif;
            background-color: #f8f9fa;
        }

        .navbar {
            background-color: white;
        }

        .navbar-brand {
            font-size: 25px;
            font-weight: bold;
            color: #0d6efd;
        }

        .hero {
            background: linear-gradient(120deg, #0d6efd, #084298);
            color: white;
            padding: 100px 0;
        }

        .hero h1 {
            font-size: 45px;
            font-weight: bold;
        }

        .hero p {
            font-size: 18px;
        }

        .hero img {
            max-width: 100%;
            border-radius: 15px;
        }

        .section-title {
            font-weight: bold;
            margin-bottom: 40px;
        }

        .course-card {
            border: none;
            transition: 0.3s;
        }

        .course-card:hover {
            transform: translateY(-8px);
            box-shadow: 0 5px 20px rgba(0,0,0,0.1);
        }

        .course-card img {
            height: 200px;
            object-fit: cover;
        }

        .category-box {
            background: white;
            padding: 30px;
            border-radius: 10px;
            text-align: center;
            transition: 0.3s;
        }

        .category-box:hover {
            background: #0d6efd;
            color: white;
        }

        .category-box i {
            font-size: 40px;
            margin-bottom: 15px;
            color: #0d6efd;
        }

        .category-box:hover i {
            color: white;
        }

        .feature-box {
            text-align: center;
            padding: 25px;
        }

        .feature-box i {
            font-size: 45px;
            color: #0d6efd;
        }

        .cta {
            background: #0d6efd;
            color: white;
            padding: 60px 0;
        }

        footer {
            background: #212529;
            color: white;
            padding: 40px 0;
        }

    </style>

</head>

<body>

<!-- NAVBAR -->
<nav class="navbar navbar-expand-lg shadow-sm sticky-top">

    <div class="container">

        <a class="navbar-brand" href="#">
            <i class="bi bi-mortarboard-fill"></i> EduLMS
        </a>

        <button class="navbar-toggler" type="button"
            data-bs-toggle="collapse"
            data-bs-target="#navbarMenu">

            <span class="navbar-toggler-icon"></span>

        </button>

        <div class="collapse navbar-collapse" id="navbarMenu">

            <ul class="navbar-nav ms-auto">

                <li class="nav-item">
                    <a class="nav-link active" href="#">Beranda</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="#kursus">Kursus</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="#kategori">Kategori</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="#tentang">Tentang Kami</a>
                </li>
            </ul>

            <div class="ms-lg-3 mt-3 mt-lg-0">

                <a href="login.html" class="btn btn-outline-primary">
                    Login
                </a>

                <a href="register.html" class="btn btn-primary">
                    Daftar
                </a>

            </div>

        </div>

    </div>

</nav>


<!-- HERO SECTION -->
<section class="hero">

    <div class="container">

        <div class="row align-items-center">

            <div class="col-md-6">

                <h1>
                    Tingkatkan Pengetahuan dan Keterampilan Anda
                </h1>

                <p class="mt-4">
                    Belajar kapan saja dan di mana saja melalui
                    platform pembelajaran online yang interaktif
                    dan mudah digunakan.
                </p>

                <a href="#kursus" class="btn btn-light btn-lg mt-3">
                    Jelajahi Kursus
                </a>

                <a href="register.php" class="btn btn-outline-light btn-lg mt-3">
                    Mulai Belajar
                </a>

            </div>

            <div class="col-md-6 text-center mt-5 mt-md-0">

                <img src="<?= BASEURL; ?>/img/komputer.jpg"
                    alt="Online Learning"
                    class="img-fluid">

            </div>

        </div>

    </div>

</section>


<!-- KATEGORI -->
<section class="py-5" id="kategori">

    <div class="container">

        <h2 class="text-center section-title">
            Kategori Pembelajaran
        </h2>

        <div class="row g-4">

            <?php foreach ($data['kategori'] as $item): ?>

                <div class="col-md-3">

                    <div class="category-box shadow-sm">

                        <i class="bi <?= htmlspecialchars($item['icon']) ?>"></i>

                        <h5><?= htmlspecialchars($item['nama_kategori']) ?></h5>

                        <p><?= htmlspecialchars($item['deskripsi']) ?></p>

                    </div>

                </div>

            <?php endforeach; ?>

        </div>

    </div>

</section>


<!-- KURSUS POPULER -->
<section class="py-5 bg-light" id="kursus">

    <div class="container">

        <h2 class="text-center section-title">
            Kursus Populer
        </h2>

        <div class="row g-4">

            <?php if (count($data['kursus']) > 0): ?>

                <?php foreach ($data['kursus'] as $item): ?>

                    <!-- COURSES -->
                    <div class="col-md-4">

                        <div class="card course-card shadow-sm">

                            <img src="<?= htmlspecialchars($item['gambar'] ?: 'assets/images/default-course.jpg') ?>"
                            class="card-img-top"
                            alt="<?= htmlspecialchars($item['judul']) ?>">

                            <div class="card-body">

                                <span class="badge bg-primary">
                                    <?= htmlspecialchars($item['nama_kategori']) ?>
                                </span>

                                <h5 class="card-title mt-3">
                                    <?= htmlspecialchars($item['judul']) ?>
                                </h5>

                                <p class="card-text text-muted">
                                    <?= htmlspecialchars($item['deskripsi']) ?>
                                </p>

                                <div class="d-flex justify-content-between">

                                    <span>
                                        <i class="bi bi-person"></i> <?= number_format($item['jumlah_peserta']) ?> Peserta
                                    </span>

                                    <span class="text-warning">
                                        <i class="bi bi-star-fill"></i> <?= number_format($item['rating'], 1) ?>
                                    </span>

                                </div>

                                <hr>

                                <a href="detail_kursus.php?id=<?= (int)$item['id'] ?>"
                                    class="btn btn-primary w-100">
                                    Lihat Kursus
                                </a>

                            </div>

                        </div>

                    </div>

                <?php endforeach; ?>

            <?php else: ?>

                <div class="col-12 text-center">

                    <p class="text-muted">
                        Belum ada kursus yang tersedia.
                    </p>

                </div>

            <?php endif; ?>

        </div>

         <!-- TOMBOL LIHAT SEMUA KURSUS -->
        <div class="text-center mt-5">

            <a href="<?= BASEURL; ?>/Jelajahi_kursus"
               class="btn btn-outline-primary btn-lg">

                Lihat Semua Kursus

                <i class="bi bi-arrow-right ms-2"></i>

            </a>

        </div>
        <!--END -->

    </div>

</section>


<!-- KEUNGGULAN -->
<section class="py-5" id="tentang">

    <div class="container">

        <h2 class="text-center section-title">
            Mengapa Memilih EduLMS?
        </h2>

        <div class="row">

            <div class="col-md-4">

                <div class="feature-box">

                    <i class="bi bi-laptop"></i>

                    <h5 class="mt-3">
                        Belajar Online
                    </h5>

                    <p class="text-muted">
                        Akses materi pembelajaran kapan saja
                        dan dari mana saja.
                    </p>

                </div>

            </div>

            <div class="col-md-4">

                <div class="feature-box">

                    <i class="bi bi-person-video3"></i>

                    <h5 class="mt-3">
                        Instruktur Profesional
                    </h5>

                    <p class="text-muted">
                        Belajar bersama instruktur yang
                        berpengalaman.
                    </p>

                </div>

            </div>

            <div class="col-md-4">

                <div class="feature-box">

                    <i class="bi bi-award"></i>

                    <h5 class="mt-3">
                        Sertifikat
                    </h5>

                    <p class="text-muted">
                        Dapatkan sertifikat setelah
                        menyelesaikan pembelajaran.
                    </p>

                </div>

            </div>

        </div>

    </div>

</section>


<!-- CTA -->
<section class="cta text-center">

    <div class="container">

        <h2>
            Mulai Perjalanan Belajar Anda!
        </h2>

        <p class="mt-3">
            Bergabunglah dan tingkatkan kemampuan Anda bersama kami.
        </p>

        <a href="register.php" class="btn btn-light btn-lg mt-3">
            Daftar Sekarang
        </a>

    </div>

</section>


<!-- FOOTER -->
<footer>

    <div class="container">

        <div class="row">

            <div class="col-md-6">

                <h4>
                    <i class="bi bi-mortarboard-fill"></i> EduLMS
                </h4>

                <p>
                    Platform pembelajaran online untuk
                    meningkatkan pengetahuan dan keterampilan.
                </p>

            </div>

            <div class="col-md-3">

                <h5>Menu</h5>

                <p><a href="#" class="text-white text-decoration-none">Beranda</a></p>
                <p><a href="#kursus" class="text-white text-decoration-none">Kursus</a></p>
                <p><a href="#tentang" class="text-white text-decoration-none">Tentang Kami</a></p>

            </div>

            <div class="col-md-3">

                <h5>Kontak</h5>

                <p><i class="bi bi-envelope"></i> info@edulms.com</p>

                <p><i class="bi bi-telephone"></i> 0812-0000-0000</p>

            </div>

        </div>

        <hr>

        <div class="text-center">

            <p class="mb-0">
                &copy; 2026 EduLMS. All Rights Reserved.
            </p>

        </div>

    </div>

</footer>


<!-- Bootstrap JavaScript -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
