@has($pageItem)
    <?php
    $pageItem = isset_not_empty($pageItem);
    $position = CMSHelper::getItemOption($pageItem,"position");
    $grid_items = CMSHelper::getItemOption($pageItem,"grid_items",[]); 
    ?>
 
<section class="section grid-block-container">
    <div class="grid-block-inner">
      <div class="grid-block-items">
        <div class="grid-block-item-col full-col">
            @if (isset_not_empty($grid_items[0]->image_url))
            <div class="image-box">
              <div class="image">
                  <img src="{{\App\CMS\Helpers\CMSHelper::thumbnail(($grid_items[0]->image_url))}}" alt="{{$grid_items[0]->image_alt}}" class="lazyload">
              </div>
            </div>
            @endif
          <div class="grid-content-block">
            <div class="grid-content-block-inner text-white">
              @if (isset_not_empty($grid_items[0]->title))
                <h2 class="heading title text-uppercase">{{$grid_items[0]->title}}</h2>
              @endif
              @if (isset_not_empty($grid_items[0]->sub_title))
                <div class="description">{{$grid_items[0]->sub_title}}</div>
              @endif
              @if (isset_not_empty($grid_items[0]->link_url))
                <div class="button-box">
                  <a href="{{\App\CMS\Helpers\CMSHelper::url($grid_items[0]->link_url)}}" target="{{isset_not_empty($grid_items[0]->target)}}" class="btn btn-outline">{{$grid_items[0]->link_label}}</a>
                </div>
              @endif
            </div>
          </div>
            <span class="hover-block"></span>
        </div>
          <div class="grid-block-item-col flex-row"> 
          @foreach($grid_items as $key=>$item)  
            @if($key>0)
              <div class="grid-col-sm">
                  @if (isset_not_empty($item->image_url))
                  <div class="image-box">
                    <div class="image">
                        <img src="{{\App\CMS\Helpers\CMSHelper::thumbnail(isset_not_empty($item->image_url))}}" alt="{{$item->image_alt}}" class="lazyload">
                    </div>
                  </div>
                  @endif
                <div class="grid-content-block">
                  <div class="grid-content-block-inner text-white">
                    @if (isset_not_empty($item->title))
                      <h2 class="heading title text-uppercase">{{$item->title}}</h2>
                    @endif
                    @if (isset_not_empty($item->sub_title))
                      <div class="description">{{$item->sub_title}}</div>
                    @endif
                  </div>
                </div>
                <div class="hover-block">
                  <div class="hover-block-inner text-white">
                    <div class="va-outer">
                      <div class="va-inner">
                        @if (isset_not_empty($item->title))
                          <h2 class="heading title text-uppercase">{{$item->title}}</h2>
                        @endif
                        @if (isset_not_empty($item->sub_title))
                          <div class="description">{{$item->sub_title}}</div>
                        @endif
                      </div>
                    </div>
                  </div>
                </div>
                <a href="{{\App\CMS\Helpers\CMSHelper::url($item->link_url)}}" target="{{isset_not_empty($item->target)}}" class="image-link"></a>
              </div> 
            @endif
          @endforeach
        </div>
      </div>
    </div>
  </section>  
@endhas
