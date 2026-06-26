@extends('layout')

@section('content')
<div class="card shadow-sm mb-5">
    <div class="card-header bg-white">
        <h5 class="m-0">Edit Tugas</h5>
    </div>
    <div class="card-body">
        <form action="{{ route('tugas.update', $tugas->id) }}" method="POST">
            @csrf
            @method('PUT')
            
            <div class="mb-3">
                <label>Mata Kuliah</label>
                <input type="text" name="mata_kuliah" class="form-control" value="{{ $tugas->mata_kuliah }}" required>
            </div>
            
            <div class="mb-3">
                <label>Judul Tugas</label>
                <input type="text" name="judul_tugas" class="form-control" value="{{ $tugas->judul_tugas }}" required>
            </div>

            <div class="mb-3">
                <label>Deskripsi (Opsional)</label>
                <textarea name="deskripsi" class="form-control" rows="3">{{ $tugas->deskripsi }}</textarea>
            </div>

            <div class="mb-3">
                <label>Deadline</label>
                <input type="date" name="deadline" class="form-control" value="{{ $tugas->deadline }}" required>
            </div>

            <div class="mb-3">
                <label>Status Tugas</label>
                <select name="status" class="form-select">
                    <option value="Belum Selesai" {{ $tugas->status == 'Belum Selesai' ? 'selected' : '' }}>Belum Selesai</option>
                    <option value="Selesai" {{ $tugas->status == 'Selesai' ? 'selected' : '' }}>Selesai</option>
                </select>
            </div>

            <button type="submit" class="btn btn-info text-white">Update Tugas</button>
            <a href="{{ route('tugas.index') }}" class="btn btn-secondary">Batal</a>
        </form>
    </div>
</div>
@endsection