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
        
            <div class="col-md-6 mb-3">
                <div class="card p-3 border-primary">
                    <h5>Kelola Skema Sertifikasi</h5>
                    <p class="text-muted">Kelola data skema, jenis, dan unit sertifikasi.</p>
                    <a href="{{ route('skemas.index') }}" class="btn btn-primary">Buka Modul Skema</a>
                </div>
            </div>
            <div class="col-md-6 mb-3">
                <div class="card p-3 border-success">
                    <h5>Kelola Data Peserta</h5>
                    <p class="text-muted">Kelola data pendaftaran peserta sertifikasi.</p>
                    <a href="{{ route('pesertas.index') }}" class="btn btn-success">Buka Modul Peserta</a>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
