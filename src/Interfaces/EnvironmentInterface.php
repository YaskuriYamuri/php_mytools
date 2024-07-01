<?php

namespace Yaskuriyamuri\Php_mytools\Interfaces;

interface EnvironmentInterface
{
  use  \Yaskuriyamuri\Php_mytools\Traits\EnvironmentTrait;
  function _getEnv();

  /**
   * @param string $name
   * @param string $prefix
   * @param integer $prefixRepeated
   * @param string|null $suffix
   * @param integer $suffixRepeated
   * 
   * @return string|false
   */  static function GetEnvironment($name = "SYSENV", $prefix = "REDIRECT_", $prefixRepeated = 3, $suffix = null, $suffixRepeated = 0);
  /**
   * @return string
   */
  static function GetName();
  /**
   * @return string
   */
  static function GetPrefix();
  /**
   * @return int
   */
  static function GetPrefixRepeated();
  /**
   * @return string
   */
  static function GetSuffix();
  /**
   * @return int
   */
  static function GetSuffixRepeated();

  /**
   * Set name of environment
   *
   * @param string $value
   * @return self
   */ static function SetName($value);
  /**
   * Set name of prefix environment
   *
   * @param string $value
   * @return self
   */ static function SetPrefix($value);
  /**
   * Set name of prefix string repeated environment
   *
   * @param int $value
   * @return self
   */   static function SetPrefixRepeated($value);
  /**
   * Set name of suffix environment
   *
   * @param string $value
   * @return self
   */   static function SetSuffix($value);
  /**
   * Set name of suffix string repeated environment
   *
   * @param int $value
   * @return self
   */   static function SetSuffixRepeated($value);
}
