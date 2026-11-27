
<!DOCTYPE html>
<html lang="id">

<head>

    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Jelajahi Kursus - EduLMS</title>

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Bootstrap Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" rel="stylesheet">

</head>

<body class="bg-light">

<!-- ================= NAVBAR ================= -->

<nav class="navbar navbar-expand-lg navbar-dark bg-primary shadow-sm">

    <div class="container">

        <a class="navbar-brand fw-bold" href="mahasiswa.php">
            <i class="bi bi-mortarboard-fill me-2"></i>
            EduLMS
        </a>

        <button class="navbar-toggler" type="button"
                data-bs-toggle="collapse"
                data-bs-target="#navbarMenu">

            <span class="navbar-toggler-icon"></span>

        </button>

        <div class="collapse navbar-collapse" id="navbarMenu">

            <ul class="navbar-nav ms-auto">

                <li class="nav-item">
                    <a href="mahasiswa.php" class="nav-link">
                        Dashboard
                    </a>
                </li>

                <li class="nav-item">
                    <a href="<?= BASEURL; ?>/jelajahi_kursus" class="nav-link active">
                        Jelajahi Kursus
                    </a>
                </li>

                <li class="nav-item">
                    <a href="kursus_saya.php" class="nav-link">
                        Kursus Saya
                    </a>
                </li>

                <?php if ($user_id): ?>

                    <li class="nav-item">
                        <a href="logout.php" class="nav-link">
                            Keluar
                        </a>
                    </li>

                <?php else: ?>

                    <li class="nav-item">
                        <a href="login.php" class="nav-link">
                            Login
                        </a>
                    </li>

                <?php endif; ?>

            </ul>

        </div>

    </div>

</nav>


<!-- ================= CONTENT ================= -->

