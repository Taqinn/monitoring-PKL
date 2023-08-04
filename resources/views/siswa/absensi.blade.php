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
          <h2>Absensi dan Laporan Harian</h2>
          <p>jangan lupa untuk mengisi absensi dan laporan harian</p>
        </div>
        <div class="my-3">
            @if (session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
            @endif
        </div>
        <div class="my-3">
            @if (session('error'))
            <div class="alert alert-danger">{{ session('error') }}</div>
            @endif
        </div>
        <div class="row gx-lg-0 gy-2">
          <div class="col-lg-12">
            <form action="{{url('prakerin/absensi/send')}}" method="post" enctype="multipart/form-data" >
                @csrf
              <h4>Absensi</h4>
              <p>Isi absensi dengan bukti gambar</p>
              <div class="row" >
                <div class="col-md-6 form-group">
                  <input type="text" name="name" class="form-control" id="name" value="{{ Auth::user()->name }}" required>
                </div>
                <div class="col-md-6 form-group mt-3 mt-md-0">
                  <input type="text" class="form-control" name="nis" id="nis" value="{{ Auth::user()->nis }}" required>
                </div>
              </div>
              <div class="form-group mt-3">
                <input type="email" class="form-control" name="email" id="email" value="{{ Auth::user()->email }}" required>
              </div>
              <div class="row">
            <div class="col-md-6">
                <div id="my_camera"></div>
                <br/>
                <div class="text-center">
                <input type="button" class="btn btn-primary" value="Take Snapshot" onClick="take_snapshot()">
                <input type="hidden" name="image" class="image-tag">
              </div>
            </div>
            <div class="col-md-6">
                <div id="results">Photo Anda Akan Terlihat disini....</div>
            </div>
        </div>
              <br>
              <h4>Laporan Harian</h4>
              <p>Masukan laporan harian disini</p>
              <div class="form-group mt-3">
                <textarea class="form-control" name="laporan" rows="7" placeholder="laporan" required></textarea>
              </div>
              <p>Masukan photo kegiatan harian</p>
              <div class="form-group mt-3">
                <input type="file" class="form-control" id="photo_laporan" name="photo_laporan" name="laporan" required>
              </div>
              <div class="text-center"><button type="submit" class="btn btn-primary">Kirim</button></div>
            </form>
          </div><!-- End Contact Form -->

        </div>

      </div>
    </section><!-- End Contact Section -->

  </main><!-- End #main -->
  <script language="JavaScript">
    Webcam.set({
        width: 490,
        height: 350,
        image_format: 'jpeg',
        jpeg_quality: 90
    });
    
    Webcam.attach( '#my_camera' );
    
    function take_snapshot() {
        Webcam.snap( function(data_uri) {
            $(".image-tag").val(data_uri);
            document.getElementById('results').innerHTML = '<img src="'+data_uri+'"/>';
        } );
    }
</script>
@include('layout.footer')
