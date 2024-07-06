<?php

if (!function_exists('getInitials')) {
    /**
     * Mendapatkan inisial dari nama pengguna.
     *
     * @param string $name Nama pengguna
     *
     * @return string Inisial nama
     */
    function getInitials($name)
    {
        $initials = '';
        $words = explode(' ', $name);

        foreach ($words as $word) {
            $initials .= strtoupper($word[0]);
        }

        return $initials;
    }
}
