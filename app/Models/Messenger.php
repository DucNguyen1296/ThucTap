<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Messenger extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $dates = [
        'created_at',
        'updated_at'
    ];

    protected $table = 'messengers';

    protected $fillable = [
        'user_id',
        'friend_id',
        'messenger',
        'created_at',
        'updated_at'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
