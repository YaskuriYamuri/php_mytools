<?php

namespace Yaskuriyamuri\Php_mytools\Traits;
defined("YY_ENV_PROP_NAME") or define("YY_ENV_PROP_NAME","name");
defined("YY_ENV_PROP_PREFIX") or define("YY_ENV_PROP_PREFIX","prefix");
defined("YY_ENV_PROP_PREFIXREPEATED") or define("YY_ENV_PROP_PREFIXREPEATED","prefixRepeated");
defined("YY_ENV_PROP_SUFFIX") or define("YY_ENV_PROP_SUFFIX","suffix");
defined("YY_ENV_PROP_SUFFIXREPEATED") or define("YY_ENV_PROP_SUFFIXREPEATED","suffixRepeated");
/**
 * Traits untuk syntax environtment
 * 
 * @method void _env_init(string $name,string $prefix = null, int $prefixRepeated=3,string $suffix=null,$suffixRepeated=0)
 * @method string|null _getEnv() 
 */
trait EnvironmentTrait
{ 
    public function __construct()
    {
        $this->{self::class . "__prop"} = []; 
    }
    function _env_init($name = "SYSENV", $prefix = "REDIRECT_", $prefixRepeated = 3, $suffix = null, $suffixRepeated = 0){
        $this
        ->_setProp(YY_ENV_PROP_NAME, $name)
        ->_setProp(YY_ENV_PROP_PREFIX, $prefix)
        ->_setProp(YY_ENV_PROP_PREFIXREPEATED, $prefixRepeated)
        ->_setProp(YY_ENV_PROP_SUFFIX, $suffix)
        ->_setProp(YY_ENV_PROP_SUFFIXREPEATED, $suffixRepeated);
    }
    private function _setProp($name, $value)
    {
        $this->{self::class . "__prop"}[$name] = $value;
        return $this;
    }
    private function _getProp($name)
    {
        return $this->{self::class . "__prop"}[$name];
    }
    private function hasProp($name, $nullAble = true)
    {
        $exist = false;
        $exist = isset($this->{self::class . "__prop"}[$name]);
        $nullAble or  $exist = !is_null($this->{self::class . "__prop"}[$name]);
        return $exist;
    }
    protected function _getEnv()
    {
        $found = false;
        for ($i = 0; $i <= $this->_getProp(YY_ENV_PROP_PREFIXREPEATED); $i++) {
            for ($j = 0; $j <= $this->_getProp(YY_ENV_PROP_SUFFIXREPEATED); $j++) {
                $found = \getenv(\str_repeat($this->_getProp(YY_ENV_PROP_PREFIX), $i) . $this->_getProp(YY_ENV_PROP_NAME) . \str_repeat($this->_getProp(YY_ENV_PROP_SUFFIX), $i));
                if ($found != false) continue;
            }
            if ($found != false) continue;
        }
        return $found;
    }
}
