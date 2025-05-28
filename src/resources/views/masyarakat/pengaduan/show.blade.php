@extends('layouts.app')

@section('content')
<div class="container">
    <h2 class="mb-4">Detail Pengaduan</h2>
    <div class="card mb-3">
        <div class="card-body">
            <h5 class="card-title">Tanggal: {{ $pengaduan->tgl_pengaduan }}</h5>
            <p class="card-text">{{ $pengaduan->isi_laporan }}</p>
            <p>Status: 
                @if($pengaduan->status=='0')
                    <span class="badge bg-secondary">Belum diproses</span>
                @elseif($pengaduan->status=='proses')
                    <span class="badge bg-warning text-dark">Proses</span>
                @else
                    <span class="badge bg-success">Selesai</span>
                @endif
            </p>
            @if($pengaduan->foto)
                <img src="{{ asset('storage/'.$pengaduan->foto) }}" alt="foto" class="img-fluid mb-2" style="max-width:300px">
            @endif
        </div>
    </div>
    <h5>Tanggapan</h5>
    @forelse($pengaduan->tanggapan as $t)
        <div class="card mb-2">
            <div class="card-body">
                <div class="mb-1 text-muted">{{ $t->tgl_tanggapan }}</div>
                <div>{{ $t->tanggapan }}</div>
                <div class="mt-1"><span class="badge bg-info">Petugas: {{ $t->petugas->nama_petugas ?? '-' }}</span></div>
            </div>
        </div>
    @empty
        <div class="alert alert-warning">Belum ada tanggapan.</div>
    @endforelse
    <a href="{{ route('pengaduan.index') }}" class="btn btn-secondary mt-3">Kembali</a>
</div>
@endsection
