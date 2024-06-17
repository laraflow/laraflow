<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

/**
 * @method static Builder filter(array $filters = [])
 */
class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /*
    |--------------------------------------------------------------------------
    | GLOBAL VARIABLES
    |--------------------------------------------------------------------------
    */

    protected $table = 'users';

    protected $primaryKey = 'id';

    protected $fillable = [
        "name",
        "email",
        "password"
    ];

    protected $appends = [];

    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed'
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    /*
    |--------------------------------------------------------------------------
    | FUNCTIONS
    |--------------------------------------------------------------------------
    */

    /*
    |--------------------------------------------------------------------------
    | RELATIONS
    |--------------------------------------------------------------------------
    */

    /*
    |--------------------------------------------------------------------------
    | SCOPES
    |--------------------------------------------------------------------------
    */

    public function scopeFilter(Builder $query, array $filters = []): Builder
    {
        return $query->when(!empty($filters['search']), function ($query) use ($filters) {
            if (is_int($filters['search'])) {
                $query->where($this->getKey(), $filters['search']);
            } else {
                $pattern = strtolower("%{$filters['search']}%");
                $query->where('name', 'like', $pattern)
                    ->OrWhere('email', 'like', $pattern);
            }
        });
    }

    /*
    |--------------------------------------------------------------------------
    | ACCESSORS
    |--------------------------------------------------------------------------
    */

    /*
    |--------------------------------------------------------------------------
    | MUTATORS
    |--------------------------------------------------------------------------
    */
}
