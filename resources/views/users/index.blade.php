<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Kelola Data Akun User</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="p-4">
    <div class="container">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h2>Kelola Data Akun User</h2>
            <a href="{{ route('dashboard') }}" class="btn btn-secondary">Kembali ke Dashboard</a>
        </div>

        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <div class="d-flex justify-content-between align-items-center mb-3">
            <p class="text-muted mb-0">Daftar akun login untuk Administrator dan Peserta.</p>
            <a href="{{ route('users.create') }}" class="btn btn-primary">+ Tambah Akun User</a>
        </div>

        <table class="table table-bordered table-striped">
            <thead class="table-dark">
                <tr>
                    <th>No</th>
                    <th>Nama</th>
                    <th>Email</th>
                    <th>Role</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse($users as $index => $u)
                    <tr>
                        <td>{{ $index + 1 }}</td>
                        <td>{{ $u->name }}</td>
                        <td>{{ $u->email }}</td>
                        <td>
                            @if($u->role === 'admin')
                                <span class="badge bg-danger">Administrator</span>
                            @else
                                <span class="badge bg-success">Peserta</span>
                            @endif
                        </td>
                        <td>
                            <a href="{{ route('users.edit', $u->id) }}" class="btn btn-warning btn-sm">Edit</a>
                            <form action="{{ route('users.destroy', $u->id) }}" method="POST" style="display:inline;" onsubmit="return confirm('Yakin ingin menghapus akun ini?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm">Hapus</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5" class="text-center">Belum ada data user.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</body>
</html>
