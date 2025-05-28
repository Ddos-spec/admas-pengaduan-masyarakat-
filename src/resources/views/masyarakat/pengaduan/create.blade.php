@extends('layouts.app')

@section('content')
<div class="container">
    <h2 class="mb-4">Buat Pengaduan Baru</h2>
    <form method="POST" action="{{ route('pengaduan.store') }}" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
            <label for="isi_laporan" class="form-label">Isi Laporan</label>
            <textarea class="form-control" id="isi_laporan" name="isi_laporan" rows="4" required>{{ old('isi_laporan') }}</textarea>
            @error('isi_laporan')<div class="text-danger">{{ $message }}</div>@enderror
        </div>
        <div class="mb-3">
            <label for="foto" class="form-label">Foto (opsional, max 2MB)</label>
            <input type="file" class="form-control" id="foto" name="foto" accept="image/*">
            @error('foto')<div class="text-danger">{{ $message }}</div>@enderror
        </div>
        <button type="submit" class="btn btn-success">Kirim Pengaduan</button>
        <a href="{{ route('pengaduan.index') }}" class="btn btn-secondary">Batal</a>
    </form>
</div>
@endsection
