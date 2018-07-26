<section class="section grid-block-container">
  <div class="grid-block-inner">
    <div class="grid-block-items">
      <div class="grid-block-item-col full-col">
        @if( isset($data['object_data'][0]['image_url']) && !empty($data['object_data'][0]['image_url']) )
          <div class="image-box">
            <div class="image">
              <img data-src="{{ $data['object_data'][0]['image_url'] }}" alt="" class="lazyload">
            </div>
          </div>
        @endif
        <div class="grid-content-block">
          <div class="grid-content-block-inner text-white">
            @if( isset($data['object_data'][0]['title']) && !empty($data['object_data'][0]['title']) )
              <h2 class="heading title text-uppercase">{{$data['object_data'][0]['title']}}</h2>
            @endif
            @if( isset($data['object_data'][0]['description']) && !empty($data['object_data'][0]['description']) )
              <div class="description">{!! $data['object_data'][0]['description'] !!}</div>
            @endif
            @if( isset($data['object_data'][0]['link_url']) && !empty($data['object_data'][0]['link_url']))
              <div class="button-box">
                <a href="{{$data['object_data'][0]['link_url']}}" class="btn btn-outline">{{$data['object_data'][0]['link_label']}}</a>
              </div>
            @endif
          </div>
        </div>
          <span class="hover-block"></span>
      </div>
      <div class="grid-block-item-col flex-row">
        @foreach($data['object_data'] as $i => $k)
          @if($i>0)
            <div class="grid-col-sm">
              @if( isset($k['image_url']) && !empty($k['image_url']) )
                <div class="image-box">
                  <div class="image">
                    <img data-src="{{ $k['image_url'] }}" alt="" class="lazyload">
                  </div>
                </div>
              @endif
              <div class="grid-content-block">
                <div class="grid-content-block-inner text-white">
                  @if( isset($k['title']) && !empty($k['title']) )
                    <h2 class="heading title text-uppercase">{{$k['title']}}</h2>
                  @endif
                  @if( isset($k['description']) && !empty($k['description']) )
                    <div class="description">{!! $k['description'] !!}</div>
                  @endif
                </div>
              </div>
              <div class="hover-block">
                <div class="hover-block-inner text-white">
                  <div class="va-outer">
                    <div class="va-inner">
                      @if( isset($k['title']) && !empty($k['title']) )
                        <h2 class="heading title text-uppercase">{{$k['title']}}</h2>
                      @endif
                      @if( isset($k['description']) && !empty($k['description']) )
                        <div class="description">{!! $k['description'] !!}</div>
                      @endif
                    </div>
                  </div>
                </div>
              </div>
              <a href="{{ $k['link_url'] }}" class="image-link"></a>
            </div>
          @endif
        @endforeach
      </div>
    </div>
  </div>
</section>