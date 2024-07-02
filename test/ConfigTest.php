<?php

namespace Yaskuriyamuri\Php_mytools_test;

use PHPUnit\Framework\TestCase;
use Yaskuriyamuri\Php_mytools\Config;

final class ConfigTest extends TestCase
{
    final function testErrorDisplaySuccess()
    {
        $displayActual = 0;
        $startupActual = 0;
        $reportingActual = \E_WARNING;
        Config::ErrorDisplay($reportingActual, $displayActual, $startupActual);
        $displayExpect = \ini_get("display_errors");
        $startupExpect = \ini_get("display_startup_errors");
        $reportingExpect = \error_reporting();
        $this->assertEquals($displayExpect, $displayActual);
        $this->assertEquals($startupExpect, $startupActual);
        $this->assertEquals($reportingExpect, $reportingActual);
    }
    final function testTimeLimit()
    {
        $secondsActual = 12345;
        Config::MaxExecutionTime($secondsActual);
        $secondsExpect = Config::MaxExecutionTime();
        $this->assertNotFalse($secondsExpect);
        $this->assertEquals($secondsExpect, $secondsActual);
    }
}
