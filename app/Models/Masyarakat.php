<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as AuthenticatableUser;
use Illuminate\Notifications\Notifiable;

class Masyarakat extends AuthenticatableUser
{
    use Notifiable;

    protected $guard = 'masyarakat'; // Menentukan guard yang digunakan model ini

    protected $table = 'masyarakat';
    protected $primaryKey = 'nik';
    public $incrementing = false;
    protected $keyType = 'string';
    protected $fillable = [
        'nik', 'nama', 'username', 'password', 'telp', // created_at dan updated_at akan dihandle otomatis jika timestamps true
    ];
    public $timestamps = true;
    protected $hidden = ['password', 'remember_token']; // Pastikan remember_token ada di sini

    /** 
     * Get the name of the unique identifier for the user.
     *
     * @return string
     */
    public function getAuthIdentifierName()
    {
        return 'nik'; // Kolom primary key untuk otentikasi
    }

    /**
     * Get the password for the user.
     *
     * @return string
     */
    public function getAuthPassword()
    {
        return $this->password;
    }

    /**
     * Get the column name for the "remember me" token.
     *
     * @return string
     */
    public function getRememberTokenName()
    {
        return 'remember_token'; // Nama kolom untuk remember token
    }

    /**
     * Get the remember token for the user.
     *
     * @return string|null
     */
    public function getRememberToken()
    {
        return $this->{$this->getRememberTokenName()};
    }

    /**
     * Set the remember token for the user.
     *
     * @param  string|null  $value
     * @return void
     */
    public function setRememberToken($value)
    {
        $this->{$this->getRememberTokenName()} = $value;
    }

    /**
     * Relasi: Masyarakat memiliki banyak pengaduan
     */
    public function pengaduan()
    {
        return $this->hasMany(Pengaduan::class, 'nik', 'nik');
    }
}
