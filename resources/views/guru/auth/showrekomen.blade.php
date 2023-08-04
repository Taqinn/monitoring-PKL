@include('guru.layout.head')
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
        <section class="section">
        <div class="row">
            <div class="col-lg-12">
                
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Data Tempat Rekomendasi</h5>
                <!-- Table with stripped rows -->
                <table class="table datatable">
                  <a href="/prakerin/admin/addrekomendasi" type="button" class="btn btn-success"> Tambah </a><br><br>
                    {{-- <a href="" type="button" class="btn btn-success"> Tambah </a><br><br> --}}
                  <thead>
                    <tr align="center">
                      <th scope="col">#</th>
                      <th scope="col">Nama Instasni</th>
                      <th scope="col">Jurusan</th>
                      <th scope="col">Alamat</th>
                      <th scope="col">Kontak</th>
                      <th scope="col">Kuota</th>
                      <th scope="col">Aksi</th>
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
                              <td>{{ $item->kuota }}</td>
                              <td>
                                <a href="{{ url('/prakerin/admin/editreko',$item->id) }}" type="button" class="btn btn-primary"> Edit </a>
                                <a href="{{ url('/prakerin/admin/hapusreko',$item->id) }}" type="button" onclick="return confirm('Yakin ingin menghapus?')" class="btn btn-danger"> Hapus </a>
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