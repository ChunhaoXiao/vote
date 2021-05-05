<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\Activity as ActivityResource;
use App\Models\Activity;

class ActivityController extends Controller
{
    public function index()
    {
        $datas = Activity::withCount('videos')->latest()->paginate();

        return ActivityResource::collection($datas);
    }

    public function show($id)
    {
        return new ActivityResource(Activity::withCount('videos')->findOrFail($id));
    }
}
