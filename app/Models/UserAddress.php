<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
class UserAddress extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'type',
        'zip_code',
        'state',
        'city',
        'street',
        'number',
        'complement',
        'neighborhood',
        'is_active',
        'is_primary',
    ];

    protected function casts(): array
    {
        return [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
        'is_admin' => 'boolean',
        'is_active' => 'boolean',
        'last_login_at' => 'datetime',
        ];
    }

    public function posts(): HasMany
{
    return $this->hasMany(Post::class);
}

public function addresses(): HasMany
{
    return $this->hasMany(UserAddress::class);
}

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
