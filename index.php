<?php include 'koneksi.php'; ?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <title>Index - iPortfolio Bootstrap Template</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="assets/img/favicon.png" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Fonts -->
  <link href="https://fonts.googleapis.com" rel="preconnect">
  <link href="https://fonts.gstatic.com" rel="preconnect" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Raleway:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/aos/aos.css" rel="stylesheet">
  <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

  <!-- Main CSS File -->
  <link href="assets/css/main.css" rel="stylesheet">

  <!-- =======================================================
  * Template Name: iPortfolio
  * Template URL: https://bootstrapmade.com/iportfolio-bootstrap-portfolio-websites-template/
  * Updated: Jun 29 2024 with Bootstrap v5.3.3
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body class="index-page">

  <header id="header" class="header dark-background d-flex flex-column">
    <i class="header-toggle d-xl-none bi bi-list"></i>

    <div class="profile-img">
      <img src="assets/img/logo1.jpeg" alt="" class="img-fluid rounded-circle">
    </div>

    <a href="index.html" class="logo d-flex align-items-center justify-content-center">
      <!-- Uncomment the line below if you also wish to use an image logo -->
      <!-- <img src="assets/img/logo.png" alt=""> -->
      <h1 class="sitename">SMKN 4 KOTA BOGOR</h1>
    </a>

    <div class="social-links text-center">
      <a href="#" class="twitter"><i class="bi bi-twitter-x"></i></a>
      <a href="#" class="facebook"><i class="bi bi-facebook"></i></a>
      <a href="#" class="instagram"><i class="bi bi-instagram"></i></a>
      <a href="#" class="google-plus"><i class="bi bi-skype"></i></a>
      <a href="#" class="linkedin"><i class="bi bi-linkedin"></i></a>
    </div>

    <nav id="navmenu" class="navmenu">
      <ul>
        <li><a href="#hero" class="active"><i class="bi bi-house navicon"></i>Home</a></li>
        <li><a href="#about"><i class="bi bi-person navicon"></i> About</a></li>
        <li><a href="#portfolio"><i class="bi bi-images navicon"></i> Portfolio</a></li>
        <li><a href="#services"><i class="bi bi-hdd-stack navicon"></i> Services</a></li>
        <li class="dropdown"><a href="#"><i class="bi bi-menu-button navicon"></i> <span>Dropdown</span> <i class="bi bi-chevron-down toggle-dropdown"></i></a>
          <ul>
            <li><a href="#">Dropdown 1</a></li>
            <li class="dropdown"><a href="#"><span>Deep Dropdown</span> <i class="bi bi-chevron-down toggle-dropdown"></i></a>
              <ul>
                <li><a href="#">Deep Dropdown 1</a></li>
                <li><a href="#">Deep Dropdown 2</a></li>
                <li><a href="#">Deep Dropdown 3</a></li>
                <li><a href="#">Deep Dropdown 4</a></li>
                <li><a href="#">Deep Dropdown 5</a></li>
              </ul>
            </li>
            <li><a href="#">Dropdown 2</a></li>
            <li><a href="#">Dropdown 3</a></li>
            <li><a href="#">Dropdown 4</a></li>
          </ul>
        </li>
        <li><a href="#contact"><i class="bi bi-envelope navicon"></i> Contact</a></li>
      </ul>
    </nav>

  </header>

  <main class="main">

    <!-- Hero Section -->
    <section id="hero" class="hero section dark-background">

      <img src="assets/img/gedung.jpeg" alt="" data-aos="fade-in" class="">

      <div class="container" data-aos="fade-up" data-aos-delay="100">
        <h2>SMKN 4 KOTA BOGOR</h2>
        <p>KR4BAT <span class="typed" data-typed-items="Senyum, Sapa, Salam, Sopan, Santun">AKHLAK Terpuji  </span><span class="typed-cursor typed-cursor--blink" aria-hidden="true"></span><span class="typed-cursor typed-cursor--blink" aria-hidden="true"></span></p>
      </div>

    </section><!-- /Hero Section -->
