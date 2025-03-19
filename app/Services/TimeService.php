<?php

namespace App\Services;

use Carbon\Carbon;

class TimeService
{
    public function getCurrentTime(): string
    {
        return Carbon::now()->format('Y.m.d H:i:s');
    }
}
