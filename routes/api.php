<?php

use App\Http\Controllers\Api\ActivityController;
use App\Http\Controllers\Api\ActivityVideoController;
use App\Http\Controllers\Api\AssetController;
use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\ConfigController;
use App\Http\Controllers\Api\MovieController;
use App\Http\Controllers\Api\MyVoteController;
use App\Http\Controllers\Api\MyScoreController;
use App\Http\Controllers\Api\RankController;
use App\Http\Controllers\Api\RateController;
use App\Http\Controllers\Api\ReceivedVoteController;
use App\Http\Controllers\Api\UploadController;
use App\Http\Controllers\Api\VideoCommentController;
use App\Http\Controllers\Api\VoteController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\MyvideoController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware(['auth:api'])->group(function () {
    Route::get('videos', [MovieController::class, 'index']); //视频列表
    Route::get('videos/{video}', [MovieController::class, 'show']); //视频详情
    Route::post('rate/{video}', [RateController::class, 'store']); //视频打分
    Route::post('vote/{video}', [VoteController::class, 'store']);  //视频投票
    Route::get('activity', [ActivityController::class, 'index']);
    Route::get('activity/{activity}', [ActivityController::class, 'show']);
    Route::post('upload', [UploadController::class, 'store']);
    Route::post('/video', [MovieController::class, 'store']);
    Route::get('{activity}/videos', [ActivityVideoController::class, 'index']);
    Route::get('/{activity}/rank', [RankController::class, 'index']);

    Route::get('myvote', [MyVoteController::class, 'index']);
    Route::get('myscore', [MyScoreController::class, 'index']);
    Route::resource('video.comment', VideoCommentController::class)->shallow();
    Route::get("receivedvotes", [ReceivedVoteController::class, 'index']);
    Route::get('myvideos', [MyvideoController::class, 'index']);
});

Route::post('login', [AuthController::class, 'store']);
Route::get('asset', [AssetController::class, 'index']);
Route::get('config', [ConfigController::class, 'index']);


