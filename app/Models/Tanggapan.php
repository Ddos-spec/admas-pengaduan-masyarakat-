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
}
