@include('guru.layout.head')
@include('guru.layout.navbar')
@include('guru.layout.sidebar')

<main id="main" class="main">
    <div class="pagetitle">
        <h1>Daftar Siswa</h1>
        <nav>
          <ol class="breadcrumb">
            <li class="breadcrumb-item">Dashboard</a></li>
            <li class="breadcrumb-item">Menu</a></li>
            <li class="breadcrumb-item active">Daftar Siswa</li>
          </ol>
        </nav>
    </div>
        <section class="section">
        <div class="row">
            <div class="col-lg-12">
                
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Daftar Siswa</h5>
                <!-- Table with stripped rows -->
                <table class="table datatable">
                    <a href="/prakerin/admin/addsiswa" type="button" class="btn btn-success"> Tambah </a><br><br>
                  <thead>
                    <tr align="center">
                      <th scope="col">#</th>
                      <th scope="col">Nama</th>
                      <th scope="col">NIS</th>
                      <th scope="col">email</th>
                      <th scope="col">Kelas</th>
                      <th scope="col">Jurusan</th>
                      <th scope="col">Jenis Kelamin</th>
                      <th scope="col">Action</th>
                    </tr>
                  </thead>
                  <tbody>
                      @foreach ($data as $item)
                          <tr align="center">
                              <td>{{ $loop->iteration }}</td>
                              <td>{{ $item->name }}</td>
                              <td>{{ $item->nis }}</td>
                              <td>{{ $item->email }}</td>
                              <td>{{ $item->kelas }}</td>
                              <td>{{ $item->jurusan }}</td>
                              <td>{{ $item->gender }}</td>
                              <td>
                                    <a href="{{ URL('/prakerin/admin/edit-siswa',$item->id) }}" type="button" class="btn btn-primary">Edit</a>
                                    <a href="{{ url('prakerin/admin/delete-siswa',$item->id) }}" onclick="alert('Yakin ingin menghapus?')" type="button" class="btn btn-danger">Hapus</a>
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