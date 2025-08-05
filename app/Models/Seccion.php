<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;

class Seccion extends Authenticatable
{
    protected $table = 'seccion';

    protected $fillable = ['usuario', 'password'];

    protected $hidden = ['password'];

    public function getAuthPassword()
    {
        return $this->password;
    }
}










