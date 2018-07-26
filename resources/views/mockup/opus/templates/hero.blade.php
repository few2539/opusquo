<section class="section hero-image-container section-hero">
  <div class="hero-image-inner">
    <span class="line-left-top"></span>
    <span class="line-right-top"></span>
    <span class="line-left-bottom"></span>
    <span class="line-right-bottom"></span>
    <div class="hero-slide-container">
      @foreach($data['object_data'] as $i => $k)
        <div class="hero-slide-item">
          <div class="image-box">
            <div class="image">
              @if(isset($k['mobile_image']) && !empty($k['mobile_image']))
                <div class="img lazyload" data-bgset="{{ $k['mobile_image'] }} [(max-width: 990px)] | {{ $k['desktop_image'] }}" data-sizes="auto"></div>
              @else
                <div class="img lazyload" data-bgset="{{ $k['desktop_image'] }}" data-sizes="auto"></div>
              @endif
            </div>
          </div>
          <div class="content-container text-white text-center">
            <div class="border-container">
              <div class="border-inner">
                <div class="va-outer">
                  <div class="va-inner">
                    @if (isset($k['title']) && !empty($k['title']))
                      <h1 class="title-hero text-uppercase">{{$k['title']}}</h1>
                    @endif
                    @if (isset($k['short_description']) && !empty($k['short_description']))
                      <h2 class="h5 text-uppercase description text-white font-poppins">{{$k['short_description']}}</h2>
                    @endif
                    @if( isset($k['link_url']) && !empty($k['link_url']))
                      <div class="button-box">
                        <a href="{{$k['link_url']}}" class="btn btn-outline">{{$k['link_label']}}</a>
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
    @if(count($data['object_data']) > 1)
      <div class="slide-dots"></div>
    @endif
  </div>
</section>