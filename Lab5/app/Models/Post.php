<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class Post extends Model
{
    protected $fillable = ['title', 'description', 'image', 'user_id'];
    use HasFactory;

    function user(){
        return $this->belongsTo(User::class);
    }
}
