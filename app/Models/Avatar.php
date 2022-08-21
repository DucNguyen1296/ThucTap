<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Avatar extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'avatar_name',
        'avatar_path'
    ];

    public function user()
    {
        $this->belongsTo(User::class);
    }
}