<section id="daftar-siswa" class="portfolio section">

  <div class="container section-title" data-aos="fade-up">
    <h2>Daftar Siswa</h2>
    <p>Data siswa aktif yang terdaftar di database sekolah.</p>
  </div><div class="container">
    <div class="row gy-4">
        <?php
        // Mengambil data dari database
        $sql = mysqli_query($conn, "SELECT * FROM siswa ORDER BY nis ASC");
        while($d = mysqli_fetch_array($sql)){
        ?>
        <div class="col-lg-4 col-md-6 mb-4">
            <div class="card shadow-sm border-0" style="border-radius: 15px; overflow: hidden;">
                <img src="assets/img/<?php echo $d['foto']; ?>" class="card-img-top" style="height: 250px; object-fit: cover;">
                
                <div class="card-body text-center">
                    <h5 class="fw-bold mb-1"><?php echo $d['nama_siswa']; ?></h5>
                    <p class="text-primary small mb-2">NIS: <?php echo $d['nis']; ?></p>
                    
                    <div class="d-flex justify-content-center gap-2 mb-3">
                        <span class="badge bg-secondary"><?php echo ($d['jk'] == 'L') ? 'Laki-laki' : 'Perempuan'; ?></span>
                    </div>
                    
                    <p class="card-text small text-muted">
                        <i class="bi bi-geo-alt-fill"></i> <?php echo $d['alamat']; ?>
                    </p>
                </div>
            </div>
        </div>
        <?php } ?>
    </div>
  </div>

