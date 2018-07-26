<section class="section vertical-menu-list-container">
  <div class="vertical-menu-list-inner" data-panel-align="{{$data['menu_panel_align']}}">
    <div class="vertical-menu-col">
      <div class="single-slide-container">
        <div class="single-slide-inner">
          @foreach($data['object_data'] as $i => $k)
            <div class="single-slide-item">
              @if( isset($k['image_url']) && !empty($k['image_url']) )
                <div class="image-box">
                  <div class="image">
                    <img data-src="{{ $k['image_url'] }}" alt="{{ $k['alt'] }}" class="lazyload">
                  </div>
                </div>
              @endif
            </div>
          @endforeach
        </div>
        @if(count($data['object_data']) > 1)
          <div class="slide-dots"></div>
        @endif
      </div>
    </div>
    <div class="vertical-menu-col {{isset_not_empty($data['background_color'])? $data['background_color'] : ''}}">
      <div class="menu-list-tabs">
        <div class="heading-box text-center">
          @if (isset($data['title']) && !empty($data['title']))
          <h2 class="heading text-uppercase">{{$data['title']}}</h2>
          @endif
          @if (isset($data['sub_title']) && !empty($data['sub_title']))
            <h3 class="sub-heading text-uppercase">{{$data['sub_title']}}</h3>
          @endif
        </div>
        <div class="tabs-buttons">
          <ul class="tabs" data-tabs id="menu-tabs">
            @foreach($data['object_menu'] as $i => $k)
              <li class="tabs-title"><a href="#menu_{{$i}}" class="btn-tab">{{$k['title']}}</a></li>
            @endforeach
          </ul>
        </div>
        <div class="tabs-content" data-tabs-content="menu-tabs">
          @foreach($data['object_menu'] as $i => $k)
            <div id="menu_{{$i}}">
              <div class="tabs-panel" data-scroll-content>
                @foreach($k['menu_list'] as $idx => $obj)
                  <div class="tabs-content-row">
                    <div class="tab-panel-col">
                      <div class="menu-title text-uppercase">{{$obj['menu_name']}}</div>
                      <div class="description">{{$obj['description']}}</div>
                    </div>
                    <div class="tab-panel-col col-right">
                      <div class="flex-row">
                        <span class="price-label">{{$obj['price']}}</span>
                        <span class="currency-label">{{$obj['currency']}}</span>
                      </div>
                    </div>
                  </div>
                @endforeach
              </div>
              <div class="tab-menu-download text-right">
                <a href="" class="btn btn-underline btn-download text-capitalize">Download Menu</a>
              </div>
            </div>
          @endforeach
        </div>
      </div>
    </div>
  </div>
</section>