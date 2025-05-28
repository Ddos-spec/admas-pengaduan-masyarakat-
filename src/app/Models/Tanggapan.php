<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tanggapan extends Model
{
    protected $table = 'tanggapan';
    protected $primaryKey = 'id_tanggapan';
    public $incrementing = true;
    protected $keyType = 'int';
    protected $fillable = [
        'id_pengaduan', 'tgl_tanggapan', 'tanggapan', 'id_petugas', 'created_at', 'updated_at'
    ];
    public $timestamps = true;

    /**
     * Relasi: Tanggapan milik satu pengaduan
     */
    public function pengaduan()
    {
        return $this->belongsTo(Pengaduan::class, 'id_pengaduan', 'id_pengaduan');
    }

    /**
     * Relasi: Tanggapan milik satu petugas
     */
    public function petugas()
    {
        return $this->belongsTo(Petugas::class, 'id_petugas', 'id_petugas');
    }
}
