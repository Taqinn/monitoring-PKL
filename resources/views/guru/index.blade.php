@include('guru.layout.head')
@include('guru.layout.navbar')
@include('guru.layout.sidebar')

<main id="main" class="main">

    <div class="pagetitle">
      <h1>Dashboard</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.html">Home</a></li>
          <li class="breadcrumb-item active">Dashboard</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->
    @if (Auth::user()->role == 'instansi' || Auth::user()->role == 'guru')
    <section class="section dashboard">
      <div class="row">
            </div><!-- End Customers Card -->
            <div class="col-lg-12">

              <div class="card">
                <div class="card-body">
                  <h5 class="card-title">Tabel absensi siswa</h5>
    
                  <!-- Table with stripped rows -->
                  <table class="table table-striped" style="align-content: center">
                    
                    <thead>
                      <tr align="center">
                        <th scope="col">#</th>
                        <th scope="col">Name</th>
                        <th scope="col">NIS</th>
                        <th scope="col">Email</th>
                        <th scope="col">laporan</th>
                        <th scope="col">Foto Laporan</th>
                        <th scope="col">Foto Absen</th>
                        <th scope="col">Tanggal absen</th>
                      </tr>
                    </thead>
                    
                    @foreach ($data as $item)
                    <tbody align="center">
                      <tr>
                        <th scope="row">{{ $loop->iteration }}</th>
                        <td>{{ $item->name }}</td>
                        <td>{{ $item->nis }}</td>
                        <td>{{ $item->email }}</td>
                        <td>{{ $item->laporan }}</td>
                        <td ><img src="/{{ $item->photo_laporan }}" class="rounded-circle" data-bs-toggle="modal" data-bs-target="#verticalycentered" width="50px" height="50px"></td>
                        <td ><img src="{{asset('storage/absensi/'.$item->image)}}" class="rounded-circle " data-bs-toggle="modal" data-bs-target="#verticalycentered1" width="50px" height="50px"></td>
                        <td>{{ $item->created_at }}</td>
                        @if (Auth::user()->role=='admin')
                        <td><a href="{{ url('/prakerin/admin/delabsen', $item->id) }}" type="button" class="btn btn-danger" 
                          onclick="return confirm('Anda yakin ingin menghapus?')">Hapus</a></td>
                          @endif
                      </tr>
                    </tbody>
                    @endforeach
                    <div class="modal fade" id="verticalycentered" tabindex="-1">
                      <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content">
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                          <div class="modal-body">
                            <img src="/{{ $item->photo_laporan }}" alt="" class="enlarged-image">
                          </div>
                          <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            {{-- <button type="button" class="btn btn-primary">Save changes</button> --}}
                          </div>
                        </div>
                      </div>
                    </div><!-- End Vertically centered Modal-->
                    <div class="modal fade" id="verticalycentered1" tabindex="-1">
                      <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content">
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                          <div class="modal-body">
                            <img src="{{asset('storage/absensi/'.$item->image)}}" alt="" class="enlarged-image">
                          </div>
                          <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            {{-- <button type="button" class="btn btn-primary">Save changes</button> --}}
                          </div>
                        </div>
                      </div>
                    </div><!-- End Vertically centered Modal-->
      
                  </div>
                </div>
                    
                  </table>
                  <!-- End Table with stripped rows -->
                  {{-- @endif --}}
                  @endif
                </div>
              </div>

            

          </div>
        </div><!-- End Left side columns -->

      </div>
    </section>

  </main><!-- End #main -->
@include('guru.layout.footer')