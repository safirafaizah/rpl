<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jadwal extends Model
{
    use HasFactory;
    protected $fillable = [
        'id', 'id_mata_kuliah', 'id_ruangan', 'id_user', 'id_asesor', 'waktu'
    ];
    protected $hidden = ["created_at", "updated_at"];

    public function mata_kuliah()
    {
        return $this->belongsTo(MataKuliah::class, 'id_mata_kuliah');
    }

    public function ruangan()
    {
        return $this->belongsTo(Ruangan::class, 'id_ruangan');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'id_user');
    }
    
    public function asesor()
    {
        return $this->belongsTo(User::class, 'id_asesor');
    }
}
