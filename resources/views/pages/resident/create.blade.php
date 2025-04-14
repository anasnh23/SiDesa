    @extends('layouts.app')

    @section('content')
        <h1>Tambah Data Penduduk</h1>
            <!-- Menampilkan pesan sukses setelah berhasil menyimpan data -->
    @if(session('success'))
    <div class="alert alert-success" role="alert">
        {{ session('success') }}
    </div>
@endif
        <form id="formCreate" action="{{ route('resident.store') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="nik">Nik</label>
                <input type="text" id="nik" name="nik" class="form-control @error('nik') is-invalid @enderror"  required title="Nama wajib diisi" placeholder="Masukkan Nik anda">
                @error('nik')
                <span class="invalid-feedback">
                    {{$message}}
                </span>
                @enderror
            </div>
            <div class="form-group">
                <label for="name">Nama</label>
                <input type="text" id="name" name="name" class="form-control  @error('name') is-invalid @enderror" required title="Nama wajib diisi" placeholder="Masukkan Nama">
            </div>
            <div class="form-group">
                <label for="gender">Jenis Kelamin</label>
                <select id="gender" name="gender" class="form-control  @error('gender') is-invalid @enderror" required title="Jenis Kelamin wajib dipilih">
                    <option value="">Pilih Jenis Kelamin</option>
                    <option value="male">Laki-laki</option>
                    <option value="female">Perempuan</option>
                </select>
            </div>
            <div class="form-group">
                <label for="birth_date">Tanggal Lahir</label>
                <input type="date" id="birth_date" name="birth_date" class="form-control @error('birth_date') is-invalid @enderror" required title="Tanggal Lahir wajib diisi">
            </div>
            <div class="form-group">
                <label for="birth_place">Tempat Lahir</label>
                <input type="text" id="birth_place" name="birth_place" class="form-control  @error('birth_place') is-invalid @enderror" required title="Tempat Lahir wajib diisi" placeholder="Masukkan Tempat Lahir">
            </div>
            <div class="form-group">
                <label for="address">Alamat</label>
                <input type="text" id="address" name="address" class="form-control  @error('address') is-invalid @enderror" required title="Alamat wajib diisi" placeholder="Masukkan Alamat">
            </div>
            <div class="form-group">
                <label for="religion">Agama</label>
                <input type="text" id="religion" name="religion" class="form-control  @error('relogion') is-invalid @enderror" placeholder="Masukkan Agama">
            </div>
            <div class="form-group">
                <label for="marital_status">Status Perkawinan</label>
                <select id="marital_status" name="marital_status" class="form-control  @error('marital_status') is-invalid @enderror" required title="Status Perkawinan wajib dipilih">
                    <option value="">Pilih Status Perkawinan</option>
                    <option value="single">Belum Menikah</option>
                    <option value="married">Menikah</option>
                    <option value="divorced">Cerai</option>
                    <option value="widowed">Janda/Duda</option>
                </select>
            </div>
            <div class="form-group">
                <label for="occupation">Pekerjaan</label>
                <input type="text" id="occupation" name="occupation" class="form-control  @error('occupation') is-invalid @enderror" placeholder="Masukkan Pekerjaan">
            </div>
            <div class="form-group">
                <label for="phone">Telepon</label>
                <input type="text" id="phone" name="phone" class="form-control  @error('phone') is-invalid @enderror" placeholder="Masukkan Telepon">
            </div>
            <div class="form-group">
                <label for="status">Status Penduduk</label>
                <select id="status" name="status" class="form-control  @error('status') is-invalid @enderror" required title="Status Penduduk wajib dipilih">
                    <option value="">Pilih Status Penduduk</option>
                    <option value="active">Aktif</option>
                    <option value="moved">Pindah</option>
                    <option value="deceased">Meninggal</option>
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Simpan</button>
            <!-- Tombol Kembali -->
            <a href="{{ url('/resident') }}" class="btn btn-secondary">Kembali</a>
        </form>
    @endsection

