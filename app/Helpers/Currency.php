<?php

namespace App\Helpers;

use NumberFormatter;

class Currency
{
    public static function format($amount, $currency = null)
    {
        $formatter = new NumberFormatter('en', NumberFormatter::CURRENCY);
        if ($currency = null) {

            $currency = 'EUR';
        }
        return $formatter->formatCurrency($amount, $currency);
    }
}
