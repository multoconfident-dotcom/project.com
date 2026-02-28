@extends('layouts.app')

@section('title', 'Pasien Dokter ' . $dokter->nama_dokter)

@section('content')

<!-- Page Header -->
<div class="page-header">
    <div>
        <div class="breadcrumb-custom">
            <a href="{{ route('home') }}">Beranda</a> &rsaquo;
            <a href="{{ route('dokter.index') }}">Data Dokter</a> &rsaquo;
            Pasien Dokter
        </div>
        <h1 class="page-title">
            <div class="page-title-icon">
                <i class="fas fa-users"></i>
            </div>
            Pasien Dokter
        </h1>
    </div>
    <a href="{{ route('dokter.index') }}" class="btn btn-secondary">
        <i class="fas fa-arrow-left me-2"></i>Kembali
    </a>
</div>

<!-- Dokter Info Banner -->
<div class="card mb-4" style="background: linear-gradient(135deg, #eff6ff, #dbeafe); border: 1.5px solid #bfdbfe;">
    <div class="card-body p-4">
        <div class="d-flex align-items-center gap-4">
            <div style="width: 64px; height: 64px; border-radius: 16px; background: linear-gradient(135deg, #2563eb, #0ea5e9); display: flex; align-items: center; justify-content: center; font-size: 1.5rem; font-weight: 700; color: white; flex-shrink: 0; box-shadow: 0 4px 12px rgba(37, 99, 235, 0.3);">
                {{ strtoupper(substr($dokter->nama_dokter, 0, 2)) }}
            </div>
            <div class="flex-fill">
                <h5 style="font-weight: 700; color: #1e3a8a; margin-bottom: 4px;">{{ $dokter->nama_dokter }}</h5>
                <div class="d-flex align-items-center gap-3 flex-wrap">
                    <span style="font-size: 0.85rem; color: #3b82f6;">
                        <i class="fas fa-stethoscope me-1"></i>{{ $dokter->spesialis }}
                    </span>
                    <span style="font-size: 0.85rem; color: #64748b;">
                        <i class="fas fa-users me-1"></i>{{ $dokter->pasiens->count() }} pasien
                    </span>
                </div>
            </div>
            <a href="{{ route('dokter.show', $dokter->id) }}" class="btn btn-sm" style="background: white; color: #2563eb; border: 1.5px solid #bfdbfe;">
                <i class="fas fa-id-card me-1"></i>Profil Dokter
            </a>
        </div>
    </div>
</div>

<!-- Patients Table -->
<div class="card">
    <div class="card-header-custom">
        <h6 class="card-header-title">
            <i class="fas fa-procedures me-2 text-success"></i>Daftar Pasien
        </h6>
        <span class="badge" style="background: #d1fae5; color: #065f46; font-size: 0.75rem;">
            {{ $dokter->pasiens->count() }} pasien
        </span>
    </div>
    <div class="card-body p-0">
        @if($dokter->pasiens->count() > 0)
        <div class="table-responsive">
            <table class="table table-modern mb-0">
                <thead>
                    <tr>
                        <th style="width: 50px;">#</th>
                        <th>Pasien</th>
                        <th>Alamat</th>
                        <th>Nomor Telepon</th>
                        <th style="width: 80px;">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($dokter->pasiens as $index => $pasien)
                    <tr>
                        <td>
                            <span style="font-size: 0.8rem; color: #94a3b8; font-weight: 600;">{{ $index + 1 }}</span>
                        </td>
                        <td>
                            <div class="d-flex align-items-center gap-3">
                                <div class="avatar avatar-green">
                                    {{ strtoupper(substr($pasien->nama_pasien, 0, 2)) }}
                                </div>
                                <div>
                                    <div style="font-weight: 600; color: #1e293b; font-size: 0.875rem;">{{ $pasien->nama_pasien }}</div>
                                    <div style="font-size: 0.75rem; color: #94a3b8;">ID: #{{ $pasien->id }}</div>
                                </div>
                            </div>
                        </td>
                        <td>
                            <span style="font-size: 0.85rem; color: #475569;">
                                <i class="fas fa-map-marker-alt me-1 text-muted" style="font-size: 0.7rem;"></i>
                                {{ $pasien->alamat }}
                            </span>
                        </td>
                        <td>
                            <span style="font-size: 0.85rem; color: #475569;">
                                <i class="fas fa-phone me-1 text-muted" style="font-size: 0.7rem;"></i>
                                {{ $pasien->nomor_telepon }}
                            </span>
                        </td>
                        <td>
                            <a href="{{ route('pasien.show', $pasien->id) }}" class="btn btn-sm btn-info" title="Detail">
                                <i class="fas fa-eye"></i>
                            </a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        @else
        <div class="empty-state">
            <div class="empty-state-icon">
                <i class="fas fa-procedures"></i>
            </div>
            <h6 style="color: #475569; font-weight: 600; margin-bottom: 0.5rem;">Belum ada pasien</h6>
            <p style="color: #94a3b8; font-size: 0.85rem; margin-bottom: 1rem;">Dokter ini belum memiliki pasien terdaftar</p>
            <a href="{{ route('pasien.create') }}" class="btn btn-success btn-sm">
                <i class="fas fa-plus me-1"></i>Tambah Pasien
            </a>
        </div>
        @endif
    </div>
</div>

@endsection
