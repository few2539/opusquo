<section class="section section-video section-hero">
  <div class="hero-video-container">
    <span class="line-left-top"></span>
    <span class="line-right-top"></span>
    <span class="line-left-bottom"></span>
    <span class="line-right-bottom"></span>
    <div class="video-wrap">
      <div class="image-box">
        <div class="image video-cover">
          @if(isset($data['mobile_cover_url']) && !empty($data['mobile_cover_url']))
            <div class="img lazyload" data-bgset="{{ $data['mobile_cover_url'] }} [(max-width: 990px)] | {{ $data['desktop_cover_url'] }}" data-sizes="auto"></div>
          @else
            <div class="img lazyload" data-bgset="{{ $data['desktop_cover_url'] }}" data-sizes="auto"></div>
          @endif
          <div class="btn-video-play"></div>
        </div>
      </div>
      <div class="video-container">
        @if( $data['video_type'] == 'youtube')
          <div data-type="youtube" data-video-id="{{ $data['video_id'] }}" class="placeholder-youtube"></div>
        @elseif ( $data['video_type'] == 'vimeo')
          <div data-type="vimeo" data-video-id="{{ $data['video_id'] }}" class="placeholder-vimeo"></div>
        @elseif ( $data['video_type'] == 'html5')
          <div data-video-link="{{ $data['video_link'] }}" data-poster="{{ $data['image_url'] }}" class="placeholder"></div>
        @endif
      </div>
      <div class="content-container text-white" @if( $data['autoplay'] == true) data-autoplay @endif>
        <div class="border-container">
          <div class="border-inner">
            <div class="va-outer">
              <div class="va-inner">
                <div class="content-inner">
                  <div class="play-button image-container">
                    <span class="play-button-bg"></span>
                    <img data-src="{{ \App\CMS\Helpers\CMSHelper::getAssetPath('assets/images/play.svg') }}" alt="Play" class="image lazyload play-btn">
                  </div>
                  <div class="title-box">
                    @if (isset($data['title']) && !empty($data['title']))
                      <h1 class="h1 title-hero text-uppercase">{{$data['title']}}</h1>
                    @endif
                    @if (isset($data['short_description']) && !empty($data['short_description']))
                      <h2 class="h5 text-uppercase description text-white font-poppins">{{$data['short_description']}}</h2>
                    @endif
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>