<?php

function env_value(string $key, ?string $default = null): ?string {
    $value = getenv($key);

    if($value === false && array_key_exists($key, $_ENV)) {
        $value = $_ENV[$key];
    }

    if($value === false && array_key_exists($key, $_SERVER)) {
        $value = $_SERVER[$key];
    }

    return $value === false ? $default : $value;
}

/* Configuration of the site */
define('DATABASE_SERVER',   env_value('DATABASE_SERVER', '127.0.0.1'));
define('DATABASE_USERNAME', env_value('DATABASE_USERNAME', 'gas'));
define('DATABASE_PASSWORD', env_value('DATABASE_PASSWORD', 'gas'));
define('DATABASE_NAME',     env_value('DATABASE_NAME', 'gas'));
define('SITE_URL',          rtrim(env_value('SITE_URL', 'http://localhost:8080/'), '/') . '/');
