<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Departments extends Model
{
    use HasFactory;

    protected $fillable= ['code', 'name','description'];

    protected $guarded = [];

    public function employees(){
        return $this->hasMany('App\Models\Employees');
    }
}
