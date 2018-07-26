@has($pageItem)
    <?php
        $pageItem = isset_not_empty($pageItem);
    ?>
    <section class="section section-intro-text">
        <div class="intro-text-inner  {{isset_not_empty($pageItem->image_url)? 'has-image': ''}}">
            @if(isset_not_empty($pageItem->image_url))
                <div class="image-block">
                    <div class="image-box">
                    <div class="image">
                        <img src="{{CMSHelper::thumbnail($pageItem->image_url)}}" alt="{{$pageItem->image_alt}}" class="lazyload">
                    </div>
                    </div>
                </div>
            @endif
            <div class="content-box">
                @if(isset_not_empty($pageItem->title))
                    <div class="heading-box">
                        <h2 class="heading text-uppercase">{{$pageItem->title}}</h2>
                    </div>
                @endif
                <div class="description-box">
                    @if(isset_not_empty($pageItem->sub_title))
                        <h3 class="sub-heading">{{$pageItem->sub_title}}</h3>
                    @endif
                    @if (isset_not_empty($pageItem->description))
                        <div class="description-text">{!! $pageItem->description !!}</div>
                    @endif
                </div>
            </div>
        </div>
    </section>
@endhas