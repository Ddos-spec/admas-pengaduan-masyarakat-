<?php

namespace App\Http\Controllers\Masyarakat;

use App\Http\Controllers\Controller;
use App\Models\Pengaduan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class PengaduanController extends Controller
{
    /**
     * Tampilkan daftar pengaduan milik user
     */
    public function index()
    {
        $pengaduan = Pengaduan::where('nik', Auth::user()->nik)
            ->orderBy('tgl_pengaduan', 'desc')->get();
        return view('masyarakat.pengaduan.index', compact('pengaduan'));
    }

    /**
     * Tampilkan form create
     */
    public function create()
    {
        return view('masyarakat.pengaduan.create');
    }

    /**
     * Simpan pengaduan baru
     */
    public function store(Request $request)
    {
        $request->validate([
            'isi_laporan' => 'required',
            'foto' => 'nullable|image|max:2048',
        ]);
        $data = [
            'tgl_pengaduan' => now(),
            'nik' => Auth::user()->nik,
            'isi_laporan' => $request->isi_laporan,
            'status' => '0',
        ];
        if ($request->hasFile('foto')) {
            $data['foto'] = $request->file('foto')->store('pengaduan', 'public');
        }
        Pengaduan::create($data);
        return redirect()->route('pengaduan.index')->with('success', 'Pengaduan berhasil dikirim!');
    }

    /**
     * Tampilkan detail pengaduan + tanggapan
     */
    public function show($id)
    {
        $pengaduan = Pengaduan::with('tanggapan')->findOrFail($id);
        return view('masyarakat.pengaduan.show', compact('pengaduan'));
    }
}
