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
        $line = \file_get_contents($fileLocation);
        $pattern = "@SetEnv (?P<env>[^ ]*) (?P<value>[^ \n]*)@";
        \preg_match($pattern, $line, $matches);
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
        if(count($contentBeforeValue)==0){ 
            $contentBeforeValue[]="RewriteEngine on";
            $contentBeforeValue[]="RewriteCond $1 !^(index\.php|resources|robots\.txt)";
            $contentBeforeValue[]="RewriteCond %{REQUEST_FILENAME} !-f";
            $contentBeforeValue[]="RewriteCond %{REQUEST_FILENAME} !-d";
            $contentBeforeValue[]="RewriteRule ^(.*)$ index.php/$1 [L,QSA]"; 
        }
        foreach ($contentBeforeValue as $line) fwrite($fp, $line . PHP_EOL);
        fwrite($fp, "<IfModule mod_env.c>".PHP_EOL.implode(" ", ["\tSetEnv", $name, $value]) . PHP_EOL."</IfModule>".PHP_EOL);

        foreach ($contentAfterValue as $line) fwrite($fp, $line . PHP_EOL);
        fclose($fp);
        return true;
    }
}
