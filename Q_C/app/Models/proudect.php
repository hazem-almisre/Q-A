<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Queue\Console\FlushFailedCommand;

class proudect extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'proudects';
    protected $fillable = ['id', 'name', 'price', 'info', 'is_buy'];
    protected $dates = ['deleted_at'];
}
