'use strict';

$(document).ready(function () {

    // Configure Datepicker
    //---------------------

    $('.datepicker').each(function (i, element) {
        $(element).datepicker({
            dateFormat: "yy-mm-dd"
        });
    });

});