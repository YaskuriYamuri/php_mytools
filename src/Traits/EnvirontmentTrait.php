<?php

namespace Yaskuriyamuri\Php_mytools\Traits;

/**
 * Traits untuk syntax environtment
 * 
 * @method void _env_init(string $name,string $prefix = null, int $prefixRepeated=3,string $suffix=null,$suffixRepeated=0)
 * @method string|null _getEnv() 
 */
trait EnvirontmentTrait
{
    public function __construct()
    {
        $this->{self::class . "__prop"} = []; 
    }
    function _env_init($name = "SYSENV", $prefix = "REDIRECT_", $prefixRepeated = 3, $suffix = null, $suffixRepeated = 0){
        $this
        ->_setProp('name', $name)
        ->_setProp('prefix', $prefix)
        ->_setProp('prefixRepeated', $prefixRepeated)
        ->_setProp('suffix', $suffix)
        ->_setProp('suffixRepeated', $suffixRepeated);
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
        for ($i = 0; $i <= $this->_getProp('prefixRepeated'); $i++) {
            for ($j = 0; $j <= $this->_getProp('suffixRepeated'); $j++) {
                $found = \getenv(\str_repeat($this->_getProp('prefix'), $i) . $this->_getProp('name') . \str_repeat($this->_getProp('suffix'), $i));
                if ($found != false) continue;
            }
            if ($found != false) continue;
        }
        return $found;
    }
}
