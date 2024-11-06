<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use App\Scopes\ActiveScope; // add  ActiveScope 

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    // create  ActiveScope  
 /*    protected static function boot()
    {
        parent::boot();
  
        static::addGlobalScope(new ActiveScope);
    }
*/
     public function getNameAttribute($value)
    {
        return strtoupper($value);
    }

    public function getFullNameAttribute()
    {
        return "{$this->name} {$this->email}";
    }

     protected static function booted()
    { 
        static::created(function ($t) {
            \Log::info('rammmmmadsadasd'.$t);
        });

          static::updated(function ($ts) {
            // dd($ts->id);
            \Log::info('update-- '.  \Carbon\Carbon::now()->format('y-m-d-h-i-s'));
        });
    }

   
}
