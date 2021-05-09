<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Config;

class ConfigController extends Controller
{
    public function index()
    {
        return Config::first();
    }
}
