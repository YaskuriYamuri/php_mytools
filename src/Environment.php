<?php

namespace Yaskuriyamuri\Php_mytools;

/**
 * Kelas environment
 * @implements Interfaces\EnvironmentInterface
 */
class Environment implements Interfaces\EnvironmentInterface
{ use Traits\EnvironmentTrait;
    /**
     * Inisial kelas baru
     * @param string $name
     * @param string $prefix
     * @param integer $prefixRepeated
     * @param null|string $suffix
     * @param integer $suffixRepeated
     */
    function __construct($name = 'SYSENV',  $prefix = 'REDIRECT_',  $prefixRepeated = 3,  $suffix = null,  $suffixRepeated = 0)
    {
        $this
            ->setNameEnvironment($name)
            ->setPrefixEnvironment($prefix)
            ->setPrefixRepeatedEnvironment($prefixRepeated)
            ->setSuffixEnvironment($suffix)
            ->setSuffixRepeatedEnvironment($suffixRepeated);
    } 
   /**
    * @param string $name
    * @param string $prefix
    * @param integer $prefixRepeated
    * @param string|null $suffix
    * @param integer $suffixRepeated
    * 
    * @return self
    */
    static function GetEnvironment($name = 'SYSENV',  $prefix = 'REDIRECT_',  $prefixRepeated = 3,  $suffix = null,  $suffixRepeated = 0)
    {
        $self = new self($name,$prefix,$prefixRepeated,$suffix,$suffixRepeated);
        return $self;
    }
    /**
     * @return string
     */
    function getNameEnvironment()
    {
        return strval($this->_envName);
    }
    /**
     * Nama variable yang ingin diambil
     * @param string $value
     * 
     * @return self
     */
    function setNameEnvironment($value = 'SYSENV')
    {
        $this->_envName = strval($value);
        return $this;
    }
   /**
    * Mengambil prefix nama variable
    * @return string
    */ function getPrefixEnvironment()
    {
        return strval($this->_envPrefix);
    }
     /**
      * Mengatur prefix nama variable
      * @param string $value
      * 
      * @return self
      */
     function setPrefixEnvironment($value = 'REDIRECT_')
    {
        $this->_envPrefix = strval($value);
        return $this;
    }
    /**
     * Mengambil prefix nama variable
     * @return integer
     */
    function getPrefixRepeatedEnvironment()
    {
        return intval($this->_envPrefixR);
    }
    /**
     * @param integer $value
     * 
     * @return self
     */
    function setPrefixRepeatedEnvironment($value = 3)
    {
        $this->_envPrefixR=intval($value);
        return $this;
    }
    /**
     * Mengambil suffix nama variable
     * @return string
     */
    function getSuffixEnvironment()
    {return strval($this->_envSuffix );
    }
   /**
    * Mengatur suffix nama variable
    * @param string $value
    * @return self
    */ function setSuffixEnvironment($value = null)
    {
        $this->_envSuffix = strval($value);
        return $this;
    }
    /**
     * Mengambil Perulangan suffix nama variable
     *
     * @return integer
     */
    function getSuffixRepeatedEnvironment()
    {
        return intval($this->_envSuffixR);
    }
    /**
     * Mengatur perulangan suffix nama variable
     *
     * @param integer $value
     * @return self
     */
    function setSuffixRepeatedEnvironment($value = 0)
    {
        $this->_envSuffixR = intval($value); 
        return $this;
    }
    /**
     * Konvert kelas ke nilai environment
     *
     * @return string
     */
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
