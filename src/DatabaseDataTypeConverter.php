<?php

namespace Yaskuriyamuri\Php_mytools;

use Yaskuriyamuri\Php_mytools\Interfaces\DatabaseDataTypeConverterInterface;
use Yaskuriyamuri\Php_mytools\Traits\DecimalTypeConverterTrait;
use Yaskuriyamuri\Php_mytools\Traits\TextTypeConverterTrait;
use Yaskuriyamuri\Php_mytools\Traits\NumericTypeConverterTrait;
use Yaskuriyamuri\Php_mytools\Traits\DateTimeTypeConverterTrait;

/**
 * Class DatabaseDataTypeConverter
 *
 * Kelas ini mengimplementasikan konversi tipe data antara SQL Server, SQLite3, dan MySQL.
 *
 * @package Yaskuriyamuri\Php_mytools
 */
class DatabaseDataTypeConverter implements DatabaseDataTypeConverterInterface
{
    use DecimalTypeConverterTrait;
    use TextTypeConverterTrait;
    use NumericTypeConverterTrait;
    use DateTimeTypeConverterTrait;
    /**
     * Mengonversi tipe data SQL Server ke tipe data MySQL.
     *
     * @param string $type Tipe data SQL Server.
     * @param int|null $length Panjang untuk tipe data teks (opsional).
     * @return string Tipe data MySQL yang sesuai.
     */
    public static function sqlServerToMySQL($type, $length = null)
    {
        $type = strtolower($type);
        switch ($type) {
            case 'int':
                return 'INT';
            case 'nvarchar':
            case 'varchar':
            case 'nchar':
            case 'char':
            case 'ntext':
                return self::convertTextToMySQLFromSqlServer($type, $length);
            case 'bit':
                return 'TINYINT(1)';
            case 'datetime':
                return 'DATETIME';
            case 'decimal':
                return self::convertDecimalFromSqlServer($type, $length);
            case 'float':
                return 'FLOAT';
            case 'uniqueidentifier':
                return 'CHAR(36)';
            default:
                return 'TEXT';
        }
    }

    /**
     * Mengonversi tipe data SQL Server ke tipe data SQLite3.
     *
     * @param string $type Tipe data SQL Server.
     * @param int|null $length Panjang untuk tipe data teks (opsional).
     * @param int|null $precision Presisi untuk tipe data desimal (opsional).
     * @return string Tipe data SQLite3 yang sesuai.
     */
    public static function sqlServerToSQLite3($type, $length = null, $precision = null)
    {
        $type = strtolower($type);
        switch ($type) {
            case 'int':
                return 'INTEGER';
            case 'nvarchar':
            case 'varchar':
            case 'nchar':
            case 'char':
            case 'ntext':
                return self::convertTextToSQLite3FromSqlServer($type, $length);
            case 'bit':
                return 'BOOLEAN';
            case 'datetime':
                return 'DATETIME';
            case 'decimal':
                return self::convertDecimalFromSqlServer($type, $length, $precision);
            case 'float':
                return 'REAL';
            case 'uniqueidentifier':
                return 'TEXT';
            default:
                return 'TEXT';
        }
    }

    /**
     * Mengonversi tipe data MySQL ke tipe data SQLite3.
     *
     * @param string $type Tipe data MySQL.
     * @param int|null $length Panjang untuk tipe data teks (opsional).
     * @param int|null $precision Presisi untuk tipe data desimal (opsional).
     * @return string Tipe data SQLite3 yang sesuai.
     */
    public static function mysqlToSQLite3($type, $length = null, $precision = null)
    {
        $type = strtolower($type);
        switch ($type) {
            case 'int':
                return 'INTEGER';
            case 'varchar':
            case 'text':
            case 'char':
                return self::convertTextToSQLite3FromMySQL($type, $length);
            case 'tinyint':
                return 'BOOLEAN';
            case 'datetime':
                return 'DATETIME';
            case 'decimal':
                return self::convertDecimalFromMySQL($type, $length, $precision);
            case 'float':
                return 'REAL';
            case 'blob':
                return 'BLOB';
            default:
                return 'TEXT';
        }
    }

    /**
     * Mengonversi tipe data SQLite3 ke tipe data SQL Server.
     *
     * @param string $type Tipe data SQLite3.
     * @param int|null $length Panjang untuk tipe data teks (opsional).
     * @param int|null $precision Presisi untuk tipe data desimal (opsional).
     * @return string Tipe data SQL Server yang sesuai.
     */
    public static function sqlite3ToSqlServer($type, $length = null, $precision = null)
    {
        $type = strtolower($type);
        switch ($type) {
            case 'integer':
                return 'INT';
            case 'text':
                return 'NVARCHAR(MAX)';
            case 'char':
                return "NCHAR($length)";
            case 'blob':
                return 'VARBINARY(MAX)';
            case 'boolean':
                return 'BIT';
            case 'datetime':
                return 'DATETIME';
            case 'real':
                return 'FLOAT';
            case 'numeric':
                return self::convertDecimalToSqlServer($type, $length, $precision);
            default:
                return 'NVARCHAR(MAX)';
        }
    }

    /**
     * Mengonversi tipe data SQLite3 ke tipe data MySQL.
     *
     * @param string $type Tipe data SQLite3.
     * @param int|null $length Panjang untuk tipe data teks (opsional).
     * @param int|null $precision Presisi untuk tipe data desimal (opsional).
     * @return string Tipe data MySQL yang sesuai.
     */
    public static function sqlite3ToMySQL($type, $length = null, $precision = null)
    {
        $type = strtolower($type);
        switch ($type) {
            case 'integer':
                return 'INT';
            case 'text':
                return 'TEXT';
            case 'char':
                return "CHAR($length)";
            case 'blob':
                return 'BLOB';
            case 'boolean':
                return 'TINYINT(1)';
            case 'datetime':
                return 'DATETIME';
            case 'real':
                return 'FLOAT';
            case 'numeric':
                return self::convertDecimalToMySQL($type, $length, $precision);
            default:
                return 'TEXT';
        }
    }

    /**
     * Mengonversi tipe data MySQL ke tipe data SQL Server.
     *
     * @param string $type Tipe data MySQL.
     * @param int|null $length Panjang untuk tipe data teks (opsional).
     * @param int|null $precision Presisi untuk tipe data desimal (opsional).
     * @return string Tipe data SQL Server yang sesuai.
     */
    public static function mysqlToSqlServer($type, $length = null, $precision = null)
    {
        $type = strtolower($type);
        switch ($type) {
            case 'int':
                return 'INT';
            case 'nvarchar':
            case 'ntext':
            case 'nchar':
            case 'varchar':
            case 'text':
            case 'char':
                return self::convertTextToSqlServer($type, $length);
            case 'tinyint':
                return 'BIT';
            case 'datetime':
                return 'DATETIME';
            case 'decimal':
                return self::convertDecimalFromMySQL($type, $length, $precision);
            case 'float':
                return 'FLOAT';
            case 'blob':
                return 'VARBINARY(MAX)';
            default:
                return 'NVARCHAR(MAX)';
        }
    }
}
