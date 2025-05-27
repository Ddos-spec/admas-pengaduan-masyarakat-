@extends('layouts.app')

@section('content')
<div class="container">
    <h2 class="mb-4">Daftar Pengaduan Saya</h2>
    <a href="{{ route('pengaduan.create') }}" class="btn btn-primary mb-3">Buat Pengaduan Baru</a>
    <div class="table-responsive">
        <table class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>Tanggal</th>
                    <th>Isi Laporan</th>
                    <th>Status</th>
                    <th>Foto</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse($pengaduan as $item)
                <tr>
                    <td>{{ $item->tgl_pengaduan }}</td>
                    <td>{{ Str::limit($item->isi_laporan, 50) }}</td>
                    <td>
                        @if($item->status=='0')
                            <span class="badge bg-secondary">Belum diproses</span>
                        @elseif($item->status=='proses')
                            <span class="badge bg-warning text-dark">Proses</span>
                        @else
                            <span class="badge bg-success">Selesai</span>
                        @endif
                    </td>
                    <td>
                        @if($item->foto)
                            <img src="{{ asset('storage/'.$item->foto) }}" alt="foto" width="60">
                        @else
                            -
                        @endif
                    </td>
                    <td>
                        <a href="{{ route('pengaduan.show', $item->id_pengaduan) }}" class="btn btn-info btn-sm">Detail</a>
                    </td>
                </tr>
                @empty
                <tr><td colspan="5" class="text-center">Belum ada pengaduan.</td></tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection
