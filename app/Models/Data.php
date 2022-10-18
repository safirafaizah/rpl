<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Data extends Model
{
    use HasFactory;
    protected $fillable = [
        'id', 'id_jadwal', 'id_status', 'dokumen', 'skor', 'catatan', 'created_at', 'update_at'
    ];

    public function jadwal()
    {
        return $this->belongsTo(Jadwal::class, 'id_jadwal');
    }

    public function status()
    {
        return $this->belongsTo(Status::class, 'id_status');
    }
}
