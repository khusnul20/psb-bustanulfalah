<?php


if (!function_exists('mataUangID')) {
    function mataUangID($value)
    {
        return "Rp. " . number_format($value, 0, ',', '.');
    }
}

function showDateTime($carbon, $format = "d M Y @ H:i")
{
    return $carbon->translatedFormat($format);
}
