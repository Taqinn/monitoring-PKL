@include('guru.layout.head')

@include('guru.layout.navbar')
@include('guru.layout.sidebar')

<main id="main">
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
    <section class="contact">
        <div class="my-3">
            @if (session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
            @endif
          </div>
        <form action="{{ url('/prakerin/admin/savejurusan', $data->id) }}" method="post">
            @csrf
            <div class="row">
                <div class="col-md-12 form-group mt-3">
                    <label for="jurusan" class="form-label">Nama jurusan:</label>
                    <input type="text" name="jurusan" class="form-control" id="jurusan" placeholder="Masukkan nama jurusan" value="{{ $data->jurusan }}" required>
                </div>
            <div class="text-center mt-3">
                <button type="submit" class="btn btn-primary">Update</button>
            </div>
        </form>
</section>
</main>
@include('guru.layout.footer')