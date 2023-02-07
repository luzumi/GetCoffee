<?php

namespace App\Http\Controllers;

use App\Events\RaspLoginReceivedEvent;
use App\Models\RaspLog;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class ApiController extends Controller
{
    public function receiveData(Request $request)
    {
        $username = $request->input('data');
        $user = User::where('username', $username)
            ->first();

        Log::info('Rfid-Login from Raspberry Pi: ', [$request->method(), $request->header()]);

//        RaspLog::updateOrCreate([
//            'username' => $username,
//            'type' => 'login'
//        ]);

        event(new RaspLoginReceivedEvent($user));
//        return view('menu', compact($user));
//        return response();
    }
}
