<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Data Peserta Sertifikasi</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="p-4 bg-light">
    <div class="container bg-white p-4 rounded shadow-sm">
        <div class="d-flex justify-content-between align-items-center mb-3">
            <h3>Data Peserta Sertifikasi</h3>
            <div>
                <a href="{{ route('dashboard') }}" class="btn btn-secondary btn-sm">Kembali ke Dashboard</a>
                <a href="{{ route('pesertas.create') }}" class="btn btn-primary btn-sm">+ Tambah Peserta</a>
            </div>
        </div>

        @if(session('success'))
            <div class="alert alert-success py-2">{{ session('success') }}</div>
        @endif

        <!-- Form Pencarian Nama Peserta -->
        <form action="{{ route('pesertas.index') }}" method="GET" class="mb-3">
            <div class="input-group" style="max-width: 400px;">
                <input type="text" name="search" class="form-control" placeholder="Cari nama peserta..." value="{{ $search }}">
                <button class="btn btn-outline-primary" type="submit">Cari</button>
                @if($search)
                    <a href="{{ route('pesertas.index') }}" class="btn btn-outline-secondary">Reset</a>
                @endif
            </div>
        </form>

        <table class="table table-bordered table-striped">
            <thead class="table-dark">
                <tr>
                    <th>No</th>
                    <th>Nama Peserta</th>
                    <th>Skema Sertifikasi</th>
                    <th>Jenis Kelamin</th>
                    <th>No. HP</th>
                    <th>Alamat</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse($pesertas as $key => $p)
                    <tr>
                        <td>{{ $key + 1 }}</td>
                        <td>{{ $p->nm_peserta }}</td>
                        <td>{{ $p->skema ? $p->skema->nm_skema : '-' }}</td>
                        <td>{{ $p->jk == 'L' ? 'Laki-Laki' : 'Perempuan' }}</td>
                        <td>{{ $p->no_hp }}</td>
                        <td>{{ $p->alamat }}</td>
                        <td>
                            <a href="{{ route('pesertas.show', $p->id) }}" class="btn btn-sm">Detail</a>
                            <a href="{{ route('pesertas.edit', $p->id) }}" class="btn btn-warning btn-sm">Edit</a>
                            <form action="{{ route('pesertas.destroy', $p->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Yakin ingin menghapus?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm">Hapus</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="7" class="text-center">Data peserta tidak ditemukan.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</body>
</html>
