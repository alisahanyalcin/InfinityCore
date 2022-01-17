<?php

namespace InfinityCore\Application\config;

class AppConfig
{
    /**
     * application environment (development, production, testing)
     */
    const ENVIRONMENT = 'production';

    /**
     * Application app path
     */
    const APPPATH = 'application';

    /**
     * Application log path
     */
    const LOGPATH = '/application/logs/';

    /**
     * System time zone for all date time functions
     */
    const TIMEZONE = 'Europe/Istanbul';

    /**
     * Default system and application language
     */
    const default_language = 'en';

    /**
     * Base url of the application
     */
    const base_url = 'http://localhost/InfinityCore/';

    /**
     * database error view name
     */
    const dbErrorView = '_db';

    /**
     * Page not found view name
     */
    const pageNotFoundErrorView = '_404';
}