<?php

namespace App\Models;

use App\Enums\Role;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasManyThrough;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\HasOneThrough;
use Laravel\Scout\Searchable;
use PDO;

class Company extends Model
{
    use HasFactory, HasUuids, Searchable;

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

    public function jobs(): HasMany
    {
        return $this->hasMany(Job::class);
    }

	public function applications(): HasManyThrough
	{
		return $this->hasManyThrough(Application::class, Job::class)->latest();
	}

	public function admins(): HasMany
	{
		return $this->hasMany(User::class)->where('role', Role::Admin);
	}

	public function owner(): HasOne
	{
		return $this->hasOne(User::class)->where('role', Role::Owner);
	}

	public function searchableAs(): string
	{
		return 'companies_index';
	}

    public function toSearchableArray(): array
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'description' => $this->description,
            'location' => $this->location,
            'region' => $this->region,
        ];
    }
}
