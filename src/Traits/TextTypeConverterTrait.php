<?php

namespace Yaskuriyamuri\Php_mytools\Traits;

/**
 * Trait TextTypeConverterTrait
 *
 * Trait ini menyediakan metode konversi untuk tipe data teks.
 *
 * @package Yaskuriyamuri\Php_mytools\Traits
 */
trait TextTypeConverterTrait
{
    /**
     * Mengonversi tipe data teks dari SQL Server ke SQLite3.
     *
     * @param string $type Tipe data teks SQL Server.
     * @param int|null $length Panjang untuk tipe data teks (opsional).
     * @return string Tipe data SQLite3 yang sesuai.
     */
    protected static function convertTextToSQLite3FromSqlServer($type, $length = null)
    {
        // $length = $length ?? 255; // default length
        // switch ($type) {
        //     case 'text':
        //         return 'TEXT';
        //     case 'char':
        //         return "CHAR($length)"; // Atur panjang jika diperlukan
        //     case 'varchar':
        //         return 'TEXT';
        //     case 'nvarchar':
        //         return 'TEXT';
        //     case 'nchar':
        //         return "CHAR($length)";
        //     default:
        //         return 'TEXT';
        // }
        $type = strtolower($type);
        switch ($type) {
            case 'nvarchar':
            case 'varchar':
                return $length ? "TEXT" : "TEXT";
            case 'nchar':
            case 'char':
                return $length ? "CHAR($length)" : "CHAR";
            case 'ntext':
                return "TEXT";
            default:
                return "TEXT";
        }
    }

    /**
     * Mengonversi tipe data teks dari MySQL ke SQLite3.
     *
     * @param string $type Tipe data teks MySQL.
     * @param int|null $length Panjang untuk tipe data teks (opsional).
     * @return string Tipe data SQLite3 yang sesuai.
     */
    protected static function convertTextToSQLite3FromMySQL($type, $length = null)
    {
        // $length = $length ?? 255; // default length
        // switch ($type) {
        //     case 'text':
        //         return 'TEXT';
        //     case 'char':
        //         return "CHAR($length)";
        //     case 'varchar':
        //         return 'TEXT';
        //     case 'nvarchar':
        //         return 'TEXT';
        //     case 'nchar':
        //         return "CHAR($length)";
        //     default:
        //         return 'TEXT';
        // }
        $type = strtolower($type);
        switch ($type) {
            case 'varchar':
            case 'text':
                return "TEXT";
            case 'char':
                return $length ? "CHAR($length)" : "CHAR";
            default:
                return "TEXT";
        }
    }
    /**
     * Mengonversi tipe data teks dari SQLite3 ke MySQL.
     *
     * @param string $type Tipe data teks SQLite3.
     * @param int|null $length Panjang untuk tipe data teks (opsional).
     * @return string Tipe data MySQL yang sesuai.
     */
    protected static function convertTextToMySQL($type, $length = null)
    {
           $length = is_null($length)? 255:$length; // default length
           switch (strtolower($type)) {
               case 'text':
                   return 'TEXT';
               case 'char':
                   return "CHAR($length)";
               case 'varchar':
                   return "VARCHAR($length)";
               case 'nvarchar':
                   return "VARCHAR($length)";
               case 'nchar':
                   return "CHAR($length)";
               default:
                   return 'TEXT';
           }
        // $type = strtolower($type);
        // switch ($type) {
        //     case 'text':
        //         return 'TEXT';
        //     case 'char':
        //         return $length ? "CHAR($length)" : "CHAR";
        //     default:
        //         return 'TEXT';
        // }
    }
    /**
     * Mengonversi tipe data teks dari MySQL ke SQL Server.
     *
     * @param string $type Tipe data teks MySQL.
     * @param int|null $length Panjang untuk tipe data teks (opsional).
     * @return string Tipe data SQL Server yang sesuai.
     */
    protected static function convertTextToSqlServer($type, $length = null)
    {
          $length = is_null($length) ? 255:$length; // default length
          switch ($type) {
              case 'text':
                //   return 'NVARCHAR(MAX)';
                  return 'NTEXT';
              case 'char':
                  return "NCHAR($length)";
              case 'varchar':
                  return "NVARCHAR($length)";
              case 'nvarchar':
                  return "NVARCHAR($length)";
              case 'nchar':
                  return "NCHAR($length)";
              default:
                  return 'NVARCHAR(MAX)';
          }
        // $type = strtolower($type);
        // switch ($type) {
        //     case 'text':
        //         return 'NVARCHAR(MAX)';
        //     case 'char':
        //         return $length ? "NCHAR($length)" : "NCHAR";
        //     default:
        //         return 'NVARCHAR(MAX)';
        // }
    }    /**
    * Mengonversi tipe data teks dari SQL Server ke MySQL.
    *
    * @param string $type Tipe data SQL Server (nvarchar, varchar, nchar, char, ntext).
    * @param int|null $length Panjang untuk tipe data teks (opsional).
    * @return string Tipe data MySQL yang sesuai.
    */
   protected static function convertTextToMySQLFromSqlServer($type, $length = null)
   {
       $type = strtolower($type);
       switch ($type) {
           case 'nvarchar':
           case 'varchar':
               return $length ? "VARCHAR($length)" : "VARCHAR";
           case 'nchar':
           case 'char':
               return $length ? "CHAR($length)" : "CHAR";
           case 'ntext':
               return 'TEXT';
           default:die(var_dump($type,$length));
               return 'TEXT';
       }
   }
}
