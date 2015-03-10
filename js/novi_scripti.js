'use strict';

$(document).ready(function () {

    // Load ACE editor
    //----------------
    var editor = ace.edit('editor');
    editor.getSession().setMode("ace/mode/markdown");
    editor.setValue($('#content').val());
    editor.getSession().on('change', function () {
        $('#content').val(editor.getValue());
    });

    // Handle form submition
    //----------------------

    var onSuccess = function (response) {
        console.log(response);
        document.location = response.url;
    };

    var onFail = function (status, response) {
        alert('failed(' + status + ') => ' + response);
    };

    $('#novi_scripti').on('submit', function (event) {
        // Stop submitting form
        event.preventDefault();
        event.stopPropagation();
        console.log(this);

        var method = $(this).attr('method');
        var url = $(this).attr('action');

        // Retreive data
        var scriptum = {
            title: this.elements.title.value,
            content: this.elements.content.value,
            publication: this.elements.publication.value,
            destruction: this.elements.destruction.value,
            onelife: this.elements.onelife.checked
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
