<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Laravel\Scout\Searchable;

class Job extends Model
{
    use HasFactory, HasUuids, Searchable;

    protected $fillable = [
        'name',
        'description',
        'company_id',
        'employment_type',
        'experience_level',
        'location',
        'region',
    ];

    public function company(): BelongsTo
    {
        return $this->belongsTo(Company::class);
    }

    public function applications(): HasMany
    {
        return $this->hasMany(Application::class, 'company_id');
    }

    public function searchableAs(): string
    {
        return 'jobs_index';
    }

    public function toSearchableArray(): array
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'description' => $this->description,
            'location' => $this->location,
            'experience_level' => $this->experience_level,
            'employment_type' => $this->employment_type,
        ];
    }
}
