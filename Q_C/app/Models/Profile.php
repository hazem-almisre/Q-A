<?php

namespace App\Models;

use App\Models\Tags;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Profile extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'profiles';

    protected $fillable = ['title', 'slug', 'content', 'photo', 'user_id'];

    protected $dates = ['deleted_at'];

    /**
     * Get the user that owns the Profile
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function tag()
    {
        return $this->belongsToMany(Tags::class, 'mid', 'profile_id', 'tag_id');
    }
}
