<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Tambah Peserta</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="p-4 bg-light">
    <div class="container bg-white p-4 rounded shadow-sm" style="max-width: 600px;">
        <h4 class="mb-3">Tambah Peserta Sertifikasi</h4>

        @if($errors->any())
            <div class="alert alert-danger">
                <ul class="mb-0">
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('pesertas.store') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label class="form-label">Skema Sertifikasi</label>
                <select name="skema_id" class="form-select" required>
                    <option value="">-- Pilih Skema --</option>
                    @foreach($skemas as $s)
                        <option value="{{ $s->id }}" {{ old('skema_id') == $s->id ? 'selected' : '' }}>
                            {{ $s->kd_skema }} - {{ $s->nm_skema }}
                        </option>
                    @endforeach
                </select>
            </div>
            <div class="mb-3">
                <label class="form-label">Nama Peserta</label>
                <input type="text" name="nm_peserta" class="form-control" value="{{ old('nm_peserta') }}" required>
            </div>
            <div class="mb-3">
                <label class="form-label">Jenis Kelamin</label>
                <div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="jk" id="jkL" value="L" {{ old('jk') == 'L' ? 'checked' : '' }} required>
                        <label class="form-check-label" for="jkL">Laki-Laki</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="jk" id="jkP" value="P" {{ old('jk') == 'P' ? 'checked' : '' }}>
                        <label class="form-check-label" for="jkP">Perempuan</label>
                    </div>
                </div>
            </div>
            <div class="mb-3">
                <label class="form-label">No. HP</label>
                <input type="text" name="no_hp" class="form-control" value="{{ old('no_hp') }}" required>
            </div>
            <div class="mb-3">
                <label class="form-label">Alamat</label>
                <textarea name="alamat" class="form-control" rows="3" required>{{ old('alamat') }}</textarea>
            </div>
            <button type="submit" class="btn btn-success">Simpan</button>
            <a href="{{ route('pesertas.index') }}" class="btn btn-secondary">Batal</a>
        </form>
    </div>
</body>
</html>
