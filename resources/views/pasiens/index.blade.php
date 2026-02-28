@extends('layouts.app')

@section('title', 'Data Pasien')

@section('content')

<!-- Page Header -->
<div class="page-header">
    <div>
        <div class="breadcrumb-custom">
            <a href="{{ route('home') }}">Beranda</a> &rsaquo; Data Pasien
        </div>
        <h1 class="page-title">
            <div class="page-title-icon" style="background: linear-gradient(135deg, #10b981, #059669);">
                <i class="fas fa-procedures"></i>
            </div>
            Data Pasien
        </h1>
    </div>
    <a href="{{ route('pasien.create') }}" class="btn btn-success">
        <i class="fas fa-plus me-2"></i>Tambah Pasien
    </a>
</div>

<!-- Table Card -->
<div class="card">
    <div class="card-header-custom">
        <h6 class="card-header-title">
            <i class="fas fa-list me-2 text-success"></i>Daftar Pasien
        </h6>
        <span class="badge" style="background: #d1fae5; color: #065f46; font-size: 0.75rem;">
            {{ $pasiens->count() }} pasien
        </span>
    </div>
    <div class="card-body p-0">
        <div class="table-responsive">
            <table class="table table-modern mb-0">
                <thead>
                    <tr>
                        <th style="width: 50px;">#</th>
                        <th>Pasien</th>
                        <th>Alamat</th>
                        <th>Telepon</th>
                        <th>Dokter</th>
                        <th style="width: 140px;">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($pasiens as $index => $pasien)
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
                            <span style="font-size: 0.85rem; color: #475569; max-width: 180px; display: block; white-space: nowrap; overflow: hidden; text-overflow: ellipsis;">
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
                            @if($pasien->dokter)
                                <div class="d-flex align-items-center gap-2">
                                    <div style="width: 24px; height: 24px; border-radius: 6px; background: #dbeafe; display: flex; align-items: center; justify-content: center; font-size: 0.6rem; font-weight: 700; color: #1d4ed8; flex-shrink: 0;">
                                        {{ strtoupper(substr($pasien->dokter->nama_dokter, 0, 1)) }}
                                    </div>
                                    <div>
                                        <div style="font-size: 0.8rem; font-weight: 600; color: #1e293b;">{{ $pasien->dokter->nama_dokter }}</div>
                                        <div style="font-size: 0.7rem; color: #94a3b8;">{{ $pasien->dokter->spesialis }}</div>
                                    </div>
                                </div>
                            @else
                                <span class="badge" style="background: #f1f5f9; color: #94a3b8;">Belum ada</span>
                            @endif
                        </td>
                        <td>
                            <div class="action-btn-group">
                                <a href="{{ route('pasien.show', $pasien->id) }}" class="btn btn-sm btn-info" title="Detail">
                                    <i class="fas fa-eye"></i>
                                </a>
                                <a href="{{ route('pasien.edit', $pasien->id) }}" class="btn btn-sm btn-warning" title="Edit">
                                    <i class="fas fa-edit"></i>
                                </a>
                                <form action="{{ route('pasien.destroy', $pasien->id) }}" method="POST" class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-danger" title="Hapus"
                                        onclick="return confirm('Apakah Anda yakin ingin menghapus pasien ini?')">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="6">
                            <div class="empty-state">
                                <div class="empty-state-icon">
                                    <i class="fas fa-procedures"></i>
                                </div>
                                <h6 style="color: #475569; font-weight: 600; margin-bottom: 0.5rem;">Belum ada data pasien</h6>
                                <p style="color: #94a3b8; font-size: 0.85rem; margin-bottom: 1rem;">Mulai dengan menambahkan pasien pertama</p>
                                <a href="{{ route('pasien.create') }}" class="btn btn-success btn-sm">
                                    <i class="fas fa-plus me-1"></i>Tambah Pasien
                                </a>
                            </div>
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>

@endsection
