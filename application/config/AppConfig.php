<?php

namespace InfinityCore\Application\config;

class AppConfig
{
    /**
     * Base url of the application
     */
    const base_url = 'http://localhost/InfinityCore/';

    /**
     * application environment (development, production, testing)
     */
    const ENVIRONMENT = 'production';

    /**
     * Application app path
     */
    const APPPATH = 'application';

    /**
     * Application app path
     */
    const VIEWPATH = 'views';

    /**
     * Application models path
     */
    const MODELWPATH = 'models';

    /**
     * Application controllers path
     */
    const CONTROLLERPATH = 'controllers';

    /**
     * Application log path
     */
    const LOGPATH = 'logs';

    /**
     * System time zone for all date time functions
     */
    const TIMEZONE = 'Europe/Istanbul';

    /**
     * Default system and application language
     */
    const default_language = 'en';

    /**
     * database error view name
     */
    const dbErrorView = '_db';

    /**
     * Page not found view name
     */
    const pageNotFoundErrorView = '_404';
}