<header>
    {{--@include('mockup.opus.partials.logo')--}}
    <div class="navbar">
        <div class="logo">
            <a href="/" class="main-logo"><img src="{{CMSHelper::getAssetPath('assets/images/logo.png')}}" /></a>
            <a href="/" class="second-logo"><img src="{{CMSHelper::getAssetPath('assets/images/Logo/logo.png')}}" /></a>
        </div>
        <div class="menubar">
            <div class="h6 menu-warp ">
                @foreach ($currentPage['main_menu'] as $menu)
                    <a class="menu" href="{{ $menu['link_url']}}">{{ $menu['link_name']}}</a>
                @endforeach
            </div>
            <div class="h6 menu lang">EN
                <div class="dropdown-content">
                    @foreach ($currentPage['language'] as $language)
                        <a href="{{ $language['code']}}">{{ $language['name']}}</a>
                    @endforeach
                </div>
            </div>
            <div class="h6 es">
                <div class="menu">reservation</div>
            </div>
        </div>
        <div class="toggle">           
            <div class="menu">
                <div class="hambergerIcon">
                </div>
            </div>
        </div>        
    </div>
</header>