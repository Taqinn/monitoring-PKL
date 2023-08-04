@include('guru.layout.head')
<base href="/public">
@include('guru.layout.navbar')
@include('guru.layout.sidebar')

<main id="main" class="main">
    <div class="pagetitle">
        <h1>Data Tempat Rekomendasi</h1>
        <nav>
          <ol class="breadcrumb">
            <li class="breadcrumb-item">Dashboard</a></li>
            <li class="breadcrumb-item">Menu</a></li>
            <li class="breadcrumb-item active">Data Tempat Rekomendasi</li>
          </ol>
        </nav>
    </div>
    <section class="contact" id="contact">
        
    <div class="row">
        <div class="col-lg-12">
            
            <div class="card">
                <div class="card-body">
                    <div class="section-header">
                        <h4 class="card-title">Data Guru Pembimbing</h4>
                      </div>
                      <div class="my-3">
                          @if (session('success'))
                          <div class="alert alert-success">{{ session('success') }}</div>
                          @endif
                        </div>
                      <div class="row gx-lg-0 gy-2">
                        <div class="col-lg-12">
                            <form action="{{ url('/prakerin/admin/savereko',$data->id) }}" method="post">
                              @csrf
                            <div class="row" >
                              <div class="col-md-6 form-group">
                                <label for="instansi" class="form-label">Nama Instansi :</label>
                                <input type="text" name="instansi" class="form-control" id="instansi" value="{{ $data->instansi }}" required>
                              </div>
                              <div class="col-md-6 form-group mt-3 mt-md-0">
                                <label for="jurusan" class="form-label">Jurusan :</label>
                                <input type="text" class="form-control" name="jurusan" id="jurusan" value="{{ $data->jurusan }}"  required>
                              </div>    
                            </div>
                            <div class="col-md-12 form-group mt-3 mt-md-3">
                              <label for="alamat" class="form-label">Alamat Instansi :</label>
                              <input type="text" class="form-control" name="alamat" id="alamat" value="{{ $data->alamat }}" required>
                            </div>
                            <div class="col-md-12 form-group mt-3 mt-md-3">
                              <label for="phone" class="form-label">Kontak :</label>
                              <input type="number" class="form-control" name="phone" id="phone" value="{{ $data->phone }}" required>
                            </div>
                            <div class="col-md-12 form-group mt-3 mt-md-3">
                              <label for="kuota" class="form-label">Kuota :</label>
                              <input type="number" class="form-control" name="kuota" id="kuota" value="{{ $data->kuota }}" required>
                            </div>
                            <br>
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