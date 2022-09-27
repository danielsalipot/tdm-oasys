<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Leave extends Model
{
    use HasFactory;
    public $keyType = 'string';

    protected $fillable = ['employee_id','attendance_id','payrollManager_id'];
}
