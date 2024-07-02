<?php

namespace Yaskuriyamuri\Php_mytools_test;

use PHPUnit\Framework\TestCase; 
use Yaskuriyamuri\Php_mytools\Environment;

final class EnvironmentTest extends TestCase
{
    private $name, $value, $prefix, $prefixRepeated, $suffix, $suffixRepeated;
    public function __construct()
    {
        $this->name = 'SYSENV';
        $this->value = 'development';
        $this->prefix = 'REDIRECT_';
        $this->prefixRepeated = 3;
        $this->suffix = null;
        $this->suffixRepeated = 0;
    }
    final function testReadEnvironmentStringSuccess()
    {
        $actual= Environment::ReadEnvironmentString(implode(PHP_EOL,Environment::CreateEnvironmentString($this->prefix.$this->name, $this->value)),$this->prefix.$this->name);
        $this->assertEquals($this->value, $actual);
    }
    final function testCreateEnvironmentStringSuccess()
    {
        $expected[] = "RewriteEngine on";
        $expected[] = "RewriteCond $1 !^(index\.php|resources|robots\.txt)";
        $expected[] = "RewriteCond %{REQUEST_FILENAME} !-f";
        $expected[] = "RewriteCond %{REQUEST_FILENAME} !-d";
        $expected[] = "RewriteRule ^(.*)$ index.php/$1 [L,QSA]";
        $expected[] = "<IfModule mod_env.c>";
        $expected[] =  "\tSetEnv {$this->name} {$this->value}";
        $expected[] =  "</IfModule>";
        $actual = Environment::CreateEnvironmentString($this->name, $this->value);
        $this->assertEquals($expected, $actual); 
    }
}
