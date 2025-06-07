<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;
    protected $fillable = [
        'title',
        'content',
        'user_id',
    ];

    public function user() {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function comments() {
        return $this->hasMany(Comment::class, 'post_id');
    }

    public function loves() {
        return $this->hasMany(Love::class, 'post_id');
    }

    public function images() {
        return $this->hasMany(PostImage::class, 'post_id');
    }

    public function categories() {
        return $this->hasMany(Category::class, 'post_id');
    }
}
