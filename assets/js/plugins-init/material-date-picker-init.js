(function($) {
    "use strict"

    // MAterial Date picker
    $('#mdate').bootstrapMaterialDatePicker({
        weekStart: 0,
        time: false
    });
    $('#timepicker').bootstrapMaterialDatePicker({
        format: 'HH:mm',
        time: true,
        date: false
    });
    // $('#date-format').bootstrapMaterialDatePicker({
    //     format: 'YYYY-MM-DD hh:mm:ss'
    // });

    $('#min-date').bootstrapMaterialDatePicker({
        format: 'DD/MM/YYYY HH:mm',
        minDate: new Date()
    });

})(jQuery);