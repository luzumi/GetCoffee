<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Rfid_tag extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'tag_uid',
        'role',
        'tag_active',
    ];

    public function user(): HasOne
    {
        return $this->hasOne(User::class, 'tag_id');
    }

    public function coffee_counts(): HasMany
    {
        return $this->hasMany(CoffeeCount::class, 'tag_id');
    }
}
