<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Petugas extends Model
{
    protected $table = 'petugas';
    protected $primaryKey = 'id_petugas';
    public $incrementing = true;
    protected $keyType = 'int';
    protected $fillable = [
        'nama_petugas', 'username', 'password', 'telp', 'level', 'remember_token', 'created_at', 'updated_at'
    ];
    public $timestamps = true;
}
