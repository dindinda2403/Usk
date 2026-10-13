<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Kelola Data Peserta</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="p-4">
    <div class="container">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h2>Kelola Data Peserta Sertifikasi</h2>
            <a href="{{ route('dashboard') }}" class="btn btn-secondary">Kembali ke Dashboard</a>
        </div>

        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

       <div class="row align-items-center mb-3">
            <div class="col-md-6 mb-2 mb-md-0">
                <!-- Form Pencarian -->
                <form action="{{ route('pesertas.index') }}" method="GET" class="d-flex gap-2">
                    <input type="text" name="search" class="form-control" placeholder="Cari nama peserta..." value="{{ request('search') }}">
                    <button type="submit" class="btn btn-primary">Cari</button>
                    @if(request('search'))
                        <a href="{{ route('pesertas.index') }}" class="btn btn-secondary">Reset</a>
                    @endif
                </form>
            </div>
            <div class="col-md-6 text-md-end">
                @if(auth()->user()->role === 'admin')
                    <a href="{{ route('pesertas.create') }}" class="btn btn-success">+ Tambah Peserta</a>
                @endif
            </div>
        </div>

        <table class="table table-bordered table-striped">
            <thead class="table-dark">
                <tr>
                    <th>No</th>
                    <th>Nama Peserta</th>
                    <th>Skema yang Dipilih</th>
                    <th>Jenis Kelamin</th>
                    <th>No. HP</th>
                    <th>Alamat</th>
                    <th>Aksi</th>
                </tr>
            </thead>
           <tbody>
    @forelse($pesertas as $index => $p)
        <tr>
            <td>{{ $index + 1 }}</td>
            <td>{{ $p->nm_peserta }}</td>
            <td>{{ $p->skema->nm_skema ?? '-' }}</td>
            <td>{{ $p->jk === 'L' ? 'Laki-laki' : 'Perempuan' }}</td>
            <td>{{ $p->no_hp }}</td>
            <td>{{ $p->alamat }}</td>
            <td>
                <!-- Tombol Detail -->
                <a href="{{ route('pesertas.show', $p->id) }}" class="btn btn-info btn-sm text-white">Detail</a>

                <!-- Tombol Edit -->
                <a href="{{ route('pesertas.edit', $p->id) }}" class="btn btn-warning btn-sm">Edit</a>

                <!-- Tombol Hapus (Khusus Admin) -->
                @if(auth()->user()->role === 'admin')
                    <form action="{{ route('pesertas.destroy', $p->id) }}" method="POST" style="display:inline;" onsubmit="return confirm('Yakin ingin menghapus data peserta ini?')">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm">Hapus</button>
                    </form>
                @endif
            </td>
        </tr>
    @empty
        <tr>
            <td colspan="7" class="text-center">Belum ada data peserta.</td>
        </tr>
    @endforelse
</tbody>
