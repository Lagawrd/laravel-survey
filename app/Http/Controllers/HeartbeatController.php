<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;

class HeartbeatController extends Controller
{
    /**
     * Return a simple response to demonstrate
     * that core system functions are online.
     *
     * @return array
     */
    public function heartbeat(Request $request)
    {
        return Carbon::now();
        return ['rub' => 'dub'];
    }
}
