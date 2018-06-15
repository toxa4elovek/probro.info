<?php

namespace App\Entity;

use App\Entity\Post\Post;
use App\Helpers\UserHelper;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Support\Str;

/**
 * App\Entity\User
 *
 * @property int $id
 * @property string $name
 * @property string $email
 * @property string $password
 * @property string|null $remember_token
 * @property \Carbon\Carbon|null $created_at
 * @property \Carbon\Carbon|null $updated_at
 * @property string $status
 * @property string $role
 * @mixin \Eloquent
 */
class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'status', 'verify_token', 'role'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function posts()
    {
        return $this->hasMany(Post::class, 'owner_id', 'id');
    }

    /**
     * @param string $name
     * @param string $email
     * @param string $password
     * @return User
     */
    public static function register(string $name, string $email, string $password): User
    {
        return self::create([
            'name' => $name,
            'email' => $email,
            'password' => bcrypt($password),
            'status' => UserHelper::STATUS_WAIT,
            'verify_token' => Str::random(),
            'role' => UserHelper::ROLE_USER
        ]);
    }

    /**
     * @return bool
     */
    public function verify()
    {
        return $this->update([
            'status' => UserHelper::STATUS_ACTIVE,
            'verify_token' => null
        ]);
    }

    public function isActive(): bool
    {
        return $this->status === UserHelper::STATUS_ACTIVE;
    }

    /**
     * @return bool
     */
    public function isAdmin(): bool
    {
        return $this->role === UserHelper::ROLE_ADMIN;
    }
}
