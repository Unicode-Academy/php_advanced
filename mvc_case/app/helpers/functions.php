<?php
function getDateFormat($date, $format)
{
    if ($date) {
        $dateObj = date_create($date);
        return date_format($dateObj, $format);
    }

    return null;
}
