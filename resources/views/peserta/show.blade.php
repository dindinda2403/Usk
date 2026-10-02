<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail Peserta Sertifikasi</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="p-4 bg-light">
    <div class="container my-4" style="max-width: 600px;">
        <div class="card shadow-sm border-0">
            <div class="card-header bg-primary text-white py-3">
                <h5 class="card-title mb-0">Detail Peserta Sertifikasi</h5>
            </div>
            <div class="card-body p-4">
                <table class="table table-borderless mb-0">
                    <tr>
                        <th style="width: 35%;">Nama Peserta</th>
                        <td>: {{ $peserta->nm_peserta }}</td>
                    </tr>
                    <tr>
                        <th>Skema</th>
                        <td>: {{ $peserta->skema ? $peserta->skema->nm_skema : '-' }}</td>
                    </tr>
                    <tr>
                        <th>Jenis Kelamin</th>
                        <td>: {{ $peserta->jk == 'L' ? 'Laki-Laki' : 'Perempuan' }}</td>
                    </tr>
                    <tr>
                        <th>No. HP</th>
                        <td>: {{ $peserta->no_hp }}</td>
                    </tr>
                    <tr>
                        <th>Alamat</th>
                        <td>: {{ $peserta->alamat }}</td>
                    </tr>
                </table>

                <div class="mt-4 pt-3 border-top">
                    <a href="{{ route('pesertas.index') }}" class="btn btn-secondary">Kembali</a>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
