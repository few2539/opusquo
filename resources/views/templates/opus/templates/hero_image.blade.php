@has($pageItem)
    <?php
        $pageItem = isset_not_empty($pageItem);
        $items = CMSHelper :: getItemOption($pageItem,"items",[]);
        $has_border = CMSHelper :: getItemOption($pageItem,"border");
    ?>
    <section class="section hero-image-container section-hero">  
        <div class="hero-image-inner">
            <span class="line-left-top"></span>
            <span class="line-right-top"></span>
            <span class="line-left-bottom"></span>
            <span class="line-right-bottom"></span>
            <div class="hero-slide-container">
                @foreach($items as $i => $k)
                    <div class="hero-slide-item">
                        <div class="image-box">
                        <div class="image">
                            @if(isset_not_empty($k->mobile_image_url))
                                <div class="img lazyload" data-bgset="{{ \App\CMS\Helpers\CMSHelper::thumbnail($k->mobile_image_url)}} [(max-width: 990px)] |{{ \App\CMS\Helpers\CMSHelper::thumbnail  ($k->desktop_image_url) }}" data-sizes="auto"></div>
                            @else
                                <div class="img lazyload" data-bgset="{{  \App\CMS\Helpers\CMSHelper::thumbnail($k->desktop_image_url)}}" data-sizes="auto"></div>
                            @endif
                        </div>
                        </div>
                        <div class="content-container text-white text-center">
                        <div class="border-container">
                            <div class="border-inner">
                            <div class="va-outer">
                                <div class="va-inner">
                                @if (isset_not_empty($k->title))
                                    <h1 class="title-hero text-uppercase">{{$k->title}}</h1>
                                @endif
                                @if (isset_not_empty($k->sub_title))
                                    <h2 class="h5 text-uppercase description text-white font-poppins">{{$k->sub_title}}</h2>
                                @endif
                                @if( isset_not_empty($k->link_url)) 
                                    <div class="button-box">
                                    <a href="{{ \App\CMS\Helpers\CMSHelper::url($k->link_url)}}" target="{{isset_not_empty($k->target)}}" class="btn btn-outline">{{$k->link_label}}</a>
                                    </div>
                                @endif
                                </div>
                            </div>
                            </div>
                        </div>
                        </div>
                    </div>
                @endforeach
            </div>
            @if(count($items) > 1)
                <div class="slide-dots"></div>
            @endif
        </div>    
    </section>
 @endhas
