<?php

namespace App\Models;

use App\Models\Post;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Comment extends Model
{
    use HasFactory;

    protected $table = 'comments';

    protected $fillable = ['pos_id', 'user_id', 'parent_id', 'description'];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }


    public function post()
    {
        return $this->belongsTo(Post::class, 'pos_id');
    }

    public function re()
    {
        return $this->hasMany(Comment::class, 'parent_id');
    }
}
