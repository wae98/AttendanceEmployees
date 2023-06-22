<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Attendances extends Model
{
    use HasFactory;

    protected $fillable = ['date', 'employee_id' , 'status_id'];
     protected $guarded = [];

    public function employee(){
        return $this->belongsTo('App\Models\Employees');
    }
    public function status(){
        return $this->belongsTo('App\Models\Statuses');
    }
}
