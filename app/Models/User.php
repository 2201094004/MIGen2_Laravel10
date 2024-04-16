<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Fortify\TwoFactorAuthenticatable;
use Laravel\Jetstream\HasProfilePhoto;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens;
    use HasFactory;
    use HasProfilePhoto;
    use Notifiable;
    use TwoFactorAuthenticatable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
        'two_factor_recovery_codes',
        'two_factor_secret',
    ];

    /**
     * The accessors to append to the model's array form.
     *
     * @var array<int, string>
     */
    protected $appends = [
        'profile_photo_url',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    //use hasfactory; 
    Use SoftDeletes; 
    protected $dates = [ 
        'created_at', 
        'updated_at', 
        'deleted_at', 
        'email_verified_at' 
    ]; 
    
    //one to many 
    public function appointment() { 
    return $this->hasMany('App\Models\Operational\Appointment', 'user_id'); 
    } 

    //one to one 
    public function detail_user() { 
    return $this->hasOne('App\Models\ManagementAccess\Detail_User' , 'user_id'); 
    } 

    //one to many 
    public function role_user() { 
    return $this->hasMany('App\Models\ManagementAccess\RoleUser' , 'user_id'); 
    } 
}
