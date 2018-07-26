<section class="section section-intro-text {{$data['background_color'] === 'y'? 'has-bg': ''}}">
  <div class="intro-text-inner {{isset_not_empty($data['image_url'])? 'has-image': ''}}">
    @if( isset($data['image_url']) && !empty($data['image_url']) )
      <div class="image-block">
        <div class="image-box">
          <div class="image">
            <img data-src="{{ $data['image_url'] }}" alt="" class="lazyload">
          </div>
        </div>
      </div>
    @endif
    <div class="content-box">
      @if (isset($data['heading']) && !empty($data['heading']))
        <div class="heading-box">
          <h2 class="heading text-uppercase">{{$data['heading']}}</h2>
        </div>
      @endif
      <div class="description-box">
        @if (isset($data['sub_heading']) && !empty($data['sub_heading']))
          <h3 class="sub-heading">{{$data['sub_heading']}}</h3>
        @endif
        @if (isset($data['description']) && !empty($data['description']))
          <div class="description-text">{!! $data['description'] !!}</div>
        @endif
      </div>
    </div>
  </div>
</section>