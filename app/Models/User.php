<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Database\Eloquent\Casts\Attribute;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'username',
        'nickname',
        'email',
        'password',
        'icon_path',
        'location',
        'introduction'
    ];

    protected function icon(): Attribute {
        return Attribute::make(get: function($filename) {
            return $filename ? '/storage/icon_image/' . $filename : '/default_avatar.jpeg';
        });
    }

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

    /**
     * usersとrecipesの関係を定義
     */

    public function recipes() {
        return $this->hasMany(Recipe::class);
    }

    /**
     * usersとcommentsの関係を定義
     */

    public function comments() {
        return $this->hasMany(Comment::class);
    }

    /**
     * usersとlikesの関係を定義
     */

    public function likes() {
        return $this->hasMany(Like::class);
    }

    /**
     * usersとfollowerの関係を定義(ユーザー自身のことをフォローしている人)
     */

    public function followers() {
        return $this->belongsToMany(User::class, 'followers', 'followee_id', 'follower_id')->withTimestamps();
    }

    /**
     * usersとfolloweeの関係を定義(ユーザー自身がフォローしている人)
     */
    public function followees() {
        return $this->belongsToMany(User::class, 'followers', 'follower_id', 'followee_id')->withTimestamps();
    }
}
