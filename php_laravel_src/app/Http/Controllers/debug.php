<?php

namespace App\Http\Controllers;

use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Redis;

class debug extends Controller
{
    public function index()
    {
        Cache::put("key", "value");
        return new JsonResponse(['data'=> Cache::get('key')]);
    }
}
