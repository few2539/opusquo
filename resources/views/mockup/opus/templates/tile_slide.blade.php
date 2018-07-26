<section class="section section-tile-slide">
  <div class="tile-slide-container">
    <div class="heading-box text-center">
      <h2 class="heading text-uppercase">{{$data['heading']}}</h2>
    </div>
    <div class="slide-container">
      <div class="tile-item-container">
        @foreach($data['object_data'] as $i => $k)
          <div class="tile-item">
            <div class="image-box">
              <div class="image">
                <img data-src="{{ $k['image_url'] }}" alt="{{ $k['alt'] }}" class="lazyload">
              </div>
            </div>
            <div class="content-block">
              <h3 class="tile-title text-white text-uppercase">{{$k['title']}}</h3>
            </div>
            <div class="block-hover"></div>
            <a href="{{ $k['link_url'] }}" class="image-link"></a>
          </div>
        @endforeach
      </div>
      <div class="carousel-navigation">
      </div>
      @if(count($data['object_data']) > 1)
        <div class="slide-dots"></div>
      @endif
    </div>
  </div>
</section>