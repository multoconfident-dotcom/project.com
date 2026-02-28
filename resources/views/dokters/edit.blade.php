@extends('layouts.app')

@section('title', 'Edit Dokter')

@section('content')

<!-- Page Header -->
<div class="page-header">
    <div>
        <div class="breadcrumb-custom">
            <a href="{{ route('home') }}">Beranda</a> &rsaquo;
            <a href="{{ route('dokter.index') }}">Data Dokter</a> &rsaquo;
            Edit Dokter
        </div>
        <h1 class="page-title">
            <div class="page-title-icon">
                <i class="fas fa-user-edit"></i>
            </div>
            Edit Dokter
        </h1>
    </div>
    <a href="{{ route('dokter.index') }}" class="btn btn-secondary">
        <i class="fas fa-arrow-left me-2"></i>Kembali
    </a>
</div>

<div class="row justify-content-center">
    <div class="col-lg-7">
        <!-- Current Info Card -->
        <div class="card mb-4" style="background: linear-gradient(135deg, #eff6ff, #dbeafe); border: 1.5px solid #bfdbfe;">
            <div class="card-body p-3">
                <div class="d-flex align-items-center gap-3">
                    <div class="avatar avatar-blue" style="width: 48px; height: 48px; font-size: 1rem;">
                        {{ strtoupper(substr($dokter->nama_dokter, 0, 2)) }}
                    </div>
                    <div>
                        <div style="font-weight: 700; color: #1e3a8a; font-size: 0.95rem;">{{ $dokter->nama_dokter }}</div>
                        <div style="font-size: 0.8rem; color: #3b82f6;">
                            <i class="fas fa-stethoscope me-1"></i>{{ $dokter->spesialis }}
                        </div>
                    </div>
                    <div class="ms-auto">
                        <span style="font-size: 0.75rem; color: #64748b; background: white; padding: 4px 10px; border-radius: 20px;">
                            ID #{{ $dokter->id }}
                        </span>
                    </div>
                </div>
            </div>
        </div>

        <div class="card">
            <div class="card-header-custom">
                <h6 class="card-header-title">
                    <i class="fas fa-edit me-2 text-warning"></i>Perbarui Informasi Dokter
                </h6>
            </div>
            <div class="card-body p-4">
                <form action="{{ route('dokter.update', $dokter->id) }}" method="POST">
                    @csrf
                    @method('PUT')

                    <div class="mb-4">
                        <label for="nama_dokter" class="form-label">
                            <i class="fas fa-user me-1 text-primary" style="font-size: 0.7rem;"></i>
                            Nama Dokter
                        </label>
                        <input type="text"
                               class="form-control @error('nama_dokter') is-invalid @enderror"
                               id="nama_dokter"
                               name="nama_dokter"
                               value="{{ old('nama_dokter', $dokter->nama_dokter) }}"
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
                               value="{{ old('spesialis', $dokter->spesialis) }}"
                               placeholder="Contoh: Dokter Umum, Spesialis Jantung, dll."
                               required>
                        @error('spesialis')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="d-flex gap-2 pt-2">
                        <button type="submit" class="btn btn-warning">
                            <i class="fas fa-save me-2"></i>Perbarui Data
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
