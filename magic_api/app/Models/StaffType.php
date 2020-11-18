<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StaffType extends Model
{
    use HasFactory;

    protected $fillable = [
        'staff_type_id',
        'staff_description',
    ];
}
