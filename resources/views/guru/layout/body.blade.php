
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

    <section class="section dashboard">
      <div class="row">

        <!-- Left side columns -->
        <div class="col-lg-8">
          <div class="row">
            <div class="col-lg-6">

              <div class="card">
                <div class="card-body">
                  <h5 class="card-title">Daftar Siswa</h5>
    
                  <!-- Table with stripped rows -->
                  <table class="table table-striped">
                    
                    <thead>
                      <tr>
                        <th scope="col">#</th>
                        <th scope="col">Name</th>
                        <th scope="col">NIS</th>
                        <th scope="col">Email</th>
                        <th scope="col">laporan</th>
                        <th scope="col">Image</th>
                        <th scope="col">Tanggal absen</th>
                      </tr>
                    </thead>
                    @foreach ($absensi as $item)
                    <tbody>
                      <tr>
                        <th scope="row">1</th>
                        <td>{{ $item->name }}</td>
                        <td>{{ $item->nis }}</td>
                        <td>{{ $item->email }}</td>
                        <td>{{ $item->laporan }}</td>
                        <td>{{ $item->image }}</td>
                        <td>{{ $item->created_at }}</td>
                      </tr>
                    </tbody>
                    @endforeach
                  </table>
                  <!-- End Table with stripped rows -->
    
                </div>
              </div>

            

          </div>
        </div><!-- End Left side columns -->

      </div>
    </section>

  </main><!-- End #main -->