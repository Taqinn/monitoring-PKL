@include('guru.layout.head')
@include('guru.layout.navbar')
@include('guru.layout.sidebar')

<main id="main" class="main">
    <div class="pagetitle">
        <h1>Data Tempat PKL Siswa</h1>
        <nav>
          <ol class="breadcrumb">
            <li class="breadcrumb-item">Dashboard</a></li>
            <li class="breadcrumb-item">Menu</a></li>
            <li class="breadcrumb-item active">Data Tempat PKL Siswa</li>
          </ol>
        </nav>
    </div>
      <section class="section">
        <div class="row">
            <div class="col-lg-12">
                
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Data Tempat PKL Siswa</h5>
                <!-- Table with stripped rows -->
                <table class="table datatable">
                  <a href="/prakerin/admin/addpkl" type="button" class="btn btn-success"> Tambah </a><br><br>
                    {{-- <a href="" type="button" class="btn btn-success"> Tambah </a><br><br> --}}
                  <thead>
                    <tr align="center">
                      <th scope="col">#</th>
                      <th scope="col">Nama</th>
                      <th scope="col">NIS</th>
                      <th scope="col">Kelas</th>
                      <th scope="col">Jurusan</th>
                      <th scope="col">Instansi</th>
                      <th scope="col">Status</th>
                    </tr>
                  </thead>
                  <tbody>
                      @foreach ($data as $item)
                      @if ($item->status !== 'Diproses')
                          <tr align="center">
                              <td>{{ $loop->iteration }}</td>
                              <td>{{ $item->name }}</td>
                              <td>{{ $item->nis }}</td>
                              <td>{{ $item->kelas }}</td>
                              <td>{{ $item->jurusan }}</td>
                              <td>{{ $item->instansi }}</td>
                              <td>{{ $item->status }}</td>
                              {{-- <td><a href="{{ url('/prakerin/admin/editpkl', $item->id) }}" type="button" class="btn btn-primary"> Edit </a>
                              <a href="{{ url('/prakerin/admin/delpkl', $item->id) }}" type="button" class="btn btn-danger"> Hapus </a>
                              </td> --}}
                            </tr>
                      @endif
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