<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employees extends Model
{
    use HasFactory;

    protected $fillable = ['code', 'name', 'surname', 'birthdate', 'department_id', 'workplace_id'];

    protected $guarded = [];

    public function department(){
        return $this->belongsTo('App\Models\Departments');
    }

    public function workplace(){
        return $this->belongsTo('App\Models\Workplaces');
    }
    protected static function boot()
    {
        parent::boot();

        static::creating(function ($employee) {
            $latestEmployee = static::latest()->first();

            if ($latestEmployee) {
                $currentNumber = intval(substr($latestEmployee->code, -4));
                $newNumber = str_pad($currentNumber + 1, 4, '0', STR_PAD_LEFT);
                $employee->code = 'EMP-' . $newNumber;
            } else {
                $employee->code = 'EMP-0001';
            }
        });
    }
}
