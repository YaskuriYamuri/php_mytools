<?php

namespace Yaskuriyamuri\Php_mytools\Traits;

trait ConfigTrait {
   /**
    * @param string $option
    * 
    * @return bool|string
    */
    static function ini_get($option){
        return \ini_get($option);
    }
   /**
    * @param string $option
    * @param bool|float|int|string|null $value
    * 
    * @return string|false
    */
    static function ini_set($option,$value){
        return \ini_set($option, $value);
    }
   /**
    * @param string $option
    * 
    * @return void
    */
    static function ini_restore($option){
        return \ini_restore($option);
    }

    public static function __callStatic($name, $arguments)
{
    
}
}