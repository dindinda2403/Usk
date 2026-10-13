<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Edit Data Peserta</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="p-4">
    <div class="container" style="max-width: 600px;">
        <div class="card shadow-sm">
            <div class="card-header bg-warning text-dark">
                <h5 class="mb-0">Edit Data Peserta</h5>
            </div>
            <div class="card-body">
                <form action="{{ route('pesertas.update', $peserta->id) }}" method="POST">
                    @csrf
                    @method('PUT')

                    <div class="mb-3">
                        <label class="form-label">Nama Lengkap Peserta</label>
                        <input type="text" name="nm_peserta" class="form-control" value="{{ $peserta->nm_peserta }}" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Pilihan Skema Sertifikasi</label>
                        <select name="skema_id" class="form-control" required>
                            @foreach($skemas as $s)
                                <option value="{{ $s->id }}" {{ $peserta->skema_id == $s->id ? 'selected' : '' }}>
                                    {{ $s->nm_skema }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Jenis Kelamin</label>
                        <select name="jk" class="form-control" required>
                            <option value="L" {{ $peserta->jk === 'L' ? 'selected' : '' }}>Laki-laki</option>
                            <option value="P" {{ $peserta->jk === 'P' ? 'selected' : '' }}>Perempuan</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Nomor HP</label>
                        <input type="text" name="no_hp" class="form-control" value="{{ $peserta->no_hp }}" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Alamat</label>
                        <textarea name="alamat" class="form-control" rows="3" required>{{ $peserta->alamat }}</textarea>
                    </div>
                    <div class="d-flex justify-content-between">
                        <button type="submit" class="btn btn-warning">Perbarui Data</button>
                        <a href="{{ route('pesertas.index') }}" class="btn btn-secondary">Batal</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>
</html>
