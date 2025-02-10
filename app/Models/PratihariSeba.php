<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PratihariSeba extends Model
{
    use HasFactory;

    protected $table = 'pratihari__seba_details';

    protected $fillable = [
        'pratihari_id',
        'nijoga_id',
        'seba_id',
        'beddha_id',
    ];
    
}
