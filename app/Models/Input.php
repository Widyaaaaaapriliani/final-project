<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Input extends Model
{
  use HasFactory;

  protected $table = 'respon4';  // Nama tabel

  // Kolom yang dapat diisi
  protected $fillable = [
    'kehadiran',
    'tugas',
    'project',
    'total',
    'huruf',
  ];
}
