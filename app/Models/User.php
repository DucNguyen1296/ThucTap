<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    public function posts()
    {
        return $this->hasMany(Post::class);
    }

    public function upload_files()
    {
        return $this->hasMany(UploadFile::class);
    }

    public function avatars()
    {
        return $this->hasOne(Avatar::class);
    }

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    public function replies()
    {
        return $this->hasMany(Reply::class);
    }

    public function likes_post()
    {
        return $this->hasMany(LikePost::class);
    }

    public function messengers()
    {
        return $this->hasMany(Messenger::class);
    }

    // public function friends()
    // {
    //     return $this->hasMany(Friend::class);
    // }

    public function friendsTo()
    {
        return $this->hasMany(Friend::class, 'user_id');
    }

    public function friendsFrom()
    {
        return $this->hasMany(Friend::class, 'friend_id');
    }

    public function friendsPost()
    {
        return $this->hasManyThrough(Post::class, Friend::class, 'friend_id', 'user_id', 'id', 'user_id');
    }

    // public function friends()
    // {
    //     return $this->friendsFrom->merge($this->friendsTo);
    // }

    public $timestamps = false;
    protected $dates = [
        'created_at',
        'updated_at',
        'last_active'
    ];
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */

    protected $table = 'users';

    protected $fillable = [
        'name',
        'email',
        'password',
        'date',
        'location',
        'title',
        'role',
        'last_active',
        'status'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
}
