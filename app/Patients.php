<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Patients extends Model
{
    protected $fillable = ['nama', 'alamat', 'kontak', 'umur'];
}
