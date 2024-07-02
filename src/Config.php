<?php

namespace Yaskuriyamuri\Php_mytools;

/**
 * Debug aplikasi
 * 
 * 
 */
class Config implements Interfaces\ConfigInterface
{
    static function ErrorDisplay($reporting = \E_ALL,  $display = 1,  $startup = 1)
    {
        try {
            ini_set('display_errors', $startup);
            ini_set('display_startup_errors', $display);
            error_reporting($reporting);
            return true;
        } catch (\Exception $e) {
            return false;
        }
    } 
   /**
    * 
    * @param null|int $seconds set to null to get data 
    * 
    * @return int Returns the old value on success set data or get value if param seconds is null, false on failure.
    */
    static function MaxExecutionTime($seconds = null)
    {
        if (is_null($seconds)) {
            return ini_get('max_execution_time');
        } else {
            return ini_set('max_execution_time', $seconds);
        }
    }
}
