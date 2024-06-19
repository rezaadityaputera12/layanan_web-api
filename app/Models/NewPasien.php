<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class NewPasien extends Model
{
    protected $fillable = ['nama', 'alamat', 'telepon'];
}
