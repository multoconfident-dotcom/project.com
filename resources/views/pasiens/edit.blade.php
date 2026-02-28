@extends('layouts.app')

@section('title', 'Edit Pasien')

@section('content')

<!-- Page Header -->
<div class="page-header">
    <div>
        <div class="breadcrumb-custom">
            <a href="{{ route('home') }}">Beranda</a> &rsaquo;
            <a href="{{ route('pasien.index') }}">Data Pasien</a> &rsaquo;
            Edit Pasien
        </div>
        <h1 class="page-title">
            <div class="page-title-icon" style="background: linear-gradient(135deg, #f59e0b, #d97706);">
                <i class="fas fa-user-edit"></i>
            </div>
            Edit Pasien
        </h1>
    </div>
    <a href="{{ route('pasien.index') }}" class="btn btn-secondary">
        <i class="fas fa-arrow-left me-2"></i>Kembali
    </a>
</div>

<div class="row justify-content-center">
    <div class="col-lg-8">
        <!-- Current Info Card -->
        <div class="card mb-4" style="background: linear-gradient(135deg, #f0fdf4, #dcfce7); border: 1.5px solid #bbf7d0;">
            <div class="card-body p-3">
                <div class="d-flex align-items-center gap-3">
                    <div class="avatar avatar-green" style="width: 48px; height: 48px; font-size: 1rem;">
                        {{ strtoupper(substr($pasien->nama_pasien, 0, 2)) }}
                    </div>
                    <div>
                        <div style="font-weight: 700; color: #14532d; font-size: 0.95rem;">{{ $pasien->nama_pasien }}</div>
                        <div style="font-size: 0.8rem; color: #16a34a;">
                            <i class="fas fa-phone me-1"></i>{{ $pasien->nomor_telepon }}
                        </div>
                    </div>
                    <div class="ms-auto">
                        <span style="font-size: 0.75rem; color: #64748b; background: white; padding: 4px 10px; border-radius: 20px;">
                            ID #{{ $pasien->id }}
                        </span>
                    </div>
                </div>
            </div>
        </div>

        <div class="card">
            <div class="card-header-custom">
                <h6 class="card-header-title">
                    <i class="fas fa-edit me-2 text-warning"></i>Perbarui Informasi Pasien
                </h6>
            </div>
            <div class="card-body p-4">
                <form action="{{ route('pasien.update', $pasien->id) }}" method="POST">
                    @csrf
                    @method('PUT')

                    <div class="row g-4">
                        <div class="col-md-6">
                            <label for="nama_pasien" class="form-label">
                                <i class="fas fa-user me-1 text-warning" style="font-size: 0.7rem;"></i>
                                Nama Pasien
                            </label>
                            <input type="text"
                                   class="form-control @error('nama_pasien') is-invalid @enderror"
                                   id="nama_pasien"
                                   name="nama_pasien"
                                   value="{{ old('nama_pasien', $pasien->nama_pasien) }}"
                                   placeholder="Masukkan nama lengkap pasien"
                                   required>
                            @error('nama_pasien')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="col-md-6">
                            <label for="nomor_telepon" class="form-label">
                                <i class="fas fa-phone me-1 text-warning" style="font-size: 0.7rem;"></i>
                                Nomor Telepon
                            </label>
                            <input type="text"
                                   class="form-control @error('nomor_telepon') is-invalid @enderror"
                                   id="nomor_telepon"
                                   name="nomor_telepon"
                                   value="{{ old('nomor_telepon', $pasien->nomor_telepon) }}"
                                   placeholder="Contoh: 08123456789"
                                   required>
                            @error('nomor_telepon')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="col-12">
                            <label for="alamat" class="form-label">
                                <i class="fas fa-map-marker-alt me-1 text-warning" style="font-size: 0.7rem;"></i>
                                Alamat
                            </label>
                            <textarea class="form-control @error('alamat') is-invalid @enderror"
                                      id="alamat"
                                      name="alamat"
                                      rows="3"
                                      placeholder="Masukkan alamat lengkap pasien"
                                      required>{{ old('alamat', $pasien->alamat) }}</textarea>
                            @error('alamat')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="col-12">
                            <label for="dokter_id" class="form-label">
                                <i class="fas fa-user-md me-1 text-warning" style="font-size: 0.7rem;"></i>
                                Dokter Penanganan
                            </label>
                            <select class="form-select @error('dokter_id') is-invalid @enderror"
                                    id="dokter_id"
                                    name="dokter_id"
                                    required>
                                <option value="">-- Pilih Dokter --</option>
                                @foreach($dokters as $dokter)
                                    <option value="{{ $dokter->id }}" {{ old('dokter_id', $pasien->dokter_id) == $dokter->id ? 'selected' : '' }}>
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
                        <button type="submit" class="btn btn-warning">
                            <i class="fas fa-save me-2"></i>Perbarui Data
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
