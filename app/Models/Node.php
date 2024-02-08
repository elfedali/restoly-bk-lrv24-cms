<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Spatie\Sluggable\HasSlug;
use Spatie\Sluggable\SlugOptions;

class Node extends Model
{
    use HasFactory;
    use HasSlug;

    public const STATUS_PUBLISHED = 'published';
    public const STATUS_DRAFT = 'draft';
    public const STATUS_PRIVATE = 'private';

    public const TYPE_POST = 'post';
    public const TYPE_PAGE = 'page';


    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'owner_id',
        'title',
        'body',
        'excerpt',
        'slug',
        'status',
        'type',
        'comment_status',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'owner_id' => 'integer',
    ];
    /**
     * Get the options for generating the slug.
     */

    public function getSlugOptions(): SlugOptions
    {
        return SlugOptions::create()
            ->generateSlugsFrom('title')
            ->saveSlugsTo('slug');
    }

    public function owner(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function terms()
    {
        return $this->belongsToMany(Term::class, 'node_terms');
    }
}
