<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Post extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        "title",
        "body",
        "category_id",
        "user_id"
    ];

    public function category()
    {
        return $this->belongsTo(Category::class, "category_id");
    }

    public function comments() : HasMany
    {
        return $this->hasMany(Comment::class);
    }
}
