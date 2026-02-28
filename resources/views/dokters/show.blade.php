@extends('layouts.app')

@section('title', 'Detail Dokter')

@section('content')

<!-- Page Header -->
<div class="page-header">
    <div>
        <div class="breadcrumb-custom">
            <a href="{{ route('home') }}">Beranda</a> &rsaquo;
            <a href="{{ route('dokter.index') }}">Data Dokter</a> &rsaquo;
            Detail Dokter
        </div>
        <h1 class="page-title">
            <div class="page-title-icon">
                <i class="fas fa-id-card"></i>
            </div>
            Detail Dokter
        </h1>
    </div>
    <a href="{{ route('dokter.index') }}" class="btn btn-secondary">
        <i class="fas fa-arrow-left me-2"></i>Kembali
    </a>
</div>

<div class="row g-4">
    <!-- Profile Card -->
    <div class="col-lg-4">
        <div class="card text-center" style="border-radius: 20px; overflow: hidden;">
            <div style="height: 80px; background: linear-gradient(135deg, #1e3a8a, #2563eb, #0ea5e9);"></div>
            <div class="card-body p-4" style="margin-top: -40px;">
                <div style="width: 80px; height: 80px; border-radius: 20px; background: linear-gradient(135deg, #dbeafe, #bfdbfe); display: flex; align-items: center; justify-content: center; font-size: 1.75rem; font-weight: 700; color: #1d4ed8; margin: 0 auto 1rem; border: 4px solid white; box-shadow: 0 4px 12px rgba(0,0,0,0.1);">
                    {{ strtoupper(substr($dokter->nama_dokter, 0, 2)) }}
                </div>
                <h5 style="font-weight: 700; color: #1e293b; margin-bottom: 0.5rem;">{{ $dokter->nama_dokter }}</h5>
                <span class="badge" style="background: #dbeafe; color: #1d4ed8; padding: 0.4em 1em; font-size: 0.8rem; border-radius: 20px;">
                    <i class="fas fa-stethoscope me-1"></i>{{ $dokter->spesialis }}
                </span>

                <div class="row g-2 mt-3">
                    <div class="col-6">
                        <div style="background: #f8fafc; border-radius: 12px; padding: 0.75rem;">
                            <div style="font-size: 1.25rem; font-weight: 700; color: #2563eb;">{{ $dokter->pasiens->count() }}</div>
                            <div style="font-size: 0.7rem; color: #94a3b8; text-transform: uppercase; letter-spacing: 0.5px;">Pasien</div>
                        </div>
                    </div>
                    <div class="col-6">
                        <div style="background: #f8fafc; border-radius: 12px; padding: 0.75rem;">
                            <div style="font-size: 1.25rem; font-weight: 700; color: #10b981;">{{ $dokter->created_at->format('Y') }}</div>
                            <div style="font-size: 0.7rem; color: #94a3b8; text-transform: uppercase; letter-spacing: 0.5px;">Bergabung</div>
                        </div>
                    </div>
                </div>

                <div class="d-flex gap-2 mt-3">
                    <a href="{{ route('dokter.edit', $dokter->id) }}" class="btn btn-warning flex-fill btn-sm">
                        <i class="fas fa-edit me-1"></i>Edit
                    </a>
                    <a href="{{ route('dokter.showPasiens', $dokter->id) }}" class="btn btn-info flex-fill btn-sm">
                        <i class="fas fa-users me-1"></i>Pasien
                    </a>
                </div>
            </div>
        </div>
    </div>

    <!-- Detail Info -->
    <div class="col-lg-8">
        <div class="card">
            <div class="card-header-custom">
                <h6 class="card-header-title">
                    <i class="fas fa-info-circle me-2 text-primary"></i>Informasi Lengkap
                </h6>
            </div>
            <div class="card-body p-4">
                <div class="detail-item">
                    <div class="detail-label">
                        <i class="fas fa-hashtag me-1" style="font-size: 0.65rem;"></i>ID Dokter
                    </div>
                    <div class="detail-value">
                        <span style="background: #f1f5f9; padding: 3px 10px; border-radius: 6px; font-family: monospace; font-size: 0.85rem;">#{{ $dokter->id }}</span>
                    </div>
                </div>
                <div class="detail-item">
                    <div class="detail-label">
                        <i class="fas fa-user me-1" style="font-size: 0.65rem;"></i>Nama Dokter
                    </div>
                    <div class="detail-value">{{ $dokter->nama_dokter }}</div>
                </div>
                <div class="detail-item">
                    <div class="detail-label">
                        <i class="fas fa-stethoscope me-1" style="font-size: 0.65rem;"></i>Spesialis
                    </div>
                    <div class="detail-value">
                        <span class="badge" style="background: #dbeafe; color: #1d4ed8; padding: 0.4em 0.8em;">{{ $dokter->spesialis }}</span>
                    </div>
                </div>
                <div class="detail-item">
                    <div class="detail-label">
                        <i class="fas fa-users me-1" style="font-size: 0.65rem;"></i>Jumlah Pasien
                    </div>
                    <div class="detail-value">
                        <span style="font-weight: 700; color: #2563eb;">{{ $dokter->pasiens->count() }}</span>
                        <span style="color: #94a3b8; font-size: 0.85rem;"> pasien terdaftar</span>
                    </div>
                </div>
                <div class="detail-item">
                    <div class="detail-label">
                        <i class="fas fa-calendar me-1" style="font-size: 0.65rem;"></i>Dibuat Pada
                    </div>
                    <div class="detail-value">{{ $dokter->created_at->format('d F Y, H:i') }}</div>
                </div>
                <div class="detail-item">
                    <div class="detail-label">
                        <i class="fas fa-clock me-1" style="font-size: 0.65rem;"></i>Diperbarui
                    </div>
                    <div class="detail-value">{{ $dokter->updated_at->format('d F Y, H:i') }}</div>
                </div>
            </div>
        </div>

        @if($dokter->pasiens->count() > 0)
        <div class="card mt-4">
            <div class="card-header-custom">
                <h6 class="card-header-title">
                    <i class="fas fa-procedures me-2 text-success"></i>Pasien Terbaru
                </h6>
                <a href="{{ route('dokter.showPasiens', $dokter->id) }}" style="font-size: 0.8rem; color: #2563eb; text-decoration: none;">
                    Lihat semua <i class="fas fa-arrow-right ms-1"></i>
                </a>
            </div>
            <div class="card-body p-0">
                @foreach($dokter->pasiens->take(3) as $pasien)
                <div class="d-flex align-items-center gap-3 p-3" style="border-bottom: 1px solid #f1f5f9;">
                    <div class="avatar avatar-green" style="width: 36px; height: 36px; font-size: 0.75rem;">
                        {{ strtoupper(substr($pasien->nama_pasien, 0, 2)) }}
                    </div>
                    <div class="flex-fill">
                        <div style="font-weight: 600; font-size: 0.875rem; color: #1e293b;">{{ $pasien->nama_pasien }}</div>
                        <div style="font-size: 0.75rem; color: #94a3b8;">{{ $pasien->nomor_telepon }}</div>
                    </div>
                    <a href="{{ route('pasien.show', $pasien->id) }}" class="btn btn-sm btn-info">
                        <i class="fas fa-eye"></i>
                    </a>
                </div>
                @endforeach
            </div>
        </div>
        @endif
    </div>
</div>

@endsection
