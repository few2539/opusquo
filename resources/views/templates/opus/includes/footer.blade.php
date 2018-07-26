<?php
    $copyright = \APP\CMS\Helpers\CMSHelper::getGlobalItemOptionValue('site_config','copyright');
    $footer = \APP\CMS\Helpers\CMSHelper::getGlobalItemOptionValue('navigation_menu','footer');
    foreach ($footer as $menu) {
        \App\CMS\Helpers\CMSHelper::url($menu->url);
        $menu->target;
        $menu->label;
    }
    $social = \APP\CMS\Helpers\CMSHelper::getGlobalItemByVariableName('social');
    foreach($social->social as $i => $item){
        \App\CMS\Helpers\CMSHelper::url($item->url);
        $item->target;
        $item->social_menu;
    }
    $address = \APP\CMS\Helpers\CMSHelper::getGlobalItemOptionValue('site_config','address'); 
    $addr_item = \APP\CMS\Helpers\CMSHelper::getGlobalItemOptionValue('site_config','content_items');
    //form 
    $form = \App\CMS\Helpers\CMSHelper::generateFormByVariableName('newsletter_form');
    $form_data = \App\CMS\Helpers\CMSHelper::getGlobalItemByVariableName('newsletter_form');
    $form_data->form_title;
    $form_data->form_sub_title;
    $form_data->submit_button_label;
    $form_data->thank_you_message;
    //map
    $map  = \App\CMS\Helpers\CMSHelper::getGlobalItemOptionValue('site_config', 'map') ;
    $locationCoordination = explode(',', isset_not_empty($map, '0,0'));
    $map_latitude = floatval($locationCoordination[0]);
    $map_longitude = floatval($locationCoordination[1]);
    $api_key = \App\CMS\Helpers\CMSHelper::getGlobalItemOptionValue('site_config', 'map_api_key');
?>
<footer>
    <section class="footer">
        <div class="row footer">
            <div class="col col-left">
                <div class="map-wrapper">
                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d501726.46046481485!2d106.41502458555202!3d10.754666390565195!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x317529292e8d3dd1%3A0xf15f5aad773c112b!2sHo+Chi+Minh+City%2C+Vietnam!5e0!3m2!1sen!2sth!4v1529478293451"
                        frameborder="0" style="border:0" allowfullscreen></iframe>
                </div>
            </div>

            <div class="col col-right">
                <div class="address-wrapper">
                    <div class="address">
                        <h2 class="h5 brand">opus saigon</h2>
                        <h3 class="display-date home">{{isset_not_empty($address)}}</h3>
                        <div class="phone">
                        @if(isset_not_empty($content))
                            @foreach($addr_item as $key=>$item)
                                @if(isset_not_empty($item->title))
                                    <h3 class="display-date tel">{{$item->title}}
                                        <span>{{$item->content}}</span>
                                    </h3> 
                                @endif
                            @endforeach
                        @endif
                        </div>
                    </div>

                    
                    <div class="address">
                        <h2 class="h5 joinmail">{{$form_data->form_title}}
                        </h2>
                        <h3 class="display-date specail ">{{$form_data->form_sub_title}}
                        </h3>
                        <div class="mailform">
                            <div class="group display-date">
                                <form data-action="{{$form->action}}" method="{{$form->method}}">
                                    @honeypot
                                    @cmstoken
                                    @cmsappname
                                    @foreach($form->properties as $prop)
                                        <input type="email" value="" placeholder="{{$prop->placeholder}}" required />
                                        <label class="ui-hidden error req-error-{{$prop->name}}" >{{isset_not_empty($prop->error_message)}}</label>
                                    @endforeach
                                        <input type="submit" value="{{$form_data->submit_button_label}}" />
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <div class="footerbar">
            <div class="menufooter">
                <ul>
                  @if(isset_not_empty($footer))
                    @foreach($footer as $key=>$item)
                    <li>
                        <a href="{{\App\CMS\Helpers\CMSHelper::url(isset_not_empty($item->url))}}"
                          target="{{isset_not_empty($item->target)}}">{{isset_not_empty($item->label)}}</a>                      
                    </li> 
                    @endforeach
                  @endif
                </ul>
            </div>

            <div class="social">
                @foreach($social->social as $i => $item)
                  <a href="{{\App\CMS\Helpers\CMSHelper::url($item->url)}}" target="{{$item->target}}"><i class="icon-{{$item->social_menu}}"></i></a>
                @endforeach         
            </div>
        </div>
    </section>
</footer>

<?php $route= 'newsletter_form' ?>
@include(\App\CMS\Helpers\CMSHelper::getTemplatePath('includes.form_success'))
