<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Records extends Model
{
    protected $fillable = ['patient_id', 'diagnosa', 'terapi', 'tanggal'];
}
