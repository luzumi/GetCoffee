<?php

namespace App\Observers;

use App\Models\RaspLog;
use Illuminate\Support\Facades\Redis;

class RaspLogObserver
{
    public function created(RaspLog $raspLog)
    {
        Redis::publish('menu', $raspLog);
    }
}
