<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class UserMeta extends Model
{
    use HasFactory;

    public const META_KEY_AVATAR = 'avatar';
    public const META_KEY_BIO = 'bio';
    public const META_KEY_URL = 'url';
    public const META_KEY_COMPANY = 'company';
    public const META_KEY_LOCATION = 'location';
    public const META_KEY_PHONE = 'phone';
    public const META_KEY_SOCIAL_FACEBOOK = 'social_facebook';
    public const META_KEY_SOCIAL_TWITTER = 'social_twitter';
    public const META_KEY_SOCIAL_LINKEDIN = 'social_linkedin';
    public const META_KEY_SOCIAL_GITHUB = 'social_github';
    public const META_KEY_SOCIAL_STACKOVERFLOW = 'social_stackoverflow';

    public const META_KEY_NOTIFICATIONS = 'notifications';
    public const META_KEY_NOTIFICATIONS_EMAIL = 'notifications_email';
    public const META_KEY_NOTIFICATIONS_SMS = 'notifications_sms';
    public const META_KEY_NOTIFICATIONS_PUSH = 'notifications_push';

    public const META_KEY_SETTINGS = 'settings';
    public const META_KEY_SETTINGS_THEME = 'settings_theme';
    public const META_KEY_SETTINGS_LANGUAGE = 'settings_language';
    public const META_KEY_SETTINGS_TIMEZONE = 'settings_timezone';
    public const META_KEY_SETTINGS_DATE_FORMAT = 'settings_date_format';
    public const META_KEY_SETTINGS_TIME_FORMAT = 'settings_time_format';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id',
        'meta_key',
        'meta_value',
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
