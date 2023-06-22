<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Managers extends Model
{
    use HasFactory;

    protected $fillable= ['name','surname', 'phone_number'];

    protected $guarded = [];

    public function workpplaces(){
        return $this->hasMany('App\Models\Workplaces');
    }
}
