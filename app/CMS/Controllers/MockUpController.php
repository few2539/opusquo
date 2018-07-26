<?php

namespace App\CMS\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response as BaseResponse;
use App\CMS\Helpers\CMSHelper;

class MockUpController extends BaseController
{
    /**
     * Return a mock-up page
     *
     * @param Request $request
     */

  public $globalData;

  public function __construct()
  {
    $this->globalData = [
      'cookies' => [
        'article_content' => 'We use cookies to improve your experience on our website. By continuing to browse this website you are agreeing to our use of Cookies.',
        'link_url' => '#'
      ],
      'title' => 'Opus Saigon',
      'main_logo' => CMSHelper::getAssetPath('/assets/images/logo.png'),
      'secondary_logo' => CMSHelper::getAssetPath('/assets/images/logo_secondary.svg'),
      'alt' => 'Opus Saigon',
      'language' => [
        [
          'code' => 'en',
          'name' => 'En'
        ],
        [
          'code' => 'vi',
          'name' => 'Vi'
        ]
      ],
      'main_menu' => [
        [
          'link_url' => '/private-dining',
          'link_name' => 'private dining-custom'
        ],
        [
          'link_url' => '/private-events',
          'link_name' => 'private events'
        ],
        [
          'link_url' => '/gourmet',
          'link_name' => 'gourmet'
        ],
        [
          'link_url' => '/rooftop',
          'link_name' => 'rooftop'
        ],
        [
          'link_url' => '/wine-cellar',
          'link_name' => 'wine cellar'
        ],
        [
          'link_url' => '/news',
          'link_name' => 'news'
        ]
      ],
      'footer_menu' => [
        [
          'link_url' => '/careers',
          'link_name' => 'careers'
        ],
        [
          'link_url' => '/terms-conditions',
          'link_name' => 'terms and conditions'
        ],
        [
          'link_url' => '/privacy-policy',
          'link_name' => 'privacy policy'
        ]
      ],
      'social' => [
        [
          'link_url' => '#',
          'class' => 'facebook' // facebook, youtube-play, link-in
        ],
        [
          'link_url' => '#',
          'class' => 'twitter' // facebook, youtube-play, link-in
        ],
        [
          'link_url' => '#',
          'class' => 'instagram' // facebook, youtube-play, link-in
        ],
        [
          'link_url' => '#',
          'class' => 'tripadvisor' // facebook, youtube-play, link-in
        ]
      ],
      'copyright' => '2018 © OPUS',
      'logo_preload' => ''
    ];
  }
    public function index(Request $request)
    {
        $path = $request->getPathInfo();

        if ($path) {
            $path = remove_leading_slashes($path);

            if (empty($path)) {
                $path = 'homepage';
            }

            $method = 'get' . preg_replace('/-/', '', preg_replace('/-|_/', '-', ucwords($path, '-')));

            if ( ! method_exists($this, $method)) {
                return abort(BaseResponse::HTTP_NOT_FOUND);
            }

            $templateName = config('cms.mockup.template_name');

            if (is_null($templateName)) {
                return abort(BaseResponse::HTTP_NOT_FOUND);
            }

            return $this->{$method}($request);
        }

        return abort(BaseResponse::HTTP_NOT_FOUND);
    }

    /**
     * Return a view path for mock-up page
     *
     * @param string $view
     * @return string
     */
    private function getViewPath($view = '')
    {
        return config('cms.mockup.views_path', 'mockup') . '.' . config('cms.mockup.template_name')  . '.' . $view;
    }

    /**
     * Return a mock-up view
     *
     * @param string $view
     * @param array $data
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    private function mockup($view = '', $data = [])
    {
        if ( ! view()->exists($this->getViewPath($view))) {
            return abort(BaseResponse::HTTP_NOT_FOUND);
        }

        return view($this->getViewPath($view), $data);
    }

    /**
     * MOCK-UP SECTION
     */

