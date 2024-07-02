<?php

namespace Yaskuriyamuri\Php_mytools\Interfaces;

/**
 * @method static string GetEnvironment(string $name = "SYSENV",string $prefix = "REDIRECT_",int $prefixRepeated = 3,string $suffix = null,int $suffixRepeated = 0)
 * 
 * @method string getNameEnvironment()
 * @method self setNameEnvironment(string $value= "SYSENV")
 * 
 * @method string getPrefixEnvironment()
 * @method self setPrefixEnvironment(string $value = "REDIRECT_")
 * 
 * @method string getPrefixRepeatedEnvironment()
 * @method self setPrefixRepeatedEnvironment(int $value = 3)
 * 
 * @method string getSuffixEnvironment()
 * @method self setSuffixEnvironment(string $value = null)
 * 
 * @method string getSuffixRepeatedEnvironment()
 * @method self setSuffixRepeatedEnvironment(int $value = 0)
 * 
 * @method string __toString()
 * 
 * @property string $_envName
 * @property string $_envPrefix
 * @property int $_envPrefixR
 * @property string $_envSuffix
 * @property int $_envSuffixR
 */
interface EnvironmentInterface
{ 
}
