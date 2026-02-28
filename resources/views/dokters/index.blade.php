@extends('layouts.app')

@section('title', 'Data Dokter')

@section('content')

<!-- Page Header -->
<div class="page-header">
    <div>
        <div class="breadcrumb-custom">
            <a href="{{ route('home') }}">Beranda</a> &rsaquo; Data Dokter
        </div>
        <h1 class="page-title">
            <div class="page-title-icon">
                <i class="fas fa-user-md"></i>
            </div>
            Data Dokter
        </h1>
    </div>
    <a href="{{ route('dokter.create') }}" class="btn btn-primary">
        <i class="fas fa-plus me-2"></i>Tambah Dokter
    </a>
</div>

<!-- Table Card -->
<div class="card">
    <div class="card-header-custom">
        <h6 class="card-header-title">
            <i class="fas fa-list me-2 text-primary"></i>Daftar Dokter
        </h6>
        <span class="badge" style="background: #dbeafe; color: #1d4ed8; font-size: 0.75rem;">
            {{ $dokters->count() }} dokter
        </span>
    </div>
    <div class="card-body p-0">
        <div class="table-responsive">
            <table class="table table-modern mb-0">
                <thead>
                    <tr>
                        <th style="width: 50px;">#</th>
                        <th>Dokter</th>
                        <th>Spesialis</th>
                        <th style="width: 180px;">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($dokters as $index => $dokter)
                    <tr>
                        <td>
                            <span style="font-size: 0.8rem; color: #94a3b8; font-weight: 600;">{{ $index + 1 }}</span>
                        </td>
                        <td>
                            <div class="d-flex align-items-center gap-3">
                                <div class="avatar avatar-blue">
                                    {{ strtoupper(substr($dokter->nama_dokter, 0, 2)) }}
                                </div>
                                <div>
                                    <div style="font-weight: 600; color: #1e293b; font-size: 0.875rem;">{{ $dokter->nama_dokter }}</div>
                                    <div style="font-size: 0.75rem; color: #94a3b8;">ID: #{{ $dokter->id }}</div>
                                </div>
                            </div>
                        </td>
                        <td>
                            <span class="badge" style="background: #dbeafe; color: #1d4ed8; padding: 0.4em 0.8em;">
                                <i class="fas fa-stethoscope me-1" style="font-size: 0.65rem;"></i>
                                {{ $dokter->spesialis }}
                            </span>
                        </td>
                        <td>
                            <div class="action-btn-group">
                                <a href="{{ route('dokter.show', $dokter->id) }}" class="btn btn-sm btn-info" title="Detail">
                                    <i class="fas fa-eye"></i>
                                </a>
                                <a href="{{ route('dokter.edit', $dokter->id) }}" class="btn btn-sm btn-warning" title="Edit">
                                    <i class="fas fa-edit"></i>
                                </a>
                                <a href="{{ route('dokter.showPasiens', $dokter->id) }}" class="btn btn-sm" style="background: #f1f5f9; color: #475569;" title="Lihat Pasien">
                                    <i class="fas fa-users"></i>
                                </a>
                                <form action="{{ route('dokter.destroy', $dokter->id) }}" method="POST" class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-danger" title="Hapus"
                                        onclick="return confirm('Apakah Anda yakin ingin menghapus dokter ini?')">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="4">
                            <div class="empty-state">
                                <div class="empty-state-icon">
                                    <i class="fas fa-user-md"></i>
                                </div>
                                <h6 style="color: #475569; font-weight: 600; margin-bottom: 0.5rem;">Belum ada data dokter</h6>
                                <p style="color: #94a3b8; font-size: 0.85rem; margin-bottom: 1rem;">Mulai dengan menambahkan dokter pertama</p>
                                <a href="{{ route('dokter.create') }}" class="btn btn-primary btn-sm">
                                    <i class="fas fa-plus me-1"></i>Tambah Dokter
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
