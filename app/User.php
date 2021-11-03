<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function getPermissions() {
        return [
            'view-upload-file',
            'store-upload-file',
        ];
    }
    //this is the to define one to many relationship
    //between table users to table assets
    //since each users has own many assets
    public function assignedAssets()
    {
        //current_own_by is FK on table assets
        //id is referring to table users primary key
        return $this->hasMany(Asset::class,'current_owned_by','id');
    }
}
