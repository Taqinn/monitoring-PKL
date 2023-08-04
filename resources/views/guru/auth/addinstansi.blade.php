@include('guru.layout.head')
<base href="/public">
@include('guru.layout.navbar')
@include('guru.layout.sidebar')

<main id="main" class="main">
    <div class="pagetitle">
        <h1>Tambah Instansi</h1>
        <nav>
          <ol class="breadcrumb">
            <li class="breadcrumb-item">Dashboard</a></li>
            <li class="breadcrumb-item">Menu</a></li>
            <li class="breadcrumb-item active">Tambah Instansi</li>
          </ol>
        </nav>
    </div>
    <section class="contact" id="contact">
        
    <div class="row">
        <div class="col-lg-12">
            
            <div class="card">
                <div class="card-body">
                    <div class="section-header">
                        <h4 class="card-title">Tambah Instansi</h4>
                      </div> 
                      <div class="my-3">
                          @if (session('success'))
                          <div class="alert alert-success">{{ session('success') }}</div>
                          @endif
                        </div>
                      <div class="row gx-lg-0 gy-2">
                        <div class="col-lg-12">
                            <form action="{{ url('/prakerin/admin/upload-instansi') }}" method="post">
                              @csrf
                            <div class="row" >
                              <div class="col-md-6 form-group">
                                <label for="name" class="form-label">Nama Instansi :</label>
                                <input type="text" name="name" class="form-control" id="name" placeholder="Masukan nama instansi ..." required>
                              </div>
                              <div class="col-md-6 form-group ">
                                <label for="email" class="form-label">Email :</label>
                                <input type="email" class="form-control" name="email" id="email" placeholder="Masukan email ..." required>
                              </div>
                              
                            </div>
                            <div class="col-md-12 form-group mt-3 mt-md-3">
                                <label for="alamat_instansi" class="form-label">Alamat Instansi:</label>
                                <input type="text" class="form-control" name="alamat_instansi" id="alamat_instansi" placeholder="Masukan alamat instansi ..." required>
                              </div>
                            <div class="col-md-12 form-group mt-3 mt-md-3">
                                <label for="password" class="form-label">Password :</label>
                                <input type="password" class="form-control" name="password" id="password" placeholder="Masukan password ..." required>
                            </div>
                            
                            <div class="col-md-12 form-group mt-3 mt-md-3">
                              <label for="role" class="form-label">Role :</label>
                              <input type="role" class="form-control" name="role" id="role" value="instansi" >
                            </div>
                            <br><br>
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