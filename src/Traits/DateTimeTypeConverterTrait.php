<?php

namespace Yaskuriyamuri\Php_mytools\Traits;

/**
 * Trait DateTimeTypeConverterTrait
 *
 * Trait ini menyediakan metode untuk mengonversi tipe data tanggal dan waktu.
 *
 * @package Yaskuriyamuri\Php_mytools\Traits
 */
trait DateTimeTypeConverterTrait
{
    /**
     * Mengonversi tipe data tanggal/waktu.
     *
     * @param string $type Tipe data.
     * @return string Tipe data hasil konversi.
     */
    protected static function convertDateTime($type)
    {
        switch ($type) {
            case 'datetime':
            case 'smalldatetime':
                return 'DATETIME';
            case 'date':
                return 'DATE';
            case 'time':
                return 'TIME';
            default:
                return 'DATETIME'; // Default untuk tipe tanggal/waktu yang tidak dikenal
        }
    }
}
