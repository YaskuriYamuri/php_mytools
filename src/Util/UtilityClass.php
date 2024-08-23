<?php

namespace Yaskuriyamuri\Php_mytools\Util;

/**
 * Class UtilityClass
 *
 * Kelas utilitas ini menyediakan metode-metode umum yang digunakan dalam konversi tipe data.
 *
 * @package Yaskuriyamuri\Php_mytools\Util
 */
class UtilityClass
{
    /**
     * Mengambil panjang dan presisi dari tipe data desimal.
     *
     * @param string $type Tipe data desimal.
     * @param int|null $length Panjang dari tipe data desimal (opsional).
     * @param int|null $precision Presisi dari tipe data desimal (opsional).
     * @return array Array dengan 'length' dan 'precision'.
     */
    public static function parseDecimalType($type, $length = null, $precision = null)
    {
        $result = ['length' => $length, 'precision' => $precision];

        if (stripos($type, 'decimal') !== false) {
            // Mengambil panjang dan presisi dari tipe data decimal
            if ($length !== null) {
                $result['length'] = $length;
            }
            if ($precision !== null) {
                $result['precision'] = $precision;
            }
        }

        return $result;
    }

    /**
     * Mengubah panjang tipe data teks jika perlu.
     *
     * @param string $type Tipe data teks.
     * @param int|null $length Panjang tipe data teks (opsional).
     * @return string Tipe data teks yang telah diperbarui.
     */
    public static function adjustTextTypeLength($type, $length = null)
    {
        if ($length !== null) {
            switch (strtolower($type)) {
                case 'varchar':
                    return "VARCHAR($length)";
                case 'char':
                    return "CHAR($length)";
                default:
                    return $type; // Tidak ada perubahan jika tipe data tidak dikenali
            }
        }

        return $type;
    }

    /**
     * Menghapus karakter non-alfanumerik dari string.
     *
     * @param string $input String input.
     * @return string String yang telah dibersihkan.
     */
    public static function sanitizeString($input)
    {
        return preg_replace('/[^a-zA-Z0-9_]/', '', $input);
    }
}
