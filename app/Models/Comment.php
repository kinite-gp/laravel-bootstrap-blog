<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\SoftDeletes;

class Comment extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        "user_id",
        "post_id",
        "comment"
    ];


    public function user() : BelongsTo
    {
        return $this->belongsTo(User::class, "user_id");
    }

    public function post() : HasOne
    {
        return $this->hasOne(Post::class, "post_id");
    }
}
