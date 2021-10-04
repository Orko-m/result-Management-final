<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Attendance extends Model
{
    use HasFactory;
    protected $fillable = [
        'employee_id',
        'date',
        'dateYM',
        'status'
    ];
   
    public function employee()
    {
        return $this->belongsTo(Employee::class,'employee_id','id');
    }




    public function scopePresent($query)
    {
        return $query->where('status', 'present');
    }
    public function scopeAbsent($query)
    {
        return $query->where('status', 'absent');
    }
    public function scopeLeave($query)
    {
        return $query->where('status', 'leave');
    }
    public function scopeOffDay($query)
    {
        return $query->where('status', 'offday');
    }

}
