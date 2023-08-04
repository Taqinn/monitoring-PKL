@include('layout.head')
@include('layout.navbar')
  <main id="main">
    <div class="pagetitle" style="text-align: center"><br>
        <h3 >Nilai PKL</h3>
        <p>Berikut adalah Nilai PKL dari {{ Auth::user()->name }}</p>
    </div>
    <section class="section">
            <div class="col-lg-12">
                
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title" style="text-align: center">Nilai PKL Sekolah</h5>
                        <p style="text-align: center">Nilai capaian prakerin tahun ajaran 2021-2022</p>
                        <br>
                        @foreach ($data as $item)
                        <p>Nama    : {{ $item->name }} </p>
                        <p>Kelas   : {{ $item->kelas }}</p>
                        <p>Jurusan : {{ $item->jurusan }}</p>
                        <p>Instansi: {{ $item->instansi }}</p>
                        <br>
                            
                        @endforeach
                <!-- Table with stripped rows -->
                <table class="table datatable" >
                    
                  <thead>
                    <tr align="center">
                    
                      <th scope="col">Prestasi</th>
                      <th scope="col">Disiplin</th>
                      <th scope="col">Inisiatif</th>
                      <th scope="col">Kerja sama</th>
                      <th scope="col">Sikap</th>
                      <th scope="col">Kehadiran</th>
                    </tr>
                  </thead>
                  <tbody>
                      @foreach ($data as $item)
                          <tr align="center">
                              <td>{{ $item->prestasi }}%</td>
                              <td>{{ $item->disiplin }}%</td>
                              <td>{{ $item->inisiatif }}%</td>
                              <td>{{ $item->kerjasama }}%</td>
                              <td>{{ $item->sikap }}%</td>
                              <td>{{ $item->kehadiran }}%</td>
                            </tr>
                            @endforeach
                        </tbody>
                      </table>
                      <p><b>Garde Nilai =</b> 100% - 90% = A, 89% - 80% = B, 79% - 70% = C</p>
                <!-- End Table with stripped rows -->
  
              </div>
            
            <br>
            <div class="col-lg-12">
                
                {{-- <div class="card"> --}}
                    <div class="card-body">
                        <h5 class="card-title" style="text-align: center">Nilai PKL Instansi</h5>
                        <p style="text-align: center">Nilai capaian prakerin tahun ajaran 2021-2022</p>
                        <br>
                        
                <!-- Table with stripped rows -->
                <table class="table datatable" >
                    
                  <thead>
                    <tr align="center">
                    
                      <th scope="col">Prestasi</th>
                      <th scope="col">Disiplin</th>
                      <th scope="col">Inisiatif</th>
                      <th scope="col">Kerja sama</th>
                      <th scope="col">Sikap</th>
                      <th scope="col">Kehadiran</th>
                    </tr>
                  </thead>
                  <tbody>
                      @foreach ($instansi as $item)
                          <tr align="center">
                              <td>{{ $item->prestasi }}%</td>
                              <td>{{ $item->disiplin }}%</td>
                              <td>{{ $item->inisiatif }}%</td>
                              <td>{{ $item->kerjasama }}%</td>
                              <td>{{ $item->sikap }}%</td>
                              <td>{{ $item->kehadiran }}%</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <p><b>Garde Nilai =</b> 100% - 90% = A, 89% - 80% = B, 79% - 70% = C</p>

                <!-- End Table with stripped rows -->
  
              </div>
            
  
          </div>
        </div>
      </section>
  </main>
@include('layout.head')