<?php

namespace App;

interface FormatInterface
{
    public function format($level, $message, array $context = []);
}