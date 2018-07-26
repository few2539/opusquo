window.video = {
  selector: '.section-video',
  autoplay_selector: '.section-video-autoplay',
  button_selector: '.play-btn',
  players: '',
  init: function() {

    if (window.Modernizr.touch) {

      // $('body').on('mousedown', '.section-video', function() {
      //     return false;
      // });
      $('body').on('touchstart', '.play-button', function(event) {

        // event.stopImmediatePropagation();
        // event.preventDefault();
        // event.stopPropagation();

        var button = $(this);
        var section = button.closest('.section-video');
        var content = section.find('.content-container');
        var button = section.find('.play-button');
        var content_inner = content.find('.content-inner');
        var video = section.find('.video-container');
        var placeholder = video.find('.placeholder');
        var youtube = video.find('.placeholder-youtube');
        var vimeo = video.find('.placeholder-vimeo');

        if( content.is('.is-active') ){
          if ( video.find('video').get(0).paused ) {
            video.find('video').get(0).play();
            button.addClass('is-hide');
            content_inner.addClass('is-hide');
            section.addClass('is-play');
          }
        } else {
          if (placeholder.length > 0) {
            var videoTag = $('<video poster="' + placeholder.attr('data-poster') + '" autoplay playsinline loop muted><source src="' + placeholder.attr('data-video-link') + '" type="video/mp4" /></video>');
            videoTag.replaceAll(placeholder);

            content_inner.addClass('is-hide');
            button.addClass('is-hide');
            content.addClass('is-active');
            section.addClass('is-play');
          }
          if (youtube.length > 0) {
            var youtubeTag = $('<iframe width="100%" height="100%" src="https://www.youtube.com/embed/' + youtube.attr('data-video-id') + '?&autoplay=1&loop=1&rel=0&showinfo=0&color=white&iv_load_policy=3" frameborder="0" allowfullscreen></iframe>');
            youtubeTag.replaceAll(youtube);

            content.addClass('is-hide');
          }
          if (vimeo.length > 0) {
            var vimeoTag = $('<iframe src="https://player.vimeo.com/video/' + vimeo.attr('data-video-id') + '?autoplay=1&loop=1&autopause=0" width="500" height="281" frameborder="0" webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe>');
            vimeoTag.replaceAll(vimeo);

            content.addClass('is-hide');
          }
        }

        // window.video.updateSize(section);
      });
      $('body').on('touchstart', '.section-video.is-play', function(event) {
        // event.stopImmediatePropagation();
        // event.preventDefault();
        // event.stopPropagation();

        var section = $(this);
        var content = section.find('.content-container');
        var button = section.find('.play-button');
        var content_inner = content.find('.content-inner');
        var video = section.find('.video-container');
        var placeholder = video.find('.placeholder');

        if ( !video.find('video').get(0).paused ) {
          video.find('video').get(0).pause();
          content_inner.removeClass('is-hide');
          button.removeClass('is-hide');
          section.removeClass('is-play');
        }
      });
    } else {
      $('body').on('click', '.play-button', function(event) {
        event.stopImmediatePropagation();
        event.preventDefault();
        event.stopPropagation();

        var button = $(this);
        var section = button.closest('.section-video');
        var content = section.find('.content-container');
        var button = section.find('.play-button');
        var content_inner = content.find('.content-inner');
        var video = section.find('.video-container');
        var placeholder = video.find('.placeholder');

        if( content.is('.is-active') ){
          // note: active
          if ( video.hasClass('is-play') ) {

            content.data('player')[0].pause();
            button.removeClass('is-hide');
            content_inner.removeClass('is-hide');
            video.removeClass('is-play');
            section.removeClass('is-play');
          } else {
            content.data('player')[0].play();
            button.addClass('is-hide');
            content_inner.addClass('is-hide');
            video.addClass('is-play');
            section.addClass('is-play');
          }
        } else {
          // note: init
          if (placeholder.length > 0) {
            var videoTag = $('<video poster="' + placeholder.attr('data-poster') + '" autoplay playsinline loop muted><source src="' + placeholder.attr('data-video-link') + '" type="video/mp4" /></video>');
            videoTag.replaceAll(placeholder);
          }

          var player = plyr.setup(video[0], {
            // controls: ['play', 'progress', 'fullscreen'],
            controls: [],
            autoplay: true,
            hideControls: true,
            loop: true
          });

          player[0].on('ended', function(event) {
            player[0].getEmbed().seekTo(0);
            player[0].play();
          });

          content.data('player', player);

          content_inner.addClass('is-hide');
          button.addClass('is-hide');
          content.addClass('is-active');
          video.addClass('is-play');
          section.addClass('is-play');
        }

        window.video.updateSize(section);
      });

      $('body').on('click', '.section-video.is-play', function(event) {
        event.stopImmediatePropagation();
        event.preventDefault();
        event.stopPropagation();

        var section = $(this);
        var content = section.find('.content-container');
        var button = section.find('.play-button');
        var content_inner = content.find('.content-inner');
        var video = section.find('.video-container');
        var placeholder = video.find('.placeholder');

        if ( video.hasClass('is-play') ) {
          content.data('player')[0].pause();
          button.removeClass('is-hide');
          content_inner.removeClass('is-hide');
          video.removeClass('is-play');
          section.removeClass('is-play');
        }
      });
    }
  },
  autoplay: function() {

    jQuery(window.video.autoplay_selector).each(function() {
      if ( verge.inViewport(jQuery(this)) ) {
        var section = jQuery(this);

        if (section.is('.is-played')) return;

        var button = section.find('.play-button');
        var video = section.find('.video-container');
        var placeholder = video.find('.placeholder');
        var youtube = video.find('.placeholder-youtube');
        var vimeo = video.find('.placeholder-vimeo');

        if (placeholder.length > 0) {
          var videoTag = $('<video poster="" autoplay playsinline loop muted><source src="' + placeholder.attr('data-video-link') + '" type="video/mp4" /></video>');
          videoTag.replaceAll(placeholder);
        }

        if (!window.Modernizr.touch) {
          var player = plyr.setup(video[0], {
            // controls: ['play', 'progress', 'fullscreen'],
            controls: [],
            autoplay: true,
            hideControls: true,
            loop: true
          });
          player[0].on('ended', function(event) {
            player[0].getEmbed().seekTo(0);
            player[0].play();
          });
        }

        section.addClass('is-played');

        window.video.updateSize(section);

      }
    });


  },
  onScroll: function() {
    if ( !window.simplified.smoothscrollVersion() ) {
      window.video.autoplay();
    }
  },
  onSmoothScroll: function() {
    if ( window.simplified.smoothscrollVersion() ) {
      window.smooth_scrollbar.customScroll.addListener(function (status) {
        window.video.autoplay();
      });
    }
  },
  onResize: function(){
    // force update player

    if (!window.Modernizr.touch) {

      $('.section-video:not(.section-video-autoplay)').each(function(){
        var section = $(this);
        var content = section.find('.content-container');
        var button = section.find('.play-button');
        var content_inner = content.find('.content-inner');
        var video = section.find('.video-container');
        var placeholder = video.find('.placeholder');

        if( content.is('.is-active') ){
          // note: active
          if ( !video.hasClass('is-play') ) {
            content.data('player')[0].pause();
            content_inner.removeClass('is-hide');
            button.removeClass('is-hide');
            video.removeClass('is-play');
            section.removeClass('is-play');
          } else {
            content.data('player')[0].play();
            content_inner.addClass('is-hide');
            button.addClass('is-hide');
            video.addClass('is-play');
            section.addClass('is-play');
          }
        }
        window.video.updateSize(section);
      });

      jQuery(window.video.autoplay_selector).each(function() {
        var section = jQuery(this);
        window.video.updateSize(section);
      });
    }
  },
  updateSize: function(section) {

    if( section == undefined) return;
    var playerWrapper = section.find('.plyr--vimeo, .plyr--youtube');
    if (playerWrapper.length > 0) {

      var height = window.tools.globalViewportW * 0.5625;
      if (height > section.height()) {
        // if video < window width
        var newHeight = window.tools.globalViewportW * 0.5625,
        newHeight = parseInt(newHeight);
        playerWrapper.css({
          width: window.tools.globalViewportW,
          height: newHeight
        })
      } else {
        var newWidth = section.height() / 0.5625,
        newWidth = parseInt(newWidth);
        playerWrapper.css({
          width: newWidth,
          height: section.height()
        })
      }
    }
  }
};

site.ready.push(function() {
  window.video.init();
})
site.load.push(function() {
  window.video.autoplay();
  // window.video.onSmoothScroll();
})
site.resize.push(function() {
  window.video.onResize();
})
site.scroll.push(function() {
  window.video.onScroll();
})
