<?php

namespace Yaskuriyamuri\Php_mytools\Interfaces;

interface EnvirontmentInterface
{
    use  \Yaskuriyamuri\Php_mytools\Traits\EnvirontmentTrait;
    function _getEnv();
    static function GetEnvironment();
}
