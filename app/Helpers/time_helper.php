<?php

if (!function_exists('format_time_ago')) {
    function format_time_ago($datetime) {
        $now = new DateTime('now', new DateTimeZone('Asia/Jakarta'));
        $date = new DateTime($datetime, new DateTimeZone('Asia/Jakarta')); // Add timezone to input date
        $interval = $date->diff($now);
        
        if ($interval->y > 0) {
            $time_ago = $interval->y . ' tahun, ' . $interval->m . ' bulan, ' . $interval->d . ' hari yang lalu';
        } elseif ($interval->m > 0) {
            $time_ago = $interval->m . ' bulan, ' . $interval->d . ' hari yang lalu';
        } elseif ($interval->d > 0) {
            $time_ago = $interval->d . ' hari yang lalu';
        } elseif ($interval->h > 0) {
            $time_ago = $interval->h . ' jam yang lalu';
        } elseif ($interval->i > 0) {
            $time_ago = $interval->i . ' menit yang lalu';
        } else {
            $time_ago = 'Baru saja';
        }
        
        return $time_ago;
    }
}