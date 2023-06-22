<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Workplaces extends Model
{
    use HasFactory;

    protected $fillable= ['name','manager_id'];

    protected $guarded = [];

    public function manager(){
        return $this->belongsTo('App\Models\Managers');
    }

    public function department(){
        return $this->belongsTo('App\Models\Departments');
    }
}
