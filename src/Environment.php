<?php

namespace Yaskuriyamuri\Php_mytools;

class Environment  
{
    /** @var self */ private static $env;
    use Traits\EnvironmentTrait;
    static function GetEnvironment($name = "SYSENV", $prefix = "REDIRECT_", $prefixRepeated = 3, $suffix = null, $suffixRepeated = 0)
    {
        self::$env->_env_init($name, $prefix, $prefixRepeated, $suffix, $suffixRepeated);
        return self::$env->_getEnv();
    }
    static function GetName()
    {
        if (is_null(self::$env)) self::$env->_env_init();
        return self::$env->_getProp(YY_ENV_PROP_NAME);
    }
    static function GetPrefix()
    {
        if (is_null(self::$env)) self::$env->_env_init();
        return self::$env->_getProp(YY_ENV_PROP_PREFIX);
    }
    static function GetPrefixRepeated()
    {
        if (is_null(self::$env)) self::$env->_env_init();
        return self::$env->_getProp(YY_ENV_PROP_PREFIXREPEATED);
    }
    static function GetSuffix()
    {
        if (is_null(self::$env)) self::$env->_env_init();
        return self::$env->_getProp(YY_ENV_PROP_SUFFIX);
    }
    static function GetSuffixRepeated()
    {
        if (is_null(self::$env)) self::$env->_env_init();
        return self::$env->_getProp(YY_ENV_PROP_SUFFIXREPEATED);
    }

    static function SetName($value)
    {
        if (is_null(self::$env)) self::$env->_env_init();
        self::$env->_setProp(YY_ENV_PROP_NAME, $value);
        return self::$env;
    }
    static function SetPrefix($value)
    {
        if (is_null(self::$env)) self::$env->_env_init();
        self::$env->_setProp(YY_ENV_PROP_PREFIX, $value);
        return self::$env;
    }
    static function SetPrefixRepeated($value)
    {
        if (is_null(self::$env)) self::$env->_env_init();
        self::$env->_setProp(YY_ENV_PROP_PREFIXREPEATED, $value);
        return self::$env;
    }
    static function SetSuffix($value)
    {
        if (is_null(self::$env)) self::$env->_env_init();
        self::$env->_setProp(YY_ENV_PROP_SUFFIX, $value);
        return self::$env;
    }
    static function SetSuffixRepeated($value)
    {
        if (is_null(self::$env)) self::$env->_env_init();
        self::$env->_setProp(YY_ENV_PROP_SUFFIXREPEATED, $value);
        return self::$env;
    }
}
