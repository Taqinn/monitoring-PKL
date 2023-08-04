 <!-- ======= Sidebar ======= -->
 <aside id="sidebar" class="sidebar">

    <ul class="sidebar-nav" id="sidebar-nav">

      <li class="nav-item">
        <a class="nav-link " href="{{ url('prakerin/admin') }}">
          <i class="bi bi-grid"></i>
          <span>Dashboard</span>
        </a>
      </li><!-- End Dashboard Nav -->
      @if (Auth::user()->role=='admin')
          
      <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#components-nav" data-bs-toggle="collapse" href="#">
          <i class="bi bi-menu-button-wide"></i><span>Menu</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="components-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
          <li>
            <a href="{{ url('prakerin/admin/daftar-siswa/{role}') }}">
              <i class="bi bi-circle"></i><span>Daftar Siswa</span>
            </a>
          </li>
          <li>
            <a href="{{ url('prakerin/admin/daftar-jurusan/{role}') }}">
              <i class="bi bi-circle"></i><span>Daftar Jurusan</span>
            </a>
          </li>
          <li>
            <a href="{{ url('prakerin/admin/daftar-guru/{role}') }}">
              <i class="bi bi-circle"></i><span>Daftar Guru Pembimping</span>
            </a>
          </li>
          <li>
            <a href="{{ url('prakerin/admin/daftar-instansi/{role}') }}">
              <i class="bi bi-circle"></i><span>Daftar Instansi</span>
            </a>
          </li>
        </ul>
      </li><!-- End Components Nav -->
      
      <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#forms-nav" data-bs-toggle="collapse" href="#">
          <i class="bi bi-journal-text"></i><span>Data Tempat</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="forms-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
          <li>
            <a href="{{ url('/prakerin/admin/tempat-pkl') }}">
              <i class="bi bi-circle"></i><span>Data Tempat PKL</span>
            </a>
          </li>
          <li>
            <a href="{{ url('/prakerin/admin/rekomendasi-pkl') }}">
              <i class="bi bi-circle"></i><span>Data Tempat Rekomendasi</span>
            </a>
          </li>
        </ul>
      </li><!-- End Forms Nav -->
      @endif
      @if (Auth::user()->role=='panitia')
      <a class="nav-link collapsed"  href="{{ url('/prakerin/admin/pengajuan') }}">
        <i class="bi bi-menu-button-wide"></i><span>Pengajuan PKL</span>
      </a>
      @endif
      @if (Auth::user()->role=='guru')
          
      <li class="nav-item">
        <a class="nav-link collapsed" href="{{ url('/prakerin/admin/monitoring') }}">
          <i class="bi bi-person"></i>
          <span>Monitoring</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link collapsed" href="{{ url('/prakerin/admin/nilai') }}">
          <i class="bi bi-card-list"></i>
          <span>Nilai</span>
        </a>
      </li>
      @endif
      @if (Auth::user()->role=='instansi')
          
      <li class="nav-item">
        <a class="nav-link collapsed" href="{{ url('/prakerin/instansi/kehadiran') }}">
          <i class="bi bi-person"></i>
          <span>Konfirmasi Kehadiran</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link collapsed" href="{{ url('/prakerin/instansi/nilai') }}">
          <i class="bi bi-card-list"></i>
          <span>Nilai</span>
        </a>
      </li>
      @endif
    </ul>

  </aside><!-- End Sidebar-->