<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;
use Statikbe\GoogleAuthenticate\Traits\HasGoogleAuth;

class User extends Authenticatable
{
    use HasApiTokens;
    use HasFactory;
    use Notifiable;
    use HasRoles;
    use HasGoogleAuth;

    // Can be used to grant certain domains specific roles on register
    /*protected static function boot()
    {
        parent::boot();

        self::created(function(User $model){
            //get user's mail domain
            $emailArray = explode('@', $model->email);
            $emailDomain = $emailArray[1];

            switch ($emailDomain){
                case '':
                    $model->assignRole(\Spatie\Permission\Models\Role::firstOrCreate(['name' => 'admin']));
                //Add any other domain or role to the switch
            }
        });
    }*/

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
}
