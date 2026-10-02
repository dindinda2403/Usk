<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Skema Sertifikasi</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="p-4 bg-light">
    <div class="container bg-white p-4 rounded shadow-sm" style="max-width: 600px;">
        <h4 class="mb-3">Edit Skema Sertifikasi</h4>

        @if($errors->any())
            <div class="alert alert-danger">
                <ul class="mb-0">
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('skemas.update', $skema->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label class="form-label">Kode Skema</label>
                <input type="text" name="kd_skema" class="form-control" value="{{ old('kd_skema', $skema->kd_skema) }}" required>
            </div>

            <div class="mb-3">
                <label class="form-label">Nama Skema</label>
                <input type="text" name="nm_skema" class="form-control" value="{{ old('nm_skema', $skema->nm_skema) }}" required>
            </div>

            <div class="mb-3">
                <label class="form-label">Jenis Skema</label>
                <select name="jenis" class="form-select" required>
                    <option value="">-- Pilih Jenis --</option>
                    <option value="KKNI" {{ old('jenis', $skema->jenis) == 'KKNI' ? 'selected' : '' }}>KKNI</option>
                    <option value="Okupasi" {{ old('jenis', $skema->jenis) == 'Okupasi' ? 'selected' : '' }}>Okupasi</option>
                    <option value="Klaster" {{ old('jenis', $skema->jenis) == 'Klaster' ? 'selected' : '' }}>Klaster</option>
                </select>
            </div>

            <div class="mb-3">
                <label class="form-label">Jumlah Unit</label>
                <input type="number" name="jumlah_unit" class="form-control" value="{{ old('jumlah_unit', $skema->jumlah_unit) }}" required min="1">
            </div>

            <button type="submit" class="btn btn-primary">Update</button>
            <a href="{{ route('skemas.index') }}" class="btn btn-secondary">Batal</a>
        </form>
    </div>
</body>
</html>
