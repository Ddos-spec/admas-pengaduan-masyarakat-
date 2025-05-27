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
}
