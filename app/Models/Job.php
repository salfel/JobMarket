<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
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

    public function searchableAs(): string
    {
        return 'jobs_index';
    }
}
