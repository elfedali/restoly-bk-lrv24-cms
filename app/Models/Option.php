<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Option extends Model
{
    use HasFactory;
    public const AUTOLOAD = 'autoload';
    public const NOT_AUTOLOAD = 'not-autoload';

    public const OPTION_KEY_SITE_TITLE = 'site_title';
    public const OPTION_KEY_SITE_DESCRIPTION = 'site_description';
    public const OPTION_KEY_SITE_EMAIL = 'site_email';
    public const OPTION_KEY_SITE_LOGO = 'site_logo';
    public const OPTION_KEY_SITE_FAVICON = 'site_favicon';
    public const OPTION_KEY_SITE_HEADER_SCRIPT = 'site_header_script';
    public const OPTION_KEY_SITE_FOOTER_SCRIPT = 'site_footer_script';
    public const OPTION_KEY_SITE_ANALYTICS = 'site_analytics';
    public const OPTION_KEY_SITE_MAINTENANCE = 'site_maintenance';
    public const OPTION_KEY_SITE_MAINTENANCE_MESSAGE = 'site_maintenance_message';
    public const OPTION_KEY_SITE_REGISTRATION = 'site_registration';
    public const OPTION_KEY_SITE_TIME = 'site_time';
    public const OPTION_KEY_SITE_DATE = 'site_date';
    public const OPTION_KEY_SITE_TIMEZONE = 'site_timezone';
    public const OPTION_KEY_SITE_LANGUAGE = 'site_language';
    public const OPTION_KEY_SITE_ADMIN_EMAIL = 'site_admin_email';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'option_key',
        'option_value',
        'is_autoload',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'is_autoload' => 'boolean',
    ];
}
