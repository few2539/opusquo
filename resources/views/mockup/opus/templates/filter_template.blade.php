<div class="private-event">
    <div class="content">
        <div class="title">
            <h2>private events</h2>
        </div>
        <div class="select-filter" >
        
            <div class="all h5">
                <div class="arrowdown icon-cheveron-down"></div>
                <select class="all-menu js-shuffle-filter" name="filter1">
                    <option  value="" class="current">{{$data['category'][0]['category_name']}}</option>
                    @foreach($data['category'] as $i => $k) @if($i > 0)
                    <option value="{{$k['category_id']}}">{{$k['category_name']}}</option>
                    @endif @endforeach              
                </select>
                <!-- <ul>
                    @foreach($data['category'] as $i => $k) @if($i > 0)
                    <li class="js-shuffle-li" data-groups="{{$k['category_id']}}">{{$k['category_name']}}</li>
                    @endif @endforeach
                </ul> -->           
            </div>
           
            <div class="subcategory h5">
            <div class="arrowdown icon-cheveron-down"></div>
                <select class="subcategory-menu js-shuffle-filter" name="filter2">
                    <option value="" class="current">{{$data['sub_category'][0]['sub_category_name']}}</option>
                    @foreach($data['sub_category'] as $i => $k)
              @if($i > 0)
                    <option value="{{$k['sub_category_id']}}">{{$k['sub_category_name']}}</option>
                    @endif
            @endforeach
                </select>
            </div>
            <div class="month h5">
            <div class="arrowdown icon-cheveron-down"></div>
                <select class="month-menu js-shuffle-filter" name="filter3">
                    <option value="" class="current">{{$data['category_month'][0]['monthLabel']}}</option>
                    @foreach($data['category_month'] as $i => $k) @if($i > 0)
                    <option value="{{$k['monthValue']}}">{{$k['monthLabel']}}</option>
                    @endif @endforeach
                </select>
            </div>
        </div>
    </div>

    <div class=" my-shuffle-container" >
        <div class="js-shuffle warpobject">
            @foreach($data['object_data'] as $i => $k)
                <div class="col js-shuffle-item" data-groups='["{{$k['category_id']}}","{{$k['sub_category_id']}}","{{$k['monthValue']}}"]' >
                    <div class="img-container">
                        
                        <img data-src="{{$k['image_url']}}" alt="" class="lazyload">
                        
                        <div class="hover-image">
                            <div class="link-box">
                                <a href="{{$k['link_url']}}" class="viewmore">{{$k['link_label']}}</a>
                            </div>
                        </div>
                    </div>
                    <div class="row-text">
                        <div class="date">
                            <p>{{$data['sub_time_start']}}-{{$data['sub_time_end']}}</p>
                        </div>
                        <div class="title">
                            <h3>{{$data['description']}}</h3>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>


        <!-- <div class="col" data-groups='["cat1"]' data-date-created="2016-08-12" data-title="sub_cat3">
            <div class="img-container">
                <img src="{{CMSHelper::getAssetPath('assets/images/imagetext.jpg')}}" alt="">
                <div class="hover-image">
                    <div class="link-box">
                        <a href="#" class="viewmore">view&ensp;more</a>
                    </div>
                </div>
            </div>

            <div class="row-text">
                <div class="date">
                    <p>{{$data['sub_time_start']}}-{{$data['sub_time_end']}}</p>
                </div>
                <div class="title">
                    <h3>{{$data['description']}}</h3>
                </div>
            </div>
        </div> -->
        <!-- <div class="col" data-groups='["cat1"]' data-date-created="2016-08-12" data-title="sub_cat2">
            <div class="img-container">
                <img src="{{CMSHelper::getAssetPath('assets/images/Logo/test.jpg')}}" alt="">
                <div class="hover-image">
                    <div class="link-box">
                        <a href="#" class="viewmore">view&ensp;more</a>
                    </div>
                </div>
            </div>

            <div class="row-text">
                <div class="date">
                    <p>{{$data['sub_time_start']}}-{{$data['sub_time_end']}}</p>
                </div>
                <div class="title">
                    <h3>{{$data['description']}}</h3>
                </div>
            </div>
        </div>
        <div class="col" data-groups='["cat3"]' data-date-created="2016-08-12" data-title="sub_cat2">
            <div class="img-container">
                <img src="{{CMSHelper::getAssetPath('assets/images/Logo/test.jpg')}}" alt="">
                <div class="hover-image">
                    <div class="link-box">
                        <a href="#" class="viewmore">view&ensp;more</a>
                    </div>
                </div>
            </div>

            <div class="row-text">
                <div class="date">
                    <p>{{$data['sub_time_start']}}-{{$data['sub_time_end']}}</p>
                </div>
                <div class="title">
                    <h3>{{$data['description']}}</h3>
                </div>
            </div>
        </div>
        <div class="col" data-groups='["cat2"]' data-date-created="2016-08-12" data-title="sub_cat3">
            <div class="img-container">
                <img src="{{CMSHelper::getAssetPath('assets/images/Logo/test.jpg')}}" alt="">
                <div class="hover-image">
                    <div class="link-box">
                        <a href="#" class="viewmore">view&ensp;more</a>
                    </div>
                </div>
            </div>

            <div class="row-text">
                <div class="date">
                    <p>{{$data['sub_time_start']}}-{{$data['sub_time_end']}}</p>
                </div>
                <div class="title">
                    <h3>{{$data['description']}}</h3>
                </div>
            </div>
        </div>
        <div class="col" data-groups='["cat2"]' data-date-created="2016-08-12" data-title="sub_cat1">
            <div class="img-container">
                <img src="{{CMSHelper::getAssetPath('assets/images/Logo/test.jpg')}}" alt="">
                <div class="hover-image">
                    <div class="link-box">
                        <a href="#" class="viewmore">view&ensp;more</a>
                    </div>
                </div>
            </div>
            <div class="row-text">
                <div class="date">
                    <p>{{$data['sub_time_start']}}-{{$data['sub_time_end']}}</p>
                </div>
                <div class="title">
                    <h3>{{$data['description']}}</h3>
                </div>
            </div>
        </div> -->
    </div>
    <div class="loadmore">
        <div class="box-loadmore">
            <a href="#" class="loadmore">load&ensp;more</a>
        </div>
    </div>
</div>