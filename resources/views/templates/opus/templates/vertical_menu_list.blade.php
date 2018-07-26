@has($pageItem)
    <?php
      $pageItem = isset_not_empty($pageItem);
      $image_slider = CMSHelper :: getItemOption($pageItem,"image_slider",[]);
      $heading = CMSHelper::getItemOption($pageItem,"heading");
      $sub_heading = CMSHelper::getItemOption($pageItem,"sub_heading");
      $vertical_item = CMSHelper :: getItemOption($pageItem,"vertical_item");   
      $background_color = CMSHelper::getItemOption($pageItem,"background_color");
      $pos = CMSHelper::getItemOption($pageItem,"position");
    ?>
  <section class="section vertical-menu-list-container">
    <div class="vertical-menu-list-inner" data-panel-align="{{$pos}}">
      <div class="vertical-menu-col">
        <div class="single-slide-container">
          <div class="single-slide-inner">
            @foreach($image_slider as $i => $k)
              <div class="single-slide-item">
                @if( isset($k->image) && !empty($k->image) )
                  <div class="image-box">
                    <div class="image">
                      <img data-src="{{ CMSHelper::thumbnail($k->image )}}" alt="{{ $k->image_alt }}" class="lazyload">
                    </div>
                  </div>
                @endif
              </div>
            @endforeach
          </div>
          @if(count($image_slider) > 1)
            <div class="slide-dots"></div>
          @endif
        </div>
      </div>
      <div class="vertical-menu-col {{isset_not_empty($background_color)? $background_color : ''}}">
        <div class="menu-list-tabs">
          <div class="heading-box text-center">
            @if (isset($heading) && !empty($heading))
            <h2 class="heading text-uppercase">{{$heading}}</h2>
            @endif
            @if (isset($sub_heading) && !empty($sub_heading))
              <h3 class="sub-heading text-uppercase">{{$sub_heading}}</h3>
            @endif
          </div>
          <div class="tabs-buttons">
            <ul class="tabs" data-tabs id="menu-tabs">
              @foreach($vertical_item as $i => $k)
                <li class="tabs-title"><a href="#menu_{{$i}}" class="btn-tab">{{$k->title}}</a></li>
              @endforeach
            </ul>
          </div>
          <div class="tabs-content" data-tabs-content="menu-tabs">
            @foreach($vertical_item as $i => $k)
              <div id="menu_{{$i}}">
                <div class="tabs-panel" data-scroll-content>
                  @foreach($k->items as $idx => $obj)
                    <div class="tabs-content-row">
                      <div class="tab-panel-col">
                        <div class="menu-title text-uppercase">{{$obj->title}}</div>
                        <div class="description">{{$obj->sub_title}}</div>
                      </div>
                      <div class="tab-panel-col col-right">
                        <div class="flex-row">
                          <span class="price-label">{{$obj->price}}</span>
                          <span class="currency-label">{{$obj->currency}}</span>
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
@endhas
