<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pengaduan extends Model
{
    protected $table = 'pengaduan';
    protected $primaryKey = 'id_pengaduan';
    public $incrementing = true;
    protected $keyType = 'int';
    protected $fillable = [
        'tgl_pengaduan', 'nik', 'isi_laporan', 'foto', 'status', 'created_at', 'updated_at'
    ];
    public $timestamps = true;

    /**
     * Relasi: Pengaduan milik satu masyarakat
     */
    public function masyarakat()
    {
        return $this->belongsTo(Masyarakat::class, 'nik', 'nik');
    }

    /**
     * Relasi: Pengaduan memiliki banyak tanggapan
     */
    public function tanggapan()
    {
        return $this->hasMany(Tanggapan::class, 'id_pengaduan', 'id_pengaduan');
    }
}
