<?php

require __DIR__.'/database.php';
require __DIR__ .'/model.php';
require __DIR__.'/route.php';
require __DIR__.'/Controller/BaseController.php';

Route::run('/', 'product@index');
Route::run('/index', 'product@index');
Route::run('/kaydet', 'product@post', 'POST');
Route::run('/download/{type}', 'product@download');
