@extends('layouts.app')

@section('content')
<div class="container">
    <h2 class="mb-4">Dashboard Masyarakat</h2>
    <div class="row mb-4">
        <div class="col-md-3">
            <div class="card text-white bg-primary mb-3">
                <div class="card-body">
                    <h5 class="card-title">Total Pengaduan</h5>
                    <span class="badge bg-light text-dark fs-5">{{ $jumlah_pengaduan }}</span>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card text-white bg-success mb-3">
                <div class="card-body">
                    <h5 class="card-title">Selesai</h5>
                    <span class="badge bg-light text-dark fs-5">{{ $jumlah_selesai }}</span>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card text-white bg-warning mb-3">
                <div class="card-body">
                    <h5 class="card-title">Proses</h5>
                    <span class="badge bg-light text-dark fs-5">{{ $jumlah_proses }}</span>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card text-white bg-secondary mb-3">
                <div class="card-body">
                    <h5 class="card-title">Belum Diproses</h5>
                    <span class="badge bg-light text-dark fs-5">{{ $jumlah_belum }}</span>
                </div>
            </div>
        </div>
    </div>
    <div class="alert alert-info">Selamat datang, <b>{{ $user->nama }}</b>!</div>
</div>
@endsection
