@extends('layouts.app')

@section('content')
    <h1>Ubah Data Penduduk</h1>
    <form action="/resident/{{$resident->id}}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="nik">Nik</label>
            <input type="text" id="nik" name="nik" class="form-control @error('nik') is-invalid @enderror" value="{{ old('nik', $resident->nik) }}" placeholder="Masukkan Nik anda">
            @error('nik')
            <span class="invalid-feedback">
                {{$message}}
            </span>
            @enderror
        </div>
        <div class="form-group">
            <label for="name">Nama</label>
            <input type="text" id="name" name="name" class="form-control @error('name') is-invalid @enderror" value="{{ old('name', $resident->name) }}" placeholder="Masukkan Nama">
        </div>
        <div class="form-group">
            <label for="gender">Jenis Kelamin</label>
            <select id="gender" name="gender" class="form-control @error('gender') is-invalid @enderror">
                <option value="">Pilih Jenis Kelamin</option>
                <option value="male" {{ old('gender', $resident->gender) == 'male' ? 'selected' : '' }}>Laki-laki</option>
                <option value="female" {{ old('gender', $resident->gender) == 'female' ? 'selected' : '' }}>Perempuan</option>
            </select>
        </div>
        <div class="form-group">
            <label for="birth_date">Tanggal Lahir</label>
            <input type="date" id="birth_date" name="birth_date" class="form-control @error('birth_date') is-invalid @enderror" value="{{ old('birth_date', $resident->birth_date) }}">
        </div>
        <div class="form-group">
            <label for="birth_place">Tempat Lahir</label>
            <input type="text" id="birth_place" name="birth_place" class="form-control @error('birth_place') is-invalid @enderror" value="{{ old('birth_place', $resident->birth_place) }}" placeholder="Masukkan Tempat Lahir">
        </div>
        <div class="form-group">
            <label for="address">Alamat</label>
            <input type="text" id="address" name="address" class="form-control @error('address') is-invalid @enderror" value="{{ old('address', $resident->address) }}" placeholder="Masukkan Alamat">
        </div>
        <div class="form-group">
            <label for="religion">Agama</label>
            <input type="text" id="religion" name="religion" class="form-control @error('religion') is-invalid @enderror" value="{{ old('religion', $resident->religion) }}" placeholder="Masukkan Agama">
        </div>
        <div class="form-group">
            <label for="marital_status">Status Perkawinan</label>
            <select id="marital_status" name="marital_status" class="form-control @error('marital_status') is-invalid @enderror">
                <option value="">Pilih Status Perkawinan</option>
                <option value="single" {{ old('marital_status', $resident->marital_status) == 'single' ? 'selected' : '' }}>Belum Menikah</option>
                <option value="married" {{ old('marital_status', $resident->marital_status) == 'married' ? 'selected' : '' }}>Menikah</option>
                <option value="divorced" {{ old('marital_status', $resident->marital_status) == 'divorced' ? 'selected' : '' }}>Cerai</option>
                <option value="widowed" {{ old('marital_status', $resident->marital_status) == 'widowed' ? 'selected' : '' }}>Janda/Duda</option>
            </select>
        </div>
        <div class="form-group">
            <label for="occupation">Pekerjaan</label>
            <input type="text" id="occupation" name="occupation" class="form-control @error('occupation') is-invalid @enderror" value="{{ old('occupation', $resident->occupation) }}" placeholder="Masukkan Pekerjaan">
        </div>
        <div class="form-group">
            <label for="phone">Telepon</label>
            <input type="text" id="phone" name="phone" class="form-control @error('phone') is-invalid @enderror" value="{{ old('phone', $resident->phone) }}" placeholder="Masukkan Telepon">
        </div>
        <div class="form-group">
            <label for="status">Status Penduduk</label>
            <select id="status" name="status" class="form-control @error('status') is-invalid @enderror">
                <option value="">Pilih Status Penduduk</option>
                <option value="active" {{ old('status', $resident->status) == 'active' ? 'selected' : '' }}>Aktif</option>
                <option value="moved" {{ old('status', $resident->status) == 'moved' ? 'selected' : '' }}>Pindah</option>
                <option value="deceased" {{ old('status', $resident->status) == 'deceased' ? 'selected' : '' }}>Meninggal</option>
            </select>
        </div>
        <button type="submit" class="btn btn-warning">Simpan</button>
        <!-- Tombol Kembali -->
        <a href="{{ url('/resident') }}" class="btn btn-secondary">Kembali</a>
    </form>
@endsection
