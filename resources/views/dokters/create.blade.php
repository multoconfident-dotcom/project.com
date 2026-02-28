@extends('layouts.app')

@section('title', 'Tambah Dokter')

@section('content')

<!-- Page Header -->
<div class="page-header">
    <div>
        <div class="breadcrumb-custom">
            <a href="{{ route('home') }}">Beranda</a> &rsaquo;
            <a href="{{ route('dokter.index') }}">Data Dokter</a> &rsaquo;
            Tambah Dokter
        </div>
        <h1 class="page-title">
            <div class="page-title-icon">
                <i class="fas fa-user-plus"></i>
            </div>
            Tambah Dokter Baru
        </h1>
    </div>
    <a href="{{ route('dokter.index') }}" class="btn btn-secondary">
        <i class="fas fa-arrow-left me-2"></i>Kembali
    </a>
</div>

<div class="row justify-content-center">
    <div class="col-lg-7">
        <div class="card">
            <div class="card-header-custom">
                <h6 class="card-header-title">
                    <i class="fas fa-user-md me-2 text-primary"></i>Informasi Dokter
                </h6>
            </div>
            <div class="card-body p-4">
                <form action="{{ route('dokter.store') }}" method="POST">
                    @csrf

                    <div class="mb-4">
                        <label for="nama_dokter" class="form-label">
                            <i class="fas fa-user me-1 text-primary" style="font-size: 0.7rem;"></i>
                            Nama Dokter
                        </label>
                        <input type="text"
                               class="form-control @error('nama_dokter') is-invalid @enderror"
                               id="nama_dokter"
                               name="nama_dokter"
                               value="{{ old('nama_dokter') }}"
                               placeholder="Masukkan nama lengkap dokter"
                               required>
                        @error('nama_dokter')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-4">
                        <label for="spesialis" class="form-label">
                            <i class="fas fa-stethoscope me-1 text-primary" style="font-size: 0.7rem;"></i>
                            Spesialis
                        </label>
                        <input type="text"
                               class="form-control @error('spesialis') is-invalid @enderror"
                               id="spesialis"
                               name="spesialis"
                               value="{{ old('spesialis') }}"
                               placeholder="Contoh: Dokter Umum, Spesialis Jantung, dll."
                               required>
                        @error('spesialis')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="d-flex gap-2 pt-2">
                        <button type="submit" class="btn btn-primary">
                            <i class="fas fa-save me-2"></i>Simpan Dokter
                        </button>
                        <a href="{{ route('dokter.index') }}" class="btn btn-secondary">
                            Batal
                        </a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection
