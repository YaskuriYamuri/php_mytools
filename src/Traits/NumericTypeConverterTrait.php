<?php

namespace Yaskuriyamuri\Php_mytools\Traits;

/**
 * Trait NumericTypeConverterTrait
 *
 * Trait ini menyediakan metode untuk mengonversi tipe data numerik.
 *
 * @package Yaskuriyamuri\Php_mytools\Traits
 */
trait NumericTypeConverterTrait
{
    /**
     * Mengonversi tipe data numerik dari SQLite3 ke MySQL.
     *
     * @param string $type Tipe data SQLite3.
     * @return string Tipe data MySQL yang sesuai.
     */
    protected static function convertNumeric($type)
    {
        switch ($type) {
            case 'integer':
                return 'INT'; // Menggunakan INT untuk tipe data integer
            case 'real':
                return 'FLOAT'; // Menggunakan FLOAT untuk tipe data real
            case 'numeric':
            case 'decimal':
                return 'DECIMAL'; // Menggunakan DECIMAL untuk tipe data numeric atau decimal
            default:
                return 'NUMERIC'; // Default untuk tipe numerik yang tidak dikenal
        }
    }
}
