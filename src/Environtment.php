<?php

namespace Yaskuriyamuri\Php_mytools;

class Environtment implements Interfaces\EnvirontmentInterface
{
    use Traits\EnvirontmentTrait;
    static function GetEnvironment()
    {
        $self = new self();
        $self->_env_init();
        return $self->_getEnv();
    }
}
