<?php

namespace App\Services;

class Boot
{
    public static function dependencias() {
        shell_exec("npm install 2>&1");
    }
}