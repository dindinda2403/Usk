<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistem Sertifikasi LSP</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light vh-100 d-flex flex-column">
    <nav class="navbar navbar-expand-lg navbar-light bg-white shadow-sm px-4 py-3">
       <div class="container-fluid">
           <span class="navbar-brand fw-bold text-primary">Sistem Sertifikasi LSP</span>

           <div class="ms-auto d-flex gap-2">
               @auth
                    <a href="{{ url('/dashboard') }}" class="btn btn-success">Dashboard</a>
               @else
                    <a href="{{ route('login') }}" class="btn btn-outline-primary">Masuk</a>
                    <a href="{{ route('Register') }}" class="btn btn-primary">Daftar</a>
               @endauth
           </div>
       </div>
    </nav>

   <div class="flex-grow-1 d-flex justify-content-center align-items-center">
       <div class="text-center p-5 bg-white rounded shadow-sm" style="max-width: 600px; width: 100%">
            <h1 class="fw-bold mb-3">Selamat Datang di Sistem Sertifikasi</h1>
            <p class="text-muted mb-0">Pengelolaan Data Skema dan Peserta Uji Kompetensi Keahlian</p>
       </div>
   </div>
</body>
</html>
