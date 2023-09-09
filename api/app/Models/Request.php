<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Request extends Model
{
    use HasFactory;
    use HasUuids;

    protected $table = 'request';

    protected $fillable = [
        'name',
        'descrpiton',
        'justify',
    ];

    public function client(): BelongsTo {
        return $this->belongsTo(Client::class);
    }

    public function material(): BelongsTo {
        return $this->belongsTo(Material::class);
    }

    public function declinedRequest(): HasOne {
        return $this->hasOne(RequestDeclined::class);
    }

    public function approvedRequest(): HasOne {
        return $this->hasOne(RequestApproved::class);
    }
}
