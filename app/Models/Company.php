<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Company extends Model
{
    use HasFactory, HasUuids;

    protected $fillable = [
        'name',
        'description',
        'logo',
        'website',
        'phone',
        'email',
        'region',
        'location',
    ];

    protected $casts = [
        'id' => 'string',
    ];

    public function owner(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
