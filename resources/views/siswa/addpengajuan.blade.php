@include('layout.head')
@include('layout.navbar')
<!-- ======= Hero Section ======= -->
{{-- <section id="hero" class="hero">
  </section> --}}
  <!-- End Hero Section -->
  <main id="main">
    <!-- ======= Contact Section ======= -->
    <section id="contact" class="contact" style="align-content: center">

        <div class="section-header">
          <h2>Pengajuan PKL</h2>
          <p>Isi data pengajuan dengan benar</p>
        </div>
        <div class="my-3">
            @if (session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
            @endif
          </div>
        <div class="row gx-lg-0 gy-2">
          <div class="col-lg-12">
            <form action="prakerin/pengajuan/send" method="post" role="form" enctype="multipart/form-data" class="php-email-form">
                @csrf
              <div class="row" >
                <div class="col-md-6 form-group">
                  <input type="text" name="name" class="form-control" id="name" value="{{ Auth::user()->name }}" required>
                </div>
                <div class="col-md-6 form-group mt-3 mt-md-0">
                  <input type="text" class="form-control" name="nis" id="nis" value="{{ Auth::user()->nis }}" required>
                </div>
              </div>
              <div class="row" >
                <div class="col-md-6 form-group">
                  <input type="text" name="kelas" class="form-control" id="kelas" value="{{ Auth::user()->kelas }}" required>
                </div>
                <div class="col-md-6 form-group mt-3 mt-md-0">
                  <input type="text" class="form-control" name="jurusan" id="jurusan" value="{{ Auth::user()->jurusan }}" required>
                </div>
              </div>
              <div class="row" >
                <div class="col-md-12 form-group">
                  <input type="text" name="instansi" class="form-control" id="instansi" placeholder="Masukan instansi ..." required>
                </div>
              </div>
              <div class="text-center"><button type="submit">Kirim</button></div>
            </form>
          </div><!-- End Contact Form -->

        </div>

      </div>
    </section><!-- End Contact Section -->

  </main><!-- End #main -->
@include('layout.head')