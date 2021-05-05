<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Activity;
use Illuminate\Http\Request;

class ActivityController extends Controller
{
    public function index()
    {
        $datas = Activity::latest()->paginate();

        return view('admin.activity.index', ['datas' => $datas]);
    }

    public function create()
    {
        return view('admin.activity.create');
    }

    public function store(Request $request)
    {
        Activity::create($request->all());
    }
}
