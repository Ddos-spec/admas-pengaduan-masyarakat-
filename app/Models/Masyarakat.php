<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Masyarakat extends Authenticatable
{
    use Notifiable;

    protected $table = 'masyarakat';
    protected $primaryKey = 'nik';
    public $incrementing = false;
    protected $keyType = 'string';
    protected $fillable = [
        'nik', 'nama', 'username', 'password', 'telp', 'created_at', 'updated_at'
    ];
    public $timestamps = true;
    protected $hidden = ['password', 'remember_token'];

    /**
     * Relasi: Masyarakat memiliki banyak pengaduan
     */
    public function pengaduan()
    {
        return $this->hasMany(Pengaduan::class, 'nik', 'nik');
    }
}
