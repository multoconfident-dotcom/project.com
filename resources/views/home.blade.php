@extends('layouts.app')

@section('title', 'Beranda')

@section('content')

<!-- Page Header -->
<div class="page-header">
    <div>
        <div class="breadcrumb-custom">Dashboard</div>
        <h1 class="page-title">
            <div class="page-title-icon">
                <i class="fas fa-th-large"></i>
            </div>
            Beranda
        </h1>
    </div>
</div>

<!-- Hero Banner -->
<div class="card mb-4" style="background: linear-gradient(135deg, #1e3a8a 0%, #2563eb 50%, #0ea5e9 100%); border-radius: 20px; overflow: hidden; position: relative;">
    <div style="position: absolute; top: -40px; right: -40px; width: 200px; height: 200px; border-radius: 50%; background: rgba(255,255,255,0.05);"></div>
    <div style="position: absolute; bottom: -60px; right: 80px; width: 160px; height: 160px; border-radius: 50%; background: rgba(255,255,255,0.05);"></div>
    <div class="card-body p-4 p-md-5" style="position: relative; z-index: 1;">
        <div class="row align-items-center">
            <div class="col-md-8">
                <div style="display: inline-flex; align-items: center; gap: 8px; background: rgba(255,255,255,0.15); padding: 6px 14px; border-radius: 20px; margin-bottom: 1rem;">
                    <span style="width: 8px; height: 8px; background: #4ade80; border-radius: 50%; display: inline-block;"></span>
                    <span style="color: rgba(255,255,255,0.9); font-size: 0.8rem; font-weight: 500;">Sistem Aktif</span>
                </div>
                <h2 style="color: white; font-weight: 700; font-size: 1.75rem; margin-bottom: 0.75rem;">
                    Selamat Datang di<br>RS Kita
                </h2>
                <p style="color: rgba(255,255,255,0.8); font-size: 0.95rem; margin-bottom: 1.5rem; max-width: 480px;">
                    Platform manajemen rumah sakit yang memudahkan pengelolaan data dokter dan pasien secara efisien dan terintegrasi.
                </p>
                <div class="d-flex gap-3 flex-wrap">
                    <a href="{{ route('dokter.index') }}" class="btn" style="background: white; color: #2563eb; font-weight: 600; padding: 0.6rem 1.5rem; border-radius: 10px;">
                        <i class="fas fa-user-md me-2"></i>Data Dokter
                    </a>
                    <a href="{{ route('pasien.index') }}" class="btn" style="background: rgba(255,255,255,0.15); color: white; font-weight: 600; padding: 0.6rem 1.5rem; border-radius: 10px; border: 1.5px solid rgba(255,255,255,0.3);">
                        <i class="fas fa-procedures me-2"></i>Data Pasien
                    </a>
                </div>
            </div>
            <div class="col-md-4 d-none d-md-flex justify-content-end">
                <div style="font-size: 8rem; opacity: 0.15; line-height: 1;">
                    <i class="fas fa-hospital-alt"></i>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Quick Access Cards -->
