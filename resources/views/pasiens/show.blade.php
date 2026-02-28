@extends('layouts.app')

@section('title', 'Detail Pasien')

@section('content')

<!-- Page Header -->
<div class="page-header">
    <div>
        <div class="breadcrumb-custom">
            <a href="{{ route('home') }}">Beranda</a> &rsaquo;
            <a href="{{ route('pasien.index') }}">Data Pasien</a> &rsaquo;
            Detail Pasien
        </div>
        <h1 class="page-title">
            <div class="page-title-icon" style="background: linear-gradient(135deg, #10b981, #059669);">
                <i class="fas fa-id-card"></i>
            </div>
            Detail Pasien
        </h1>
    </div>
    <a href="{{ route('pasien.index') }}" class="btn btn-secondary">
        <i class="fas fa-arrow-left me-2"></i>Kembali
    </a>
</div>

<div class="row g-4">
    <!-- Profile Card -->
    <div class="col-lg-4">
        <div class="card text-center" style="border-radius: 20px; overflow: hidden;">
            <div style="height: 80px; background: linear-gradient(135deg, #064e3b, #10b981, #34d399);"></div>
            <div class="card-body p-4" style="margin-top: -40px;">
                <div style="width: 80px; height: 80px; border-radius: 20px; background: linear-gradient(135deg, #d1fae5, #a7f3d0); display: flex; align-items: center; justify-content: center; font-size: 1.75rem; font-weight: 700; color: #065f46; margin: 0 auto 1rem; border: 4px solid white; box-shadow: 0 4px 12px rgba(0,0,0,0.1);">
                    {{ strtoupper(substr($pasien->nama_pasien, 0, 2)) }}
                </div>
                <h5 style="font-weight: 700; color: #1e293b; margin-bottom: 0.5rem;">{{ $pasien->nama_pasien }}</h5>
                <span style="font-size: 0.8rem; color: #64748b; background: #f1f5f9; padding: 4px 12px; border-radius: 20px;">
                    <i class="fas fa-phone me-1"></i>{{ $pasien->nomor_telepon }}
                </span>

                <div class="mt-3 p-3" style="background: #f8fafc; border-radius: 12px; text-align: left;">
                    <div style="font-size: 0.7rem; color: #94a3b8; text-transform: uppercase; letter-spacing: 0.5px; margin-bottom: 6px;">Dokter Penanganan</div>
                    @if($pasien->dokter)
                    <div class="d-flex align-items-center gap-2">
                        <div style="width: 32px; height: 32px; border-radius: 8px; background: #dbeafe; display: flex; align-items: center; justify-content: center; font-size: 0.7rem; font-weight: 700; color: #1d4ed8; flex-shrink: 0;">
                            {{ strtoupper(substr($pasien->dokter->nama_dokter, 0, 2)) }}
                        </div>
                        <div>
                            <div style="font-weight: 600; font-size: 0.85rem; color: #1e293b;">{{ $pasien->dokter->nama_dokter }}</div>
                            <div style="font-size: 0.75rem; color: #94a3b8;">{{ $pasien->dokter->spesialis }}</div>
                        </div>
                    </div>
                    @else
                    <span class="badge" style="background: #f1f5f9; color: #94a3b8;">Belum ada dokter</span>
                    @endif
                </div>

                <div class="d-flex gap-2 mt-3">
                    <a href="{{ route('pasien.edit', $pasien->id) }}" class="btn btn-warning flex-fill btn-sm">
                        <i class="fas fa-edit me-1"></i>Edit
                    </a>
                    @if($pasien->dokter)
                    <a href="{{ route('dokter.show', $pasien->dokter->id) }}" class="btn btn-info flex-fill btn-sm">
                        <i class="fas fa-user-md me-1"></i>Dokter
                    </a>
                    @endif
                </div>
            </div>
        </div>
    </div>

    <!-- Detail Info -->
    <div class="col-lg-8">
        <div class="card">
            <div class="card-header-custom">
                <h6 class="card-header-title">
                    <i class="fas fa-info-circle me-2 text-success"></i>Informasi Lengkap
                </h6>
            </div>
            <div class="card-body p-4">
                <div class="detail-item">
                    <div class="detail-label">
                        <i class="fas fa-hashtag me-1" style="font-size: 0.65rem;"></i>ID Pasien
                    </div>
                    <div class="detail-value">
                        <span style="background: #f1f5f9; padding: 3px 10px; border-radius: 6px; font-family: monospace; font-size: 0.85rem;">#{{ $pasien->id }}</span>
                    </div>
                </div>
                <div class="detail-item">
                    <div class="detail-label">
                        <i class="fas fa-user me-1" style="font-size: 0.65rem;"></i>Nama Pasien
                    </div>
                    <div class="detail-value">{{ $pasien->nama_pasien }}</div>
                </div>
                <div class="detail-item">
                    <div class="detail-label">
                        <i class="fas fa-map-marker-alt me-1" style="font-size: 0.65rem;"></i>Alamat
                    </div>
                    <div class="detail-value">{{ $pasien->alamat }}</div>
                </div>
                <div class="detail-item">
                    <div class="detail-label">
                        <i class="fas fa-phone me-1" style="font-size: 0.65rem;"></i>Nomor Telepon
                    </div>
                    <div class="detail-value">{{ $pasien->nomor_telepon }}</div>
                </div>
                <div class="detail-item">
                    <div class="detail-label">
                        <i class="fas fa-user-md me-1" style="font-size: 0.65rem;"></i>Dokter
                    </div>
                    <div class="detail-value">
                        @if($pasien->dokter)
                            <div class="d-flex align-items-center gap-2">
                                <span class="badge" style="background: #dbeafe; color: #1d4ed8; padding: 0.4em 0.8em;">
                                    {{ $pasien->dokter->nama_dokter }}
                                </span>
                                <span style="font-size: 0.8rem; color: #94a3b8;">{{ $pasien->dokter->spesialis }}</span>
                            </div>
                        @else
                            <span class="badge" style="background: #f1f5f9; color: #94a3b8;">Belum ada</span>
                        @endif
                    </div>
                </div>
                <div class="detail-item">
                    <div class="detail-label">
                        <i class="fas fa-calendar me-1" style="font-size: 0.65rem;"></i>Dibuat Pada
                    </div>
                    <div class="detail-value">{{ $pasien->created_at->format('d F Y, H:i') }}</div>
                </div>
                <div class="detail-item">
                    <div class="detail-label">
                        <i class="fas fa-clock me-1" style="font-size: 0.65rem;"></i>Diperbarui
                    </div>
                    <div class="detail-value">{{ $pasien->updated_at->format('d F Y, H:i') }}</div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
