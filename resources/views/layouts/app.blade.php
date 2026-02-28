<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title', 'Sistem Manajemen Rumah Sakit')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <style>
        :root {
            --primary: #2563eb;
            --primary-dark: #1d4ed8;
            --primary-light: #dbeafe;
            --secondary: #0ea5e9;
            --success: #10b981;
            --warning: #f59e0b;
            --danger: #ef4444;
            --info: #06b6d4;
            --dark: #1e293b;
            --sidebar-width: 260px;
            --navbar-height: 64px;
        }

        * { box-sizing: border-box; }

        body {
            font-family: 'Inter', sans-serif;
            background-color: #f1f5f9;
            color: #334155;
            min-height: 100vh;
            display: flex;
            flex-direction: column;
        }

        /* ===== NAVBAR ===== */
        .top-navbar {
            background: linear-gradient(135deg, #1e3a8a 0%, #2563eb 50%, #0ea5e9 100%);
            height: var(--navbar-height);
            position: fixed;
            top: 0;
            left: 0;
            right: 0;
            z-index: 1030;
            box-shadow: 0 2px 20px rgba(37, 99, 235, 0.3);
            display: flex;
            align-items: center;
            padding: 0 1.5rem;
        }

        .navbar-brand-custom {
            display: flex;
            align-items: center;
            gap: 12px;
            text-decoration: none;
            color: white;
        }

        .navbar-brand-icon {
            width: 40px;
            height: 40px;
            background: rgba(255,255,255,0.2);
            border-radius: 10px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.2rem;
            backdrop-filter: blur(10px);
        }

        .navbar-brand-text {
            font-weight: 700;
            font-size: 1.1rem;
            line-height: 1.2;
        }

        .navbar-brand-text small {
            display: block;
            font-size: 0.7rem;
            font-weight: 400;
            opacity: 0.8;
        }

        .navbar-toggler-custom {
            background: rgba(255,255,255,0.15);
            border: none;
            color: white;
            padding: 8px 12px;
            border-radius: 8px;
            cursor: pointer;
            margin-left: auto;
            display: none;
        }

        /* ===== SIDEBAR ===== */
        .sidebar {
            position: fixed;
            top: var(--navbar-height);
            left: 0;
            width: var(--sidebar-width);
            height: calc(100vh - var(--navbar-height));
            background: white;
            box-shadow: 2px 0 20px rgba(0,0,0,0.06);
            overflow-y: auto;
            z-index: 1020;
            transition: transform 0.3s ease;
        }

        .sidebar-section {
            padding: 1.5rem 1rem 0.5rem;
        }

        .sidebar-section-title {
            font-size: 0.65rem;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: 1.5px;
            color: #94a3b8;
            padding: 0 0.75rem;
            margin-bottom: 0.5rem;
        }

        .sidebar-nav-item {
            display: flex;
            align-items: center;
            gap: 12px;
            padding: 0.65rem 0.75rem;
            border-radius: 10px;
            text-decoration: none;
            color: #64748b;
            font-size: 0.875rem;
            font-weight: 500;
            transition: all 0.2s ease;
            margin-bottom: 2px;
        }

        .sidebar-nav-item:hover {
            background: var(--primary-light);
            color: var(--primary);
        }

        .sidebar-nav-item.active {
            background: linear-gradient(135deg, var(--primary), var(--secondary));
            color: white;
            box-shadow: 0 4px 12px rgba(37, 99, 235, 0.3);
        }

        .sidebar-nav-item .nav-icon {
            width: 32px;
            height: 32px;
            border-radius: 8px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 0.85rem;
            background: rgba(0,0,0,0.05);
            flex-shrink: 0;
        }

        .sidebar-nav-item.active .nav-icon {
            background: rgba(255,255,255,0.2);
        }

        .sidebar-divider {
            height: 1px;
            background: #f1f5f9;
            margin: 0.75rem 1rem;
        }

        /* ===== MAIN CONTENT ===== */
        .main-wrapper {
            margin-top: var(--navbar-height);
            margin-left: var(--sidebar-width);
            min-height: calc(100vh - var(--navbar-height));
            display: flex;
            flex-direction: column;
            transition: margin-left 0.3s ease;
        }

        .main-content {
            flex: 1;
            padding: 2rem;
        }

        /* ===== PAGE HEADER ===== */
        .page-header {
            display: flex;
            align-items: center;
            justify-content: space-between;
            margin-bottom: 1.75rem;
            flex-wrap: wrap;
            gap: 1rem;
        }

        .page-title {
            font-size: 1.5rem;
            font-weight: 700;
            color: var(--dark);
            margin: 0;
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .page-title-icon {
            width: 42px;
            height: 42px;
            border-radius: 12px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.1rem;
            background: linear-gradient(135deg, var(--primary), var(--secondary));
            color: white;
            box-shadow: 0 4px 12px rgba(37, 99, 235, 0.3);
        }

        /* ===== CARDS ===== */
        .card {
            border: none;
            border-radius: 16px;
            box-shadow: 0 1px 3px rgba(0,0,0,0.05), 0 4px 16px rgba(0,0,0,0.04);
            transition: box-shadow 0.2s ease;
        }

        .card:hover {
            box-shadow: 0 4px 6px rgba(0,0,0,0.07), 0 10px 30px rgba(0,0,0,0.08);
        }

        .card-header-custom {
            background: linear-gradient(135deg, #f8fafc, #f1f5f9);
            border-bottom: 1px solid #e2e8f0;
            padding: 1.25rem 1.5rem;
            border-radius: 16px 16px 0 0 !important;
            display: flex;
            align-items: center;
            justify-content: space-between;
        }

        .card-header-title {
            font-weight: 600;
            font-size: 1rem;
            color: var(--dark);
            margin: 0;
        }

        /* ===== TABLES ===== */
        .table-modern {
            border-collapse: separate;
            border-spacing: 0;
        }

        .table-modern thead th {
            background: #f8fafc;
            color: #64748b;
            font-size: 0.75rem;
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: 0.8px;
            padding: 0.875rem 1rem;
            border-bottom: 2px solid #e2e8f0;
            border-top: none;
            white-space: nowrap;
        }

        .table-modern tbody tr {
            transition: background 0.15s ease;
        }

        .table-modern tbody tr:hover {
            background: #f8fafc;
        }

        .table-modern tbody td {
            padding: 0.875rem 1rem;
            border-bottom: 1px solid #f1f5f9;
            vertical-align: middle;
            font-size: 0.875rem;
        }

        .table-modern tbody tr:last-child td {
            border-bottom: none;
        }

        /* ===== BUTTONS ===== */
        .btn {
            border-radius: 8px;
            font-weight: 500;
            font-size: 0.875rem;
            padding: 0.5rem 1rem;
            transition: all 0.2s ease;
            border: none;
        }

        .btn-primary {
            background: linear-gradient(135deg, var(--primary), var(--secondary));
            box-shadow: 0 4px 12px rgba(37, 99, 235, 0.3);
        }

        .btn-primary:hover {
            background: linear-gradient(135deg, var(--primary-dark), var(--primary));
            box-shadow: 0 6px 16px rgba(37, 99, 235, 0.4);
            transform: translateY(-1px);
        }

        .btn-success {
            background: linear-gradient(135deg, #10b981, #059669);
            box-shadow: 0 4px 12px rgba(16, 185, 129, 0.3);
        }

        .btn-success:hover {
            background: linear-gradient(135deg, #059669, #047857);
            box-shadow: 0 6px 16px rgba(16, 185, 129, 0.4);
            transform: translateY(-1px);
        }

        .btn-warning {
            background: linear-gradient(135deg, #f59e0b, #d97706);
            color: white;
            box-shadow: 0 4px 12px rgba(245, 158, 11, 0.3);
        }

        .btn-warning:hover {
            background: linear-gradient(135deg, #d97706, #b45309);
            color: white;
            box-shadow: 0 6px 16px rgba(245, 158, 11, 0.4);
            transform: translateY(-1px);
        }

        .btn-danger {
            background: linear-gradient(135deg, #ef4444, #dc2626);
            box-shadow: 0 4px 12px rgba(239, 68, 68, 0.3);
        }

        .btn-danger:hover {
            background: linear-gradient(135deg, #dc2626, #b91c1c);
            box-shadow: 0 6px 16px rgba(239, 68, 68, 0.4);
            transform: translateY(-1px);
        }

        .btn-secondary {
            background: #f1f5f9;
            color: #64748b;
            box-shadow: none;
        }

        .btn-secondary:hover {
            background: #e2e8f0;
            color: #475569;
            transform: translateY(-1px);
        }

        .btn-info {
            background: linear-gradient(135deg, #06b6d4, #0891b2);
            color: white;
            box-shadow: 0 4px 12px rgba(6, 182, 212, 0.3);
        }

        .btn-info:hover {
            background: linear-gradient(135deg, #0891b2, #0e7490);
            color: white;
            box-shadow: 0 6px 16px rgba(6, 182, 212, 0.4);
            transform: translateY(-1px);
        }

        .btn-sm {
            padding: 0.35rem 0.65rem;
            font-size: 0.8rem;
            border-radius: 6px;
        }

        /* ===== BADGES ===== */
        .badge {
            border-radius: 6px;
            font-weight: 500;
            font-size: 0.75rem;
            padding: 0.35em 0.65em;
        }

        /* ===== FORMS ===== */
        .form-control, .form-select {
            border: 1.5px solid #e2e8f0;
            border-radius: 10px;
            padding: 0.625rem 0.875rem;
            font-size: 0.875rem;
            transition: all 0.2s ease;
            background: #fafafa;
        }

        .form-control:focus, .form-select:focus {
            border-color: var(--primary);
            box-shadow: 0 0 0 3px rgba(37, 99, 235, 0.1);
            background: white;
        }

        .form-label {
            font-weight: 600;
            font-size: 0.8rem;
            color: #475569;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            margin-bottom: 0.4rem;
        }

        /* ===== ALERTS ===== */
        .alert {
            border: none;
            border-radius: 12px;
            padding: 1rem 1.25rem;
            font-size: 0.875rem;
            font-weight: 500;
        }

        .alert-success {
            background: #d1fae5;
            color: #065f46;
        }

        .alert-danger {
            background: #fee2e2;
            color: #991b1b;
        }

        /* ===== AVATAR ===== */
        .avatar {
            width: 38px;
            height: 38px;
            border-radius: 10px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: 700;
            font-size: 0.875rem;
            flex-shrink: 0;
        }

        .avatar-blue {
            background: linear-gradient(135deg, #dbeafe, #bfdbfe);
            color: var(--primary);
        }

        .avatar-green {
            background: linear-gradient(135deg, #d1fae5, #a7f3d0);
            color: #065f46;
        }

        /* ===== FOOTER ===== */
        .footer {
            background: white;
            border-top: 1px solid #e2e8f0;
            padding: 1rem 2rem;
            color: #94a3b8;
            font-size: 0.8rem;
            text-align: center;
        }

        /* ===== EMPTY STATE ===== */
        .empty-state {
            text-align: center;
            padding: 3rem 1rem;
        }

        .empty-state-icon {
            width: 80px;
            height: 80px;
            border-radius: 20px;
            background: #f1f5f9;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 2rem;
            color: #94a3b8;
            margin: 0 auto 1rem;
        }

        /* ===== DETAIL INFO ===== */
        .detail-item {
            display: flex;
            padding: 0.875rem 0;
            border-bottom: 1px solid #f1f5f9;
            align-items: flex-start;
            gap: 1rem;
        }

        .detail-item:last-child {
            border-bottom: none;
        }

        .detail-label {
            font-size: 0.75rem;
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            color: #94a3b8;
            min-width: 140px;
            padding-top: 2px;
        }

        .detail-value {
            font-size: 0.9rem;
            color: var(--dark);
            font-weight: 500;
        }

        /* ===== RESPONSIVE ===== */
        @media (max-width: 768px) {
            .sidebar {
                transform: translateX(-100%);
            }

            .sidebar.show {
                transform: translateX(0);
            }

            .main-wrapper {
                margin-left: 0;
            }

            .navbar-toggler-custom {
                display: flex;
                align-items: center;
                gap: 6px;
            }

            .main-content {
                padding: 1.25rem;
            }
        }

        /* ===== SCROLLBAR ===== */
        .sidebar::-webkit-scrollbar {
            width: 4px;
        }

        .sidebar::-webkit-scrollbar-track {
            background: transparent;
        }

        .sidebar::-webkit-scrollbar-thumb {
            background: #e2e8f0;
            border-radius: 4px;
        }

        /* ===== STAT CARD ===== */
        .stat-card {
            border-radius: 16px;
            padding: 1.5rem;
            color: white;
            position: relative;
            overflow: hidden;
        }

        .stat-card::before {
            content: '';
            position: absolute;
            top: -20px;
            right: -20px;
            width: 100px;
            height: 100px;
            border-radius: 50%;
            background: rgba(255,255,255,0.1);
        }

        .stat-card::after {
            content: '';
            position: absolute;
            bottom: -30px;
            right: 20px;
            width: 80px;
            height: 80px;
            border-radius: 50%;
            background: rgba(255,255,255,0.07);
        }

        .stat-card-blue {
            background: linear-gradient(135deg, #2563eb, #0ea5e9);
            box-shadow: 0 8px 24px rgba(37, 99, 235, 0.35);
        }

        .stat-card-green {
            background: linear-gradient(135deg, #10b981, #059669);
            box-shadow: 0 8px 24px rgba(16, 185, 129, 0.35);
        }

        .stat-card-purple {
            background: linear-gradient(135deg, #8b5cf6, #7c3aed);
            box-shadow: 0 8px 24px rgba(139, 92, 246, 0.35);
        }

        .stat-card-orange {
            background: linear-gradient(135deg, #f59e0b, #d97706);
            box-shadow: 0 8px 24px rgba(245, 158, 11, 0.35);
        }

        /* ===== BREADCRUMB ===== */
        .breadcrumb-custom {
            font-size: 0.8rem;
            color: #94a3b8;
            margin-bottom: 0.25rem;
        }

        .breadcrumb-custom a {
            color: #94a3b8;
            text-decoration: none;
        }

        .breadcrumb-custom a:hover {
            color: var(--primary);
        }

        /* ===== TOOLTIP BUTTONS ===== */
        .action-btn-group {
            display: flex;
            gap: 4px;
            align-items: center;
        }

        /* ===== OVERLAY ===== */
        .sidebar-overlay {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: rgba(0,0,0,0.4);
            z-index: 1015;
        }

        .sidebar-overlay.show {
            display: block;
        }
    </style>
    @yield('styles')
</head>
<body>

    <!-- TOP NAVBAR -->
    <nav class="top-navbar">
        <a class="navbar-brand-custom" href="{{ route('home') }}">
            <div class="navbar-brand-icon">
                <i class="fas fa-hospital-alt"></i>
            </div>
            <div class="navbar-brand-text">
                RS Kita
                <small>Sistem Manajemen Rumah Sakit</small>
            </div>
        </a>

        <div class="ms-auto d-flex align-items-center gap-3">
            <div class="d-none d-md-flex align-items-center gap-2 text-white" style="opacity:0.8; font-size:0.8rem;">
                <i class="fas fa-clock"></i>
                <span id="current-time"></span>
            </div>
            <button class="navbar-toggler-custom" id="sidebarToggle">
                <i class="fas fa-bars"></i>
            </button>
        </div>
    </nav>

    <!-- SIDEBAR OVERLAY (mobile) -->
    <div class="sidebar-overlay" id="sidebarOverlay"></div>

    <!-- SIDEBAR -->
    <aside class="sidebar" id="sidebar">
        <div class="sidebar-section">
            <div class="sidebar-section-title">Menu Utama</div>
            <a href="{{ route('home') }}" class="sidebar-nav-item {{ request()->routeIs('home') ? 'active' : '' }}">
                <div class="nav-icon">
                    <i class="fas fa-home"></i>
                </div>
                Beranda
            </a>
        </div>

        <div class="sidebar-divider"></div>

        <div class="sidebar-section">
            <div class="sidebar-section-title">Data Master</div>
            <a href="{{ route('dokter.index') }}" class="sidebar-nav-item {{ request()->routeIs('dokter.*') ? 'active' : '' }}">
                <div class="nav-icon">
                    <i class="fas fa-user-md"></i>
                </div>
                Data Dokter
            </a>
            <a href="{{ route('pasien.index') }}" class="sidebar-nav-item {{ request()->routeIs('pasien.*') ? 'active' : '' }}">
                <div class="nav-icon">
                    <i class="fas fa-procedures"></i>
                </div>
                Data Pasien
            </a>
        </div>

    </aside>

    <!-- MAIN WRAPPER -->
    <div class="main-wrapper">
        <main class="main-content">

            @if(session('success'))
                <div class="alert alert-success alert-dismissible fade show mb-4" role="alert">
                    <i class="fas fa-check-circle me-2"></i>{{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                </div>
            @endif

            @if(session('error'))
                <div class="alert alert-danger alert-dismissible fade show mb-4" role="alert">
                    <i class="fas fa-exclamation-circle me-2"></i>{{ session('error') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                </div>
            @endif

            @yield('content')
        </main>

        <footer class="footer">
            <p class="mb-0">&copy; {{ date('Y') }} RS Kita &mdash; Sistem Manajemen Rumah Sakit. All rights reserved.</p>
        </footer>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        // Clock - auto update every second following local device time
        function updateTime() {
            const now = new Date();
            const days = ['Minggu','Senin','Selasa','Rabu','Kamis','Jumat','Sabtu'];
            const months = ['Jan','Feb','Mar','Apr','Mei','Jun','Jul','Agu','Sep','Okt','Nov','Des'];
            const dayName = days[now.getDay()];
            const date = now.getDate();
            const month = months[now.getMonth()];
            const year = now.getFullYear();
            const hours = String(now.getHours()).padStart(2, '0');
            const minutes = String(now.getMinutes()).padStart(2, '0');
            const seconds = String(now.getSeconds()).padStart(2, '0');
            document.getElementById('current-time').textContent =
                dayName + ', ' + date + ' ' + month + ' ' + year + ' ' + hours + ':' + minutes + ':' + seconds;
        }
        updateTime();
        setInterval(updateTime, 1000);

        // Sidebar toggle (mobile)
        const sidebarToggle = document.getElementById('sidebarToggle');
        const sidebar = document.getElementById('sidebar');
        const overlay = document.getElementById('sidebarOverlay');

        sidebarToggle.addEventListener('click', () => {
            sidebar.classList.toggle('show');
            overlay.classList.toggle('show');
        });

        overlay.addEventListener('click', () => {
            sidebar.classList.remove('show');
            overlay.classList.remove('show');
        });
    </script>
    @yield('scripts')
</body>
</html>
