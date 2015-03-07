'use strict';

$(document).ready(function () {
    var onSuccess = function (response) {
        console.log(response);
        document.location = '/scripta.php?id=' + response.id + '&ref=' + response.ref;
    };
    var onFail = function (status, response) {

    };

    $('#novi_scripti').on('submit', function (event) {
        // Stop submitting form
        event.preventDefault();
        event.stopPropagation();
        console.log(this);

        var enctype = $(this).attr('enctype') || 'application/x-www-form-urlencoded';
        var method = $(this).attr('method') || 'POST';
        var url = $(this).attr('action') || '.';

        // Retreive data
        var scriptum = {
            label: this.elements.label.value,
            content: this.elements.content.value
        };

        // FormData
        var data = new FormData();
        data.append('scriptum', JSON.stringify(scriptum));

        // Send data
        var xhr = new XMLHttpRequest();
        xhr.open(method, url);
        xhr.onreadystatechange = function () {
            if (xhr.readyState === 4) {
                if (xhr.status >= 200 && xhr.status < 300) {
                    onSuccess(JSON.parse(xhr.response));
                } else {
                    onFail(xhr.status, xhr.response);
                }
            }
        };
        xhr.send(data);
    });
});