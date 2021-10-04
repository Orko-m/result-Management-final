<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    use HasFactory;
    protected $table = 'employees';
    protected $fillable = [
        'email',
        'first_name',
        'last_name',
        // 'password',
        'dob',
        'present_address',
        'parmanent_address',
        'employee_img'
    ];
    public function attendances()
    {
        return $this->hasMany(Attendance::class,'employee_id','id');
    }


   
    public function presents()
    {
        $date=date('Y-m');
        return $this->hasMany(Attendance::class,'employee_id','id')->where('status','present')->where('dateYM',$date);
    }

    public function absents()
    {
        $date=date('Y-m');
        return $this->hasMany(Attendance::class,'employee_id','id')->where('status','absent')->where('dateYM',$date);
    }
    public function leave()
    {
        $date=date('Y-m');
        return $this->hasMany(Attendance::class,'employee_id','id')->where('status','leave')->where('dateYM',$date);
    }
    public function offday()
    {
        $date=date('Y-m');
        return $this->hasMany(Attendance::class,'employee_id','id')->where('status','offday')->where('dateYM',$date);
    }

   
}
