<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;

class CoffeeCount extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'tag_id',
        'username',
        'coffee_variety',
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function rfid_tag(): BelongsTo
    {
        return $this->belongsTo(Rfid_tag::class);
    }

    public function coffee_variety(): BelongsTo
    {
        return $this->belongsTo(Coffee_variety::class);
    }
}
