<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Document extends Model
{
    use HasFactory;
    protected $fillable = [
        "title",
        "body",
        "user_id",
        "category_id",
        "slug",
        "created_at",
        "updated_at",
    ];

    protected $casts = [
        "id" => "integer",

    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    // public function comments()
    // {
    //     return $this->hasMany(Comment::class);
    // }
}