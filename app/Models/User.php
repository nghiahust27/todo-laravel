<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Database\Factories\UserFactory;
use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Attributes\Hidden;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Laravel\Sanctum\HasApiTokens;


class User extends Authenticatable
{

    use HasFactory, Notifiable, HasApiTokens;
    protected $fillable = ['name', 'email', 'password', 'google_id', 
    'facebook_id','microsoft_id'];
    protected $hidden = ['password', 'remember_token'];

    public function todos(): HasMany
    {
        return $this->hasMany(Todo::class);
    }
    public function friendships() : HasMany {
        return $this -> hasMany(Friendship::class);
    }
    public function groups():BelongsToMany
    {
        return $this->belongsToMany(Group::class, 'group_members'
        ,'user_id', 'group_id');
    }
    public function friend(): BelongsToMany
    {
        return $this -> belongsToMany(User::class,'
        friendships',
        'friend_id' ,'user_id')
        ->wherePivot('status', 'accepted');
    }
    

    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

}
