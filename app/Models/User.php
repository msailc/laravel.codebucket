<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use HasFactory;

    protected $fillable = [
        'name', 'email', 'password',
        'avatar', 'provider_id', 'provider',
        'access_token'
    ];
   
    //You can also use below statement 
   
    protected $guarded = ['*'];

    public function team()
    {
        return $this->belongsTo(Team::class);
    }

    public function skills()
    {
        return $this->belongsToMany(Skill::class);
    }
}
