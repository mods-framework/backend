<?php

/*
|--------------------------------------------------------------------------
| Web Backend Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Mods the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

Route::get('/', [ 'as' => 'dashboard', function () {
    return render();
}]);
