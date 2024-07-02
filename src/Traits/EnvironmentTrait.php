<?php

namespace Yaskuriyamuri\Php_mytools\Traits;

/**
 * Traits untuk syntax environment 
 */
trait EnvironmentTrait
{
    /**
     * Membaca dari file .htaccess atau format sejenis
     * @param string $fileLocation
     * @return string|false 
     */ static function ReadEnvironmentFile($fileLocation, $name = null)
    {
        $fileLocation = is_null($fileLocation) ? \realpath(__DIR__ . DIRECTORY_SEPARATOR .    ".htaccess") : $fileLocation;
        $stringSource = \file_get_contents($fileLocation);
        if (!$stringSource) : return false;
        else : return self::ReadEnvironmentString($stringSource, $name);
        endif;
    }
    /**
     * Membaca dari string
     * @param string $stringSource
     * @return string|false 
     */ static function ReadEnvironmentString($stringSource, $name = null)
    {
        $pattern = "@SetEnv (?P<env>[^ ]*) (?P<value>[^ \n]*)@";
        \preg_match($pattern, $stringSource, $matches);
        if (\strtoupper($matches["env"]) == \strtoupper(is_null($name) ? "SYSENV" : $name)) : return  \trim($matches["value"]);
        else : return false;
        endif;
    }

    /**
     * Menulis sebagai format .ht file 
     *
     * @param string $fileLocation
     * @param string $name
     * @param string $value
     * @param string[] $contentBeforeValue 
     * @param string[] $contentAfterValue 
     * @return bool
     */
    static function WriteEnvironmentFile($fileLocation, $name = "SYSENV", $value = "development", $contentBeforeValue = [], $contentAfterValue = [])
    {
        $fp = fopen($fileLocation, "w+");
        if (!$fp) return false;
        $lines = self::CreateEnvironmentString($name, $value, $contentBeforeValue, $contentAfterValue);
        foreach ($lines as $line) fwrite($fp, $line . PHP_EOL);
        fclose($fp);
        return true;
    }
    static function CreateEnvironmentString($name = "SYSENV", $value = "development", $contentBeforeValue = [], $contentAfterValue = [])
    {
        $return = [];
        if (count($contentBeforeValue) == 0) {
            $contentBeforeValue[] = "RewriteEngine on";
            $contentBeforeValue[] = "RewriteCond $1 !^(index\.php|resources|robots\.txt)";
            $contentBeforeValue[] = "RewriteCond %{REQUEST_FILENAME} !-f";
            $contentBeforeValue[] = "RewriteCond %{REQUEST_FILENAME} !-d";
            $contentBeforeValue[] = "RewriteRule ^(.*)$ index.php/$1 [L,QSA]";
        }
        foreach ($contentBeforeValue as $line) $return[] = $line;
        $return[] = "<IfModule mod_env.c>";
        $return[] =  implode(" ", ["\tSetEnv", $name, $value]);
        $return[] =  "</IfModule>";

        foreach ($contentAfterValue as $line)  $return[] = $line;
        return $return;
    }
}
