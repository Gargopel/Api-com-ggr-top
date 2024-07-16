<?php

use Illuminate\Support\Facades\Route;
use Westreels\WestreelsMain;
use Illuminate\Http\Request;

Route::group(['middleware' => ['api']], function () {
    Route::get('/player/login', '\Westreels\WestreelsMain\Gate\PlayerGateController@playerLogin');
    Route::get('/player/entryToken', '\Westreels\WestreelsMain\Gate\EntryGateController@createEntryToken');
    Route::get('/internal/pragmaticplaySessionStart', '\Westreels\WestreelsMain\GameControllers\PragmaticPlay\StartSessionPragmaticPlay@pragmaticplaySessionStart');
});

Route::middleware('api', 'throttle:60,1')->group(function () {
    Route::get('/gameslist', '\Westreels\WestreelsMain\Models\GamelistPragmaticPlay@print');
});

Route::get('/games', function () {  
    $get = Http::get(config('gameconfig.api_base_url').'/gameslist');
    return Westreels\WestreelsMain\GameControllers\GameKernel::showGameList($get);

});
Route::get('/', function () {  
    return Westreels\WestreelsMain\GameControllers\GameKernel::errorHandler('Please use valid entry link.', 404, 'default');
});

Route::get('/dev/hashmacCreate', '\Westreels\WestreelsMain\Gate\GateFunctions@hashmacCreate');