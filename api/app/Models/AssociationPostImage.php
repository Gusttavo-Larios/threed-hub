<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class AssociationPostImage extends Model
{
    use HasFactory;
    use HasUuids;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'association_post_image';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    // protected $fillable = ['description'];

    public function post(): BelongsTo
    {
        return $this->belongsTo(Post::class);
    }

    public function postImage(): BelongsTo
    {
        return $this->belongsTo(PostImage::class);
    }
}
