<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Config;

class ConfigController extends Controller
{
    public function create() {
    	$data = Config::first();
    	return view('admin.config.create', ['data' => $data]);
    }

    public function store(Request $request) {
    	$config = Config::first();
    	$config->update($request->input());
    	return redirect()->route('admin.config.create');
    }
}
