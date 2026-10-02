<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail Skema Sertifikasi</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="p-4 bg-light">
    <div class="container my-4" style="max-width: 600px;">
        <div class="card shadow-sm border-0">
            <div class="card-header bg-primary text-white py-3">
                <h5 class="card-title mb-0">Detail Skema Sertifikasi</h5>
            </div>
            <div class="card-body p-4">
                <table class="table table-borderless mb-0">
                    <tr>
                        <th style="width: 35%;">Kode Skema</th>
                        <td>: {{ $skema->kd_skema }}</td>
                    </tr>
                    <tr>
                        <th>Nama Skema</th>
                        <td>: {{ $skema->nm_skema }}</td>
                    </tr>
                    <tr>
                        <th>Jenis</th>
                        <td>: {{ $skema->jenis }}</td>
                    </tr>
                    <tr>
                        <th>Jumlah Unit</th>
                        <td>: {{ $skema->jumlah_unit }}</td>
                    </tr>
                </table>

                <div class="mt-4 pt-3 border-top">
                    <a href="{{ route('skemas.index') }}" class="btn btn-secondary">Kembali</a>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
