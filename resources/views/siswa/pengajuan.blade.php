@include('layout.head')
@include('layout.navbar')
  <main id="main">
    <div class="pagetitle" style="text-align: center"><br>
        <h3 >Pengajuan PKL</h3>
    </div>
    <section class="section">
        <div class="row" >
            <div class="col-lg-12">
                
                <div class="card">
                    <div class="card-body">
                        <a href="{{ url('/prakerin/siswa/tambah') }}" type="button" class="btn btn-success">Tambah</a>
                        <br>
                        <br>
                <!-- Table with stripped rows -->
                <table class="table datatable" >
                    
                  <thead>
                    <tr align="center">
                    
                      <th scope="col">#</th>
                      <th scope="col">Nama</th>
                      <th scope="col">NIS</th>
                      <th scope="col">Kelas</th>
                      <th scope="col">Jurusan</th>
                      <th scope="col">Instansi</th>
                      <th scope="col">Status</th>
                      <th scope="col">Action</th>
                    </tr>
                  </thead>
                  <tbody>
                      @foreach ($data as $item)
                          <tr align="center">
                              <td>{{ $loop->iteration }}</td>
                              <td>{{ $item->name }}</td>
                              <td>{{ $item->nis }}</td>
                              <td>{{ $item->kelas }}</td>
                              <td>{{ $item->jurusan }}</td>
                              <td>{{ $item->instansi }}</td>
                              <td>{{ $item->status }}</td>
                              <td>
                                {{-- <a href="{{ url('/prakerin/pengajuan/edit', $item->id) }}" type="button" class="btn btn-primary">Edit</a> --}}
                                <a href="{{ url('/prakerin/pengajuan/delete', $item->id) }}" onclick="return confirm('Yakin ingin menghapus?')"type="button" class="btn btn-danger">Hapus</a>
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
@include('layout.head')