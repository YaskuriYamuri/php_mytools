<?php

namespace Yaskuriyamuri\Php_mytools\Interfaces;

/**
 * Interface DatabaseDataTypeConverterInterface
 *
 * Interface ini mendefinisikan metode untuk mengonversi tipe data antara berbagai sistem basis data.
 *
 * @package Yaskuriyamuri\Php_mytools\Interfaces
 */
interface DatabaseDataTypeConverterInterface
{
    /**
     * Mengonversi tipe data SQL Server ke MySQL.
     *
     * @param string $type Tipe data SQL Server.
     * @param int|null $length Panjang untuk tipe data teks (opsional).
     * @return string Tipe data MySQL yang sesuai.
     */
    public static function sqlServerToMySQL($type, $length = null);

    /**
     * Mengonversi tipe data SQL Server ke SQLite3.
     *
     * @param string $type Tipe data SQL Server.
     * @param int|null $length Panjang untuk tipe data teks (opsional).
     * @param int|null $precision Presisi untuk tipe data desimal (opsional).
     * @return string Tipe data SQLite3 yang sesuai.
     */
    public static function sqlServerToSQLite3($type, $length = null, $precision = null);

    /**
     * Mengonversi tipe data MySQL ke SQLite3.
     *
     * @param string $type Tipe data MySQL.
     * @param int|null $length Panjang untuk tipe data teks (opsional).
     * @param int|null $precision Presisi untuk tipe data desimal (opsional).
     * @return string Tipe data SQLite3 yang sesuai.
     */
    public static function mysqlToSQLite3($type, $length = null, $precision = null);

    /**
     * Mengonversi tipe data SQLite3 ke SQL Server.
     *
     * @param string $type Tipe data SQLite3.
     * @param int|null $length Panjang untuk tipe data teks (opsional).
     * @param int|null $precision Presisi untuk tipe data desimal (opsional).
     * @return string Tipe data SQL Server yang sesuai.
     */
    public static function sqlite3ToSqlServer($type, $length = null, $precision = null);

    /**
     * Mengonversi tipe data SQLite3 ke MySQL.
     *
     * @param string $type Tipe data SQLite3.
     * @param int|null $length Panjang untuk tipe data teks (opsional).
     * @param int|null $precision Presisi untuk tipe data desimal (opsional).
     * @return string Tipe data MySQL yang sesuai.
     */
    public static function sqlite3ToMySQL($type, $length = null, $precision = null);

    /**
     * Mengonversi tipe data MySQL ke SQL Server.
     *
     * @param string $type Tipe data MySQL.
     * @param int|null $length Panjang untuk tipe data teks (opsional).
     * @param int|null $precision Presisi untuk tipe data desimal (opsional).
     * @return string Tipe data SQL Server yang sesuai.
     */
    public static function mysqlToSqlServer($type, $length = null, $precision = null);
}
