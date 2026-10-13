<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Detail Data Peserta</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="p-4">
    <div class="container" style="max-width: 600px;">
        <div class="card shadow-sm">
            <div class="card-header bg-info text-white">
                <h5 class="mb-0">Detail Data Peserta Sertifikasi</h5>
            </div>
            <div class="card-body">
                <table class="table table-borderless">
                    <tr>
                        <th width="35%">Nama Peserta</th>
                        <td>: {{ $peserta->nm_peserta }}</td>
                    </tr>
                    <tr>
                        <th>Akun User Login</th>
                        <td>: {{ $peserta->user->name ?? '-' }} ({{ $peserta->user->email ?? '-' }})</td>
                    </tr>
                    <tr>
                        <th>Skema Sertifikasi</th>
                        <td>: {{ $peserta->skema->nm_skema ?? '-' }}</td>
                    </tr>
                    <tr>
                        <th>Jenis Kelamin</th>
                        <td>: {{ $peserta->jk === 'L' ? 'Laki-laki' : 'Perempuan' }}</td>
                    </tr>
                    <tr>
                        <th>Nomor HP</th>
                        <td>: {{ $peserta->no_hp }}</td>
                    </tr>
                    <tr>
                        <th>Alamat</th>
                        <td>: {{ $peserta->alamat }}</td>
                    </tr>
                </table>
                <div class="d-flex justify-content-between mt-3">
                    <a href="{{ route('pesertas.index') }}" class="btn btn-secondary">Kembali</a>
                    <a href="{{ route('pesertas.edit', $peserta->id) }}" class="btn btn-warning">Edit Data</a>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
