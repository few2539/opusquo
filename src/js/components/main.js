const getDropdown = () => {

  $('.dropdown').each(function (idx) {
    var id = $(this).attr('id');
    if (!id) {
      id = "dropdown_" + (idx + 1);
      $(this).attr('id', id);
    }

    var dropdown_id = $('#' + id),
      label_selector = $('#' + id).find('.text-box'),
      dropdown_list = $('#' + id).find('li');

    label_selector.on('click', function (e) {
      var parent = $(this).closest('.dropdown');
      if (parent.siblings('.dropdown').hasClass('active')) {
        parent.siblings('.dropdown').removeClass('active');
      }
      if (dropdown_id.hasClass('active')) {
        dropdown_id.removeClass('active');
      } else if (!parent.hasClass('active')) {
        $(this).find('.dropdown-list').stop().slideDown();
        parent.addClass('active');
      } else {
        $(this).find('.dropdown-list').stop().slideUp();
        parent.removeClass('active');
      }
    });
    dropdown_list.on('click', function (e) {
      var text = $(this).text(),
        parent = $(this).closest('.dropdown');
        // label_selector = parent.find('.text');
      label_selector.text(text);

      $(this).find('.dropdown-list').stop().slideUp();
      parent.removeClass('active');
    })

    $(document).on('click', function (e) {
      if ($(e.target).is(label_selector) === false) {
        dropdown_id.removeClass('active');
      }
    })
  });
}
const getTabs = () => {
  if (!$('.menu-list-tabs').length) return;
  $('.menu-list-tabs').each(function (idx) {
    var id = $(this).attr('id');
    if (!id) {
      id = "menu_tabs_" + (idx + 1);
      $(this).attr('id', id);
    }
    $('#' + id).tabs();
    $('.menu-tabs a').on('click',function(e) {
      e.preventDefault();
    });
  });
}
const getScrollContent = () => {
  $('[data-scroll-content]').each(function(){
    $(this).mCustomScrollbar({
      scrollbarPosition: 'inside',
      live: 'once',
      theme: 'my-theme',
    });
  });
}
const init = () => {
  getDropdown();
  getTabs();
  getScrollContent();
};

export {init};
