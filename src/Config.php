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
     * @param int $seconds
     * 
     * @return bool
     */
    static function TimeLimit($seconds)
    {
        return set_time_limit($seconds);
    }
}
