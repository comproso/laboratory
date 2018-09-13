<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
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
     * Connection to Test Model.
     *
     * @return results
     */
    public function tests()
    {
	    return $this->belongsToMany('Comproso\Framework\Models\Test')->where('type', 'project')->withPivot('page_id')->withPivot('repetitions')->withPivot('finished')->withTimestamps();
    }
}
