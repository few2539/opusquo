@has($pageItem)
    <?php
        $pageItem = isset_not_empty($pageItem);
        $currentPage = CMSHelper::getCurrentPage();
        $slider = CMSHelper::getCurrentChildrenPages($currentPage);
    ?>
    <section class="section section-tile-slide">
        <div class="tile-slide-container">
            <div class="heading-box text-center">
                <h2 class="heading text-uppercase">{{isset_not_empty($pageItem->title)}}</h2>
            </div>
            <div class="slide-container">
                @has($slider)
                    <div class="tile-item-container">
                        @foreach($slider as $i => $k)
                            <?php 
                                $sliderItem = CMSHelper::getPageDataByFriendlyUrl($k->friendly_url); 
                                $link = $k->friendly_url;
                                $image = $sliderItem->_page_data->text_template->thumbnail_image_url;
                                $alt = $sliderItem->_page_data->text_template->thumbnail_image_alt;
                                $title = $sliderItem->_page_data->text_template->title;
                            ?>
                            <div class="tile-item">
                                <div class="image-box">
                                <div class="image">
                                    <img data-src="{{ CMSHelper::thumbnail($image) }}" alt="{{$alt}}" class="lazyload">
                                </div>
                                </div>
                                <div class="content-block">
                                <h3 class="tile-title text-white text-uppercase">{{$title}}</h3>
                                </div>
                                <div class="block-hover"></div>
                                <a href="{{ CMSHelper::url($link) }}" class="image-link"></a>
                            </div>
                        @endforeach
                    </div>
                    <div class="carousel-navigation">
                    </div>
                    @if(count($slider) > 1)
                        <div class="slide-dots"></div>
                    @endif
                @endhas
            </div>
        </div>
    </section>
@endhas
