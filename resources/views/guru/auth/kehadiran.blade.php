@include('guru.layout.head')
@include('guru.layout.navbar')
@include('guru.layout.sidebar')

<main id="main" class="main">
    <div class="pagetitle">
        <h1>Konfirmasi Kehadiran Siswa</h1>
        <nav>
          <ol class="breadcrumb">
            <li class="breadcrumb-item">Dashboard</a></li>
            <li class="breadcrumb-item">Menu</a></li>
            <li class="breadcrumb-item active">Konfirmasi Kehadiran Siswa</li>
          </ol>
        </nav>
    </div>
        <section class="section">
        <div class="row">
            <div class="col-lg-12">
                
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Kehadiran Siswa</h5>
                <!-- Table with stripped rows -->
                <table class="table datatable">
                    {{-- <a href="" type="button" class="btn btn-success"> Tambah </a><br><br> --}}
                  
                    <thead>
                        <tr align="center">
                        
                          <th scope="col">#</th>
                          <th scope="col">Nama</th>
                          <th scope="col">NIS</th>
                          <th scope="col">Laporan</th>
                          <th scope="col">Verifikasi</th>
                          <th scope="col">Tanggal</th>
                          <th scope="col">Action</th>
                        </tr>
                      </thead>
                      <tbody>
                        @foreach ($data as $item)
                        @if ($item->verifikasi !== 'Hadir')
                        @if ($item->verifikasi !== 'Tidak Hadir')
                              <tr align="center">
                                  <td>{{ $loop->iteration }}</td>
                                  <td>{{ $item->name }}</td>
                                  <td>{{ $item->nis }}</td>
                                  <td>{{ $item->laporan }}</td>
                                  <td>{{ $item->verifikasi }}</td>
                                  <td>{{ $item->created_at }}</td>
                                  <td>
                                    <a href="{{ url('/prakerin/instansi/hadir', $item->id) }}" onclick="return confirm('Yakin siswa ini hadir?')" type="button" class="btn btn-primary">Hadir</a>
                                    <a href="{{ url('/prakerin/instansi/nonhadir', $item->id) }}" onclick="return confirm('Yakin siswa ini tidak hadir?')"type="button" class="btn btn-danger">Tidak Hadir</a>
                                  </td>
                                </tr>
                                @endif
                                @endif
                                @endforeach
                            </tbody>
                    </table>
                <!-- End Table with stripped rows -->
  
              </div>
            </div>
            <div class="col-lg-12">
                
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Siswa Diverifikasi</h5>
                <!-- Table with stripped rows -->
                <table class="table datatable">
                    {{-- <a href="" type="button" class="btn btn-success"> Tambah </a><br><br> --}}
                  
                    <thead>
                        <tr align="center">
                        
                          <th scope="col">#</th>
                          <th scope="col">Nama</th>
                          <th scope="col">NIS</th>
                          <th scope="col">Laporan</th>
                          <th scope="col">Verifikasi</th>
                          <th scope="col">Tanggal</th>
                        </tr>
                      </thead>
                      <tbody>
                        @foreach ($data as $item)
                        @if ($item->verifikasi !== '')
                              <tr align="center">
                                  <td>{{ $loop->iteration }}</td>
                                  <td>{{ $item->name }}</td>
                                  <td>{{ $item->nis }}</td>
                                  <td>{{ $item->laporan }}</td>
                                  <td>{{ $item->verifikasi }}</td>
                                  <td>{{ $item->created_at }}</td>
                                </tr>
                                @endif
                                @endforeach
                            </tbody>
                    </table>
                <!-- End Table with stripped rows -->
  
              </div>
            </div>
  
          </div>
        </div>
        
      </section>
</main>
@include('guru.layout.footer')