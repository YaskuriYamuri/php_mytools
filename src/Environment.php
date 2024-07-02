<?php

namespace Yaskuriyamuri\Php_mytools;

class Environment implements Interfaces\EnvironmentInterface
{ use Traits\EnvironmentTrait;
    function __construct($name = 'SYSENV',  $prefix = 'REDIRECT_',  $prefixRepeated = 3,  $suffix = null,  $suffixRepeated = 0)
    {
        $this
            ->setNameEnvironment($name)
            ->setPrefixEnvironment($prefix)
            ->setPrefixRepeatedEnvironment($prefixRepeated)
            ->setSuffixEnvironment($suffix)
            ->setSuffixRepeatedEnvironment($suffixRepeated);
    } 
    static function GetEnvironment($name = 'SYSENV',  $prefix = 'REDIRECT_',  $prefixRepeated = 3,  $suffix = null,  $suffixRepeated = 0)
    {
        $self = new self($name,$prefix,$prefixRepeated,$suffix,$suffixRepeated);
        return $self;
    }
    function getNameEnvironment()
    {
        return strval($this->_envName);
    }
    function setNameEnvironment($value = 'SYSENV')
    {
        $this->_envName = strval($value);
        return $this;
    }
    function getPrefixEnvironment()
    {
        return strval($this->_envPrefix);
    }
    function setPrefixEnvironment($value = 'REDIRECT_')
    {
        $this->_envPrefix = strval($value);
        return $this;
    }
    function getPrefixRepeatedEnvironment()
    {
        return intval($this->_envPrefixR);
    }
    function setPrefixRepeatedEnvironment($value = 3)
    {
        $this->_envPrefixR=intval($value);
        return $this;
    }
    function getSuffixEnvironment()
    {return strval($this->_envSuffix );
    }
    function setSuffixEnvironment($value = null)
    {
        $this->_envSuffix = strval($value);
        return $this;
    }
    function getSuffixRepeatedEnvironment()
    {
        return intval($this->_envSuffixR);
    }
    function setSuffixRepeatedEnvironment($value = 0)
    {
        $this->_envSuffixR = intval($value); 
        return $this;
    }
     function __toString(){
        $found = false;
        for ($i = 0; $i <= $this->_envPrefixR; $i++) {
            for ($j = 0; $j <= $this->_envSuffixR; $j++) {
                $found = \getenv(\str_repeat($this->_envPrefix, $i) . $this->_envName . \str_repeat($this->_envSuffix, $i));
                if ($found != false) break;
            }
            if ($found != false) break;
        }
        return strval($found);
     }
}
