<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Offboardee extends Model
{
    use SoftDeletes;
    use HasFactory;
    protected $keyType = 'string';

    protected $fillable = ['employee_id'];
}
