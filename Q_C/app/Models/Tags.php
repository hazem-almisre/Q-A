<?php

namespace App\Models;

use App\Models\Profile;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;


class Tags extends Model
{
    use HasFactory;

    protected $fillable = ['tag'];

    /**
     * The post the Tags
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function post()
    {
        return $this->belongsToMany(Profile::class, 'mid', 'tag_id', 'profile_id');
    }
}
