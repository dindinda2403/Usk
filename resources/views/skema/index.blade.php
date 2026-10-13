<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Skema Sertifikasi</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="p-4 bg-light">
    <div class="container bg-white p-4 rounded shadow-sm">
        <div class="d-flex justify-content-between align-items-center mb-3">
            <h3>Data Skema Sertifikasi</h3>
            <div>
                <a href="{{ route('dashboard') }}" class="btn btn-secondary btn-sm">Kembali ke Dashboard</a>

                {{-- Tombol Tambah Skema HANYA untuk Admin --}}
                @if(auth()->user()->role === 'admin')
                    <a href="{{ route('skemas.create') }}" class="btn btn-primary btn-sm">+ Tambah Skema</a>
                @endif
            </div>
        </div>

        @if(session('success'))
            <div class="alert alert-success py-2">{{ session('success') }}</div>
        @endif

        <table class="table table-bordered table-striped align-middle">
            <thead class="table-dark">
                <tr>
                    <th>No</th>
                    <th>Kode Skema</th>
                    <th>Nama Skema</th>
                    <th>Jenis</th>
                    <th>Jumlah Unit</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse($skemas as $key => $s)
                    <tr>
                        <td>{{ $key + 1 }}</td>
                        <td>{{ $s->kd_skema }}</td>
                        <td>{{ $s->nm_skema }}</td>
                        <td>{{ $s->jenis }}</td>
                        <td>{{ $s->jumlah_unit }}</td>
                        <td>
                            {{-- Tombol Detail bisa dilihat Admin & Peserta --}}
                            <a href="{{ route('skemas.show', $s->id) }}" class="btn btn-info btn-sm text-white">Detail</a>

                            {{-- Tombol Edit & Hapus HANYA untuk Admin --}}
                            @if(auth()->user()->role === 'admin')
                                <a href="{{ route('skemas.edit', $s->id) }}" class="btn btn-warning btn-sm">Edit</a>
                                <form action="{{ route('skemas.destroy', $s->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Yakin ingin menghapus?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm">Hapus</button>
                                </form>
                            @endif
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="6" class="text-center">Belum ada data skema.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</body>
</html>
