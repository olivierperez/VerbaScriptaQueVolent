'use strict';

$(document).ready(function () {

    // Handle form submition
    //----------------------

    var onSuccess = function (response) {
        console.log(response);
        document.location = '/index.php/' + response.id + '/' + response.ref;
    };
    var onFail = function (status, response) {
        alert('failed(' + status + ') => ' + response);
    };

    $('#novi_scripti').on('submit', function (event) {
        // Stop submitting form
        event.preventDefault();
        event.stopPropagation();
        console.log(this);

        var method = $(this).attr('method') || 'POST';
        var url = $(this).attr('action') || '.';

        // Retreive data
        var scriptum = {
            title: this.elements.title.value,
            content: this.elements.content.value,
            destruction: this.elements.destruction.value
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
