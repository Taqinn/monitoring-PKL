<body>

    <!-- ======= Header ======= -->
    <section id="topbar" class="topbar d-flex align-items-center">
      <div class="container d-flex justify-content-center justify-content-md-between">
        <div class="contact-info d-flex align-items-center">
          <i class="bi bi-envelope d-flex align-items-center"><a href="mailto:contact@info@smkn1campaka.sch.id">info@smkn1campaka.sch.id</a></i>
          <i class="bi bi-phone d-flex align-items-center ms-4"><span>(0263) 2341781</span></i>
        </div>
        <div class="social-links d-none d-md-flex align-items-center">
          <a href="#" class="twitter"><i class="bi bi-twitter"></i></a>
          <a href="#" class="facebook"><i class="bi bi-facebook"></i></a>
          <a href="#" class="instagram"><i class="bi bi-instagram"></i></a>
          <a href="#" class="linkedin"><i class="bi bi-linkedin"></i></i></a>
        </div>
      </div>
    </section><!-- End Top Bar -->
  
    <header id="header" class="header d-flex align-items-center">
  
      <div class="container-fluid container-xl d-flex align-items-center justify-content-between">
        <a href="index.html" class="logo d-flex align-items-center">
          <!-- Uncomment the line below if you also wish to use an image logo -->
          <!-- <img src="user/assets/img/logo.png" alt=""> -->
          <h1>SIM PKL<span> SMKN 1 CAMPAKA</span></h1>
        </a>
        <nav id="navbar" class="navbar">
          <ul>
            <li><a href="{{ url('/prakerin/siswa') }}">Home</a></li>
            <li><a href="{{ url('/prakerin/siswa/pengajuan') }}">Pengajuan PKL</a></li>
            <li><a href="/logout" style="button">logout</a></li>
          </ul>
        </nav><!-- .navbar -->
  
        <i class="mobile-nav-toggle mobile-nav-show bi bi-list"></i>
        <i class="mobile-nav-toggle mobile-nav-hide d-none bi bi-x"></i>
  
      </div>
    </header><!-- End Header -->
    <!-- End Header -->