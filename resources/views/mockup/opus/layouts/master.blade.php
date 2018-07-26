<!doctype html>
<html class="no-js" lang="en-US">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=Edge">
        <meta name="google" content="notranslate">
        <meta name="author" content="Quo Global">
        <title>{{ $currentPage['title'] }}</title>
        <meta name="description" content="Opus Saigon">
        <meta name="keywords" content="Opus Saigon">

        <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no, viewport-fit=cover">
        <meta name="HandheldFriendly" content="true">
        <meta name="mobile-web-app-capable" content="yes">
        <meta name="apple-mobile-web-app-capable" content="yes">
        <meta name="apple-mobile-web-app-status-bar-style" content="black">
        <meta name="format-detection" content="telephone=no">
        <meta name="SKYPE_TOOLBAR" content="SKYPE_TOOLBAR_PARSER_COMPATIBLE">

        <meta name="csrf-token" content="{{ csrf_token() }}">

        <meta property="og:type" content="website">
        <meta property="og:title" content="">
        <meta property="og:url" content="http://opus.staging.quo-digital.com/">
        <meta property="og:image" content="">
        <meta property="og:description" content="Opus Saigon">
        <meta name="twitter:card" content="summary_large_image">
        <meta name="twitter:title" content="Opus Saigon">
        <meta name="twitter:image" content="">
        <meta name="twitter:description" content="Opus Saigon">


        @include('mockup.opus.includes.critical')
        {{-- Custom styles --}}
        @stack('styles')
    </head>
    <body>
        <div class="global-container">
            <div class="page-container" data-scrollbar>
                <div class="wrap">
                    @include('mockup.opus.includes.header')
                    <main class="main" role="main">
                        <!-- Add your site or application content here -->
                        @yield('content')
                    </main>
                    @include('mockup.opus.includes.footer')
                </div>
            </div>
        </div>
        
        {{-- Main script --}}
        <script src="{{ CMSHelper::getAssetPath('js/app.js') }}" async defer></script>

        {{-- Custom scripts --}}
        @stack('scripts')
    </body>
</html>


