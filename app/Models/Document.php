<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Document extends Model
{
    public const MIME_TYPE_PDF = 'application/pdf';
    public const MIME_TYPE_IMAGE = 'image/*';
    public const MIME_TYPE_TEXT = 'text/*';
    public const MIME_TYPE_AUDIO = 'audio/*';
    public const MIME_TYPE_VIDEO = 'video/*';

    public const UPLOAD_PATH = 'uploads/documents';
    public const UPLOAD_MAX_SIZE = 1024 * 1024 * 10; // 10MB

    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id',
        'name',
        'path',
        'mime_type',
        'size',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'user_id' => 'integer',
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
