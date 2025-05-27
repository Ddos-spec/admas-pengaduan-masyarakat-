<?php

namespace App\Http\Controllers\Masyarakat;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Pengaduan;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    /**
     * Tampilkan dashboard masyarakat
     */
    public function index()
    {
        $user = Auth::user();
        $jumlah_pengaduan = Pengaduan::where('nik', $user->nik)->count();
        $jumlah_selesai = Pengaduan::where('nik', $user->nik)->where('status', 'selesai')->count();
        $jumlah_proses = Pengaduan::where('nik', $user->nik)->where('status', 'proses')->count();
        $jumlah_belum = Pengaduan::where('nik', $user->nik)->where('status', '0')->count();
        return view('masyarakat.dashboard', compact('user', 'jumlah_pengaduan', 'jumlah_selesai', 'jumlah_proses', 'jumlah_belum'));
    }
}
