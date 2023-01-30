<?php

namespace App\Models;


use Illuminate\Notifications\Notifiable;
use Illuminate\Auth\Authenticatable;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract; 
use Jenssegers\Mongodb\Eloquent\Model;
use Jenssegers\Mongodb\Eloquent\SoftDeletes;

class User extends Model implements 
    AuthenticatableContract
{
    use Notifiable, Authenticatable, SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */

    protected $connection = 'mongodb';
    protected $collection = 'user';
    protected $dates = ['deleted_at'];
    protected $keyType = 'integer';
    // protected $fillable = [
    //     'userEmail', 'userPass',
    // ];

    protected $guarded = [];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    // protected $hidden = [
    //     'userPass',
    // ];
    public function getAuthPassword()
    {
        return $this->userPassword;
    }
    
}