<div class="container py-5">

    <!-- NOTIFIKASI -->

    <?php if (($_GET['status'] ?? '') === 'berhasil'): ?>

        <div class="alert alert-success alert-dismissible fade show">

            <i class="bi bi-check-circle-fill me-2"></i>

            Pendaftaran berhasil. Silakan lanjutkan proses pembayaran melalui WhatsApp admin.

            <button type="button" class="btn-close"
                    data-bs-dismiss="alert"></button>

        </div>

    <?php elseif (($_GET['status'] ?? '') === 'sudah_daftar'): ?>

        <div class="alert alert-warning alert-dismissible fade show">

            <i class="bi bi-exclamation-circle-fill me-2"></i>

            Anda sudah pernah mendaftar kursus ini.

            <button type="button" class="btn-close"
                    data-bs-dismiss="alert"></button>

        </div>

    <?php elseif (($_GET['status'] ?? '') === 'kursus_tidak_tersedia'): ?>

        <div class="alert alert-danger alert-dismissible fade show">

            Kursus tidak tersedia atau sudah tidak aktif.

            <button type="button" class="btn-close"
                    data-bs-dismiss="alert"></button>

        </div>

    <?php endif; ?>


    <!-- JUDUL HALAMAN -->

    <div class="mb-4">

        <h3 class="fw-bold">
            Jelajahi Kursus
        </h3>

        <p class="text-muted">
            Temukan kursus yang sesuai dengan minat dan kebutuhan belajar Anda.
        </p>

    </div>


    <!-- PENCARIAN -->

    <div class="card border-0 shadow-sm mb-4">

        <div class="card-body">

            <form method="GET" action="<?= BASEURL; ?>/jelajahi_kursus/index">

                <div class="input-group">

                    <span class="input-group-text bg-white">
                        <i class="bi bi-search"></i>
                    </span>

                    <input type="text"
                           name="keyword"
                           class="form-control"
                           placeholder="Cari judul kursus, kategori, atau dosen..."
                           value="<?= htmlspecialchars($keyword) ?>">

                    <button type="submit" class="btn btn-primary">
                        Cari Kursus
                    </button>

                </div>

            </form>

        </div>

    </div>


    <!-- JUMLAH KURSUS -->

    <div class="d-flex justify-content-between align-items-center mb-3">

        <h5 class="fw-semibold mb-0">
            Katalog Kursus
        </h5>

        <span class="badge bg-primary">
            <?= count($kursus_list) ?> Kursus
        </span>

    </div>


    <!-- DAFTAR KURSUS -->

    <div class="row g-4">

        <?php if (count($kursus_list) > 0): ?>

            <?php foreach ($kursus_list as $kursus): ?>

                <?php

                $status_pendaftaran = $kursus['status_pendaftaran'];

                ?>

                <div class="col-lg-4 col-md-6">

                    <div class="card h-100 border-0 shadow-sm">

                        <!-- GAMBAR KURSUS -->

                        <?php

                        $gambar = !empty($kursus['gambar'])
                            ? $kursus['gambar']
                            : '../../public/img/komputer.jpg';

                        ?>

                        <img src="<?= htmlspecialchars($gambar) ?>"
                             class="card-img-top"
                             alt="Gambar Kursus"
                             style="height: 190px; object-fit: cover;"
                             onerror="this.onerror=null;this.src='public/komputer.jpg';">


                        <div class="card-body d-flex flex-column">

                            <!-- KATEGORI -->

                            <div class="mb-2">

                                <span class="badge bg-light text-primary">

                                    <i class="bi <?= htmlspecialchars($kursus['icon'] ?? 'bi-book') ?> me-1"></i>

                                    <?= htmlspecialchars($kursus['nama_kategori'] ?? 'Umum') ?>

                                </span>

                            </div>


                            <!-- JUDUL -->

                            <h5 class="card-title fw-bold">

                                <?= htmlspecialchars($kursus['judul']) ?>

                            </h5>


                            <!-- DESKRIPSI -->

                            <p class="card-text text-muted">

                                <?= htmlspecialchars(
                                    substr(strip_tags($kursus['deskripsi'] ?? ''), 0, 110)
                                ) ?>...

                            </p>


                            <!-- DOSEN -->

                            <div class="small text-muted mb-2">

                                <i class="bi bi-person me-2"></i>

                                <?= htmlspecialchars($kursus['nama_dosen'] ?? 'Belum ditentukan') ?>

                            </div>


                            <!-- JUMLAH MAHASISWA -->

                            <div class="small text-muted mb-3">

                                <i class="bi bi-people me-2"></i>

                                <?= $kursus['jumlah_mahasiswa'] ?> Peserta

                            </div>


                            <!-- TOMBOL -->

                            <div class="mt-auto">

                                <a href="detail_kursus.php?id=<?= $kursus['id'] ?>"
                                   class="btn btn-outline-primary w-100 mb-2">

                                    <i class="bi bi-info-circle me-1"></i>

                                    Detail Kursus

                                </a>


                                <?php if ($role === 'mahasiswa'): ?>


                                    <?php if ($status_pendaftaran === 'aktif' || $status_pendaftaran === 'selesai'): ?>

                                        <a href="belajar.php?kursus_id=<?= $kursus['id'] ?>"
                                           class="btn btn-success w-100">

                                            <i class="bi bi-play-circle me-1"></i>

                                            Buka Kursus

                                        </a>


                                    <?php elseif ($status_pendaftaran === 'pending'): ?>

                                        <button class="btn btn-warning w-100" disabled>

                                            <i class="bi bi-clock me-1"></i>

                                            Menunggu Verifikasi

                                        </button>


                                    <?php elseif ($status_pendaftaran === 'ditolak'): ?>

                                        <button class="btn btn-danger w-100" disabled>

                                            <i class="bi bi-x-circle me-1"></i>

                                            Pendaftaran Ditolak

                                        </button>


                                    <?php else: ?>


                                        <!-- FORM PENDAFTARAN -->

                                        <form action="proses_pendaftaran.php"
                                              method="POST">

                                            <input type="hidden"
                                                   name="kursus_id"
                                                   value="<?= $kursus['id'] ?>">

                                            <input type="hidden"
                                                   name="sumber"
                                                   value="jelajahi_kursus">

                                            <button type="submit"
                                                    class="btn btn-primary w-100">

                                                <i class="bi bi-plus-circle me-1"></i>

                                                Daftar Kursus

                                            </button>

                                        </form>


                                    <?php endif; ?>


                                <?php elseif (!$user_id): ?>


                                    <a href="login.php"
                                       class="btn btn-primary w-100">

                                        Login untuk Mendaftar

                                    </a>


                                <?php else: ?>


                                    <button class="btn btn-secondary w-100" disabled>

                                        Khusus Mahasiswa

                                    </button>


                                <?php endif; ?>

                            </div>

                        </div>

                    </div>

                </div>

            <?php endforeach; ?>


        <?php else: ?>


            <div class="col-12">

                <div class="card border-0 shadow-sm">

                    <div class="card-body text-center py-5">

                        <i class="bi bi-search display-4 text-muted"></i>

                        <h5 class="mt-3">
                            Kursus Tidak Ditemukan
                        </h5>

                        <p class="text-muted">
                            Belum ada kursus yang sesuai dengan pencarian Anda.
                        </p>

                        <a href="jelajahi_kursus.php"
                           class="btn btn-primary">

                            Lihat Semua Kursus

                        </a>

                    </div>

                </div>

            </div>


        <?php endif; ?>

    </div>

</div>


<!-- ================= FOOTER ================= -->

<footer class="bg-white border-top py-3 mt-5">

    <div class="container text-center text-muted">

        <small>
            &copy; <?= date('Y') ?> EduLMS. All Rights Reserved.
        </small>

    </div>

</footer>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
