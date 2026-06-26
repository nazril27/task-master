<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Task Master</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

<div class="container mt-5">
    <!-- Judul dengan format Standar Kampus -->
    <h2 class="mb-4">Task Master - SANDI NAZRIL</h2>
    
    <div class="card shadow-sm">
        <div class="card-body">
            <a href="{{ route('tugas.create') }}" class="btn btn-primary mb-3">+ Tambah Tugas Baru</a>

            <table class="table table-bordered table-hover">
                <thead class="table-dark">
                    <tr>
                        <th>No</th>
                        <th>Mata Kuliah</th>
                        <th>Judul Tugas</th>
                        <th>Deadline</th>
                        <th>Status</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($semuaTugas as $index => $tugas)
                    <tr>
                        <td>{{ $index + 1 }}</td>
                        <td>{{ $tugas->mata_kuliah }}</td>
                        <td>{{ $tugas->judul_tugas }}</td>
                        <td>{{ \Carbon\Carbon::parse($tugas->deadline)->format('d M Y') }}</td>
                        <td>
                            <span class="badge bg-{{ $tugas->status == 'Selesai' ? 'success' : 'warning' }}">
                                {{ $tugas->status }}
                            </span>
                        </td>
                        <td>
                            <!-- Tombol Edit & Hapus (Akan dikerjakan nanti) -->
                            <button class="btn btn-sm btn-info text-white">Edit</button>
                            <button class="btn btn-sm btn-danger">Hapus</button>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

</body>
</html>