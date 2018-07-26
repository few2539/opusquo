@has($pageItem) 
  <section class="section section-video section-hero">
    <div class="hero-video-container">
      <span class="line-left-top"></span>
      <span class="line-right-top"></span>
      <span class="line-left-bottom"></span>
      <span class="line-right-bottom"></span>
      <div class="video-wrap">
        <div class="image-box">
          <div class="image video-cover">
            @if(isset($pageItem->mobile_cover_image_url) && !empty($pageItem->mobile_cover_image_url))
              <div class="img lazyload" data-bgset="{{ CMSHelper::thumbnail($pageItem->mobile_cover_image_url) }} [(max-width: 990px)] | {{ CMSHelper::thumbnail($pageItem->cover_image_url) }}" data-sizes="auto"></div>
            @else
              <div class="img lazyload" data-bgset="{{ CMSHelper::thumbnail($pageItem->cover_image_url) }}" data-sizes="auto"></div>
            @endif
            <div class="btn-video-play"></div>
          </div>
        </div>
        <div class="video-container">
          @if($pageItem->video_type == 'youtube')
            <div data-type="youtube" data-video-id="{{ $pageItem->video_id }}" class="placeholder-youtube"></div>
          @elseif($pageItem->video_type == 'vimeo')
            <div data-type="vimeo" data-video-id="{{ $pageItem->video_id }}" class="placeholder-vimeo"></div>
          @elseif($pageItem->video_type == 'html5')
            <div data-video-link="{{ $pageItem->video_link }}" data-poster="{{ CMSHelper::thumbnail($pageItem->image_url) }}" class="placeholder"></div>
          @endif
        </div>
        <div class="content-container text-white" {{($pageItem->auto_play == true) ? data-autoplay : ''}} >
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
                      @if(isset($pageItem->title) && !empty($pageItem->title))
                        <h1 class="h1 title-hero {{$pageItem->text_color}} text-uppercase">{{$pageItem->title}}</h1>
                      @endif
                      @if(isset($pageItem->sub_title) && !empty($pageItem->sub_title))
                        <h2 class="h5 text-uppercase description {{$pageItem->text_color}} font-poppins">{{$pageItem->sub_title}}</h2>
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
@endhas
