@extends('layouts.app')

@section('title', 'Tambah Pasien')

@section('content')

<!-- Page Header -->
<div class="page-header">
    <div>
        <div class="breadcrumb-custom">
            <a href="{{ route('home') }}">Beranda</a> &rsaquo;
            <a href="{{ route('pasien.index') }}">Data Pasien</a> &rsaquo;
            Tambah Pasien
        </div>
        <h1 class="page-title">
            <div class="page-title-icon" style="background: linear-gradient(135deg, #10b981, #059669);">
                <i class="fas fa-user-plus"></i>
            </div>
            Tambah Pasien Baru
        </h1>
    </div>
    <a href="{{ route('pasien.index') }}" class="btn btn-secondary">
        <i class="fas fa-arrow-left me-2"></i>Kembali
    </a>
</div>

<div class="row justify-content-center">
    <div class="col-lg-8">
        <div class="card">
            <div class="card-header-custom">
                <h6 class="card-header-title">
                    <i class="fas fa-procedures me-2 text-success"></i>Informasi Pasien
                </h6>
            </div>
            <div class="card-body p-4">
                <form action="{{ route('pasien.store') }}" method="POST">
                    @csrf

                    <div class="row g-4">
                        <div class="col-md-6">
                            <label for="nama_pasien" class="form-label">
                                <i class="fas fa-user me-1 text-success" style="font-size: 0.7rem;"></i>
                                Nama Pasien
                            </label>
                            <input type="text"
                                   class="form-control @error('nama_pasien') is-invalid @enderror"
                                   id="nama_pasien"
                                   name="nama_pasien"
                                   value="{{ old('nama_pasien') }}"
                                   placeholder="Masukkan nama lengkap pasien"
                                   required>
                            @error('nama_pasien')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="col-md-6">
                            <label for="nomor_telepon" class="form-label">
                                <i class="fas fa-phone me-1 text-success" style="font-size: 0.7rem;"></i>
                                Nomor Telepon
                            </label>
                            <input type="text"
                                   class="form-control @error('nomor_telepon') is-invalid @enderror"
                                   id="nomor_telepon"
                                   name="nomor_telepon"
                                   value="{{ old('nomor_telepon') }}"
                                   placeholder="Contoh: 08123456789"
                                   required>
                            @error('nomor_telepon')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="col-12">
                            <label for="alamat" class="form-label">
                                <i class="fas fa-map-marker-alt me-1 text-success" style="font-size: 0.7rem;"></i>
                                Alamat
                            </label>
                            <textarea class="form-control @error('alamat') is-invalid @enderror"
                                      id="alamat"
                                      name="alamat"
                                      rows="3"
                                      placeholder="Masukkan alamat lengkap pasien"
                                      required>{{ old('alamat') }}</textarea>
                            @error('alamat')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="col-12">
                            <label for="dokter_id" class="form-label">
                                <i class="fas fa-user-md me-1 text-success" style="font-size: 0.7rem;"></i>
                                Dokter Penanganan
                            </label>
                            <select class="form-select @error('dokter_id') is-invalid @enderror"
                                    id="dokter_id"
                                    name="dokter_id"
                                    required>
                                <option value="">-- Pilih Dokter --</option>
                                @foreach($dokters as $dokter)
                                    <option value="{{ $dokter->id }}" {{ old('dokter_id') == $dokter->id ? 'selected' : '' }}>
                                        {{ $dokter->nama_dokter }} &mdash; {{ $dokter->spesialis }}
                                    </option>
                                @endforeach
                            </select>
                            @error('dokter_id')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="d-flex gap-2 pt-4 mt-2" style="border-top: 1px solid #f1f5f9;">
                        <button type="submit" class="btn btn-success">
                            <i class="fas fa-save me-2"></i>Simpan Pasien
                        </button>
                        <a href="{{ route('pasien.index') }}" class="btn btn-secondary">
                            Batal
                        </a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection
