$(document).ready(function () {
    $('#postImg').fileinput({
        showCancel: false,
        language: 'ru',
        maxFileCount: 1,
        showUpload: false,
    });

    $('#description').summernote({
        lang: 'ru-RU',
        height: 300,
    })
});