<section class="section section-grid-template">
  <div class="grid-template-inner">
    <div class="grid-items">
      @foreach($data['object_data'] as $i => $k)
        <div class="grid-item {{$i==0 || $i == 1 ? 'text-on-image' : ''}}">
          <div class="grid-inner">
            <div class="image-box">
              <div class="image">
                <img data-src="{{ $k['image_url'] }}" alt="" class="lazyload">
              </div>
            </div>
            <div class="hover-block"></div>
            @if( isset($k['url']) && !empty($k['url']) )
              <a href="{{ $k['url'] }}" class="image-link">
                @if( isset($k['title']) && !empty($k['title']) || isset($k['subtitle']) && !empty($k['subtitle']) )
                  <div class="grid-content text-white {{ $k['background'] === "dark-purple" ? "bg-dark-purple" : "bg-light-purple" }}">
                    <div class="grid-content-inner">
                      @if( isset($k['title']) && !empty($k['title']) )
                        <h3 class="grid-content-title text-uppercase">{{ $k['title'] }}</h3>
                      @endif
                      @if( isset($k['date']) && !empty($k['date']) )
                        <?php
                        $stDate = strtotime($k['date']);
                        $stNew_Date_Format = date('d M Y',$stDate);
                        ?>
                        <div class="grid-content-date">
                          <p>{{ $stNew_Date_Format }}</p>
                        </div>
                      @endif
                      @if( isset($k['subtitle']) && !empty($k['subtitle']) )
                        <div class="grid-content-subtitle">
                          <p>{{ $k['subtitle'] }}</p>
                        </div>
                      @endif
                    </div>
                    <div class="content-hover"></div>
                  </div>
                @endif
              </a>
            @endif
          </div>
        </div>
      @endforeach
    </div>
  </div>
</section>