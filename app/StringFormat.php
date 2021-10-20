<?php

namespace App;

use DateTime;

class StringFormat implements FormatInterface
{

    // нужно попробовать формировать стринг и json, добавить в функцию еще один пареметр

    public function format(
        $level,
        $message,
        array $context = []
    ): ?string {
        $now = DateTime::createFromFormat('U.u', microtime(true));

        $result = '[' . $now->format("m-d-Y H:i:s.u") . ']' . ' - ' . $level . ' - ' . $message;
        $result .= ' - ' . json_encode($context) . PHP_EOL;
        return $result;
    }
}