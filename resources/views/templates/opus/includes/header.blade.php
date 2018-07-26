<?php
    $languages = \APP\CMS\Helpers\CMSHelper::getSiteLanguages();
    $current_languages = \App\CMS\Helpers\CMSHelper::getCurrentLanguageCode();
    $logo = \APP\CMS\Helpers\CMSHelper::getGlobalItemOptionValue('site_config','official_logo');
    $logo_nd = \APP\CMS\Helpers\CMSHelper::getGlobalItemOptionValue('site_config','secondary_logo');
    $mainmenu = \APP\CMS\Helpers\CMSHelper::getGlobalItemOptionValue('navigation_menu','main_menu');
    $mainmenu_button = \APP\CMS\Helpers\CMSHelper::getGlobalItemOptionValue('navigation_menu','mainmenu_button');
?>
<header>
    <div class="navbar">
        <div class="logo">
            <a href="{{\App\CMS\Helpers\CMSHelper::url("/")}}" class="main-logo"><img src="{{\App\CMS\Helpers\CMSHelper::thumbnail(isset_not_empty($logo))}}" /></a>
            <a href="{{\App\CMS\Helpers\CMSHelper::url("/")}}" class="second-logo"><img src="{{\App\CMS\Helpers\CMSHelper::thumbnail(isset_not_empty($logo_nd))}}" /></a>
        </div>
        <div class="menubar">
            @if(isset_not_empty($mainmenu))
            <div class="h6 menu-warp ">
                @foreach($mainmenu as $key=>$item)
                <a class="menu" href="{{\App\CMS\Helpers\CMSHelper::url(isset_not_empty($item->url))}}"
                target="{{isset_not_empty($item->target)}}">{{isset_not_empty($item->label)}}</a>
                @endforeach 
            </div>
            @endif
            @if(count($languages) >= 2)
                <div class="h6 menu lang">{{$current_languages}}</div>
                <div class="dropdown-content">
                    @foreach ($languages as $language)
                        <a href="{{ $language->code}}">{{ $language->hreflang}}</a>
                    @endforeach
                </div>
            @endif
            <div class="es">
                <div class="menu">reservation<div>
            </div>

        </div>
        <div class="toggle">
            <button>MENU</button>
        </div> 
    </div> 
</header>