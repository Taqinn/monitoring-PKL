@include('layout.head')
@include('layout.navbar')
  <main id="main">
    <div class="pagetitle" style="text-align: center"><br>
        <h3 >Data Rekomendasi Tempat PKL Siswa</h3>
        <p>Berikut adalah rekomendasi data tempat PKL</p>
    </div>
    <section class="section">
        <div class="row" >
            <div class="col-lg-12">
                
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Data Tempat PKL Siswa</h5>
                <!-- Table with stripped rows -->
                <table class="table datatable" >
                    
                  <thead>
                    <tr align="center">
                      <th scope="col">#</th>
                      <th scope="col">Nama Instansi</th>
                      <th scope="col">Jurusan</th>
                      <th scope="col">Alamat</th>
                      <th scope="col">Kontak</th>
                    </tr>
                  </thead>
                  <tbody>
                      @foreach ($data as $item)
                          <tr align="center">
                              <td>{{ $loop->iteration }}</td>
                              <td>{{ $item->instansi }}</td>
                              <td>{{ $item->jurusan }}</td>
                              <td>{{ $item->alamat }}</td>
                              <td>{{ $item->phone }}</td>
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
@include('layout.head')