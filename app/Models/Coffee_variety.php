<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Coffee_variety extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'coffee_variety',
        'credits',
    ];

    public function coffee_counts(): HasMany
    {
        return $this->hasMany(CoffeeCount::class, 'coffee_variety');
    }
}
