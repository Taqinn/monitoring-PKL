@include('guru.layout.head')
@include('guru.layout.navbar')
@include('guru.layout.sidebar')

<main id="main" class="main">
    <div class="pagetitle">
        <h1>Daftar Jurusan</h1>
        <nav>
          <ol class="breadcrumb">
            <li class="breadcrumb-item">Dashboard</a></li>
            <li class="breadcrumb-item">Menu</a></li>
            <li class="breadcrumb-item active">Daftar Jurusan</li>
          </ol>
        </nav>
    </div>
        <section class="section">
        <div class="row">
            <div class="col-lg-6">
            
                <div class="card">
                    <div class="card-body">
                        <div class="section-header">
                            <h4 class="card-title">Tambah Daftar Jurusan</h4>
                          </div>
                          <div class="my-3">
                              @if (session('success'))
                              <div class="alert alert-success">{{ session('success') }}</div>
                              @endif
                            </div>
                          <div class="row gx-lg-0 gy-2">
                            <div class="col-lg-12">
                                <form action="{{ url('/prakerin/admin/daftar-jurusan/upload') }}" method="post">
                                  @csrf
                                <div class="row" >
                            
                                  <div class="col-md-12 form-group mt-3 mt-md-0">
                                    <label for="jurusan" class="form-label">Nama Jurusan:</label>
                                    <input type="text" class="form-control" name="jurusan" id="jurusan" placeholder="Masukan Jurusan ..." required>
                                  </div>
                                
                                <div class="text-center form-group mt-3" >
                                    <button type="submit" class="btn btn-primary">submit</button>
                                </div>
                              </form>
                            </div><!-- End Contact Form -->
                  
                          </div>
                  
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Daftar Jurusan</h5>
                
                <table class="table datatable">
                    <div class="my-3">
                        @if (session('danger'))
                        <div class="alert alert-danger">{{ session('danger') }}</div>
                        @endif
                      </div>
                    
                  <thead>
                    <tr align="center">
                      <th scope="col">#</th>
                      <th scope="col">Jurusan</th>
                      <th scope="col">Action</th>
                    </tr>
                  </thead>
                  <tbody>
                      @foreach ($data as $item)
                          <tr align="center">
                              <td>{{ $loop->iteration }}</td>
                              <td>{{ $item->jurusan }}</td>
                              <td>
                                    <a href="{{ URL('/prakerin/admin/edit-jurusan',$item->id) }}" type="button" class="btn btn-primary">Edit</a>
                                    <a href="{{ url('prakerin/admin/delete-jurusan',$item->id) }}" onclick="alert('Yakin ingin menghapus?')" type="button" class="btn btn-danger">Hapus</a>
                                </td>
                            </tr>
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