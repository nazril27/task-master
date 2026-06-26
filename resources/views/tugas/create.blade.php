@extends('layout')

@section('content')
<div class="card shadow-sm mb-5">
    <div class="card-header bg-white">
        <h5 class="m-0">Tambah Tugas Baru</h5>
    </div>
    <div class="card-body">
        <form action="{{ route('tugas.store') }}" method="POST">
            @csrf 
            
            <div class="mb-3">
                <label>Mata Kuliah</label>
                <input type="text" name="mata_kuliah" class="form-control" required>
            </div>
            
            <div class="mb-3">
                <label>Judul Tugas</label>
                <input type="text" name="judul_tugas" class="form-control" required>
            </div>

            <div class="mb-3">
                <label>Deskripsi (Opsional)</label>
                <textarea name="deskripsi" class="form-control" rows="3"></textarea>
            </div>

            <div class="mb-3">
                <label>Deadline</label>
                <input type="date" name="deadline" class="form-control" required>
            </div>

            <button type="submit" class="btn btn-primary">Simpan Tugas</button>
            <a href="{{ route('tugas.index') }}" class="btn btn-secondary">Batal</a>
        </form>
    </div>
</div>
@endsection