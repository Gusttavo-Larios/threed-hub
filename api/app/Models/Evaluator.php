<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Evaluator extends Model
{
    use HasFactory;
    use HasUuids;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'evaluator';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'full_name',
        'email',
        'password'
    ];

    public function administrator(): BelongsTo {
        return $this->belongsTo(Administrator::class);
    }

    public function declinedRequests(): HasMany {
        return $this->hasMany(RequestDeclined::class);
    }

    public function approvedRequests(): HasMany {
        return $this->hasMany(RequestApproved::class);
    }
}
