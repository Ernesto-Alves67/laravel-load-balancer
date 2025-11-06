<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class HelloController extends Controller
{
    public function hello(Request $request)
        {
            $container_name = getenv('HOSTNAME');
            $hostname = gethostname();
            $time = now()->format('H:i:s.v');
            $ip = $request->ip();

            Log::info("Request: [{$time}] {$ip} → {$container_name}");

            return response()->json([   
                'message' => "Hello from instance: {$hostname}",
                'at' => $time,
                'from' => $ip
            ]);
        }
}
