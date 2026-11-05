<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'LaporBanjir BPBD')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>
<body class="bg-light">
    <!-- Navbar warna Biru (bg-primary) -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary mb-4 shadow-sm">
        <div class="container">
            <a class="navbar-brand fw-bold" href="{{ route('lapor.create') }}"><i class="fas fa-water me-2"></i>LaporBanjir BPBD</a>
            <ul class="navbar-nav ms-auto align-items-center">
                @auth
                    <li class="nav-item"><a class="nav-link text-white" href="{{ route('laporan.index') }}"><i class="fas fa-list me-1"></i>Kelola Laporan</a></li>
                    <li class="nav-item"><span class="nav-link text-white-50">Petugas: {{ Auth::user()->name }}</span></li>
                    <li class="nav-item">
                        <form action="{{ route('logout') }}" method="POST" class="d-inline">
                            @csrf
                            <button class="btn btn-outline-light btn-sm ms-2">Logout</button>
                        </form>
                    </li>
                @else
                    <li class="nav-item"><a class="btn btn-light text-primary fw-bold btn-sm" href="{{ route('login') }}"><i class="fas fa-user-shield me-1"></i>Login Petugas</a></li>
                @endauth
            </ul>
        </div>
    </nav>

    <div class="container mb-5">
        @if (session('success'))
            <div class="alert alert-success alert-dismissible fade show shadow-sm" role="alert">
                <i class="fas fa-check-circle me-1"></i>{{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
        @endif

        @yield('content')
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>