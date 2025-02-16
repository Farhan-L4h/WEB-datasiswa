<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class siswa extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama',
        'alamat',
        'kelas',
        'nisn',
        'jenis_kelamin',
        'tanggal_lahir',
        'id_kota'
    ];

    public function kota()
    {
        return $this->belongsTo(Kota::class, 'id_kota');
    }
}
