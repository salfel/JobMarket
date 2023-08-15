<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Application extends Model
{
    use HasFactory, HasUuids;

    protected $fillable = [
        'name',
        'residence',
        'email',
        'phone',
        'text',
        'files',
        'company_id',
	    'user_id'
    ];

    public function job(): BelongsTo
    {
        return $this->belongsTo(Job::class);
    }

	public function user(): BelongsTo
	{
		return $this->belongsTo(User::class);
	}
}
