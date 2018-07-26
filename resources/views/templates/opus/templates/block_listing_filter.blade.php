@has($pageItem)
    <section class="section section-block-list-filter" data-filter-container>
        <div class="fluid-layout">
            <div class="section-block-inner" data-filter>
                @if (isset_not_empty($pageItem->heading) || isset_not_empty($pageItem->description))
                    <div class="heading-box text-center">
                    @if (isset_not_empty($pageItem->heading))
                        <h1 class="heading h4 text-uppercase">{{$pageItem->heading}}</h1>
                    @endif
                    @if (isset_not_empty($pageItem->description))
                        <div class="content">{{$pageItem->description}}</div>
                    @endif
                    </div>
                @endif
                <div class="dropdown-container">
                    <div class="dropdown">
                    <div class="text-box">
                        {{$pageItem->main_category[0]->label}}
                    </div>
                    <div class="dropdown-list filter-list">
                        <ul>
                        <li data-group="all" class="current"><span>{{$pageItem->main_category[0]->label}}</span></li>
                        @foreach($pageItem->main_category as $i => $k)
                            @if($i > 0)
                            <li data-group="{{$k->value}}"><span>{{$k->label}}</span></li>
                            @endif
                        @endforeach
                        </ul>
                    </div>
                    </div>
                    <div class="dropdown">
                    <div class="text-box">
                        {{$pageItem->sub_category[0]->sub_category_name}}
                    </div>
                    <div class="dropdown-list filter-list">
                        <ul>
                        <li data-group="{{$pageItem->sub_category[0]->sub_category_id}}" class="current"><span>{{$pageItem->sub_category[0]->sub_category_name}}</span></li>
                        @foreach($pageItem->sub_category as $i => $k)
                            @if($i > 0)
                            <li data-group="{{$k->sub_category_id}}"><span>{{$k->sub_category_name}}</span></li>
                            @endif
                        @endforeach
                        </ul>
                    </div>
                    </div>
                    <div class="dropdown">
                    <div class="text-box">
                        {{$pageItem->year[0]->label}}
                    </div>
                    <div class="dropdown-list filter-list">
                        <ul>
                        <li data-group="{{$pageItem->year[0]->value}}" class="current"><span>{{$pageItem->year[0]->label}}</span></li>
                        @foreach($pageItem->year as $i => $k)
                            @if($i > 0)
                            <li data-group="{{$k->value}}"><span>{{$k->label}}</span></li>
                            @endif
                        @endforeach
                        </ul>
                    </div>
                    </div>
                    <div class="dropdown">
                    <div class="text-box">
                        {{$pageItem->month[0]->label}}
                    </div>
                    <div class="dropdown-list filter-list">
                        <ul>
                            <li data-group="{{$pageItem->month[0]->value}}" class="current"><span>{{$pageItem->month[0]->label}}</span></li>
                            @foreach($pageItem->month as $i => $k)
                                @if($i > 0)
                                <li data-group="{{$k->value}}"><span>{{$k->label}}</span></li>
                                @endif
                            @endforeach
                        </ul>
                    </div>
                    </div>
                </div>
                <div class="block-list-items" data-load-more data-item data-per-page="6">
                <?php $childlist = CMSHelper::getCurrentChildrenPages(); ?>
                    @if(isset_not_empty($childlist))
                        @foreach($childlist as $i => $k)
                            <?php   
                                $itemValue = CMSHelper::getPageDataByFriendlyUrl($k->friendly_url); 
                                $item = $itemValue->_page_data->text_template;
                                $st_date      = explode('-', $item->start_date);
                                $year      = $st_date[0];
                                $month     = $st_date[1];
                            ?>
                            <div class="block-list-item item" data-groups='["{{$item->main_category}}","{{$item->sub_category}}","{{$year}}","{{$month}}"]' data-col="three">
                                <div class="box">
                                <div class="image-box">
                                    <div class="image">
                                    <img data-src="{{CMSHelper::thumbnail($item->thumbnail_image_url)}}" alt="{{$item->thumbnail_image_alt}}" class="lazyload">
                                    </div>
                                    <div class="block-hover">
                                        <div class="link-box">
                                            <a href="{{$k->friendly_url}}" class="btn btn-outline">{{$item->title}}</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="content-box">
                                    <?php
                                    $stDate = strtotime($item->start_date);
                                    $stNew_Date_Format = date('d M Y',$stDate);
                                    $endDate = strtotime($item->end_date);
                                    $endNew_Date_Format = date('d M Y',$endDate);
                                    ?>
                                    <h4 class="date-label text-uppercase font-poppins-light">{{$stNew_Date_Format}} - {{$endNew_Date_Format}}</h4>
                                    <div class="description font-cormorant-garamond">{!! $item->short_description !!}</div>
                                </div>
                                </div>
                            </div>
                        @endforeach
                    @endif
                </div>
                <div class="button-load-box-container button-box load-more">
                    <a class="btn btn-outline" id="loadmore">
                    <span class="btn-load-more">{{$pageItem->load_more}}</span>
                    </a>
                </div>
            </div>
        </div>
    </section>
    @push('scripts')
    <script>
        window.initPage = function () {
            if (typeof initFilter === 'function') {
                initFilter();
            }
        }
    </script>
    @endpush
@endhas