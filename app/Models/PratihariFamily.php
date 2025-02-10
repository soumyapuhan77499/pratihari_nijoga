<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PratihariFamily extends Model
{
    use HasFactory;

    protected $table = 'pratihari__family_details';

    protected $fillable = [
        'pratihari_id',
        'father_name',
         'father_photo',
         'mother_name',
         'mother_photo',
         'maritial_status',
         'spouse_name',
         'spouse_photo',

    ];
}
