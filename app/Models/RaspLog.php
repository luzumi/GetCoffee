<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class RaspLog extends Model
{
    use HasFactory;

    public string $username;
    public string $type;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'username',
        'type'
    ];

    public function user(): HasOne
    {
        return $this->hasOne(User::class);
    }
}
