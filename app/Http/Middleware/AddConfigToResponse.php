<?php

namespace App\Http\Middleware;

use App\Models\AssetResource;
use Closure;
use Illuminate\Http\Request;

class AddConfigToResponse
{
    /**
     * Handle an incoming request.
     *
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        $response = $next($request);
        $content = json_decode($response->content(), true) ?? [];

        $response->setContent(json_encode(array_merge($content, [
            'resource' => AssetResource::all()->each(function ($item, $key) {
                return $item->path = $item->full_path;
            })->pluck('path', 'mark'),
        ])));

        return $response;
    }
}
