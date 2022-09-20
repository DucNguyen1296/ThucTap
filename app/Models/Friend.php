<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Friend extends Model
{
    use HasFactory;
    protected $table = 'friends';
    protected $fillable = [
        'id',
        'user_id',
        'friend_id',
        'approved'
    ];

    // public function users()
    // {
    //     return $this->belongsTo(User::class);
    // }

    public function users()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function friends()
    {
        return $this->belongsTo(User::class, 'friend_id');
    }

    public function posts()
    {
        return $this->belongsToMany(Post::class);
    }
}
