// console.log('date-picker')

// window.js_date_picker ={
//     selector : '.js-date-picker',
//     onReady:function(){
//         console.log('datepicker');
//         $(js_date_picker.selector).pickadate();
        
//     }
// }

// site.ready.push(window.js_date_picker.onReady);


window.js_date_picker = {
    selector: '.js-date-picker',
    container_selector: '.js-date-container',
    onReady: function () {
        $(js_date_picker.selector).each(function () {
        console.log('datepicker');
            var min = '';
            var max = '';
            var today = new Date();

            switch (jQuery(this).attr('name')) {
                case "booking-check-in":
                    min = today;
                    break;
                case "booking-check-out":
                    var tomorrow = new Date();
                    min = new Date(tomorrow.setDate(tomorrow.getDate() + 1));
                    break;
            }

            var pickadate = $(this).pickadate({
                format: 'dd-mm-yyyy',
                formatSubmit: 'dd-mm-yyyy',
                min: min,
                max: max,
                today: '',
                clear: '',
                close: '',
                container: js_date_picker.container_selector,
                onStart: function () {
                    this.set('select', min);
                },
                onClose: function (thingSet) {
                    var name = this.$node.siblings('input').attr('name');
                    switch (name) {
                        case 'booking-check-in_submit':
                            var picker_in = $('[name="booking-check-in"]').pickadate('picker');
                            var picker_out = $('[name="booking-check-out"]').pickadate('picker');
                            if (picker_out) {
                                var check_in = picker_in.get('value').split('-');
                                var check_out_min = new Date(parseInt(check_in[2]), parseInt(check_in[1]) - 1, parseInt(check_in[0]));
                                console.log(check_out_min);
                                check_out_min = new Date(check_out_min.setDate(check_out_min.getDate() + 1));
                                picker_out.set('min', check_out_min);
                                picker_out.open();

                            }
                            break;
                    }
                }
            });

        });
    }
};

site.ready.push(js_date_picker.onReady);


window.js_date_picker = {
    selector: '.js-date-picker',
    onReady: function(){
        
        jQuery(js_date_picker.selector).pickadate();
    }
};

site.ready.push(js_date_picker.onReady);