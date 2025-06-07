<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable implements MustVerifyEmail
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    // protected $fillable = [
    //     'name',
    //     'email',
    //     'password',
    // ];
    protected $guarded = [];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    // public function followers() {
    //     return $this->hasMany(Follower::class, 'follower_id');
    // }

    public function following(){
        return $this->belongsToMany(User::class, 'followers', 'follower_id', 'follow_id');
    }

    public function follows(){
        return $this->belongsToMany(User::class, 'followers', 'follow_id', 'follower_id');
    }

    // public function follows() {
    //     return $this->belongsToMany(User::class, 'followers', 'follower_id', 'follow_id');
    // }

    public function reviews() {
        return $this->hasMany(Review::class, 'user_id');
    }

    public function posts() {
        return $this->hasMany(Post::class, 'user_id');
    }

    public function comments() {
        return $this->hasMany(Comment::class, 'user_id');
    }

    public function loves() {
        return $this->hasMany(Love::class, 'user_id');
    }

    public function categories() {
        return $this->hasMany(Category::class, 'user_id');
    }

    public function requests() {
        return $this->hasMany(Request::class, 'user_id');
    }

    public function my_request() {
        return $this->hasMany(Request::class, 'artisan_id');
    }

    public function conversations() {
        return $this->belongsToMany(Conversation::class, 'conversation_user');
    }

    public function messages(){
        return $this->hasMany(Message::class, 'sender_id');
    }
}
