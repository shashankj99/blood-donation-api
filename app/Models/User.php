<?php

namespace App\Models;

use Illuminate\Auth\Authenticatable;
use Illuminate\Contracts\Auth\Access\Authorizable as AuthorizableContract;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Database\Eloquent\Model;
use Laravel\Lumen\Auth\Authorizable;

class User extends Model implements AuthenticatableContract, AuthorizableContract
{
    use Authenticatable, Authorizable;

    protected $fillable = ['full_name', 'email_address', "mobile_number", "blood_group", "status"];

    protected $hidden = ['password'];

    public function userMeta(): \Illuminate\Database\Eloquent\Relations\HasOne
    {
        return $this->hasOne(UserMeta::class);
    }
}
