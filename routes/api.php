<?php

Route::post('/preview', 'CMSController@preview');
Route::post('/render-paginator', 'CMSController@renderPaginator');

Route::group(['middleware' => ['api-form-token']], function () {
    Route::post('/quick-upload', 'CMSController@upload');
    Route::post('/multiple-upload', 'CMSController@multipleUpload');
    Route::get('/upload-dir', 'CMSController@listUploads');
    Route::post('/rename', 'CMSController@renameFile');
    Route::delete('/delete', 'CMSController@deleteFile');

    Route::get('/clear-cache', 'CMSController@clearCache');

    Route::get('/paginator-templates/{domain_name}', 'CMSController@getPaginatorTemplates');
});