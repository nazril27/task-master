@extends('layout')

@section('content')
<div class="card shadow-sm">
    <div class="card-header bg-white d-flex justify-content-between align-items-center">
        <h5 class="m-0">Daftar Tugas Kuliah</h5>
        <a href="{{ route('tugas.create') }}" class="btn btn-primary">+ Tambah Tugas</a>
    </div>
    <div class="card-body">
        <table class="table table-bordered table-hover">
            <thead class="table-light">
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
                @forelse ($semuaTugas as $index => $tugas)
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
                        <div class="d-flex gap-2">
                            <a href="{{ route('tugas.edit', $tugas->id) }}" class="btn btn-sm btn-info text-white">Edit</a>
                            
                            <form action="{{ route('tugas.destroy', $tugas->id) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus tugas ini?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger">Hapus</button>
                            </form>
                        </div>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="6" class="text-center text-muted">Belum ada tugas yang dicatat.</td>
                </tr>
                @endforelse
            </tbody>
        </table>
        <div class="mt-3">
            {{ $semuaTugas->links('pagination::bootstrap-5') }}
        </div>
    </div>
</div>
@endsection