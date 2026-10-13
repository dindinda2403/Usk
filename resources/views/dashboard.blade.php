<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="p-4">
    <div class="container">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h2>Selamat Datang, {{ Auth::user()->name }}!</h2>
            <form action="{{ route('logout') }}" method="POST">
                @csrf
                <button type="submit" class="btn btn-danger">Logout</button>
            </form>
        </div>
        <p>Aplikasi Pengelolaan Data Peserta Sertifikasi</p>

        <div class="row">
            <!-- Modul Skema -->
            <div class="col-md-4 mb-3">
                <div class="card p-3 border-primary h-100">
                    <h5>Kelola Skema Sertifikasi</h5>
                    <p class="text-muted">Kelola data skema, jenis, dan unit sertifikasi.</p>
                    <a href="{{ route('skemas.index') }}" class="btn btn-primary mt-auto">Buka Modul Skema</a>
                </div>
            </div>

            <!-- Modul Peserta -->
            <div class="col-md-4 mb-3">
                <div class="card p-3 border-success h-100">
                    <h5>Kelola Data Peserta</h5>
                    <p class="text-muted">Kelola data pendaftaran peserta sertifikasi.</p>
                    <a href="{{ route('pesertas.index') }}" class="btn btn-success mt-auto">Buka Modul Peserta</a>
                </div>
            </div>

            <!-- Modul Kelola Akun User (Khusus Admin) -->
            @if(Auth::user()->role === 'admin')
            <div class="col-md-4 mb-3">
                <div class="card p-3 border-warning h-100">
                    <h5>Kelola Data Akun User</h5>
                    <p class="text-muted">Kelola akun pendaftaran login untuk Admin dan Peserta.</p>
                    <a href="{{ route('users.index') }}" class="btn btn-warning text-dark fw-bold mt-auto">Buka Modul User</a>
                </div>
            </div>
            @endif
        </div>
    </div>
</body>
</html>
