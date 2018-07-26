window.js_shuffle = {

    containerSelector: '.js-shuffle',
    itemSelector: '.js-shuffle-item',
    filterSelector: '.js-shuffle-filter',
    filterLiSelector: '.js-shuffle-li',
    onReady: function () {

        js_shuffle.initGrid();
        js_shuffle.initFilter();
        // js_shuffle.initLiFilter();

    },
    initGrid: function () {
        var Shuffle = window.shuffle;
        Shuffle.options = {
            buffer: 0, // Useful for percentage based heights when they might not always be exactly the same (in pixels).
            columnThreshold: 0.01, // Reading the width of elements isn't precise enough and can cause columns to jump between values.
            columnWidth: 0, // A static number or function that returns a number which tells the plugin how wide the columns are (in pixels).
            delimiter: null, // If your group is not json, and is comma delimeted, you could set delimiter to ','.
            easing: 'cubic-bezier(0.4, 0.0, 0.2, 1)', // CSS easing function to use.
            filterMode: Shuffle.FilterMode.ANY, // When using an array with filter(), the element passes the test if any of its groups are in the array. With "all", the element only passes if all groups are in the array.
            group: Shuffle.ALL_ITEMS, // Initial filter group.
            gutterWidth: 0, // A static number or function that tells the plugin how wide the gutters between columns are (in pixels).
            initialSort: null, // Shuffle can be initialized with a sort object. It is the same object given to the sort method.
            isCentered: false, // Attempt to center grid items in each row.
            itemSelector: '*', // e.g. '.picture-item'.
            roundTransforms: true, // Whether to round pixel values used in translate(x, y). This usually avoids blurriness.
            sizer: null, // Element or selector string. Use an element to determine the size of columns and gutters.
            speed: 250, // Transition/animation speed (milliseconds).
            staggerAmount: 15, // Transition delay offset for each item in milliseconds.
            staggerAmountMax: 150, // Maximum stagger delay in milliseconds.
            // throttle: throttle, // By default, shuffle will throttle resize events. This can be changed or removed.
            // throttleTime: 300, // How often shuffle can be called on resize (in milliseconds).
            useTransforms: true, // Whether to use transforms or absolute positioning.
        };
        if ($(window.js_shuffle.containerSelector).length) {
            var Shuffle = window.shuffle;
            var element = $(js_shuffle.containerSelector);
            var sizer = $(js_shuffle.itemSelector);

            var shuffleInstance = new Shuffle(element, {
                itemSelector: js_shuffle.itemSelector,
                sizer: sizer // could also be a selector: '.my-sizer-element'
            });




            $(js_shuffle.containerSelector).data('shuffle', shuffleInstance);
        }

    },


    initFilter: function () {
        var filterOption = [];
        $(js_shuffle.filterSelector).on('change', function (e) {

            var value = e.target.value;
            var name = e.target.name;

            switch (name) {
                case 'filter1':
                    filterOption[0] = value;
                    break;
                case 'filter2':
                    filterOption[1] = value;
                    break;
                case 'filter3':
                    filterOption[2] = value;
                    break;

            }

            js_shuffle.updateFilter(filterOption);

            // js_shuffle.updateFilter(e.target.value);
        })
    },

    // initLiFilter: function () {
    //     $(js_shuffle.filterLiSelector).on('click', function (e) {
    //         e.preventDefault();
    //         var value = $(this).data('groups');
    //         console.log(value);
    //         js_shuffle.updateFilter(value);

    //     })
    // },

    updateFilter: function (filterValue) {
        console.log('updateFilter: ',filterValue);

        // step : 1 remove empty index
        var filterValue = filterValue.filter(Boolean);
        // step : 2 array length == 0 set empty stirng
        if(filterValue.length == 0){
            filterValue = '';
        }

        // var shuffleInstance = $(js_shuffle.containerSelector).data('shuffle');
        // shuffleInstdance.filter(filterValue)

        $(js_shuffle.containerSelector).data('shuffle').filter(filterValue);
        // $(js_shuffle.containerSelector).data('shuffle').filter([filterValue,subValue2,month]);

    },





}

$(document).ready(js_shuffle.onReady);