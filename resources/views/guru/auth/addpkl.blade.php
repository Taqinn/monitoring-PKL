@include('guru.layout.head')
<base href="/public">
@include('guru.layout.navbar')
@include('guru.layout.sidebar')

<main id="main" class="main">
    <div class="pagetitle">
        <h1>Daftar Siswa</h1>
        <nav>
          <ol class="breadcrumb">
            <li class="breadcrumb-item">Dashboard</a></li>
            <li class="breadcrumb-item">Menu</a></li>
            <li class="breadcrumb-item active">Data Tempat PKL</li>
          </ol>
        </nav>
    </div>
    <section class="contact" id="contact">
        
    <div class="row">
        <div class="col-lg-12">
            
            <div class="card">
                <div class="card-body">
                    <div class="section-header">
                        <h4 class="card-title">Data Tempat PKL</h4>
                      </div>
                      <div class="my-3">
                          @if (session('success'))
                          <div class="alert alert-success">{{ session('success') }}</div>
                          @endif
                        </div>
                      <div class="row gx-lg-0 gy-2">
                        <div class="col-lg-12">
                            <form action="{{ url('/prakerin/admin/upload-pkl') }}" method="post">
                              @csrf
                            <div class="row" >
                        
                              <div class="col-md-12 form-group mt-3 mt-md-0">
                                <label for="name" class="form-label">Nama :</label>
                                <input type="text" class="form-control" name="name" id="name" placeholder="Masukan Nama ..." required>
                              </div>
                              <div class="col-md-12">
                              <div class="form-floating mb-3 mt-3">
                                <select class="form-select" name="jurusan" id="jurusan" aria-label="jurusan" required>
                                  @foreach ($jurusan as $item)
                                  <option>{{$item->jurusan}}</option>
                                  @endforeach
                                </select>
                                <label for="jurusan">Jurusan</label>
                              </div>
                            </div>
                            <div class="col-md-12 form-group mt-3 mt-md-0">
                              <label for="instansi" class="form-label">Instansi :</label>
                              <input type="instansi" class="form-control" name="instansi" id="instansi" placeholder="Masukan instansi ..." required>
                            </div>
                            
                            <div class="col-md-12">
                              <div class="form-floating mb-3 mt-3">
                                <select class="form-select" name="kelas" id="kelas" aria-label="Kelas" required>
                                  <option value="X">X</option>
                                  <option value="XII">XI</option>
                                  <option value="XII">XII</option>
                                </select>
                                <label for="kelas">Kelas</label>
                              </div>
                            </div>
                                <div class="col-md-12">
                                    <div class="form-floating mb-3">
                                      <select class="form-select" name="gender" id="gender" aria-label="gender" required>
                                        <option value="L">Laki - Laki</option>
                                        <option value="P">Perempuan</option>
                                      </select>
                                      <label for="gender">Gender</label>
                                    </div>
                                  </div>
                            
                            <div class="text-center">
                                <button type="submit" class="btn btn-primary">submit</button>
                            </div>
                          </form>
                        </div><!-- End Contact Form -->
              
                      </div>
              
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
</main>
@include('guru.layout.footer')