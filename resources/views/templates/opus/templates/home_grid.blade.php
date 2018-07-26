
@has($pageItem)
    <?php
        $pageItem = isset_not_empty($pageItem);
        $home_grid_item = CMSHelper :: getItemOption($pageItem,"home_grid_item",[]);
    ?>
    <section class="section section-grid-template">
        <div class="grid-template-inner">
            <div class="grid-items">
            @foreach($home_grid_item as $i => $k)
                <div class="grid-item {{$i==0 || $i == 1 ? 'text-on-image' : ''}}">
                <div class="grid-inner">
                    <div class="image-box">
                    <div class="image">
                        <img src="{{ CMSHelper::thumbnail($k->image_url) }}" alt="{{ $k->image_alt }}" class="lazyload">
                    </div>
                    </div>
                    <div class="hover-block"></div>
                    @if( isset($k->link_url) && !empty($k->link_url)  || isset($k->pdf_url) && !empty($k->pdf_url))
                    <a href="{{ ($k->type_link == 'pdf') ? CMSHelper::file($k->pdf_url) : CMSHelper::url($k->link_url) }}" 
                    target = "{{$k->target}}" class="image-link">
                        @if( isset($k->title) && !empty($k->title) || isset($k->subtitle) && !empty($k->subtitle) )
                        <div class="grid-content text-white {{$k->color}}">
                            <div class="grid-content-inner">
                            @if( isset($k->title) && !empty($k->title) )
                                <h3 class="grid-content-title text-uppercase">{{ $k->title }}</h3>
                            @endif
                            @if( isset($k->start_date) && !empty($k->start_date) )
                                <?php
                                $stDate = strtotime($k->start_date);
                                $stNew_Date_Format = date('d M Y',$stDate);
                                ?>
                                <div class="grid-content-date">
                                <p>{{ $stNew_Date_Format }}</p>
                                </div>
                            @endif
                            @if( isset($k->subtitle) && !empty($k->subtitle) )
                                <div class="grid-content-subtitle">
                                <p>{{ $k->subtitle }}</p>
                                </div>
                            @endif
                            </div>
                            <div class="content-hover"></div>
                        </div>
                        @endif
                    </a>
                    @endif
                </div>
                </div>
            @endforeach
            </div>
        </div>
    </section>
@endhas