    /**
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function getHomepage(/** @noinspection PhpUnusedParameterInspection */ Request  $request)
    {
        // Mock-up Data
      $this->globalData['page'] = 'homepage';
      $image =CMSHelper::getAssetPath('/assets/images/imagetext.jpg');
      $data = [
        [
          'template_name' => 'hero_video',
          'content_position' => 'center',
          'text_color' => 'text-white',
          'desktop_cover_url' => CMSHelper::getAssetPath('assets/images/homepage/desktop-video-cover.jpg'),
          'mobile_cover_url' => CMSHelper::getAssetPath('assets/images/homepage/mobile-video-cover.jpg'),
          'image_url' => CMSHelper::getAssetPath('assets/images/homepage/desktop-video-cover.jpg'),// cover html5
          'image_title' => 'Lorem ipsum dolor',
          'title' => 'Lorem ipsum dolor',
          'short_description' => 'sit amet omnis graecLorem ipsum',
          'video_type' => 'youtube', //vimeo, html5
          'video_id' => 'bTqVqk7FSmY', //for vimeo, html5
          'video_link' => '', //for html5 --> CMSHelper::getAssetPath('assets/videos/HeroV_v2.3_720_No_Audio_Crop_XS.mp4')
          'autoplay' => true
        ],

        [
          'template_name' => 'filter_template',
          'text_title' => 'title',
          'description' => 'Lorem ipsum dolor sit am etno sea augue quodsi         
            
          ',
          'sub_time_start' => 'dd/mm/yyyy',
          'sub_time_end' => 'dd/mm/yyyy end',
          'desktop_cover_url' => CMSHelper::getAssetPath('assets/images/homepage/desktop-video-cover.jpg'),
          'detail' =>"
          
          Curabitur blandit tempus porttitor. Donec id elit non mi porta gravida at eget metus. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus. Aenean eu leo quam. Pellentesque ornare sem lacinia quam venenatis vestibulum. Etiam porta sem malesuada magna mollis euismod. Cras justo odio, dapibus ac facilisis in, egestas eget quam.",
          'heading' => 'Private events',
          'description' => '',

          'category' => [
            [
              'category_id' => 'all',
              'category_name' => 'All'
            ],
            [
              'category_id' => 'cat1',
              'category_name' => 'category'
            ],
            [
              'category_id' => 'cat2',
              'category_name' => 'category 2'
            ],
            [
              'category_id' => 'cat3',
              'category_name' => 'category 3'
            ]
          ],
          'sub_category' => [
            [
              'sub_category_id' => 'all',
              'category_id' => 'all',
              'sub_category_name' => 'Subcategory'
            ],
            [
              'sub_category_id' => 'sub_cat1',
              'category_id' => 'cat1',
              'sub_category_name' => 'Subcategory1'
            ],
            [
              'sub_category_id' => 'sub_cat2',
              'category_id' => 'cat2',
              'sub_category_name' => 'Subcategory 2'
            ],
            [
              'sub_category_id' => 'sub_cat3',
              'category_id' => 'cat3',
              'sub_category_name' => 'Subcategory 3'
            ]
          ],
          'category_years' => [
            [
              'yearValue' => '2018',
              'yearLabel' => '2018'
            ],
            [
              'yearValue' => '2019',
              'yearLabel' => '2019'
            ]
          ],
          'category_month' => [
            [
              'monthValue' => '',
              'monthLabel' => 'month'
            ],
            [
              'monthValue' => '01',
              'monthLabel' => 'January'
            ],
            [
              'monthValue' => '02',
              'monthLabel' => 'February'
            ],
            [
              'monthValue' => '03',
              'monthLabel' => 'March'
            ],
            [
              'monthValue' => '04',
              'monthLabel' => 'April'
            ],
            [
              'monthValue' => '05',
              'monthLabel' => 'May'
            ],
            [
              'monthValue' => '06',
              'monthLabel' => 'June'
            ],
            [
              'monthValue' => '07',
              'monthLabel' => 'July'
            ],
            [
              'monthValue' => '08',
              'monthLabel' => 'August'
            ],
            [
              'monthValue' => '09',
              'monthLabel' => 'September'
            ],
            [
              'monthValue' => '10',
              'monthLabel' => 'October'
            ],
            [
              'monthValue' => '11',
              'monthLabel' => 'November'
            ],
            [
              'monthValue' => '12',
              'monthLabel' => 'December'
            ]
            ],
            'object_data' => [
              [
                'category_id' => 'cat1',
                'sub_category_id' => 'sub_cat1',
                'monthValue' => '01',
                'image_url' => CMSHelper::getAssetPath('assets/images/private-events/event-01.jpg'),
                'start_date' => '2017-11-28',
                'end_date' => '2018-01-31',
                'short_description' => 'Lorem ipsum dolor sit amet no sea augue',
                'link_url' => '/event-detail',
                'link_label' => 'view more'
              ],
              [
                'category_id' => 'cat2',
                'sub_category_id' => 'sub_cat2',
                'monthValue' => '02',
                'image_url' => CMSHelper::getAssetPath('assets/images/private-events/event-02.jpg'),
                'start_date' => '2018-03-21',
                'end_date' => '2018-04-31',
                'short_description' => 'Lorem ipsum dolor sit amet no sea augue',
                'link_url' => '/event-detail',
                'link_label' => 'view more'
              ],
              [
                'category_id' => 'cat3',
                'sub_category_id' => 'sub_cat3',
                'monthValue' => '01',
                'image_url' => CMSHelper::getAssetPath('assets/images/private-events/event-03.jpg'),
                'start_date' => '2018-05-28',
                'end_date' => '2018-06-28',
                'short_description' => 'Lorem ipsum dolor sit amet no sea augue',
                'link_url' => '/event-detail',
                'link_label' => 'view more'
              ],
              [
                'category_id' => 'cat1',
                'sub_category_id' => 'sub_cat2',
                'monthValue' => '01',
                'image_url' => CMSHelper::getAssetPath('assets/images/private-events/event-04.jpg'),
                'start_date' => '2018-07-08',
                'end_date' => '2018-08-08',
                'short_description' => 'Lorem ipsum dolor sit amet no sea augue',
                'link_url' => '/event-detail',
                'link_label' => 'view more'
              ],
              [
                'category_id' => 'cat2',
                'sub_category_id' => 'sub_cat2',
                'monthValue' => '03',
                'image_url' => CMSHelper::getAssetPath('assets/images/private-events/event-05.jpg'),
                'start_date' => '2018-07-08',
                'end_date' => '2018-08-08',
                'short_description' => 'Lorem ipsum dolor sit amet no sea augue',
                'link_url' => '/event-detail',
                'link_label' => 'view more'
              ],
              [
                'category_id' => 'cat3',
                'sub_category_id' => 'sub_cat3',
                'monthValue' => '01',
                'image_url' => CMSHelper::getAssetPath('assets/images/private-events/event-06.jpg'),
                'start_date' => '2018-09-28',
                'end_date' => '2018-10-31',
                'short_description' => 'Lorem ipsum dolor sit amet no sea augue',
                'link_url' => '/event-detail',
                'link_label' => 'view more'
              ],
              [
                'category_id' => 'cat1',
                'sub_category_id' => 'sub_cat3',
                'monthValue' => '03',
                'image_url' => CMSHelper::getAssetPath('assets/images/private-events/event-01.jpg'),
                'start_date' => '2018-09-28',
                'end_date' => '2018-10-31',
                'short_description' => 'Lorem ipsum dolor sit amet no sea augue',
                'link_url' => '/event-detail',
                'link_label' => 'view more'
              ],
              [
                'category_id' => 'cat2',
                'sub_category_id' => 'sub_cat2',
                'monthValue' => '02',
                'image_url' => CMSHelper::getAssetPath('assets/images/private-events/event-02.jpg'),
                'start_date' => '2018-11-28',
                'end_date' => '2019-01-31',
                'short_description' => 'Lorem ipsum dolor sit amet no sea augue',
                'link_url' => '/event-detail',
                'link_label' => 'view more'
              ],
              [
                'category_id' => 'cat3',
                'sub_category_id' => 'sub_cat3',
                'monthValue' => '07',
                'image_url' => CMSHelper::getAssetPath('assets/images/private-events/event-03.jpg'),
                'start_date' => '2018-11-28',
                'end_date' => '2019-01-31',
                'short_description' => 'Lorem ipsum dolor sit amet no sea augue',
                'link_url' => '/event-detail',
                'link_label' => 'view more'
              ]
            ]
        ],

    // [
    //       'template_name' => 'content_form',
    //       'text_title' => 'title',
    //       'content_title' => 'text_template',
    //       'content_hr' => 'text_template',
    //       'detail' =>"
    //       Curabitur blandit tempus porttitor. Donec id elit non mi porta gravida at eget metus. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus. Aenean eu leo quam. Pellentesque ornare sem lacinia quam venenatis vestibulum. Etiam porta sem malesuada magna mollis euismod. Cras justo odio, dapibus ac facilisis in, egestas eget quam."
          
    //     ],

        // [
        //   'template_name' => 'Content_Form',
        //   'text_title' => 'title',
        //   'content_title' => 'text_template',
        //   'content_hr' => 'text_template',
        //   'detail' =>"
        //   Curabitur blandit tempus porttitor. Donec id elit non mi porta gravida at eget metus. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus. Aenean eu leo quam. Pellentesque ornare sem lacinia quam venenatis vestibulum. Etiam porta sem malesuada magna mollis euismod. Cras justo odio, dapibus ac facilisis in, egestas eget quam."
          
        // ],



        // [
        //   'template_name' => 'text_template',
        //   'text_title' => 'title',
        //   'parent_page' => 'text_template',
        //   'date_name' => 'date_template',
        //   'content' => "
        //     <img src='$image' alt=''>
        //     <h5>Inceptos Tellus Parturient Vulputate</h5>
        //        <p>Vivamus sagittis lacus vel augue laoreet rutrum faucibus dolor auctor. Donec id elit non mi porta gravida at eget metus. Curabitur blandit tempus porttitor. Cras mattis consectetur purus sit amet fermentum.</p>
        //        <p>Nulla vitae elit libero, a pharetra augue. Nulla vitae elit libero, a pharetra augue. Duis mollis, est non commodo luctus, nisi erat porttitor ligula, eget lacinia odio sem nec elit. Vivamus sagittis lacus vel augue laoreet rutrum faucibus dolor auctor. Curabitur blandit tempus porttitor. Etiam porta sem malesuada magna mollis euismod.</p>
        //        <p>Donec id elit non mi porta gravida at eget metus. Aenean lacinia bibendum nulla sed consectetur. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Etiam porta sem malesuada magna mollis euismod. Etiam porta sem malesuada magna mollis euismod. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent commodo cursus magna, vel scelerisque nisl consectetur et.</p>
        //        <p>Nullam quis risus eget urna mollis ornare vel eu leo. Morbi leo risus, porta ac consectetur ac, vestibulum at eros. Curabitur blandit tempus porttitor. Maecenas faucibus mollis interdum. Maecenas sed diam eget risus varius blandit sit amet non magna. Donec sed odio dui.</p>
        //        <hr>
        //     <h5>Tortor Dolor Cursus Ultricies</h5>

          
        //       <ul>
        //           <li>Sit amet, aliquid nonumes at me</li>
        //           <li>eos dicit persecuti mnesarchum ei, illum quodsi invidunt no per. </li>
        //           <li>An est quando vivendum vulputate. </li>
        //           <li>Veri intellegat delicatissimi duo cu, tantas graecis id sea. </li>
        //           <li>Ex dicunt suavitate quaerendum sit, eos no augue nonumes voluptatum. In dicat dicta vitae eam, eu pri duis laboramus, his eu quas voluptua cotidieque.</li>
        //           <li>Labores disputando at cum, an qualisque repudiare scripserit duo. </li>
        //           <li>Cum cu altera audire honestatis. Sea ea tritani fastidii, et nam case dolor. At altera aeterno platonem ius, eam decore labitur id.</li>
        //           <li>Has id fabellas dissentiet, no nulla sanctus pri. </li>
        //      </ul>
         
        //           <hr>

        //   <h5>Inceptos Tellus Parturient Vulputate</h5  >
        //   <ol>
        //     <li>Labores disputando at cum, an qualisque repudiare scripserit duo. Cum cu altera audire honestatis. Sea ea tritani fastidii, et nam case dolor. At altera aeterno platonem ius, eam decore labitur id.</li>
        //     <li>Has id fabellas dissentiet, no nulla sanctus pri. Mea affert adipiscing at, ex solum electram referrentur sed, ea nec justo mundi. Nam ad fugit evertitur vituperata, eu causae audiam fuisset pri. Cu semper placerat vel, cetero tritani docendi ea mel, audiam dolorum reprimique nam an. Delenit accusam id sed, noster atomorum senserit ex est.Lorem ipsum dolor sit amet, aliquid nonumes at mel, eos dicit persecuti mnesarchum ei, illum quodsi invidunt no per. An est quando vivendum vulputate. Veri intellegat delicatissimi duo cu, tantas graecis id sea. Ex dicunt suavitate quaerendum sit, eos no augue nonumes voluptatum. In dicat dicta vitae eam, eu pri duis laboramus, his eu quas voluptua cotidieque.</li>
        //     <li>Labores disputando at cum, an qualisque repudiare scripserit duo. Cum cu altera audire honestatis. Sea ea tritani fastidii, et nam case dolor. At altera aeterno platonem ius, eam decore labitur id.Has id fabellas dissentiet, no nulla sanctus pri. Mea affert adipiscing at, ex solum electram referrentur sed, ea nec justo mundi. Nam ad fugit evertitur vituperata, eu causae audiam fuisset pri. Cu semper placerat vel, cetero tritani docendi ea mel, audiam dolorum reprimique nam an. Delenit accusam id sed, noster atomorum senserit ex est.</li>
        //   </ol> "
        // ]
        
        // [
        //   'template_name' => 'hero_video',
        //   'content_position' => 'center',
        //   'text_color' => 'text-white',
        //   'desktop_cover_url' => CMSHelper::getAssetPath('assets/images/homepage/desktop-video-cover.jpg'),
        //   'mobile_cover_url' => CMSHelper::getAssetPath('assets/images/homepage/mobile-video-cover.jpg'),
        //   'image_url' => CMSHelper::getAssetPath('assets/images/homepage/desktop-video-cover.jpg'),// cover html5
        //   'image_title' => 'Lorem ipsum dolor',
        //   'title' => 'Lorem ipsum dolor',
        //   'short_description' => 'sit amet omnis graecLorem ipsum',
        //   'video_type' => 'youtube', //vimeo, html5
        //   'video_id' => 'bTqVqk7FSmY', //for vimeo, html5
        //   'video_link' => '', //for html5 --> CMSHelper::getAssetPath('assets/videos/HeroV_v2.3_720_No_Audio_Crop_XS.mp4')
        //   'autoplay' => true
        // ]


        [
          'template_name' => 'hero_video',
          'content_position' => 'center',
          'text_color' => 'text-white',
          'desktop_cover_url' => CMSHelper::getAssetPath('assets/images/homepage/desktop-video-cover.jpg'),
          'mobile_cover_url' => CMSHelper::getAssetPath('assets/images/homepage/mobile-video-cover.jpg'),
          'image_url' => CMSHelper::getAssetPath('assets/images/homepage/desktop-video-cover.jpg'),// cover html5
          'image_title' => 'Lorem ipsum dolor',
          'title' => 'Lorem ipsum dolor',
          'short_description' => 'sit amet omnis graecLorem ipsum',
          'video_type' => 'youtube', //vimeo, html5
          'video_id' => 'bTqVqk7FSmY', //for vimeo, html5
          'video_link' => '', //for html5 --> CMSHelper::getAssetPath('assets/videos/HeroV_v2.3_720_No_Audio_Crop_XS.mp4')
          'autoplay' => true
        ],
        [
          'template_name' => 'intro_text',
          'background_color' => 'n',
          'heading' => 'Dissentiet Rebum',
          'sub_heading' => 'Lorem ipsum dolor sit amet, no sea augue quodsi, sit nullam dolores explicari eialli placerat in ius, id his labores. admodum.',
          'description' => '<p>Justo gubergren dissentiunt quo ad. Ex aeque detracto omittantur mel, ei maiorum vivendum vel. Vis facete consectetuer in. Odio lobo
          rtis democritum est eu, ferri populo definiebas eam no. admodum, munere sententiae an eos. Vis ut impetus dolorum expetenda. 
          Ex est aeque omnesque ut impetus dolorum expetenda 
          Ex est aeque omnesque</p>'
        ],
        [
          'template_name' => 'grid_block',
          'object_data' => [
            [
              'image_url' => CMSHelper::getAssetPath('assets/images/private-dining/event.jpg'),
              'link_url' => '#',
              'link_label' => 'view more',
              'title' => 'private event',
              'description' => 'Lorem ipsum dolor sit amet ultrice'
            ],
            [
              'image_url' => CMSHelper::getAssetPath('assets/images/private-dining/menu.jpg'),
              'link_url' => '#',
              'link_label' => '',
              'title' => 'menu',
              'description' => 'Lorem ipsum dolor'
            ],
            [
              'image_url' =>  '',
              'link_url' => '#',
              'link_label' => '',
              'title' => 'brochure',
              'description' => 'Lorem ipsum dolor'
            ],
            [
              'image_url' =>  CMSHelper::getAssetPath('assets/images/private-dining/wine-list.jpg'),
              'link_url' => '#',
              'link_label' => '',
              'title' => 'wine list',
              'description' => 'Lorem ipsum dolor sit amet'
            ],
            [
              'image_url' =>  CMSHelper::getAssetPath('assets/images/private-dining/special.jpg'),
              'link_url' => '#',
              'link_label' => '',
              'title' => 'special occasions',
              'description' => 'Lorem ipsum dolor sit amet'
            ]
          ]
        ],
        
        [
          'template_name' => 'grid_homepage',
          'object_data' => [
            [
              'image_url' => CMSHelper::getAssetPath('assets/images/homepage/gourmet.jpg'),
              'url' => '#',
              'title' => 'gourmet',
              'subtitle' => 'Lorem ipsum dolor sit amet ultrice',
              'background' => ''
            ],
            [
              'image_url' => CMSHelper::getAssetPath('assets/images/homepage/wine-cellar.jpg'),
              'url' => '#',
              'title' => 'wine cellar',
              'subtitle' => 'Lorem ipsum dolor sit amet ultrice',
              'background' => ''
            ],
            [
              'image_url' =>  CMSHelper::getAssetPath('assets/images/homepage/private-dining.jpg'),
              'url' => '#',
              'title' => 'private dining',
              'subtitle' => 'Lorem ipsum dolor',
              'background' => 'dark-purple'
            ],
            [
              'image_url' =>  CMSHelper::getAssetPath('assets/images/homepage/event.jpg'),
              'url' => '#',
              'title' => 'upcoming event',
              'subtitle' => 'Lorem ipsum dolor sit amet',
              'date' => '2018-02-22',
              'background' => 'light-purple'
            ]
          ]
        ],
        [
          'template_name' => 'block_listing_filter',
          'heading' => 'Private events',
          'description' => '',
          'category' => [
            [
              'category_id' => 'all',
              'category_name' => 'All'
            ],
            [
              'category_id' => 'cat1',
              'category_name' => 'category'
            ],
            [
              'category_id' => 'cat2',
              'category_name' => 'category 2'
            ],
            [
              'category_id' => 'cat3',
              'category_name' => 'category 3'
            ]
          ],
          'sub_category' => [
            [
              'sub_category_id' => 'sub_cat1',
              'category_id' => 'cat1',
              'sub_category_name' => 'Subcategory'
            ],
            [
              'sub_category_id' => 'sub_cat2',
              'category_id' => 'cat2',
              'sub_category_name' => 'Subcategory 2'
            ],
            [
              'sub_category_id' => 'sub_cat3',
              'category_id' => 'cat3',
              'sub_category_name' => 'Subcategory 3'
            ]
          ],
          'category_years' => [
            [
              'yearValue' => '2018',
              'yearLabel' => '2018'
            ],
            [
              'yearValue' => '2019',
              'yearLabel' => '2019'
            ]
          ],
          'category_month' => [
            [
              'monthValue' => '01',
              'monthLabel' => 'January'
            ],
            [
              'monthValue' => '02',
              'monthLabel' => 'February'
            ],
            [
              'monthValue' => '03',
              'monthLabel' => 'March'
            ],
            [
              'monthValue' => '04',
              'monthLabel' => 'April'
            ],
            [
              'monthValue' => '05',
              'monthLabel' => 'May'
            ],
            [
              'monthValue' => '06',
              'monthLabel' => 'June'
            ],
            [
              'monthValue' => '07',
              'monthLabel' => 'July'
            ],
            [
              'monthValue' => '08',
              'monthLabel' => 'August'
            ],
            [
              'monthValue' => '09',
              'monthLabel' => 'September'
            ],
            [
              'monthValue' => '10',
              'monthLabel' => 'October'
            ],
            [
              'monthValue' => '11',
              'monthLabel' => 'November'
            ],
            [
              'monthValue' => '12',
              'monthLabel' => 'December'
            ]
          ],
          'object_data' => [
            [
              'category_id' => 'cat1',
              'sub_category_id' => 'sub_cat1',
              'image_url' => CMSHelper::getAssetPath('assets/images/private-events/event-01.jpg'),
              'start_date' => '2017-11-28',
              'end_date' => '2018-01-31',
              'short_description' => 'Lorem ipsum dolor sit amet no sea augue',
              'link_url' => '/event-detail',
              'link_label' => 'view more'
            ],
            [
              'category_id' => 'cat2',
              'sub_category_id' => 'sub_cat2',
              'image_url' => CMSHelper::getAssetPath('assets/images/private-events/event-02.jpg'),
              'start_date' => '2018-03-21',
              'end_date' => '2018-04-31',
              'short_description' => 'Lorem ipsum dolor sit amet no sea augue',
              'link_url' => '/event-detail',
              'link_label' => 'view more'
            ],
            [
              'category_id' => 'cat3',
              'sub_category_id' => 'sub_cat3',
              'image_url' => CMSHelper::getAssetPath('assets/images/private-events/event-03.jpg'),
              'start_date' => '2018-05-28',
              'end_date' => '2018-06-28',
              'short_description' => 'Lorem ipsum dolor sit amet no sea augue',
              'link_url' => '/event-detail',
              'link_label' => 'view more'
            ],
            [
              'category_id' => 'cat1',
              'sub_category_id' => 'sub_cat2',
              'image_url' => CMSHelper::getAssetPath('assets/images/private-events/event-04.jpg'),
              'start_date' => '2018-07-08',
              'end_date' => '2018-08-08',
              'short_description' => 'Lorem ipsum dolor sit amet no sea augue',
              'link_url' => '/event-detail',
              'link_label' => 'view more'
            ],
            [
              'category_id' => 'cat2',
              'sub_category_id' => 'sub_cat2',
              'image_url' => CMSHelper::getAssetPath('assets/images/private-events/event-05.jpg'),
              'start_date' => '2018-07-08',
              'end_date' => '2018-08-08',
              'short_description' => 'Lorem ipsum dolor sit amet no sea augue',
              'link_url' => '/event-detail',
              'link_label' => 'view more'
            ],
            [
              'category_id' => 'cat3',
              'sub_category_id' => 'sub_cat3',
              'image_url' => CMSHelper::getAssetPath('assets/images/private-events/event-06.jpg'),
              'start_date' => '2018-09-28',
              'end_date' => '2018-10-31',
              'short_description' => 'Lorem ipsum dolor sit amet no sea augue',
              'link_url' => '/event-detail',
              'link_label' => 'view more'
            ],
            [
              'category_id' => 'cat1',
              'sub_category_id' => 'sub_cat3',
              'image_url' => CMSHelper::getAssetPath('assets/images/private-events/event-01.jpg'),
              'start_date' => '2018-09-28',
              'end_date' => '2018-10-31',
              'short_description' => 'Lorem ipsum dolor sit amet no sea augue',
              'link_url' => '/event-detail',
              'link_label' => 'view more',
              
            ],
            [
              'category_id' => 'cat2',
              'sub_category_id' => 'sub_cat2',
              'image_url' => CMSHelper::getAssetPath('assets/images/private-events/event-02.jpg'),
              'start_date' => '2018-11-28',
              'end_date' => '2019-01-31',
              'short_description' => 'Lorem ipsum dolor sit amet no sea augue',
              'link_url' => '/event-detail',
              'link_label' => 'view more'
            ],
            [
              'category_id' => 'cat3',
              'sub_category_id' => 'sub_cat3',
              'image_url' => CMSHelper::getAssetPath('assets/images/private-events/event-03.jpg'),
              'start_date' => '2018-11-28',
              'end_date' => '2019-01-31',
              'short_description' => 'Lorem ipsum dolor sit amet no sea augue',
              'link_url' => '/event-detail',
              'link_label' => 'view more'
            ]
          ]
        ]
      ];

      return $this->mockup('homepage', ['data' => $data, 'currentPage' => $this->globalData]);
    }
    
    public function getCareer(/** @noinspection PhpUnusedParameterInspection */ Request  $request)
    {
        // Mock-up Data
      $this->globalData['page'] = 'career';
      $data = [
        [
          'template_name' => 'text_template',
          'parent_page' => 'text template'
        ]
      ];

      return $this->mockup('career', ['data' => $data, 'currentPage' => $this->globalData]);
    }

    public function getRooftop(/** @noinspection PhpUnusedParameterInspection */ Request  $request)
    {
      // Mock-up Data
      $this->globalData['page'] = 'homepage';
      $data = [
        [
          'template_name' => 'hero',
          'object_data' => [
            [
              'title' => 'Pharetra Nullam',
              'desktop_image' => CMSHelper::getAssetPath('assets/images/homepage/hero-desktop-01.jpg'),
              'mobile_image' => CMSHelper::getAssetPath('assets/images/homepage/hero-mobile-01.jpg'),
              'short_description' => 'Magna Risus Quam Vestibulum',
              'link_url' => '#',
              'link_label' => 'view more'
            ],
            [
              'title' => 'Ridiculus Fringilla',
              'desktop_image' => CMSHelper::getAssetPath('assets/images/private-dining/hero-desktop-01.jpg'),
              'mobile_image' => CMSHelper::getAssetPath('assets/images/private-dining/hero-mobile-01.jpg'),
              'short_description' => 'Sem Justo Malesuada Ipsum Ridiculus',
              'link_url' => '',
              'link_label' => ''
            ]
          ]
        ],
        [
          'template_name' => 'intro_text',
          'background_color' => 'n',
          'heading' => 'Parturient Tristique Fermentum',
          'image_url' => CMSHelper::getAssetPath('assets/images/rooftop/intro.jpg'),
          'sub_heading' => 'Aenean eu leo quam. Pellentesque ornare sem lacinia quam venenatis vestibulum.',
          'description' => '<p>Aenean eu leo quam. Pellentesque ornare sem lacinia quam venenatis vestibulum. Morbi leo risus, porta ac consectetur ac, vestibulum at eros. Nulla vitae elit libero, a pharetra augue. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>'
        ],
        [
          'template_name' => 'vertical_menu_list',
          'title' => 'Vero facetean',
          'sub_title' => 'Lorem ipsum',
          'background_color' => 'bg-light-orange',
          'menu_panel_align' => 'right',
          'object_data' => [
            [
              'image_url' => CMSHelper::getAssetPath('assets/images/rooftop/menu-01.jpg'),
              'alt' => ''
            ],
            [
              'image_url' => CMSHelper::getAssetPath('assets/images/rooftop/menu-02.jpg'),
              'alt' => ''
            ]
          ],
          'object_menu' => [
            [
              'title' => 'menu',
              'menu_list' => [
                [
                  'menu_name' => 'Lorem ipsum dolor sit amet',
                  'description' => 'Ea augue quodsi, sit nullam dolores expli ipsum dolar',
                  'price' => '300',
                  'currency' => 'VND'
                ],
                [
                  'menu_name' => 'Lorem ipsum dolor sit amet',
                  'description' => 'Ea augue quodsi, sit nullam dolores expli ipsum dolar',
                  'price' => '1200',
                  'currency' => 'VND'
                ],
                [
                  'menu_name' => 'Lorem ipsum dolor sit amet',
                  'description' => 'Ea augue quodsi, sit nullam dolores expli ipsum dolar',
                  'price' => '115',
                  'currency' => 'VND'
                ],
                [
                  'menu_name' => 'Lorem ipsum dolor sit amet',
                  'description' => 'Ea augue quodsi, sit nullam dolores expli ipsum dolar',
                  'price' => '115',
                  'currency' => 'VND'
                ],
                [
                  'menu_name' => 'Lorem ipsum dolor sit amet',
                  'description' => 'Ea augue quodsi, sit nullam dolores expli ipsum dolar',
                  'price' => '300',
                  'currency' => 'VND'
                ],
                [
                  'menu_name' => 'Lorem ipsum dolor sit amet',
                  'description' => 'Ea augue quodsi, sit nullam dolores expli ipsum dolar',
                  'price' => '550',
                  'currency' => 'VND'
                ],
                [
                  'menu_name' => 'Lorem ipsum dolor sit amet',
                  'description' => 'Ea augue quodsi, sit nullam dolores expli ipsum dolar',
                  'price' => '550',
                  'currency' => 'VND'
                ]
              ]
            ],
            [
              'title' => 'wine list',
              'menu_list' => [
                [
                  'menu_name' => 'Lorem ipsum dolor sit amet',
                  'description' => 'Ea augue quodsi, sit nullam dolores expli ipsum dolar',
                  'price' => '115',
                  'currency' => 'VND'
                ],
                [
                  'menu_name' => 'Lorem ipsum dolor sit amet',
                  'description' => 'Ea augue quodsi, sit nullam dolores expli ipsum dolar',
                  'price' => '550',
                  'currency' => 'VND'
                ],
                [
                  'menu_name' => 'Lorem ipsum dolor sit amet',
                  'description' => 'Ea augue quodsi, sit nullam dolores expli ipsum dolar',
                  'price' => '1200',
                  'currency' => 'VND'
                ],
                [
                  'menu_name' => 'Lorem ipsum dolor sit amet',
                  'description' => 'Ea augue quodsi, sit nullam dolores expli ipsum dolar',
                  'price' => '300',
                  'currency' => 'VND'
                ]
              ]
            ]
          ]
        ],
        [
          'template_name' => 'vertical_menu_list',
          'title' => 'Vero facetean',
          'sub_title' => 'Lorem ipsum',
          'background_color' => 'bg-congo-brown',
          'menu_panel_align' => 'left',
          'object_data' => [
            [
              'image_url' => CMSHelper::getAssetPath('assets/images/rooftop/menu-01.jpg'),
              'alt' => ''
            ],
            [
              'image_url' => CMSHelper::getAssetPath('assets/images/rooftop/menu-02.jpg'),
              'alt' => ''
            ]
          ],
          'object_menu' => [
            [
              'title' => 'menu',
              'menu_list' => [
                [
                  'menu_name' => 'Lorem ipsum dolor sit amet',
                  'description' => 'Ea augue quodsi, sit nullam dolores expli ipsum dolar',
                  'price' => '300',
                  'currency' => 'VND'
                ],
                [
                  'menu_name' => 'Lorem ipsum dolor sit amet',
                  'description' => 'Ea augue quodsi, sit nullam dolores expli ipsum dolar',
                  'price' => '1200',
                  'currency' => 'VND'
                ],
                [
                  'menu_name' => 'Lorem ipsum dolor sit amet',
                  'description' => 'Ea augue quodsi, sit nullam dolores expli ipsum dolar',
                  'price' => '115',
                  'currency' => 'VND'
                ],
                [
                  'menu_name' => 'Lorem ipsum dolor sit amet',
                  'description' => 'Ea augue quodsi, sit nullam dolores expli ipsum dolar',
                  'price' => '115',
                  'currency' => 'VND'
                ],
                [
                  'menu_name' => 'Lorem ipsum dolor sit amet',
                  'description' => 'Ea augue quodsi, sit nullam dolores expli ipsum dolar',
                  'price' => '300',
                  'currency' => 'VND'
                ],
                [
                  'menu_name' => 'Lorem ipsum dolor sit amet',
                  'description' => 'Ea augue quodsi, sit nullam dolores expli ipsum dolar',
                  'price' => '550',
                  'currency' => 'VND'
                ],
                [
                  'menu_name' => 'Lorem ipsum dolor sit amet',
                  'description' => 'Ea augue quodsi, sit nullam dolores expli ipsum dolar',
                  'price' => '550',
                  'currency' => 'VND'
                ]
              ]
            ],
            [
              'title' => 'wine list',
              'menu_list' => [
                [
                  'menu_name' => 'Lorem ipsum dolor sit amet',
                  'description' => 'Ea augue quodsi, sit nullam dolores expli ipsum dolar',
                  'price' => '115',
                  'currency' => 'VND'
                ],
                [
                  'menu_name' => 'Lorem ipsum dolor sit amet',
                  'description' => 'Ea augue quodsi, sit nullam dolores expli ipsum dolar',
                  'price' => '550',
                  'currency' => 'VND'
                ],
                [
                  'menu_name' => 'Lorem ipsum dolor sit amet',
                  'description' => 'Ea augue quodsi, sit nullam dolores expli ipsum dolar',
                  'price' => '1200',
                  'currency' => 'VND'
                ],
                [
                  'menu_name' => 'Lorem ipsum dolor sit amet',
                  'description' => 'Ea augue quodsi, sit nullam dolores expli ipsum dolar',
                  'price' => '300',
                  'currency' => 'VND'
                ]
              ]
            ]
          ]
        ],
        [
          'template_name' => 'tile_slide',
          'heading' => 'Elit Mollis Fusce',
          'object_data' => [
            [
              'title' => 'melody',
              'image_url' => CMSHelper::getAssetPath('assets/images/private-dining/tile-01.jpg'),
              'link_url' => '#',
              'alt' => ''
            ],
            [
              'title' => 'the sun',
              'image_url' => CMSHelper::getAssetPath('assets/images/private-dining/tile-02.jpg'),
              'link_url' => '#',
              'alt' => ''
            ],
            [
              'title' => 'the king',
              'image_url' => CMSHelper::getAssetPath('assets/images/private-dining/tile-03.jpg'),
              'link_url' => '#',
              'alt' => ''
            ],
            [
              'title' => 'the sun',
              'image_url' => CMSHelper::getAssetPath('assets/images/private-dining/tile-02.jpg'),
              'link_url' => '#',
              'alt' => ''
            ],
            [
              'title' => 'melody',
              'image_url' => CMSHelper::getAssetPath('assets/images/private-dining/tile-01.jpg'),
              'link_url' => '#',
              'alt' => ''
            ],
            [
              'title' => 'the king',
              'image_url' => CMSHelper::getAssetPath('assets/images/private-dining/tile-03.jpg'),
              'link_url' => '#',
              'alt' => ''
            ]
          ]
        ]
      ];
      return $this->mockup('rooftop', ['data' => $data, 'currentPage' => $this->globalData]);
    }

}