<div class="row g-4 mb-4">
    <!-- Dokter Card -->
    <div class="col-md-6">
        <div class="card h-100" style="border-radius: 16px; overflow: hidden;">
            <div style="height: 6px; background: linear-gradient(90deg, #2563eb, #0ea5e9);"></div>
            <div class="card-body p-4">
                <div class="d-flex align-items-start gap-3 mb-3">
                    <div style="width: 52px; height: 52px; border-radius: 14px; background: linear-gradient(135deg, #dbeafe, #bfdbfe); display: flex; align-items: center; justify-content: center; font-size: 1.4rem; color: #2563eb; flex-shrink: 0;">
                        <i class="fas fa-user-md"></i>
                    </div>
                    <div>
                        <h4 style="font-weight: 700; color: #1e293b; margin-bottom: 4px;">Manajemen Dokter</h4>
                        <p style="color: #94a3b8; font-size: 0.85rem; margin: 0;">Kelola data dokter & spesialis</p>
                    </div>
                </div>

                <div style="background: #f8fafc; border-radius: 12px; padding: 1rem; margin-bottom: 1.25rem;">
                    <div class="row g-2 text-center">
                        <div class="col-6">
                            <div style="font-size: 0.7rem; color: #94a3b8; text-transform: uppercase; letter-spacing: 0.5px; margin-bottom: 4px;">Fitur</div>
                            <div style="font-size: 0.8rem; color: #475569; font-weight: 500;">Tambah &bull; Edit &bull; Hapus</div>
                        </div>
                        <div class="col-6">
                            <div style="font-size: 0.7rem; color: #94a3b8; text-transform: uppercase; letter-spacing: 0.5px; margin-bottom: 4px;">Relasi</div>
                            <div style="font-size: 0.8rem; color: #475569; font-weight: 500;">Lihat Pasien per Dokter</div>
                        </div>
                    </div>
                </div>

                <div class="d-flex gap-2">
                    <a href="{{ route('dokter.index') }}" class="btn btn-primary flex-fill">
                        <i class="fas fa-list me-2"></i>Lihat Semua
                    </a>
                    <a href="{{ route('dokter.create') }}" class="btn btn-secondary">
                        <i class="fas fa-plus"></i>
                    </a>
                </div>
            </div>
        </div>
    </div>

    <!-- Pasien Card -->
    <div class="col-md-6">
        <div class="card h-100" style="border-radius: 16px; overflow: hidden;">
            <div style="height: 6px; background: linear-gradient(90deg, #10b981, #059669);"></div>
            <div class="card-body p-4">
                <div class="d-flex align-items-start gap-3 mb-3">
                    <div style="width: 52px; height: 52px; border-radius: 14px; background: linear-gradient(135deg, #d1fae5, #a7f3d0); display: flex; align-items: center; justify-content: center; font-size: 1.4rem; color: #10b981; flex-shrink: 0;">
                        <i class="fas fa-procedures"></i>
                    </div>
                    <div>
                        <h4 style="font-weight: 700; color: #1e293b; margin-bottom: 4px;">Manajemen Pasien</h4>
                        <p style="color: #94a3b8; font-size: 0.85rem; margin: 0;">Kelola data pasien & penanganan</p>
                    </div>
                </div>

                <div style="background: #f8fafc; border-radius: 12px; padding: 1rem; margin-bottom: 1.25rem;">
                    <div class="row g-2 text-center">
                        <div class="col-6">
                            <div style="font-size: 0.7rem; color: #94a3b8; text-transform: uppercase; letter-spacing: 0.5px; margin-bottom: 4px;">Fitur</div>
                            <div style="font-size: 0.8rem; color: #475569; font-weight: 500;">Tambah &bull; Edit &bull; Hapus</div>
                        </div>
                        <div class="col-6">
                            <div style="font-size: 0.7rem; color: #94a3b8; text-transform: uppercase; letter-spacing: 0.5px; margin-bottom: 4px;">Relasi</div>
                            <div style="font-size: 0.8rem; color: #475569; font-weight: 500;">Assign ke Dokter</div>
                        </div>
                    </div>
                </div>

                <div class="d-flex gap-2">
                    <a href="{{ route('pasien.index') }}" class="btn btn-success flex-fill">
                        <i class="fas fa-list me-2"></i>Lihat Semua
                    </a>
                    <a href="{{ route('pasien.create') }}" class="btn btn-secondary">
                        <i class="fas fa-plus"></i>
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Info Row -->
<div class="row g-4">
    <div class="col-md-4">
        <div class="card" style="border-radius: 16px;">
            <div class="card-body p-4 text-center">
                <div style="width: 56px; height: 56px; border-radius: 16px; background: linear-gradient(135deg, #ede9fe, #ddd6fe); display: flex; align-items: center; justify-content: center; font-size: 1.5rem; color: #7c3aed; margin: 0 auto 1rem;">
                    <i class="fas fa-shield-alt"></i>
                </div>
                <h6 style="font-weight: 700; color: #1e293b; margin-bottom: 0.5rem;">Data Aman</h6>
                <p style="color: #94a3b8; font-size: 0.8rem; margin: 0;">Semua data tersimpan dengan aman di database</p>
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="card" style="border-radius: 16px;">
            <div class="card-body p-4 text-center">
                <div style="width: 56px; height: 56px; border-radius: 16px; background: linear-gradient(135deg, #fef3c7, #fde68a); display: flex; align-items: center; justify-content: center; font-size: 1.5rem; color: #d97706; margin: 0 auto 1rem;">
                    <i class="fas fa-bolt"></i>
                </div>
                <h6 style="font-weight: 700; color: #1e293b; margin-bottom: 0.5rem;">Cepat & Efisien</h6>
                <p style="color: #94a3b8; font-size: 0.8rem; margin: 0;">Akses dan kelola data dengan cepat dan mudah</p>
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="card" style="border-radius: 16px;">
            <div class="card-body p-4 text-center">
                <div style="width: 56px; height: 56px; border-radius: 16px; background: linear-gradient(135deg, #cffafe, #a5f3fc); display: flex; align-items: center; justify-content: center; font-size: 1.5rem; color: #0891b2; margin: 0 auto 1rem;">
                    <i class="fas fa-link"></i>
                </div>
                <h6 style="font-weight: 700; color: #1e293b; margin-bottom: 0.5rem;">Terintegrasi</h6>
                <p style="color: #94a3b8; font-size: 0.8rem; margin: 0;">Data dokter dan pasien saling terhubung</p>
            </div>
        </div>
    </div>
</div>

@endsection
