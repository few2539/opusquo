<?php

if (config('cms.mockup.mode') == false || strtolower(config('cms.mockup.mode')) == 'false') {
    Route::group(['middleware' => ['cms']], function () {
        Route::get('/{language_code}/sitemap.xml', 'CMSController@getSiteMapXML');
        Route::get('sitemap.xml', 'CMSController@getMainSiteMapXML');
        Route::get('{name?}', 'CMSController@index');
        Route::post('success/{form}', 'SuccessController@index');
    });
} else {
    Route::group(['middleware' => ['cms-mockup']], function () {
        Route::get('{name?}', 'MockUpController@index');
    });
}
