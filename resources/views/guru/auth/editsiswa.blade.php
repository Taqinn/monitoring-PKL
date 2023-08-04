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
        <form action="{{ url('/prakerin/admin/savesiswa', $data->id) }}" method="post">
            @csrf
            <div class="row">
                <div class="col-md-6 form-group">
                    <label for="name" class="form-label">Nama Lengkap:</label>
                    <input type="text" name="name" class="form-control" id="name" placeholder="Masukkan nama lengkap..." value="{{ $data->name }}" required>
                </div>
                <div class="col-md-6 form-group mt-3 mt-md-0">
                    <label for="nis" class="form-label">NIS:</label>
                    <input type="text" class="form-control" name="nis" id="nis" placeholder="Masukkan NIS..." value="{{ $data->nis }}" required>
                </div>
            </div>
            <div class="col-md-12 form-group mt-3 mt-md-3">
                <label for="email" class="form-label">Email:</label>
                <input type="email" class="form-control" name="email" id="email" placeholder="Masukkan email..." value="{{ $data->email }}" required>
            </div>
            <div class="col-md-12 form-group mt-3 mt-md-3">
                <label for="password" class="form-label">Password:</label>
                <input type="password" class="form-control" name="password" id="password" placeholder="Masukkan email..." value="{{ $data->password }}" required>
            </div>
            <br>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-floating mb-3">
                        <select class="form-select" name="kelas" id="kelas" aria-label="Kelas" required>
                            <option value="X" {{ $data->kelas == 'X' ? 'selected' : '' }}>X</option>
                            <option value="XI" {{ $data->kelas == 'XI' ? 'selected' : '' }}>XI</option>
                            <option value="XII" {{ $data->kelas == 'XII' ? 'selected' : '' }}>XII</option>
                        </select>
                        <label for="kelas">Kelas</label>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-floating mb-3">
                        <select class="form-select" name="jurusan" id="jurusan" aria-label="jurusan" required>
                            @foreach ($jurusan as $item)
                            <option>{{ $item->jurusan}}</option>
                            @endforeach
                        </select>
                        <label for="jurusan">Jurusan</label>
                    </div>
                </div>
            </div>
            <div class="col-md-12">
                <div class="form-floating mb-3">
                    <select class="form-select" name="gender" id="gender" aria-label="gender" required>
                        <option value="L" {{ $data->gender == 'L' ? 'selected' : '' }}>Laki - Laki</option>
                        <option value="P" {{ $data->gender == 'P' ? 'selected' : '' }}>Perempuan</option>
                    </select>
                    <label for="gender">Gender</label>
                </div>
            </div>
            <div class="text-center">
                <button type="submit" class="btn btn-primary">Update</button>
            </div>
        </form>
</section>
</main>
@include('guru.layout.footer')