</section>
    <!-- About Section -->
    <section id="about" class="about section">

      <!-- Section Title -->
      <div class="container section-title" data-aos="fade-up">
        <h2>Ekstrakurikuler Siswa</h2>
        <p>Ekstrakurikuler di SMKN 4 KOTA BOGOR meliputi Pramuka,Paskibra,PMR,Padus,Band,Baskel,Voli,Putsal,Pencak Silat.</p>
      </div><!-- End Section Title -->

      <div class="container" data-aos="fade-up" data-aos-delay="100">

        <div class="row gy-4 justify-content-center">
          <div class="col-lg-4">
            <img src="assets/img/ESKUL1.png" class="img-fluid" alt="">
          </div>
          <div class="col-lg-8 content">
            <h2>Kegiatan Pengembangan Minat & Bakat Siswa</h2>
            <p class="fst-italic py-3">
              Ekatrakurikuler merupakan wadah bagi siswa untuk mengembangkan potensi, kreativitas, serta keterampilan di luar kegiatan akademik.
            </p>
            <div class="row">
              <div class="col-lg-6">
                <ul>
                  <li><i class="bi bi-chevron-right"></i> <strong>Pramuka</strong> 
                  <li><i class="bi bi-chevron-right"></i> <strong>Paskibra</strong> 
                  <li><i class="bi bi-chevron-right"></i> <strong>PMR</strong> 
                  <li><i class="bi bi-chevron-right"></i> <strong>Padus</strong> 
                </ul>
              </div>
              <div class="col-lg-6">
                <ul>
                  <li><i class="bi bi-chevron-right"></i> <strong>Basket</strong> 
                  <li><i class="bi bi-chevron-right"></i> <strong>Rohis</strong> 
                  <li><i class="bi bi-chevron-right"></i> <strong>Futsal</strong> 
                  <li><i class="bi bi-chevron-right"></i> <strong>Pencak Silat</strong> 
                </ul>
              </div>
            </div>
            <p class="py-3">
            Melalui kegiatan ekstrakurikuler, siswa dapat meningkatkan kemampuan kerja sama, disiplin, serta rasa 
            percaya diri yang bermanfaat untuk kehidupan di masa depan. 
          </div>
        </div>

      </div>

    </section><!-- /About Section -->

    <!-- Stats Section -->
    <section id="stats" class="stats section">

      <div class="container" data-aos="fade-up" data-aos-delay="100">

        <div class="row gy-4">

          <div class="col-lg-3 col-md-6">
            <div class="stats-item">
              <i class="bi bi-people-fill"></i>
              <span data-purecounter-start="0" data-purecounter-end="1160" data-purecounter-duration="1" class="purecounter"></span>
              <p><strong>Jumlah Siswa</strong> <span>Siswa Aktif</span></p>
            </div>
          </div><!-- End Stats Item -->

          <div class="col-lg-3 col-md-6">
            <div class="stats-item">
              <i class="bi bi-mortarboard-fill"></i>
              <span data-purecounter-start="0" data-purecounter-end="57" data-purecounter-duration="1" class="purecounter"></span>
              <p><strong>Guru Tenaga</strong> <span>Kependidikan</span></p>
            </div>
          </div><!-- End Stats Item -->

          <div class="col-lg-3 col-md-6">
            <div class="stats-item">
              <i class="bi bi-building"></i>
              <span data-purecounter-start="0" data-purecounter-end="30" data-purecounter-duration="1" class="purecounter"></span>
              <p><strong>Rombongan Belajar</strong> <span>Tingkat Rombongan Belajar</span></p>
            </div>
          </div><!-- End Stats Item -->

          <div class="col-lg-3 col-md-6">
            <div class="stats-item">
              <i class="bi bi-door-open-fill"></i>
              <span data-purecounter-start="0" data-purecounter-end="33" data-purecounter-duration="1" class="purecounter"></span>
              <p><strong>Ruang Kelas</strong> <span>Jumlah Ruang Kelas</span></p>
            </div>
          </div><!-- End Stats Item -->

        </div>

      </div>

    </section><!-- /Stats Section -->

    <!-- Skills Section -->
    <section id="skills" class="skills section light-background">

      <div class="container section-title" data-aos="fade-up">
        <h2>Kompetensi Keahlian</h2>
        <p>SMKN 4 Bogor membekali siswa dengan 4 pilar kompetensi utama untuk mencetak lulusan yang kompetitif di industri global.</p>
      </div><style>
        .skill-card {
          background: var(--surface-color);
          padding: 30px;
          box-shadow: 0px 0px 20px rgba(0, 0, 0, 0.1);
          border-radius: 10px;
          height: 100%;
          transition: 0.3s;
        }
        .skill-card:hover {
          transform: translateY(-5px);
        }
        .skill-icon {
          width: 50px;
          height: 50px;
          border-radius: 50%;
          display: flex;
          align-items: center;
          justify-content: center;
          margin-bottom: 20px;
          font-size: 24px;
          color: #fff;
        }
        .expertise-text {
          display: flex;
          justify-content: space-between;
          font-weight: 600;
          font-size: 13px;
          margin-bottom: 8px;
          color: var(--heading-color);
        }
        .skill-card h3 {
          font-size: 20px;
          font-weight: 700;
          margin-bottom: 10px;
        }
        .skill-card p {
          font-size: 14px;
          color: var(--default-color);
          margin-bottom: 20px;
        }
        /* Warna Progress Bar Custom */
        .progress-custom { height: 7px; background: #eee; border-radius: 5px; overflow: hidden; }
        .progress-bar-fill { height: 100%; border-radius: 5px; }
      </style>

      <div class="container" data-aos="fade-up" data-aos-delay="100">

        <div class="row gy-4">

          <div class="col-lg-3 col-md-6">
            <div class="skill-card">
              <div class="skill-icon" style="background: #2487ce;"><i class="bi bi-code-slash"></i></div>
              <h3>PPLG</h3>
              <p>Pengembangan Perangkat Lunak dan Gim; Fokus pada Coding, AI, dan Web Apps.</p>
              <div class="expertise-text">Expertise <span>95%</span></div>
              <div class="progress-custom">
                <div class="progress-bar-fill" style="width: 95%; background: #2487ce;"></div>
              </div>
            </div>
          </div>

          <div class="col-lg-3 col-md-6">
            <div class="skill-card">
              <div class="skill-icon" style="background: #3ec1d5;"><i class="bi bi-cpu"></i></div>
              <h3>TJKT</h3>
              <p>Teknik Jaringan Komputer & Telekomunikasi; Ahli Infrastruktur dan Cyber Security.</p>
              <div class="expertise-text">Expertise <span>90%</span></div>
              <div class="progress-custom">
                <div class="progress-bar-fill" style="width: 90%; background: #3ec1d5;"></div>
              </div>
            </div>
          </div>

          <div class="col-lg-3 col-md-6">
            <div class="skill-card">
              <div class="skill-icon" style="background: #ff901c;"><i class="bi bi-car-front"></i></div>
              <h3>Teknik Otomotif</h3>
              <p>Pemeliharaan mesin kendaraan ringan, sistem kelistrikan, dan teknologi mobil listrik.</p>
              <div class="expertise-text">Expertise <span>92%</span></div>
              <div class="progress-custom">
                <div class="progress-bar-fill" style="width: 92%; background: #ff901c;"></div>
              </div>
            </div>
          </div>

          <div class="col-lg-3 col-md-6">
            <div class="skill-card">
              <div class="skill-icon" style="background: #ef4444;"><i class="bi bi-fire"></i></div>
              <h3>Teknik Pengelasan</h3>
              <p>Spesialisasi pengelasan industri, fabrikasi logam, dan standar kualitas internasional.</p>
              <div class="expertise-text">Expertise <span>88%</span></div>
              <div class="progress-custom">
                <div class="progress-bar-fill" style="width: 88%; background: #ef4444;"></div>
              </div>
            </div>
          </div>

        </div>

      </div>

    </section>```

              <div class="progress-bar-wrap">
                <div class="progress-bar" role="progressbar" aria-valuenow="90" aria-valuemin="0" aria-valuemax="100"></div>
              </div>
            </div><!-- End Skills Item -->

            <div class="progress">
              <span class="skill"><span>Photoshop</span> <i class="val">55%</i></span>
              <div class="progress-bar-wrap">
                <div class="progress-bar" role="progressbar" aria-valuenow="55" aria-valuemin="0" aria-valuemax="100"></div>
              </div>
            </div><!-- End Skills Item -->

          </div>

        </div>

      </div>

    </section><!-- /Skills Section -->

    <div class="main-content"> 
    
    <div class="container-fluid py-4" style="background-color: #f4f6f9; min-vh-100;">
        <div class="text-center mb-5">
            <h2 class="fw-bold text-dark position-relative d-inline-block pb-2">
                Berita & Instagram
                <span class="position-absolute bottom-0 start-50 translate-middle-x bg-primary" style="width: 60px; height: 4px; border-radius: 2px;"></span>
            </h2>
            <p class="text-muted mt-2">Posting terbaru dari Instagram SMKN 4 Bogor</p>
        </div>

        <div class="row g-4">
            
            <?php
            $berita_feeds = [
                [
                    "link" => "https://www.instagram.com/p/DYjDurjFJQb/?utm_source=ig_web_copy_link&igsh=MzRlODBiNWFlZA==",
                    "judul" => "Materi Kewirausahaan",
                    "sub" => "Dari Syahril Aulia",
                    "likes" => "204",
                    "bg" => "linear-gradient(135deg, #3498db, #2c3e50)"
                ],
                [
                    "link" => "https://www.instagram.com/p/DT2NchWiTeV/",
                    "judul" => "Penyerahan Penghargaan",
                    "sub" => "Kepada Para Siswa Berprestasi",
                    "likes" => "467",
                    "bg" => "linear-gradient(135deg, #2ecc71, #27ae60)"
                ],
                [
                    "link" => "https://www.instagram.com/p/DXOgxEoFMXy/",
                    "judul" => "Sholat Dhuha Bersama",
                    "sub" => "Dan Keputrian SMKN 4 Bogor",
                    "likes" => "231",
                    "bg" => "linear-gradient(135deg, #1abc9c, #16a085)"
                ]
            ];

            foreach ($berita_feeds as $feed) :
            ?>
            <div class="col-md-4">
                <div class="card p-3 shadow-sm" style="border: none; border-radius: 12px; background: white;">
                    <div class="d-flex align-items-center mb-3">
                        <div class="rounded-circle bg-dark me-2 d-flex align-items-center justify-content-center text-white fw-bold" style="width: 40px; height: 40px; font-size: 11px;">SMK</div>
                        <div>
                            <h6 class="fw-bold mb-0 small">smkn4kotabogor_</h6>
                            <span class="text-muted" style="font-size: 11px;">7,235 followers</span>
                        </div>
                        <a href="<?= $feed['link']; ?>" target="_blank" class="btn btn-sm btn-outline-primary ms-auto py-1 px-2 fw-semibold" style="font-size: 12px;">View profile</a>
                    </div>
                    
                    <a href="<?= $feed['link']; ?>" target="_blank" class="text-decoration-none">
                        <div class="rounded d-flex align-items-center justify-content-center text-white p-4 text-center" style="height: 260px; background: <?= $feed['bg']; ?>; width: 100%;">
                            <div>
                                <i class="bi bi-instagram display-4 mb-2 opacity-75"></i>
                                <h5 class="fw-bold mb-1"><?= $feed['judul']; ?></h5>
                                <p class="small opacity-90 mb-0"><?= $feed['sub']; ?></p>
                            </div>
                        </div>
                    </a>
                    
                    <div class="mt-3">
                        <div class="d-flex justify-content-between text-muted mb-2" style="font-size: 14px;">
                            <div>
                                <i class="bi bi-heart-fill text-danger me-1"></i> <span class="fw-bold text-dark"><?= $feed['likes']; ?></span> likes
                            </div>
                            <i class="bi bi-bookmark-fill text-primary"></i>
                        </div>
                        <p class="text-muted small mb-0" style="font-size: 12px;">Klik gambar untuk melihat postingan asli</p>
                    </div>
                </div>
            </div>
            <?php endforeach; ?>

        </div>
    </div>
    </div>
   

    <!-- Contact Section -->
    <section id="contact" class="contact section">

      <!-- Section Title -->
      <div class="container section-title" data-aos="fade-up">
        <h2>Hubungi Kami</h2>
        <p>Hubungi Kami Untuk Informasi Lebih Lanjut</p>
      </div><!-- End Section Title -->

      <div class="container" data-aos="fade-up" data-aos-delay="100">

        <div class="row gy-4">

          <div class="col-lg-5">

            <div class="info-wrap">
              <div class="info-item d-flex" data-aos="fade-up" data-aos-delay="200">
                <i class="bi bi-geo-alt flex-shrink-0"></i>
                <div>
                  <h3>Alamat</h3>
                  <p>Jl. Raya Tajur, Kp. Buntar RT.02/RW.08, Kel.
                     Muara sari, Kec. Bogor Selatan, RT.03/RW.08, Muarasari,
                      Kec. Bogor Sel., Kota Bogor, Jawa Barat 16137</p>
                </div>
              </div><!-- End Info Item -->

              <div class="info-item d-flex" data-aos="fade-up" data-aos-delay="300">
                <i class="bi bi-telephone flex-shrink-0"></i>
                <div>
                  <h3>Telepon</h3>
                  <p>(0251) 123456</p>
                </div>
              </div><!-- End Info Item -->

              <div class="info-item d-flex" data-aos="fade-up" data-aos-delay="400">
                <i class="bi bi-envelope flex-shrink-0"></i>
                <div>
                  <h3>Email Resmi</h3>
                  <p>info@smkn4bogor.sch.id</p>
                </div>
              </div><!-- End Info Item -->

             <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3963.049814425624!2d106.82211637420793!3d-6.64073336491741!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e69c8b16ee0ece5%3A0xdb63143c7264bf63!2sSMK%20Negeri%204%20Bogor!5e0!3m2!1sid!2sid!4v1716382100000!5m2!1sid!2sid" 
        frameborder="0" 
        style="border:0; width: 100%; height: 270px; border-radius: 8px;" 
        allowfullscreen="" 
        loading="lazy" 
        referrerpolicy="no-referrer-when-downgrade">
</iframe>
            </div>
          </div>

          <div class="col-lg-7">
            <form action="forms/contact.php" method="post" class="php-email-form" data-aos="fade-up" data-aos-delay="200">
              <div class="row gy-4">

                <div class="col-md-6">
                  <label for="name-field" class="pb-2">Your Name</label>
                  <input type="text" name="name" id="name-field" class="form-control" required="">
                </div>

                <div class="col-md-6">
                  <label for="email-field" class="pb-2">Your Email</label>
                  <input type="email" class="form-control" name="email" id="email-field" required="">
                </div>

                <div class="col-md-12">
                  <label for="subject-field" class="pb-2">Subject</label>
                  <input type="text" class="form-control" name="subject" id="subject-field" required="">
                </div>

                <div class="col-md-12">
                  <label for="message-field" class="pb-2">Message</label>
                  <textarea class="form-control" name="message" rows="10" id="message-field" required=""></textarea>
                </div>

                <div class="col-md-12 text-center">
                  <div class="loading">Loading</div>
                  <div class="error-message"></div>
                  <div class="sent-message">Your message has been sent. Thank you!</div>

                  <button type="submit">Send Message</button>
                </div>

              </div>
            </form>
          </div><!-- End Contact Form -->

        </div>

      </div>

    </section><!-- /Contact Section -->

  </main>

  <footer id="footer" class="footer position-relative light-background">

    <div class="container">
      <div class="copyright text-center ">
        <p>© <span>Copyright</span> <strong class="px-1 sitename">iPortfolio</strong> <span>All Rights Reserved</span></p>
      </div>
      <div class="credits">
        <!-- All the links in the footer should remain intact. -->
        <!-- You can delete the links only if you've purchased the pro version. -->
        <!-- Licensing information: https://bootstrapmade.com/license/ -->
        <!-- Purchase the pro version with working PHP/AJAX contact form: [buy-url] -->
        Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a> | <a href="https://bootstrapmade.com/tools/">DevTools</a>
      </div>
    </div>

  </footer>

  <!-- Scroll Top -->
  <a href="#" id="scroll-top" class="scroll-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Preloader -->
  <div id="preloader"></div>

  <!-- Vendor JS Files -->
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>
  <script src="assets/vendor/aos/aos.js"></script>
  <script src="assets/vendor/typed.js/typed.umd.js"></script>
  <script src="assets/vendor/purecounter/purecounter_vanilla.js"></script>
  <script src="assets/vendor/waypoints/noframework.waypoints.js"></script>
  <script src="assets/vendor/glightbox/js/glightbox.min.js"></script>
  <script src="assets/vendor/imagesloaded/imagesloaded.pkgd.min.js"></script>
  <script src="assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
  <script src="assets/vendor/swiper/swiper-bundle.min.js"></script>

  <!-- Main JS File -->
  <script src="assets/js/main.js"></script>

</body>

</html>