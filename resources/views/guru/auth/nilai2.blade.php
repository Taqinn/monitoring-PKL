@include('guru.layout.head')
@include('guru.layout.navbar')
@include('guru.layout.sidebar')

<main id="main" class="main">
    <div class="pagetitle">
        <h1>Nilai Siswa</h1>
        <nav>
          <ol class="breadcrumb">
            <li class="breadcrumb-item">Dashboard</a></li>
            <li class="breadcrumb-item">Menu</a></li>
            <li class="breadcrumb-item active">Nilai Siswa</li>
          </ol>
        </nav>
    </div>
        <section class="section">
        <div class="row">
            <div class="col-lg-12">
                
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Nilai Siswa</h5>
                <!-- Table with stripped rows -->
                <table class="table datatable">
                    {{-- <a href="" type="button" class="btn btn-success"> Tambah </a><br><br> --}}
                  <thead>
                    <tr align="center">
                      <th scope="col">#</th>
                      <th scope="col">Nama Siswa</th>
                      <th scope="col">Kelas</th>
                      <th scope="col">Nama Instansi</th>
                      <th scope="col">Status</th>
                      <th scope="col">Action</th>
                    </tr>
                  </thead>
                  <tbody>
                      @foreach ($data as $item)
                      @if ($item->nilaiinstansi !== 'Sudah dinilai')
                          <tr align="center">
                              <td>{{ $loop->iteration }}</td>
                              <td>{{ $item->nama }}</td>
                              <td>{{ $item->kelas }}</td>
                              <td>{{ $item->instansi }}</td>
                              <td>{{ $item->nilaiinstansi }}</td>
                              <td><button type="button" class="btn btn-dark" data-bs-toggle="modal" data-bs-target="#ExtralargeModal">Beri Nilai</button>
                                <a href="{{ url('/prakerin/instansi/give-nilai', $item->id) }}" type="button" class="btn btn-success">Selesai</a></td>
                            </tr>
                            @endif
                            @endforeach
                        </tbody>
                    </table>
                    <div class="modal fade" id="ExtralargeModal" tabindex="-1">
                        <div class="modal-dialog modal-xl">
                          <div class="modal-content">
                            <div class="modal-header">
                              <h5 class="modal-title">Form input nilai siswa</h5>
                              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <form action="{{ url('/prakerin/instansi/sendnilai',$item->id) }}" class="row g-3" method="POST">
                                    @csrf
                                    <div class="row">
                                        <div class="col-lg-6">
                                            
                                            <div class="card">
                                        <div class="card-body">
                                            <h5 class="card-title">Data siswa</h5>
                            
                                          <!-- Browser Default Validation -->
                                            <div class="col-md-12">
                                              <label for="name" class="form-label">Nama Lengkap</label>
                                              <input type="text" class="form-control" name="name" id="name" value="{{ $item->nama }}" required>
                                            </div>
                                            <div class="col-md-12">
                                                <label for="kelas" class="form-label">Kelas</label>
                                                <input type="text" class="form-control" name="kelas" id="kelas" value="{{ $item->kelas }}" required>
                                            </div>
                                            <div class="col-md-12">
                                                <label for="jurusan" class="form-label">Jurusan</label>
                                                <input type="text" class="form-control" name="jurusan" id="jurusan" value="{{ $item->jurusan }}" required>
                                            </div>
                                            <div class="col-md-12">
                                                <label for="gender" class="form-label">Gender</label>
                                                <input type="text" class="form-control" name="gender" id="gender" value="{{ $item->gender }}" required>
                                            </div>
                                            <div class="col-md-12">
                                              <label for="instansi" class="form-label">Instansi</label>
                                              <input type="text" class="form-control" name="instansi" id="instansi" value="{{ $item->instansi }}" required>
                                            </div>
                                          
                                          <!-- End Browser Default Validation -->
                                        </div>
                                      </div>
                                      
                                    </div>

                                    <div class="col-lg-6">
                            
                                        <div class="card">
                                          <div class="card-body">
                                            <h5 class="card-title">Form Nilai</h5>
                              
                                            <!-- Browser Default Validation -->
                                                <div class="col-md-12">
                                                    <label for="prestasi" class="form-label">Prestasi</label>
                                                    <input type="number" class="form-control" name="prestasi" id="prestasi" required>
                                                </div>
                                              <div class="col-md-12">
                                                <label for="disiplin" class="form-label">Disiplin</label>
                                                <input type="number" class="form-control" name="disiplin" id="disiplin" required>
                                              </div>
                                              <div class="col-md-12">
                                                <label for="inisiatif" class="form-label">Inisiatif</label>
                                                <input type="number" class="form-control" name="inisiatif" id="inisiatif" required>
                                              </div>
                                              <div class="col-md-12">
                                                  <label for="kerjasama" class="form-label">Kerja sama</label>
                                                  <input type="number" class="form-control" name="kerjasama" id="kerjasama" required>
                                              </div>
                                              <div class="col-md-12">
                                                <label for="sikap" class="form-label">Sikap</label>
                                                <input type="number" class="form-control" name="sikap" id="sikap" required>
                                              </div>
                                              <div class="col-md-12">
                                                <label for="kehadiran" class="form-label">Kehadiran</label>
                                                <input type="number" class="form-control" name="kehadiran" id="kehadiran" required>
                                              </div>
                                            <!-- End Browser Default Validation -->
                                        </div>
                                    </div>
                                </form>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-primary">Save changes</button>
                            </div>
                          </div>
                        </div>
                      </div>
                <!-- End Table with stripped rows -->
  
              </div>
            </div>
  
          </div>
        </div>
      </section>
</main>
@include('guru.layout.footer')