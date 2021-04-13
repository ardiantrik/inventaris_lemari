<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Inventarisdata extends Model
{
    // protected $guarded = ['inventaris_id'];
    protected $fillable = [
        'nip',
        'nama',
        'golongan',
        'kabupaten',
        'tempat_tugas',
        'kode_label',
        'lemari'
    ];
    protected $primaryKey = 'inventaris_id';
    use HasFactory;
}
