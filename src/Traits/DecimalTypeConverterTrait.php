<?php

namespace Yaskuriyamuri\Php_mytools\Traits;

/**
 * Trait DecimalTypeConverterTrait
 *
 * Trait ini menyediakan metode konversi untuk tipe data desimal.
 *
 * @package Yaskuriyamuri\Php_mytools\Traits
 */
trait DecimalTypeConverterTrait
{
    /**
     * Mengonversi tipe data DECIMAL dari SQL Server ke tipe data MySQL.
     *
     * @param string $type Tipe data DECIMAL SQL Server.
     * @param int|null $length Panjang untuk tipe data desimal (opsional).
     * @param int|null $precision Presisi untuk tipe data desimal (opsional).
     * @return string Tipe data MySQL yang sesuai.
     */
    protected static function convertDecimalFromSqlServer($type, $length = null, $precision = null)
    {
        if ($length !== null && $precision !== null) {
            return "DECIMAL($length, $precision)";
        }
        return 'DECIMAL';
    }

    /**
     * Mengonversi tipe data DECIMAL dari MySQL ke tipe data SQLite3.
     *
     * @param string $type Tipe data DECIMAL MySQL.
     * @param int|null $length Panjang untuk tipe data desimal (opsional).
     * @param int|null $precision Presisi untuk tipe data desimal (opsional).
     * @return string Tipe data SQLite3 yang sesuai.
     */
    protected static function convertDecimalFromMySQL($type, $length = null, $precision = null)
    {
        if ($length !== null && $precision !== null) {
            return "NUMERIC($length, $precision)";
        }
        return 'NUMERIC';
    }

    /**
     * Mengonversi tipe data DECIMAL dari SQLite3 ke tipe data SQL Server.
     *
     * @param string $type Tipe data DECIMAL SQLite3.
     * @param int|null $length Panjang untuk tipe data desimal (opsional).
     * @param int|null $precision Presisi untuk tipe data desimal (opsional).
     * @return string Tipe data SQL Server yang sesuai.
     */
    protected static function convertDecimalToSqlServer($type, $length = null, $precision = null)
    {
        if ($length !== null && $precision !== null) {
            return "DECIMAL($length, $precision)";
        }
        return 'DECIMAL';
    }

    /**
     * Mengonversi tipe data DECIMAL dari SQLite3 ke tipe data MySQL.
     *
     * @param string $type Tipe data DECIMAL SQLite3.
     * @param int|null $length Panjang untuk tipe data desimal (opsional).
     * @param int|null $precision Presisi untuk tipe data desimal (opsional).
     * @return string Tipe data MySQL yang sesuai.
     */
    protected static function convertDecimalToMySQL($type, $length = null, $precision = null)
    {
        if ($length !== null && $precision !== null) {
            return "DECIMAL($length, $precision)";
        }
        return 'DECIMAL';
    }
}
