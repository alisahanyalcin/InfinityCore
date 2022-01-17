<?php

namespace InfinityCore\Core;

use InfinityCore\Application\config\AppConfig;
use InfinityCore\Application\config\DBConfig;

class BaseConfig
{
    public function __construct()
    {
        // Valid PHP Version?
        $minPHPVersion = '8.0.0';
        if (version_compare(PHP_VERSION, $minPHPVersion, '<'))
            die("Your PHP version must be {$minPHPVersion} or higher to run InfinityCore. Current version: " . PHP_VERSION);
        unset($minPHPVersion);

        switch (AppConfig::ENVIRONMENT)
        {
            case 'development':
                error_reporting(-1);
                ini_set('display_errors', 1);
                break;
            case 'testing':
            case 'production':
                ini_set('display_errors', 0);
                error_reporting(E_ALL & ~E_NOTICE & ~E_DEPRECATED & ~E_STRICT & ~E_USER_NOTICE & ~E_USER_DEPRECATED);
                break;
            default:
                header('HTTP/1.1 503 Service Unavailable.', TRUE, 503);
                echo 'The application environment is not set correctly.';
                exit(1); // EXIT_ERROR
        }
    }
}