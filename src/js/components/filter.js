var containerSelector = '[data-filter-container]',
  gridSelector = '[data-item]',
  itemSelector = '[data-item] > .block-list-item',
  itemActiveClass = 'item-active',
  shuffle = '',
  filterContainerSelector = '[data-filter]',
  filterSelector = '[data-filter] [data-group]',
  loadMoreSelector = '#loadmore',
  currentPage = 0,
  totalPage = 0,
  ITEM_PER_PAGE = $(gridSelector).data('per-page');

var controller = new ScrollMagic.Controller({
  addIndicators: false
});

const initShuffle = () => {
  var Shuffle = window.shuffle;

  Shuffle.ShuffleItem.Scale.INITIAL = 0.9;
  Shuffle.ShuffleItem.Scale.HIDDEN = 0.9;
  Shuffle.ShuffleItem.Scale.VISIBLE = 1;

  Shuffle.options = {
    group: Shuffle.ALL_ITEMS, // Initial filter group.
    speed: 600, // Transition/animation speed (milliseconds).
    easing: 'cubic-bezier(0.645, 0.045, 0.355, 1)', // CSS easing function to use.
    itemSelector: '*', // e.g. '.picture-item'.
    sizer: null, // Element or selector string. Use an element to determine the size of columns and gutters.
    gutterWidth: 0, // A static number or function that tells the plugin how wide the gutters between columns are (in pixels).
    columnWidth: 0, // A static number or function that returns a number which tells the plugin how wide the columns are (in pixels).
    delimeter: null, // If your group is not json, and is comma delimeted, you could set delimeter to ','.
    buffer: 0, // Useful for percentage based heights when they might not always be exactly the same (in pixels).
    columnThreshold: 0.01, // Reading the width of elements isn't precise enough and can cause columns to jump between values.
    initialSort: null, // Shuffle can be initialized with a sort object. It is the same object given to the sort method.
    // throttle: throttle, // By default, shuffle will throttle resize events. This can be changed or removed.
    throttleTime: 300, // How often shuffle can be called on resize (in milliseconds).
    staggerAmount: 15, // Transition delay offset for each item in milliseconds.
    staggerAmountMax: 250, // Maximum stagger delay in milliseconds.
    useTransforms: true, // Whether to use transforms or absolute positioning.
  };

  $(gridSelector).each(function () {
    var $this = $(this);
    var element = $this[0];
    var sizer = $(itemSelector)[0];

    var shuffle = new Shuffle(element, {
      itemSelector: itemSelector,
      sizer: sizer
    });

  

    $this.data('shuffle', shuffle);
  });
};

const initFilter = () => {
  $(filterSelector).on('click', function (e) {
    e.preventDefault();
    $(filterSelector).removeClass('current');
    $(this).addClass('current');
    var group = $(this).data('group');
    var html = $(this).html();

    var $parent = $(this).closest(containerSelector);
    var $shuffle = $parent.find(gridSelector);
    var shuffle = $shuffle.data('shuffle');

    shuffle.filter(group);
    updateLoadmore();

    setTimeout(function () {
      $(window).trigger('resize');
    }, 300);

  });
};

const initLoadmoreByFilter = () => {
  jQuery(loadMoreSelector).on('click',function(e){
    e.preventDefault();
    loadmoreByFilter();
  });
  // reset initial value
  var $shuffle = $(containerSelector).find(gridSelector);
  var shuffle = $shuffle.data('shuffle');

  shuffle.filter(function(element){
    return '';
  });

  updateLoadmore();
}

const loadmoreByFilter = () => {
  currentPage++;
  var count = ITEM_PER_PAGE * currentPage;

  if(currentPage > totalPage && totalPage != 0) {
    return;
  }

  if( currentPage == totalPage){
    jQuery(loadMoreSelector).parent().hide(0);
  }

  var $shuffle = $(containerSelector).find(gridSelector);
  var shuffle = $shuffle.data('shuffle');

  shuffle.filter(function(element){

    var current_filter = $(filterContainerSelector).find('li.current').data('group');
    var filters = $(element).data('groups');
    var is_match = false;

    if (current_filter == 'all' || current_filter == '' ){
      is_match = true;
    }else{
      filters.forEach(function(item){
        if(item == current_filter) is_match = true;
      });
    }

    if(is_match){
      // page limit
      count--;
      if( count < 0) return;


      return element;
    }
  });
};
const updateLoadmore = () => {
  currentPage = 0;

  // count current filter
  var current_filter = $(filterContainerSelector).find('li.current').data('group');
  var total_item = 0;

  if (current_filter == 'all' || current_filter == '' ){
    // all items
    total_item = $(gridSelector).children().length;
  }else{
    // filter items
    $(gridSelector).children('[data-groups]').each(function(){
      if($(this).data('groups')[0] == current_filter){
        total_item++;
      }
    });
  }

  // calculate page
  totalPage = Math.round(total_item / ITEM_PER_PAGE);
  if(totalPage <= 1){
    $(loadMoreSelector).parent().hide(0);
  }else{
    $(loadMoreSelector).parent().show(0);
  }

  loadmoreByFilter();
};

const init = () => {
  if (!$(gridSelector).length) return;
  initShuffle();
  initFilter();
  initLoadmoreByFilter();
};

export {init}