<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class MultiPay extends Model
{
    use SoftDeletes;
    use HasFactory;
    public $primaryKey  = 'multi_pay_id';
    protected $keyType = 'string';


    protected $fillable = ['payrollManager_id','employee_id','attendance_id','status'];
}
