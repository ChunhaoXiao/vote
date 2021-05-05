<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\AssetResource;
use Illuminate\Http\Request;

class AssetResourceController extends Controller
{
    public function index()
    {
        $datas = AssetResource::all();

        return view('admin.asset.index', ['datas' => $datas]);
    }

    public function create()
    {
        return view('admin.asset.create');
    }

    public function show($id)
    {
    }

    public function store(Request $request)
    {
        AssetResource::create($request->except('file'));

        return redirect()->route('admin.asset.index');
    }
}
