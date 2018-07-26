<section class="section section-block-list-filter" data-filter-container>
  <div class="section-block-inner" data-filter>
    @if (isset($data['heading']) && !empty($data['heading']) || isset($data['description']) && !empty($data['description']))
      <div class="heading-box text-center">
        @if (isset($data['heading']) && !empty($data['heading']))
          <h1 class="heading h4 text-uppercase">{{$data['heading']}}</h1>
        @endif
        @if (isset($data['description']) && !empty($data['description']))
          <div class="content">{{$data['description']}}</div>
        @endif
      </div>
    @endif
    <div class="dropdown-container">
      <div class="dropdown">
        <div class="text-box">
          {{$data['category'][0]['category_name']}}
        </div>
        <div class="dropdown-list filter-list">
          <ul>
            <li data-group="all" class="current"><span>{{$data['category'][0]['category_name']}}</span></li>
            @foreach($data['category'] as $i => $k)
              @if($i > 0)
                <li data-group="{{$k['category_id']}}"><span>{{$k['category_name']}}</span></li>
              @endif
            @endforeach
          </ul>
        </div>
      </div>
      <div class="dropdown">
        <div class="text-box">
          {{$data['sub_category'][0]['sub_category_name']}}
        </div>
        <div class="dropdown-list filter-list">
          <ul>
            <li data-group="{{$data['sub_category'][0]['sub_category_id']}}" class="current"><span>{{$data['sub_category'][0]['sub_category_name']}}</span></li>
            @foreach($data['sub_category'] as $i => $k)
              @if($i > 0)
                <li data-group="{{$k['sub_category_id']}}บ"><span>{{$k['sub_category_name']}}</span></li>
              @endif
            @endforeach
          </ul>
        </div>
      </div>
      <div class="dropdown">
        <div class="text-box">
          {{$data['category_years'][0]['yearLabel']}}
        </div>
        <div class="dropdown-list filter-list">
          <ul>
            <li data-group="{{$data['category_years'][0]['yearValue']}}" class="current"><span>{{$data['category_years'][0]['yearLabel']}}</span></li>
            @foreach($data['category_years'] as $i => $k)
              @if($i > 0)
                <li data-group="{{$k['yearValue']}}"><span>{{$k['yearLabel']}}</span></li>
              @endif
            @endforeach
          </ul>
        </div>
      </div>
      <div class="dropdown">
        <div class="text-box">
          {{$data['category_month'][0]['monthLabel']}}
        </div>
        <div class="dropdown-list filter-list">
          <ul>
            <li data-group="{{$data['category_month'][0]['monthValue']}}" class="current"><span>{{$data['category_month'][0]['monthLabel']}}</span></li>
            @foreach($data['category_month'] as $i => $k)
              @if($i > 0)
                <li data-group="{{$k['monthValue']}}"><span>{{$k['monthLabel']}}</span></li>
              @endif
            @endforeach
          </ul>
        </div>
      </div>
    </div>
    <div class="block-list-items" data-load-more data-item data-per-page="6">
      @foreach($data['object_data'] as $i => $k)
        <?php
        $st_date      = explode('-', $k['start_date']);
        $year      = $st_date[0];
        $month     = $st_date[1];
        ?>
        <div class="block-list-item item" data-groups='["{{$k['category_id']}}","{{$k['sub_category_id']}}","{{$year}}","{{$month}}"]' data-col="three">
          <div class="box">
            <div class="image-box">
              <div class="image">
                <img data-src="{{$k['image_url']}}" alt="" class="lazyload">
              </div>
              <div class="block-hover">
                <div class="link-box">
                  <a href="{{$k['link_url']}}" class="btn btn-outline">{{$k['link_label']}}</a>
                </div>
              </div>
            </div>
            <div class="content-box">
              <?php
              $stDate = strtotime($k['start_date']);
              $stNew_Date_Format = date('d M Y',$stDate);
              $endDate = strtotime($k['end_date']);
              $endNew_Date_Format = date('d M Y',$endDate);
              ?>
              <h4 class="date-label text-uppercase font-poppins-light">{{$stNew_Date_Format}} - {{$endNew_Date_Format}}</h4>
              <div class="description font-cormorant-garamond">{!! $k['short_description'] !!}</div>
              <div class="button-box show-for-small">
                <a href="{{$k['link_url']}}" class="btn btn-underline">{{$k['link_label']}}</a>
              </div>
            </div>
          </div>
        </div>
      @endforeach
    </div>
    <div class="button-load-box-container button-box load-more">
      <a class="btn btn-outline" id="loadmore">
        <span class="btn-load-more">load more</span>
      </a>
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