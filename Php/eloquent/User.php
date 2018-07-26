<?php

namespace App\eloquent;

use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    public $age = 27;

    protected $appends = ['age'];

    public function getAgeAttribute()
    {
        return $this->age;
    }
}