<!doctype html>
<html class="no-js" lang="en-US">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=Edge">
        {!! CMSHelper::generatePageMetadata() !!}
        {!!CMSHelper::generateOpenGraphMetadata()!!}  
        <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no, viewport-fit=cover">
        <meta name="HandheldFriendly" content="true">
        <meta name="mobile-web-app-capable" content="yes">
        <meta name="apple-mobile-web-app-capable" content="yes">
        <meta name="apple-mobile-web-app-status-bar-style" content="black">
        <meta name="format-detection" content="telephone=no">
        <meta name="SKYPE_TOOLBAR" content="SKYPE_TOOLBAR_PARSER_COMPATIBLE">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <?php $favicon_list = \App\CMS\Helpers\CMSHelper::getGlobalItemByVariableName('favicon_group'); ?>
        @foreach($favicon_list->icons as $item)
            <link rel="icon" type="image/png" sizes="{{$item->size}}" href="{{ \App\CMS\Helpers\CMSHelper::thumbnail($item->icon) }}">
        @endforeach
        @include(\App\CMS\Helpers\CMSHelper::getTemplatePath('includes.critical'))
        @stack('styles')
        <?php $google_analytics = \APP\CMS\Helpers\CMSHelper::getGlobalItemOptionValue('google_script','google_analytics'); ?>
        @if(isset_not_empty($google_analytics))
            {!!$google_analytics!!}
        @endif
    </head>
    <body>
    <?php  $google_tag_manager = \APP\CMS\Helpers\CMSHelper::getGlobalItemOptionValue('google_script','google_tag_manager');?>
    @if(isset_not_empty($google_tag_manager))
        {!!$google_tag_manager!!}
    @endif
        <div class="global-container">
            <div class="page-container" data-scrollbar>
                <div class="wrap">
                    @include(\App\CMS\Helpers\CMSHelper::getTemplatePath('includes.header'))
                    <main class="main" role="main">
                        @yield('content')
                    </main>
                    @include(\App\CMS\Helpers\CMSHelper::getTemplatePath('includes.footer'))
                </div>
            </div>
        </div>
        {{-- Main script --}}
        <script src="{{ CMSHelper::getAssetPath('js/app.js') }}" async defer></script>
        {{-- Custom scripts --}}
        @stack('scripts')
    </body>
</html>
